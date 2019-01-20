<?php

class Admin_model extends CI_Model {

  public function check_admin($data){
    return $this->db->get_where('admin', $data)->result_array();
  }

  public function addCategory($data) {
    return $this->db->insert('kategori',$data);
  }

  public function checkCategory($data) {
    return $this->db->get_where('kategori', array('catName' => $data['catName']));
  }

  public function getAllCategories() {
    return $this->db->get_where('kategori', array ('catStatus' => 1))->num_rows();
  }

  public function fetchAllCategories($limit,$start) {
    $this->db->limit($limit,$start);
    $query = $this->db->get_where('kategori', array('catStatus' => 1));
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row){
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function checkCategoryById($catId) {
    return $this->db->get_where('kategori', array('catId' => $catId))->result_array();
  }

  public function updateCategory($data,$catId) {
    $this->db->where('catId',$catId);
    return $this->db->update('kategori' , $data);
  }

  public function kategori_list(){
		$hasil=$this->db->get('kategori');
		return $hasil->result_array();
  }
  
  public function cekKategori($data) {
    return $this->db->get_where('kategori', array('nama_kategori' => $data['nama_kategori']));
  }

  public function tmbKategori($data){
    return $this->db->insert('kategori', $data);
  }

  public function cekKategoriId($kat_id){
    return $this->db->get_where('kategori',array ('kategori_id' => $kat_id))->result_array();
  }

  public function updateKategori_model($data,$xid) {
    $this->db->where('kategori_id',$xid);
   return $this->db->update('kategori',$data);
  }

  public function delKategori($kat_id) {
    $this->db->where('kategori_id',$kat_id);
    return $this->db->delete('kategori');
  }
  
  public function berapatransaksi(){
	return $this->db->get('orders')->num_rows();
  }
  
  public function berapacustomer(){
	  return $this->db->get('customer')->num_rows();
  }
  
  public function berapaproduct(){
	  return $this->db->get('products')->num_rows();
  }
  
  public function berapakategori(){
	  return $this->db->get('kategori')->num_rows();
  }

  public function sudahbayar(){
    $this->db->where('status_bayar','sudah bayar');
    return $this->db->get('orders')->num_rows();
  }

  public function belumbayar(){
    $this->db->where('status_bayar','belum bayar');
    return $this->db->get('orders')->num_rows();
  }

  public function belumantar(){
    $this->db->where('proses_antar','belum diantar');
    return $this->db->get('antar')->num_rows();
  }

  public function belumjemput(){
    $this->db->where('proses_jemput','belum dijemput');
    return $this->db->get('jemput')->num_rows();
  }

  public function tunggukonfirmasi(){
    $this->db->where('status','belum terkonfirmasi');
    return $this->db->get('pembayaran')->num_rows();
  }

}
