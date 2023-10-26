<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Billing_model');
		
		$data['billings'] = $this->Billing_model->get_all();
		render('billing-list',$data);
	}
	
	public function form($id=0)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Billing_model');
		$this->load->model('Customer_model');
		$data['customers'] = $this->Customer_model->get_all();
		$data['billing'] = null;
		if($id>0)
			$data['billing'] = $this->Billing_model->get($id);
		render('billing-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Billing_model');
		$this->Billing_model->update_or_create($this->input->post());
		redirect('billing');
	}
	
	public function delete($id)
	{
		$this->load->model('Billing_model');
		$this->Billing_model->delete($id);
		redirect('billing');
	}
	
	public function bulk()
	{
		$ids = $this->input->post('ids');
		$this->load->model('Billing_model');
		$this->Billing_model->delete_bulk($ids);
		redirect('billing');
	}
	
	public function export()
	{	
		$header = array('ID Cust','name','phone','email','billing account','hifi internet package','voucher','partner','partner product','status'); 
		$this->load->model('Billing_model');
		$billings = $this->Billing_model->export();
		export('billings', $header, $billings);
	}
}
