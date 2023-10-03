<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->has_userdata('username'))
			redirect('homepage');

		render('login',[]);
	}

	public function submit()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username=='admin' && $password=='secret'){
			$this->session->set_userdata('username',$username);
			redirect('homepage');
		}

		$this->session->set_flashdata('error','Invalid Username or Password');
		redirect('login');

	}
}
