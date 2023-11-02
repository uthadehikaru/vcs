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

		$this->load->model('Voucher_model');

		$statuses = ['available','sent','active','suspend','redeem','terminate','inactive'];
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
					$customers = [];
					$vouchers = [];
					$partners = [];
					$billings = [];
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;

						if($table=='vouchers'){
							$partner = $this->db->get_where('partners',['product'=>$row[2]])->row();
							if(!$partner){
								$this->session->set_flashdata('error','No Product Partner Found '.$row[2]);
								redirect('import');
								exit;
							}
							
							$this->load->model('Billing_model');
							$billing = $this->Billing_model->get($row[4]);
							if($row[4] && !$billing){
								$this->session->set_flashdata('error','No Billing Account Found '.$row[4]);
								redirect('import');
								exit;
							}

							$voucher = [
								'code' => $row[0],
								'partner_id' => $partner->id,
								'status' => $row[3],
								'billing_id' => $row[4]
							];

							$vouchers[] = $voucher;

							$this->Voucher_model->import($voucher);
						}

						if($table=='customers'){
							$customer = [
								'id' => $row[0],
								'name' => $row[1],
								'phone' => $row[2],
								'email' => $row[3]
							];

							$customers[] = $customer;
						}

						if($table=='billings'){
							$billings[] = [
								'customer_id' => $row[0],
								'id' => $row[1],
								'package' => $row[2]
							];
						}

						if($table=='partners'){

							$partners[] = [
								'name' => $row[0],
								'product' => $row[1],
							];
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
						$count = count($vouchers);
					} else if($partners){
						$this->db->insert_batch('partners',$partners);
						$count = count($partners);
					} else if($billings){
						$this->db->insert_batch('billings',$billings);
						$count = count($billings);
					}

					fclose($handle);
					logs($this->session->userdata('username').' imported '.$count.' '.$table, $customers ?? $vouchers ?? $partners ?? $billings);
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
