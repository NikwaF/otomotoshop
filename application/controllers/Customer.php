<?php 

class Customer Extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Customer_model', 'customer');
  }

  public function viewdataCustomer(){
    if (adminLoggedIn()){
      $data['customers'] = $this->customer->getCustomer();

      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/customer/viewdataCustomer',$data);
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }
}
