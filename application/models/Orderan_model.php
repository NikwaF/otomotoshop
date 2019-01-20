<?php 

class Orderan_model Extends CI_Model{
  public function viewdataorderan(){
    $this->db->select('*');
    $this->db->from('orders');
    $this->db->join('kode_unik', 'kode_unik.orders_id = orders.orders_id');
    $this->db->join('customer', 'customer.customer_id = orders.customer_id');
    return $this->db->get()->result_array();
  }

  public function getOrderItems(){
    return $this->db->get('order_items')->result_array();
  }

  public function getCustomerpembayaran(){
    return $this->db->get('pembayaran')->result_array();
  }

  public function konfirmasi($data){
    return $this->db->update('pembayaran', $data);
  }

  public function getOrderId($kodeunik){
    $this->db->select('orders_id');
    $this->db->from('kode_unik');
    $this->db->where('kode_unik', $kodeunik);
    return $this->db->get()->result_array();
  }

  public function updateStatus($OrderId,$data2){
    $this->db->where('orders_id',$OrderId);
    $this->db->update('orders', $data2);
  }

  public function deletepembayaran($idpembayaran){
    $this->db->where('pembayaran_id',$idpembayaran);
    return $this->db->delete('pembayaran');
  }

  public function getOrder($ordersid){
    $this->db->select('*');
    $this->db->from('orders');
    $this->db->where('orders_id',$ordersid);
    return $this->db->get()->result_array();
  }

  public function insertAntar($data){
    return $this->db->insert('antar',$data);
  }

  public function insertJemput($data){
    return $this->db->insert('jemput',$data);
  }

  public function getDataAntar(){
    return $this->db->get('antar')->result_array();
  }
  
  public function getDataJemput(){
    return $this->db->get('jemput')->result_array();
  }

  public function updateAntar($idantar,$data){
    $this->db->where('id',$idantar);
    return $this->db->update('antar',$data);
  }

  public function updateJemput($idantar,$data){
    $this->db->where('id',$idantar);
    return $this->db->update('jemput',$data);
  }

  public function insertDone($data){
    return $this->db->insert('transaksi_done',$data);
  }
}
