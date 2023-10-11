<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		if($this->session->userdata('role')!='admin')
			redirect('homepage');

		$this->db->from("logs");
		$data['logs'] = $this->db->get();
		render('log-list',$data);
	}

	public function detail($id)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		if($this->session->userdata('role')!='admin')
			redirect('homepage');

		$data['log'] = $this->db->get_where('logs',['id'=>$id])->row();
		render('log-detail',$data);
	}
}
