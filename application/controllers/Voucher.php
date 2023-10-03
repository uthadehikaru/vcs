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
	
	public function form($id=0)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['voucher'] = null;
		if($id>0)
			$data['voucher'] = $this->db->get_where("vouchers", ['id'=>$id])->row();
		$data['customers'] = $this->db->query('select * from customers');
		render('voucher-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$id = $this->input->post('id');
		$customer_id = $this->input->post('customer_id');
		$status = $this->input->post('status');
		$customer = $this->db->get_where("customers", ['id'=>$customer_id])->row();
		if($id){
			$voucher = $this->db->get_where("vouchers", ['id'=>$id])->row();
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
				'code' => $this->input->post('code'),
				'partner' => $this->input->post('partner'),
				'status' => $status,
			];
			$this->db->where('id', $id);
			$this->db->update('vouchers', $data);
			$this->session->set_flashdata('message','Voucher Updated');
		}else{
			$data = [
				'code' => $this->input->post('code'),
				'partner' => $this->input->post('partner'),
				'status' => $status,
			];
			$this->db->insert('vouchers', $data);
			$id = $this->db->insert_id();
			if($customer){
				$this->db->reset_query();
				$this->db->where('id', $customer_id);
				$this->db->update('customers', ['voucher_id'=>$id]);
			}
			$this->session->set_flashdata('message','Voucher Created');
		}

		redirect('voucher');
	}
	
	public function delete($id)
	{
		$this->db->delete('vouchers', array('id' => $id));
		$this->session->set_flashdata('message','Voucher Deleted');
		redirect('voucher');
	}
}
