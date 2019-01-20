<?php

class Home_model Extends CI_Model{
  public function getKategori(){
    $this->db->limit(7);
    return $this->db->get('kategori')->result_array();
  }

  public function getKategori7(){
    return $this->db->get('kategori')->result_array();
  }

  public function check_client_login($data){
    return $this->db->get_where('customer', $data)->result_array();
  }

  public function regist($data){
    return $this->db->insert('customer', $data);
  }

  public function product_limit3(){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
    $this->db->order_by("products.products_id", "asc");
    $this->db->limit(6);
    return $this->db->get()->result_array();
  }

  public function product_limit8(){
    $this->db->select('products_details.products_details_id,products_details.url,products.products_id,products.nama_products,products.harga,products.gambar');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
    $this->db->order_by("products.products_id", "DESC");
    $this->db->limit(8);
    return $this->db->get()->result_array();
  }

  public function productsview($limit,$start){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
    $this->db->limit($limit,$start);
    // $this->db->order_by('nama_products','desc');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $row[] = $data;
      }
      return $row;
    } 
    return false;
  }	

  public function getProductAll(){
    return $this->db->get('products')->num_rows();
  }

  public function getproduct($url){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->where('url', $url);
    return $this->db->get()->result_array();
  }

  public function getSearch($yangdicari){
    $this->db->select('products_id,nama_products');
    $this->db->from('products');
    $this->db->like('nama_products',$yangdicari,'both');
    $this->db->order_by('nama_products', 'DESC');
    $this->db->limit(5);
    return $this->db->get()->result_array();
  }

  public function getsearchlikecount($hiu){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->like('nama_products',$hiu,'both');		
    return $this->db->get()->num_rows();		
  }

  public function searchproducts($limit,$start,$inputan){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
    $this->db->limit($limit,$start);
    $this->db->like('nama_products',$inputan,'both');	
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $row[] = $data;
      }
      return $row;
    } 
    return false;		

  }

  public function getProductInKategori($katid){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
    $this->db->where('products_details.kategori_id', $katid);
    return $this->db->get()->num_rows();
  }

  public function productsviewInId($limit,$start,$katid){
    $this->db->select('*');
    $this->db->from('products_details');
    $this->db->join('products', 'products.products_id = products_details.products_id');
    $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
    $this->db->where('products_details.kategori_id',$katid);
    $this->db->limit($limit,$start);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $row[] = $data;
      }
      return $row;
    } 
    return false;
  }


}




