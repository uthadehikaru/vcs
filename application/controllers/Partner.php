<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['partners'] = $this->db->query("SELECT * from partners");
		render('partner-list',$data);
	}
	
	public function form($id=0)
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$data['partner'] = null;
		if($id>0)
			$data['partner'] = $this->db->get_where("partners", ['id'=>$id])->row();
		render('partner-form',$data);
	}
	
	public function submit()
	{
		if(!$this->session->has_userdata('username'))
			redirect('login');
		
		$id = $this->input->post('id');
		$partner = $this->db->get_where("partners", ['id'=>$id])->row();

		$data = [
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'product' => $this->input->post('product'),
		];

		if($partner){
			$this->db->where('id', $id);
			$this->db->update('partners', $data);
			logs($this->session->userdata('username').' updated 1 partner', $data);
			$this->session->set_flashdata('message','partner Updated');
		}else{
			$this->db->insert('partners', $data);
			logs($this->session->userdata('username').' inserted 1 partner', $data);
			$this->session->set_flashdata('message','partner Created');
		}

		redirect('partner');
	}
	
	public function delete($id)
	{
		$partner = $this->db->get_where("partners", ['id'=>$id])->row();
		if($partner->voucher_id){
			$this->db->where('id', $partner->voucher_id);
			$this->db->update('vouchers', ['status'=>'tersedia']);
		}
		$partner = $this->db->get_where('partners',array('id' => $id))->row_array();
		$this->db->reset_query();
		$this->db->delete('partners', array('id' => $id));
		logs($this->session->userdata('username').' deleted partner '.$partner['id'], $partner);
		$this->session->set_flashdata('message','partner Deleted');
		redirect('partner');
	}
	
	public function bulk()
	{
		$ids = $this->input->post('ids');
		$this->db->where_in('id',$ids);
		$partners = $this->db->get('partners')->result_array();

		$this->db->reset_query();
		$this->db->where_in('id',$ids);
		$this->db->delete('partners');
		logs($this->session->userdata('username').' deleted '.$this->db->affected_rows().' partners', $partners);
		$this->session->set_flashdata('message', $this->db->affected_rows().' partners Deleted');	
		redirect('partner');
	}
	
	public function export()
	{	
		$header = array('name','product'); 

		$partners = $this->db->query('select name, product from partners');
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=partners.csv"); 
		header("Content-Type: application/csv;");
	
		// file creation 
		$file = fopen('php://output', 'w');
	
		fputcsv($file, $header);
		foreach ($partners->result_array() as $key => $value)
			fputcsv($file, $value); 

		fclose($file); 
		
	}
}
