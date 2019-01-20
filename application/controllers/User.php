<?php 

/**
 * 
 */
class User extends CI_Controller
{
  public function index()
  {
    $this->load->view('user/templates/header');
    $this->load->view('user/templates/css');
    $this->load->view('user/templates/navbar');
    $this->load->view('user/templates/sidebar');
    $this->load->view('user/home/halamandepan');
    $this->load->view('user/templates/footer');
  }

  public function halamandepan()
  {
    $this->load->view('user/templates/header');
    $this->load->view('user/templates/css');
    $this->load->view('user/templates/navbar');
    $this->load->view('user/templates/sidebar');
    $this->load->view('user/home/halamandepan');
    $this->load->view('user/templates/footer');

  }


  public function riwayatpembelian()
  {

    // $data['brg'] = array(
    //       'products'=>$this->User_model->getAllBarang()

    $this->load->view('user/templates/header');
    $this->load->view('user/templates/css');
    $this->load->view('user/templates/navbar');
    $this->load->view('user/templates/sidebar');
    $this->load->view('user/home/riwayatpembelian');
    $this->load->view('user/templates/footer');
  }

  public function detailriwayat()
  {
    $this->load->view('user/templates/header');
    $this->load->view('user/templates/css');
    $this->load->view('user/templates/navbar');
    $this->load->view('user/templates/sidebar');
    $this->load->view('user/home/detail');
    $this->load->view('user/templates/footer');     
  }
}
