<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seed extends CI_Controller {

	public function index()
	{
		$vouchers = [];
		for($i=1;$i<=100;$i++){
			$vouchers[] = [
				'code'=>rand(111111111,999999999),
				'partner'=>rand(111,999),
				'status'=>'tersedia',
			];
		}

		$this->db->insert_batch('vouchers', $vouchers);

		$customers = [];
		for($i=1;$i<=100;$i++){
			$customers[] = [
				'id'=>'MTX'.rand(111111111,999999999),
				'name'=>'Customer '.rand(111,999),
				'phone'=>rand(111111111,999999999),
				'email'=>rand(111,999).'@mailinator.com',
				'package'=>rand(111,999).' Mbps',
			];
		}

		$this->db->insert_batch('customers', $customers);
	}
}
