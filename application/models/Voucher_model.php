<?php

class Voucher_model extends CI_Model {

    public $id;
    public $name;
    public $phone;
    public $email;

    public function get_all($status)
    {
            if($status)
            $this->db->where('status',$status);
            $query = $this->db->select('vouchers.*, partners.name as partner, partners.product')
            ->join('partners','vouchers.partner_id=partners.id')
            ->get('vouchers');
            return $query->result();
    }

    public function get($id)
    {
            $query = $this->db->get_where('vouchers',['id'=>$id]);
            return $query->row();
    }

    public function getByCode($code)
    {
            $query = $this->db->get_where('vouchers',['code'=>$code]);
            return $query->row();
    }

    public function update_or_create($data)
    {
        $id = $this->input->post('id');
        $voucher = $this->get($id);

        $data = [
                'code' => $this->input->post('code'),
                'partner_id' => $this->input->post('partner_id'),
                'billing_id' => $this->input->post('billing_id'),
                'status' => $this->input->post('status'),
        ];

        if($voucher){
                $this->db->where('id', $id);
                $this->db->update('vouchers', $data);
                logs($this->session->userdata('username').' updated 1 voucher', $data);
                $this->session->set_flashdata('message','voucher Updated');
        }else{
                $this->db->insert('vouchers', $data);
                logs($this->session->userdata('username').' inserted 1 voucher', $data);
                $this->session->set_flashdata('message','voucher Created');
        }

    }

    

    public function import($data)
    {
        $voucher = $this->getByCode($data['code']);

        if($voucher){
                $this->db->where('id', $voucher->id);
                $this->db->update('vouchers', $data);
        }else{
                $this->db->insert('vouchers', $data);
        }

    }

    public function delete($id)
    {
        $voucher = $this->get($id);
        $voucher = $this->db->get_where('vouchers',array('id' => $id))->row_array();
        $this->db->reset_query();
        $this->db->delete('vouchers', array('id' => $id));
        logs($this->session->userdata('username').' deleted voucher '.$voucher['id'], $voucher);
        $this->session->set_flashdata('message','voucher Deleted');
    }

    public function delete_bulk($ids)
    {
        $this->db->where_in('id',$ids);
        $vouchers = $this->db->get('vouchers')->result_array();

        $this->db->reset_query();
        $this->db->where_in('id',$ids);
        $this->db->delete('vouchers');
        $count = $this->db->affected_rows();
        logs($this->session->userdata('username').' deleted '.$count.' vouchers', $vouchers);
        $this->session->set_flashdata('message', $count.' vouchers Deleted');	
    }

    public function export()
    {
        $this->db->select('vouchers.code, partners.name as partner, partners.product, vouchers.status, vouchers.billing_id');
        $this->db->from('vouchers');
        $this->db->join('partners','partners.id=vouchers.partner_id');
        return $this->db->get()->result_array();
    }

}