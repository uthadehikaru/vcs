<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
			
		$data['total'] = $this->db->count_all('vouchers');
		$data['tersedia'] = $this->db->query("select 1 from vouchers where status='available'")->num_rows();
		$data['aktif'] = $this->db->query("select 1 from vouchers where status='active'")->num_rows();
		$data['terkirim'] = $this->db->query("select 1 from vouchers where status='sent'")->num_rows();
		$data['suspend'] = $this->db->query("select 1 from vouchers where status='suspend'")->num_rows();
		$data['redeem'] = $this->db->query("select 1 from vouchers where status='redeem'")->num_rows();
		render('homepage',$data);
	}
}
