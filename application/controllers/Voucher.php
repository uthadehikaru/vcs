<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['vouchers'] = $this->db->query("SELECT v.*, c.name as customer FROM vouchers v left join customers c on v.id=c.voucher_id");
		render('voucher-list',$data);
	}
	
	public function form($id)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['voucher'] = $this->db->get_where("vouchers", ['id'=>$id])->row();
		$data['customers'] = $this->db->query('select * from customers where voucher_id is null');
		render('voucher-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$id = $this->input->post('id');
		$customer_id = $this->input->post('customer_id');
		$status = $this->input->post('status');
		$voucher = $this->db->get_where("vouchers", ['id'=>$id])->row();
		$customer = $this->db->get_where("customers", ['id'=>$customer_id])->row();
		if($voucher){
			if($customer){
				$this->db->reset_query();
				$this->db->where('id', $customer_id);
				$this->db->update('customers', ['voucher_id'=>$voucher->id]);
			}else{
				$this->db->reset_query();
				$this->db->where('voucher_id', $id);
				$this->db->update('customers', ['voucher_id'=>null]);
				$status = 'tersedia';
			}

			$data = [
				'status' => $status,
			];
			$this->db->where('id', $id);
			$this->db->update('vouchers', $data);
		}

		
		redirect('voucher');
	}
}
