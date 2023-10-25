<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$status = $this->input->get('status');
		$sql = "SELECT v.*, c.id as customer, p.name as partner, p.product FROM vouchers v join partners p on v.partner_id=p.id left join customers c on v.id=c.voucher_id";
		if($status)
			$sql .= " where v.status=?";
		
		$data['status'] = $status;
		$data['vouchers'] = $this->db->query($sql, [$status]);
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
		$data['partners'] = $this->db->query('select * from partners');
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
			logs($this->session->userdata('username').' updated 1 voucher', $data);
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
			logs($this->session->userdata('username').' inserted 1 voucher', $data);
			$this->session->set_flashdata('message','Voucher Created');
		}

		redirect('voucher');
	}
	
	public function delete($id)
	{	
		$this->db->where('voucher_id',$id);
		$this->db->update('customers', ['voucher_id'=>null]);

		$voucher = $this->db->get_where('vouchers',array('id' => $id))->row_array();
		$this->db->reset_query();
		$this->db->delete('vouchers', array('id' => $id));
		logs($this->session->userdata('username').' deleted voucher '.$voucher['code'], $voucher);
		$this->session->set_flashdata('message','Voucher Deleted');
		redirect('voucher');
	}
	
	public function bulk()
	{
		$ids = $this->input->post('ids');
		
		$this->db->where_in('voucher_id',$ids);
		$this->db->update('customers', ['voucher_id'=>null]);

		$this->db->reset_query();
		$this->db->where_in('id',$ids);
		$vouchers = $this->db->get('vouchers')->result_array();

		$this->db->reset_query();
		$this->db->where_in('id',$ids);
		$this->db->delete('vouchers');
		logs($this->session->userdata('username').' deleted '.$this->db->affected_rows().' vouchers', $vouchers);
		$this->session->set_flashdata('message', $this->db->affected_rows().' Vouchers Deleted');	
		redirect('voucher');
	}
	
	public function export($status='')
	{	
		$header = ['code','partner', 'product' ,'status'];
		$this->db->select(['code','partners.name', 'product' ,'status']);
		$this->db->from('vouchers');
		$this->db->join('partners', 'vouchers.partner_id = partners.id');
		if($status)
			$this->db->where('status',$status);

		$vouchers = $this->db->get();
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=vouchers.csv"); 
		header("Content-Type: application/csv;");
	
		// file creation 
		$file = fopen('php://output', 'w');
	
		fputcsv($file, $header);
		foreach ($vouchers->result_array() as $key => $value)
			fputcsv($file, $value); 

		fclose($file); 
	}
}
