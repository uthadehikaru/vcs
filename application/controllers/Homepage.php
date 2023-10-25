<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
			
		$data['total'] = $this->db->count_all('vouchers');
		$statuses = ['available','sent','active','suspend','redeem','terminate','inactive'];
		$data['statuses'] = $statuses;
		foreach($statuses as $status)
			$data[$status] = $this->db->query("select 1 from vouchers where status='$status'")->num_rows();
		render('homepage',$data);
	}
}
