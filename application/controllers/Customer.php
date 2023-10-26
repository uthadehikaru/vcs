<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Customer_model');
		
		$data['customers'] = $this->Customer_model->get_all();
		render('customer-list',$data);
	}
	
	public function form($id=0)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Customer_model');
		$data['customer'] = null;
		if($id>0)
			$data['customer'] = $this->Customer_model->get($id);
		render('customer-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Customer_model');
		$this->Customer_model->update_or_create($this->input->post());
		redirect('customer');
	}
	
	public function delete($id)
	{
		$this->load->model('Customer_model');
		$this->Customer_model->delete($id);
		redirect('customer');
	}
	
	public function bulk()
	{
		$ids = $this->input->post('ids');
		$this->load->model('Customer_model');
		$this->Customer_model->delete_bulk($ids);
		redirect('customer');
	}
	
	public function export()
	{	
		$header = array('id','name','phone','email'); 
		$this->load->model('Customer_model');
		$customers = $this->Customer_model->export();
		export('customers', $header, $customers);
	}
}
