<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Voucher_model');

		$status = $this->input->get('status');
		
		$data['status'] = $status;
		$data['vouchers'] = $this->Voucher_model->get_all($status);
		render('voucher-list',$data);
	}
	
	public function form($id=0)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Voucher_model');
		$this->load->model('Partner_model');
		$this->load->model('Billing_model');
		$data['voucher'] = null;
		if($id>0)
			$data['voucher'] = $this->Voucher_model->get($id);
		$data['billings'] = $this->Billing_model->get_all();
		$data['partners'] = $this->Partner_model->get_all();
		render('voucher-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$this->load->model('Voucher_model');
		$this->Voucher_model->update_or_create($this->input->post());
		redirect('voucher');
	}
	
	public function delete($id)
	{
		$this->load->model('Voucher_model');
		$this->Voucher_model->delete($id);
		redirect('voucher');
	}
	
	public function bulk()
	{
		$ids = $this->input->post('ids');
		$this->load->model('Voucher_model');
		$this->Voucher_model->delete_bulk($ids);
		redirect('voucher');
	}
	
	public function export()
	{	
		$header = array('code','partner','partner product','status','billing account'); 
		$this->load->model('Voucher_model');
		$vouchers = $this->Voucher_model->export();
		export('vouchers', $header, $vouchers);
	}
}
