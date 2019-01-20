<?php

class Orderan Extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Orderan_model');
  }

  public function viewdata(){
    if (adminLoggedIn()){
      $data = array(
        'orderans' => $this->Orderan_model->viewdataorderan(),
        'orderitems' => $this->Orderan_model->getOrderItems()
      );

      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/orderan/viewdata',$data);
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }

  }

  public function bayar(){
    if (adminLoggedIn()){
      $data = array(
        'judul' => 'konfirmasi pembayaran',
        'pembayaran' => $this->Orderan_model->getCustomerpembayaran()
      );

      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/orderan/viewdata2',$data);
      $this->load->view('admin/templates/footer');			
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function updatePembayaran(){
    if(adminLoggedIn()){
      $data = array(
        'status' => $this->input->post('ahahaha',true),
        'dikonfirmasi' => date('Y-m-d H:i:s')
      );
      $kode_unik = $this->input->post('kode_unik');

      $konfirmasi = $this->Orderan_model->konfirmasi($data);
      $ubahStatus = $this->Orderan_model->getOrderId($kode_unik);

      $data2 = array(
        'status_bayar' => 'sudah bayar'
      );

      $updateStatus = $this->Orderan_model->UpdateStatus($ubahStatus[0]['orders_id'],$data2);

      $dataOrder = $this->Orderan_model->getOrder($ubahStatus[0]['orders_id']);

      $data3 = array(
        'orders_id' => $ubahStatus[0]['orders_id'],
        'kode_unik' => $kode_unik,
        'customer_id' => $dataOrder[0]['customer_id'],
        'proses_antar' => 'belum diantar'
      );

      $data4 = array(
        'orders_id' => $ubahStatus[0]['orders_id'],
        'kode_unik' => $kode_unik,
        'customer_id' => $dataOrder[0]['customer_id'],
        'proses_jemput' => 'belum dijemput'
      );

      if ($dataOrder[0]['method_order'] == antar) {
        $diantar = $this->Orderan_model->insertAntar($data3);
      }
      else {
        $dijemput = $this->Orderan_model->insertJemput($data4);
      }

      if ($konfirmasi){
        setFlashData('success','Pembayaran telah dikonfirmasi','Orderan/bayar');
        
      } else {
        setFlashData('error','Pembayaran gagal di update','Orderan/bayar');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }


  public function hapuspembayaran(){
    if (adminLoggedIn()){
      $idpembayaran = $this->input->post('pembayaranid');
      $slippembayaran = $this->input->post('slippembayaran');
      $path = realpath(APPPATH .'../assets/images/buktitf/');

      if (isset($_POST['slippembayaran'])){
        if (file_exists($path . '/' . $slippembayaran)) {
          $delete = $this->Orderan_model->deletepembayaran($idpembayaran);
          if ($delete){
            unlink($path.'/'.$slippembayaran);
            setFlashData('success','data pembayaran telah berhasil dihapus','orderan/bayar');
          } else {
            setFlashData('error','data pembayaran tidak dihapus','orderan/bayar');
          }
        } 
      }

    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function antarProses(){
    if(adminLoggedIn()){
      $data = array(
        'judul' => 'Proses Antar',
        'antar' => $this->Orderan_model->getDataAntar()
      );

      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/orderan/antar',$data);
      $this->load->view('admin/templates/footer');			
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function jemputProses(){
    if(adminLoggedIn()){
      $data = array(
        'judul' => 'proses Jemput',
        'jemput' => $this->Orderan_model->getDataJemput()
      );

      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/orderan/jemput',$data);
      $this->load->view('admin/templates/footer');			
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function selesaikanantaran(){
    if(adminLoggedIn()){
      $orderid = $this->input->post('orderid');
      $kodeunik = $this->input->post('kodeunik');
      $custid = $this->input->post('customerid');
      $tanggal = date('Y-m-d H:i:s');
      $idantar = $this->input->post('idantar');

      $data = array(
        'proses_antar' => 'sudah diantar'
      );

      $ubahdata = $this->Orderan_model->updateAntar($idantar,$data);

      if ($ubahdata){
        $data2 = array(
          'orders_id' => $orderid,
          'kode_unik' => $kodeunik,
          'customer_id' => $custid,
          'method' => 'antar',
          'tanggal' => $tanggal
        );

        $insertdone = $this->Orderan_model->insertDone($data2);
        setFlashData('success','data '.$kodeunik.' telah diperbaharui','orderan/antarproses');
      } else {
        setFlashData('error','data '.$kodeunik.' tidak berhasil diperbaharui','orderan/antarproses');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function selesaikanjemputan(){
    if(adminLoggedIn()){
      $orderid = $this->input->post('orderid');
      $kodeunik = $this->input->post('kodeunik');
      $custid = $this->input->post('customerid');
      $tanggal = date('Y-m-d H:i:s');
      $idantar = $this->input->post('idantar');

      $data = array(
        'proses_jemput' => 'sudah dijemput'
      );

      $ubahdata = $this->Orderan_model->updateJemput($idantar,$data);

      if ($ubahdata){
        $data2 = array(
          'orders_id' => $orderid,
          'kode_unik' => $kodeunik,
          'customer_id' => $custid,
          'method' => 'jemput',
          'tanggal' => $tanggal
        );

        $insertdone = $this->Orderan_model->insertDone($data2);
        setFlashData('success','data '.$kodeunik.' telah diperbaharui','orderan/jemputproses');
      } else {
        setFlashData('error','data '.$kodeunik.' tidak berhasil diperbaharui','orderan/jemputproses');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }
}
