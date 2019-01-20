<?php

class Products extends CI_Controller{
  public function viewdata(){
    if (adminLoggedIn()){
      $data = array(
        'kategori' => $this->Products_model->getKategori(),
        'products' => $this->Products_model->viewdataproducts()
        // 'tipe' => $this->Products_model->getTipe()
      );
      // $this->Products_model->viewdataproducts();
      // $data['kategori'] = $this->Products_model->getKategori();
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/products/viewdata',$data);
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }


  public function tambahProducts(){
    if (adminLoggedIn()){
      $path = realpath(APPPATH. '../assets/images/products/');
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'png|jpeg|jpg';
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar_brg')) {
        $error = $this->upload->display_errors();
        setFlashData('alert-danger', $error, 'products/viewdata');
      } else {
        $fileName = $this->upload->data();
        $products['gambar'] = $fileName['file_name'];
        $products['nama_products'] = $this->input->post('nama_barang',true);
        $products['harga'] = $this->input->post('hrg_brg',true);
        $products['updated_at'] = date('Y-m-d H:i:s');
        $products_detail['updated_at'] = date('Y-m-d H:i:s');
        $products_detail['tipe_products'] = $this->input->post('tipe_brg');
        $products_detail['kategori_id'] = $this->input->post('kategori',true);
        $products_detail['deskripsi_products'] = $this->input->post('deskripsi_barang',true);
        $products_detail['url'] = url_title($products['nama_products'],'-');
      }
      $addProducts = $this->Products_model->insertProducts($products,$products_detail);

      if ($addProducts) {
        setFlashData('success', 'insert Products berhasil','products/viewdata');
      } else {
        setFlashData('error', 'insert Products gagal','products/viewdata');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login', 'admin/login');
    } 
  }

  public function editProducts(){
    if(adminLoggedIn()){
      //gambar,products id ,products details id 
      $oldGambar = $this->input->post('oldGambar');
      $productsId = $this->input->post('idproducts');
      $proudctsDetailsId = $this->input->post('idproductsdetails');
      //yang mau di update di table products 
      $products['nama_products'] = $this->input->post('nama_barang',true);
      $products['harga'] = $this->input->post('hrg_brg',true);
      $products['updated_at'] = date('Y-m-d H:i:s');

      //yang mau di update di table products details
      $products_detail['kategori_id'] = $this->input->post('kategori',true);
      $products_detail['url'] = url_title($products['nama_products'],'-');
      $products_detail['deskripsi_products'] = $this->input->post('deskripsi_barang',true);
      $products_detail['updated_at'] = date('Y-m-d H:i:s');
      $products_detail['tipe_products'] = $this->input->post('tipe_brg');

      if (isset($_FILES['gambar_brg']) && is_uploaded_file($_FILES['gambar_brg']['tmp_name'])){
        $path = realpath(APPPATH. '../assets/images/products/');
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'png|jpeg|jpg';
        $this->load->library('upload', $config);          

        if (!$this->upload->do_upload('gambar_brg')) {
          $error = $this->upload->display_errors();
          setFlashData('alert-danger',$error, 'products/viewdata');                    
        } else {
          $fileName = $this->upload->data();
          $products['gambar'] = $fileName['file_name'];
        }
      }

      $update = $this->Products_model->updateProducts($productsId,$proudctsDetailsId,$products,$products_detail);

      if ($update) {
        if ( !empty($products['gambar']) && isset($products['gambar'])) {
          if (file_exists($path .'/'. $oldGambar)){
            unlink($path .'/'. $oldGambar);
          }
        }
        setFlashData('success','data berhasil diupdate','products/viewdata');
      } else {
        setFlashData('warning', 'data gagal diupdate', 'products/viewdata');
      }


    } else {
      setFlashData('alert-warning','anda belum login, silahkan login', 'admin/login');
    }
  }

  public function hapusProducts(){
    $productsId = $this->input->post('idproducts');
    $proudctsDetailsId = $this->input->post('idproductsdetails');
    $oldGambar = $this->input->post('oldGambar');
    $path = realpath(APPPATH . '../assets/images/products/');

    if (isset($_POST['oldGambar'])) {
      if (file_exists($path.'/'.$oldGambar)) {
        $delete = $this->Products_model->deleteProducts($productsId, $proudctsDetailsId);
        if ($delete) {
          unlink($path.'/'.$oldGambar);
          setFlashData('success','data products berhasil diHapus', 'products/viewdata');
        } else {
          setFlashData('error','data products tidak berhasil diHapus','products/viewdata');
        }
      }
    }
  }
}
