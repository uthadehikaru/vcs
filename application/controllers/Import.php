<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
			
		$data = [];
		render('import-form',$data);
	}

	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		$statuses = ['available','sent','active','suspend','redeem'];
		try{
			$file = $_FILES['file']['tmp_name'];
			$table = $this->input->post('table');

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['file']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				$this->session->set_flashdata('error','File is mandatory!');
				redirect('import');
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["file"]["size"] > 0) {

					$i = 0;
					$handle = fopen($file, "r");
					$vouchers = [];
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;

						if($table=='vouchers'){

							$vouchers[] = [
								'code' => $row[0],
								'partner' => $row[1],
								'status' => 'available',
							];
						}

						if($table=='customers'){
							$voucher = null;
							if($row[5]){
								$voucher = $this->db->get_where('vouchers',['code'=>$row[5]])->row();
								if(!$voucher){
									$this->session->set_flashdata('error','No Voucher Code '.$row[5]);
									redirect('import');
									exit;
								}

								if(!in_array($row[6], $statuses)){
									$this->session->set_flashdata('error','Invalid Status \''.$row[5].'\' on Row '.$i.'. select one of these [available,sent,active,suspend or redeem]');
									redirect('import');
									exit;
								}

								$vouchers[$voucher->id] = $row[6];
							}
							$customer = [
								'id' => $row[0],
								'name' => $row[1],
								'phone' => $row[2],
								'email' => $row[3],
								'package' => $row[4],
								'voucher_id' => null,
							];
							if($voucher)
								$customer['voucher_id'] = $voucher->id;

							$customers[] = $customer;
						}

						// Simpan data ke database.
					}
					$count = 0;
					if($customers){
						$this->db->insert_batch('customers',$customers);
						$count = count($customers);

						foreach($vouchers as $id=>$status){
							$this->db->reset_query();
							$this->db->where('id', $id);
							$this->db->update('vouchers', ['status'=>$status]);
						}
					} else if($vouchers){
						$this->db->insert_batch('vouchers',$vouchers);
						$count = count($vouchers);
					}

					fclose($handle);
					logs($this->session->userdata('username').' imported '.$count.' '.$table, $customers ?? $vouchers);
					$this->session->set_flashdata('message','Imported '.$count.' '.$table);
					redirect('import');

				} else {
					$this->session->set_flashdata('error','Format file invalid!');
					redirect('import');
				}
			}
		}catch(Exception $ex){
			$this->session->set_flashdata('error',$ex->getMessage());
			redirect('import');
		}
	}
}
