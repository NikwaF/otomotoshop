<?php

class CustomerDash_model Extends CI_Model{
  public function updateProfile($data){
    $this->db->where('customer_id', $this->session->userdata('customer_id'));
    return $this->db->update('customer',$data);
  }

  public function getHistory(){
    $this->db->select('*');
    $this->db->from('orders');
    $this->db->join('kode_unik', 'kode_unik.orders_id = orders.orders_id');
    $this->db->join('customer', 'customer.customer_id = orders.customer_id');
    $this->db->where('orders.customer_id',$this->session->userdata('customer_id'));
    return $this->db->get()->result_array();		
  }

  public function getItems() {
    return $this->db->get('order_items')->result_array();
  }

  public function cek_kode($kode_unik){
    return $this->db->get_where('kode_unik',array('kode_unik' => $kode_unik))->result_array();
  }

  public function kirimpembayaran($data){
    return $this->db->insert('pembayaran',$data);
  }

  public function getCustomerpembayaran($customer_id){
    return $this->db->get_where('pembayaran',array('customer_id' => $customer_id))->result_array();
  }

  public function getkodeunik(){
    $this->db->select('kode_unik','status_bayar');
    $this->db->from('kode_unik');
    $this->db->join('orders','kode_unik.orders_id = orders.orders_id');
    $this->db->where('orders.customer_id', $this->session->userdata('customer_id'));
    $this->db->where('orders.status_bayar','belum bayar');
    return $this->db->get()->result_array();
  }

  public function deletepembayaran($idpembayaran){
    $this->db->where('pembayaran_id',$idpembayaran);
    return $this->db->delete('pembayaran');
  }
}
