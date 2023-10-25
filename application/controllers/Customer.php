<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['customers'] = $this->db->query("SELECT c.*, v.code as voucher, p.name as partner, p.product, v.status FROM customers c left join vouchers v on c.voucher_id=v.id left join partners p on v.partner_id=p.id");
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
			logs($this->session->userdata('username').' updated 1 customer', $data);
			$this->session->set_flashdata('message','Customer Updated');
		}else{
			$this->db->insert('customers', $data);
			logs($this->session->userdata('username').' inserted 1 customer', $data);
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
		$customer = $this->db->get_where('customers',array('id' => $id))->row_array();
		$this->db->reset_query();
		$this->db->delete('customers', array('id' => $id));
		logs($this->session->userdata('username').' deleted customer '.$customer['id'], $customer);
		$this->session->set_flashdata('message','Customer Deleted');
		redirect('customer');
	}
	
	public function bulk()
	{
		$ids = $this->input->post('ids');
		$this->db->where_in('id',$ids);
		$customers = $this->db->get('customers')->result_array();

		$this->db->reset_query();
		$this->db->where_in('id',$ids);
		$this->db->delete('customers');
		logs($this->session->userdata('username').' deleted '.$this->db->affected_rows().' customers', $customers);
		$this->session->set_flashdata('message', $this->db->affected_rows().' Customers Deleted');	
		redirect('customer');
	}
	
	public function export()
	{	
		$header = array('id','name','phone','email','package','voucher', 'partner', 'product','status'); 
		$this->db->select('customers.id, customers.name, customers.phone, customers.email, customers.package, vouchers.code, partners.name as partner, partners.product, vouchers.status');
		$this->db->from('customers');
		$this->db->join('vouchers', 'customers.voucher_id = vouchers.id', 'left');
		$this->db->join('partners', 'vouchers.partner_id = partners.id', 'left');

		$customers = $this->db->get();
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=customers.csv"); 
		header("Content-Type: application/csv;");
	
		// file creation 
		$file = fopen('php://output', 'w');
	
		fputcsv($file, $header);
		foreach ($customers->result_array() as $key => $value)
			fputcsv($file, $value); 

		fclose($file); 
		
	}
}
