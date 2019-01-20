<?php

class Cart_model Extends CI_Model {
    public function insertOrders($orders){
		$this->db->insert('orders',$orders);
		return $this->db->insert_id();
	}
	
	public function insertOrdersDetails($order_details){
		$this->db->insert('order_items',$order_details);
	}
	
	public function insertKodeUnik($kodeunik){
		$this->db->insert('kode_unik',$kodeunik);
	}
	
	public function getKodeUnik($orderid){
		$this->db->where('orders_id',$orderid);
		return $this->db->get('kode_unik')->result_array();
	}
}