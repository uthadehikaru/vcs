<?php

class Billing_model extends CI_Model {

    public $billing_id;
    public $package;

    public function get_all()
    {
            $query = $this->db->select('billings.*, customers.name, customers.phone, customers.email, partners.name as partner, partners.product, vouchers.code, vouchers.status')
            ->join('customers','billings.customer_id=customers.id')
            ->join('vouchers','vouchers.billing_id=billings.id','left')
            ->join('partners','vouchers.partner_id=partners.id','left')
            ->get('billings');
            return $query->result();
    }

    public function get($id)
    {
            $query = $this->db->get_where('billings',['id'=>$id]);
            return $query->row();
    }

    public function update_or_create($data)
    {
            $id = $this->input->post('id');
            $billing = $this->get($id);

            $data = [
                    'id' => $this->input->post('id'),
                    'customer_id' => $this->input->post('customer_id'),
                    'package' => $this->input->post('package'),
            ];

            if($billing){
                    $this->db->where('id', $id);
                    $this->db->update('billings', $data);
                    logs($this->session->userdata('username').' updated 1 billing', $data);
                    $this->session->set_flashdata('message','billing Updated');
            }else{
                    $this->db->insert('billings', $data);
                    logs($this->session->userdata('username').' inserted 1 billing', $data);
                    $this->session->set_flashdata('message','billing Created');
            }

    }

    public function delete($id)
    {
            $billing = $this->get($id);
            $billing = $this->db->get_where('billings',array('id' => $id))->row_array();
            $this->db->reset_query();
            $this->db->delete('billings', array('id' => $id));
            logs($this->session->userdata('username').' deleted billing '.$billing['id'], $billing);
            $this->session->set_flashdata('message','billing Deleted');
    }

    public function delete_bulk($ids)
    {
        $this->db->where_in('id',$ids);
        $billings = $this->db->get('billings')->result_array();

        $this->db->reset_query();
        $this->db->where_in('id',$ids);
        $this->db->delete('billings');
        $count = $this->db->affected_rows();
        logs($this->session->userdata('username').' deleted '.$count.' billings', $billings);
        $this->session->set_flashdata('message', $count.' billings Deleted');	
    }

    public function export()
    {
        $this->db->select('billings.customer_id, customers.name, customers.phone, customers.email, billings.id, billings.package, partners.name as partner, partners.product, vouchers.code, vouchers.status')
        ->join('customers','billings.customer_id=customers.id')
        ->join('vouchers','vouchers.billing_id=billings.id','left')
        ->join('partners','vouchers.partner_id=partners.id','left')
        ->from('billings');
        return $this->db->get()->result_array();
    }

}