<?php

class Customer_model Extends CI_Model{
    public function getCustomer(){
        return $this->db->get('customer')->result_array();
    }
}
