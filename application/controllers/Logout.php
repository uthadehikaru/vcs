<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		logs($this->session->userdata('username').' logged out');
		$this->session->sess_destroy();
		redirect('login');
	}
}
