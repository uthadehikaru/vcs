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

		try{
			$file = $_FILES['file']['tmp_name'];
			$table = $this->input->post('table');

			// Medapatkan ekstensi file csv yang akan diimport.
			$ekstensi  = explode('.', $_FILES['file']['name']);

			// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
			if (empty($file)) {
				$this->session->set_flashdata('error','File tidak boleh kosong!');
				redirect('import');
			} else {
				// Validasi apakah file yang diupload benar-benar file csv.
				if (strtolower(end($ekstensi)) === 'csv' && $_FILES["file"]["size"] > 0) {

					$i = 0;
					$handle = fopen($file, "r");
					$data = [];
					while (($row = fgetcsv($handle, 2048))) {
						$i++;
						if ($i == 1) continue;

						if($table=='vouchers'){
							$data[] = [
								'code' => $row[0],
								'partner' => $row[1],
								'status' => $row[2],
							];
						}

						if($table=='customers'){
							$data[] = [
								'id' => $row[0],
								'name' => $row[1],
								'phone' => $row[2],
								'email' => $row[3],
								'package' => $row[4],
							];
						}

						// Simpan data ke database.
					}
					$this->db->insert_batch($table,$data);

					fclose($handle);
					$this->session->set_flashdata('message','Imported '.count($data).' '.$table);
					redirect('import');

				} else {
					$this->session->set_flashdata('error','Format file tidak valid!');
					redirect('import');
				}
			}
		}catch(Exception $ex){
			$this->session->set_flashdata('error',$ex->getMessage());
			redirect('import');
		}
	}
}
