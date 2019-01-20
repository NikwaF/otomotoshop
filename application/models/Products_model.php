<?php

class Products_model extends CI_Model{
    public function viewdataproducts(){
        $this->db->select('*');
        $this->db->from('products_details');
        $this->db->join('products', 'products.products_id = products_details.products_id');
        $this->db->join('kategori', 'kategori.kategori_id = products_details.kategori_id');
        return $this->db->get()->result_array();
    }

    public function getKategori(){
        return $this->db->get('kategori')->result_array();
    }
	
	public function insertCart($cart){
		$this->insert('cart',$cart);
	}

    public function insertProducts($products,$products_detail){
        $this->db->trans_start();
        $this->db->insert('products', $products);
        $products_id = array('products_id' => $this->db->insert_id());
        $kirimnih = array_merge($products_detail,$products_id);
        $this->db->insert('products_details',$kirimnih);
        return $this->db->trans_complete();
    }

    public function updateProducts($productsId,$proudctsDetailsId,$products,$products_detail){
        $this->db->trans_start();
        $this->db->where('products_id',$productsId);
        $this->db->update('products',$products);
        $this->db->where('products_details_id', $proudctsDetailsId);
        $this->db->update('products_details', $products_detail);
        return $this->db->trans_complete();
    }

    public function deleteProducts($productsId, $proudctsDetailsId){
        $this->db->trans_start();
        $this->db->where('products_id', $productsId);
        $this->db->delete('products');
        $this->db->where('products_details_id',$proudctsDetailsId);
        $this->db->delete('products_details');
        return $this->db->trans_complete();
    }
}
