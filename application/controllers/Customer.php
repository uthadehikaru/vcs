<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['customers'] = $this->db->query("SELECT c.*, v.code as voucher FROM customers c left join vouchers v on c.voucher_id=v.id");
		render('customer-list',$data);
	}
	
	public function form($id=0)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['customer'] = null;
		if($id>0)
			$data['customer'] = $this->db->get_where("customers", ['id'=>$id])->row();
		render('customer-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$id = $this->input->post('id');
		$customer = $this->db->get_where("customers", ['id'=>$id])->row();

		$data = [
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'package' => $this->input->post('package'),
		];

		if($customer){
			$this->db->where('id', $id);
			$this->db->update('customers', $data);
			$this->session->set_flashdata('message','Customer Updated');
		}else{
			$this->db->insert('customers', $data);
			$this->session->set_flashdata('message','Customer Created');
		}

		redirect('customer');
	}
	
	public function delete($id)
	{
		$customer = $this->db->get_where("customers", ['id'=>$id])->row();
		if($customer->voucher_id){
			$this->db->where('id', $customer->voucher_id);
			$this->db->update('vouchers', ['status'=>'tersedia']);
		}
		$this->db->delete('customers', array('id' => $id));
		$this->session->set_flashdata('message','Customer Deleted');
		redirect('customer');
	}
}
