<?php

class Customer_dashboard Extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('CustomerDash_model' ,'cusdash');
  }

  public function index(){
    if (customerLoggedIn()){
      $this->load->view('client/dashboard_customer/templates/header');
      $this->load->view('client/dashboard_customer/templates/css');
      $this->load->view('client/dashboard_customer/templates/navbar');
      $this->load->view('client/dashboard_customer/templates/sidebar');
      $this->load->view('client/dashboard_customer/home/index');
      $this->load->view('client/dashboard_customer/templates/footer'); 
    } else {
      redirect('home/login');
    }
  }

  public function editProfile(){
    if (customerLoggedIn()){
      $data = array(
        'nama' => $this->input->post('nama_customer'),
        'nohp'=> $this->input->post('nohp'),
        'alamat' => $this->input->post('alamat'),
        'kota' => $this->input->post('kota'),
        'kode_pos' => $this->input->post('kodepos')
      );

      $update = $this->cusdash->updateProfile($data);

      if($update){
        redirect('home/logout');
      }
    } else {
      redirect('home/login');
    }
  }

  public function history(){
    if(customerLoggedIn()){
      $data = array(
        'orderans' => $this->cusdash->getHistory(),
        'orderitems' => $this->cusdash->getItems()
      );

      $this->load->view('client/dashboard_customer/templates/header');
      $this->load->view('client/dashboard_customer/templates/css');
      $this->load->view('client/dashboard_customer/templates/navbar');
      $this->load->view('client/dashboard_customer/templates/sidebar');
      $this->load->view('client/dashboard_customer/home/history/viewdata',$data);
      $this->load->view('client/dashboard_customer/templates/footer');			
    } else {
      redirect('home/login');
    }
  }

  public function pembayaran(){
    if(customerLoggedIn()){
      $data = array(
        'judul' => 'konfirmasi pembayaran',
        'pembayaran' => $this->cusdash->getCustomerpembayaran($this->session->userdata('customer_id')),
        'kodeunik' => $this->cusdash->getkodeunik()
      );
      $this->load->view('client/dashboard_customer/templates/header');
      $this->load->view('client/dashboard_customer/templates/css');
      $this->load->view('client/dashboard_customer/templates/navbar');
      $this->load->view('client/dashboard_customer/templates/sidebar');
      $this->load->view('client/dashboard_customer/home/pembayaran/viewdata',$data);
      $this->load->view('client/dashboard_customer/templates/footer');			
    } else {
      redirect('home/login');
    }
  }

  public function tambahPembayaran(){
    if (customerLoggedIn()){
      $data['kode_unik'] = $this->input->post('kode_unik');
      if(!empty($data['kode_unik'])){
        $cek_kode = $this->cusdash->cek_kode($data['kode_unik']);
        if (count($cek_kode) == 1) {
          $path = realpath(APPPATH. '../assets/images/buktitf/');
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'png|jpeg|jpg';
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('gambar_trf')) {
            $error = $this->upload->display_errors();
            setFlashData('alert-danger', $error, 'Customer_dashboard/pembayaran');
          } else {	
            $fileName = $this->upload->data();
            $data['gambar_tf'] = $fileName['file_name'];
            $data['status'] = 'belum terkonfirmasi';
            $data['customer_id'] = $this->session->userdata('customer_id');
          }

          $kirimpembayaran = $this->cusdash->kirimpembayaran($data);

          if ($kirimpembayaran){
            setFlashData('success', 'insert Products berhasil, silahkan tunggu konfirmasi','Customer_dashboard/pembayaran');
          } else {
            setFlashData('error', 'insert gagal, coba lagi','Customer_dashboard/pembayaran');
          }

        } else {
          setFlashData('error', 'kode unik yang anda inputkan tidak valid', 'Customer_dashboard/pembayaran');
        }
      } else {
        setFlashData('error', 'kode_unik wajib diisi', 'Customer_dashboard/pembayaran');
      }				
    } else {
      redirect('home/login');
    }
  }

  public function hapusbuktipembayaran(){
    if (customerLoggedIn()){
      $idpembayaran = $this->input->post('pembayaranid');
      $slippembayaran = $this->input->post('slippembayaran');
      $path = realpath(APPPATH .'../assets/images/buktitf/');

      if (isset($_POST['slippembayaran'])){
        if (file_exists($path . '/' . $slippembayaran)) {
          $delete = $this->cusdash->deletepembayaran($idpembayaran);
          if ($delete){
            unlink($path.'/'.$slippembayaran);
            setFlashData('success','data pembayaran telah berhasil dihapus','customer_dashboard/pembayaran');
          } else {
            setFlashData('error','data pembayaran tidak dihapus','customer_dashboard/pembayaran');
          }
        } 
      }

    } else {
      redirect('home/login');
    }
  }
}
