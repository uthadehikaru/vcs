<?php

class Customer_model extends CI_Model {

    public $id;
    public $name;
    public $phone;
    public $email;

    public function get_all()
    {
            $query = $this->db->get('customers');
            return $query->result();
    }

    public function get($id)
    {
            $query = $this->db->get_where('customers',['id'=>$id]);
            return $query->row();
    }

    public function update_or_create($data)
    {
        $id = $this->input->post('id');
        $customer = $this->get($id);

        $data = [
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
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

    }

    public function delete($id)
    {
        $customer = $this->get($id);
        $customer = $this->db->get_where('customers',array('id' => $id))->row_array();
        $this->db->reset_query();
        $this->db->delete('customers', array('id' => $id));
        logs($this->session->userdata('username').' deleted customer '.$customer['id'], $customer);
        $this->session->set_flashdata('message','Customer Deleted');
    }

    public function delete_bulk($ids)
    {
		$this->db->where_in('id',$ids);
		$customers = $this->db->get('customers')->result_array();

		$this->db->reset_query();
		$this->db->where_in('id',$ids);
		$this->db->delete('customers');
        $count = $this->db->affected_rows();
		logs($this->session->userdata('username').' deleted '.$count.' customers', $customers);
		$this->session->set_flashdata('message', $count.' Customers Deleted');	
    }

    public function export()
    {
        $this->db->select('customers.id, customers.name, customers.phone, customers.email');
		$this->db->from('customers');
        return $this->db->get()->result_array();
    }

}