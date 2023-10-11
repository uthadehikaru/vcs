<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		if($this->session->userdata('role')!='admin')
			redirect('homepage');

		$this->db->from("users");
		$data['users'] = $this->db->get();
		render('user-list',$data);
	}
	
	public function form($username=null)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		if($this->session->userdata('role')!='admin')
			redirect('homepage');
		
		$data['user'] = null;
		if($username)
			$data['user'] = $this->db->get_where("users", ['username'=>$username])->row();
		render('user-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
	
		if($this->session->userdata('role')!='admin')
			redirect('homepage');
		
		$username = $this->input->post('username');
		$user = $this->db->get_where("users", ['username'=>$username])->row();

		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role'),
		];

		if($user){
			$this->db->where('username', $username);
			$this->db->update('users', $data);
			logs($this->session->userdata('username').' updated 1 user', $data);
			$this->session->set_flashdata('message','user Updated');
		}else{
			$this->db->insert('users', $data);
			logs($this->session->userdata('username').' inserted 1 user', $data);
			$this->session->set_flashdata('message','user Created');
		}

		redirect('user');
	}
	
	public function delete($username)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');

		if($this->session->userdata('role')!='admin')
			redirect('homepage');

		$user = $this->db->get_where('users',array('username' => $username))->row_array();
		$this->db->delete('users', array('username' => $username));
		logs($this->session->userdata('username').' deleted 1 user', $user);
		$this->session->set_flashdata('message','user Deleted');
		redirect('user');
	}
}
