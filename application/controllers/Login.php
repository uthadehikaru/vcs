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

		$result = $this->db->get_where('users',['username'=>$username, 'password'=>$password]);
		$user = $result->row();
		if($user){
			logs($user->username.' logged in');
			$this->session->set_userdata('username',$user->username);
			$this->session->set_userdata('role',$user->role);
			return redirect('homepage');
		}

		$this->session->set_flashdata('error','Invalid Username or Password');
		redirect('login');

	}
}
