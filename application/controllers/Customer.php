<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['customers'] = $this->db->query("SELECT c.*, v.code as voucher FROM customers c left join vouchers v on c.voucher_id=v.id");
		render('customer-list',$data);
	}
}
