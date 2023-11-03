<?php

class Partner_model extends CI_Model {

    public $id;
    public $name;
    public $phone;
    public $email;

    public function get_all()
    {
            $query = $this->db->get('partners');
            return $query->result();
    }

    public function get($id)
    {
            $query = $this->db->get_where('partners',['id'=>$id]);
            return $query->row();
    }

    public function getByProduct($product)
    {
            $query = $this->db->get_where('partners',['product'=>$product]);
            return $query->row();
    }

    public function update_or_create($data)
    {
        $id = $this->input->post('id');
        $partner = $this->get($id);

        $data = [
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
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

    }

    public function delete($id)
    {
        $partner = $this->get($id);
        $partner = $this->db->get_where('partners',array('id' => $id))->row_array();
        $this->db->reset_query();
        $this->db->delete('partners', array('id' => $id));
        logs($this->session->userdata('username').' deleted partner '.$partner['id'], $partner);
        $this->session->set_flashdata('message','partner Deleted');
    }

    public function delete_bulk($ids)
    {
		$this->db->where_in('id',$ids);
		$partners = $this->db->get('partners')->result_array();

		$this->db->reset_query();
		$this->db->where_in('id',$ids);
		$this->db->delete('partners');
        $count = $this->db->affected_rows();
		logs($this->session->userdata('username').' deleted '.$count.' partners', $partners);
		$this->session->set_flashdata('message', $count.' partners Deleted');	
    }

    public function export()
    {
        $this->db->select('partners.id, partners.name, partners.phone, partners.email');
		$this->db->from('partners');
        return $this->db->get()->result_array();
    }
    
    public function import($data)
    {
        $partner = $this->getByProduct($data['product']);

        if($partner){
                $this->db->where('id', $partner->id);
                $this->db->update('partners', $data);
        }else{
                $this->db->insert('partners', $data);
        }

    }

}