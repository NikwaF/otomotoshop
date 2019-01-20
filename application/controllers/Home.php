<?php

class Home Extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('client_model/Home_model');
    $this->load->library('cart');
  }

  public function index(){
    $data = array (
      'judul' => 'Otomotoshop | Toko Otomotif Jalan Karimata',
      'kategori' => $this->Home_model->getKategori(),
      'limit3' => $this->Home_model->product_limit3(),
      'limit' => $this->Home_model->product_limit8(),
      'kategori7' => $this->Home_model->getKategori7()
    );

    // var_dump($data['limit']);

    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/index');
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');
  }

  public function login() {
    $this->load->view('client/templates/login');
  }

  public function register(){
    $this->load->view('client/register/index');
  }

  public function insertregister(){
    $data = array(
      'nama' => $this->input->post('nama'),
      'email' =>  $this->input->post('email'),
      'password' =>  md5($this->input->post('password')),
      'nohp' =>  $this->input->post('nohp'),
      'tgl_lahir' =>  $this->input->post('tgl_lahir'), 
      'alamat' =>  $this->input->post('alamat'),
      'kota' =>  $this->input->post('kota'),
      'kode_pos' =>  $this->input->post('kodepos'),
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    );

    if (empty($this->input->post('nama'))) {
      setFlashData('error', 'nama harus diisi','home/register');
    } else {
      $insertkan = $this->Home_model->regist($data);
      if ($insertkan){
        setFlashData('success', 'Anda sudah berhasil teregistrasi, silahkan login','home/login');
      } else {
        setFlashData('error', 'tidak berhasil registrasi','home/register');
      }			
    }
  }

  public function checkLogin() {
    $data['email'] = $this->input->post('email',true);
    $data['password'] = md5($this->input->post('password',true));

    if (!empty($data['email'] || !empty($data['password']))) {
      $client_login = $this->Home_model->check_client_login($data);

      if(count($client_login) == 1) {
        $session_login = array (
          'customer_id' => $client_login[0]['customer_id'],
          'customer_name' => $client_login[0]['nama'],
          'customer_email' => $client_login[0]['email'],
          'customer_nohp' => $client_login[0]['nohp'],
          'customer_alamat' => $client_login[0]['alamat'],
          'customer_kota' => $client_login[0]['kota'],
          'customer_kodepos' => $client_login[0]['kode_pos']
        );
        $this->session->set_userdata($session_login);
        if ($this->session->userdata('customer_id')) {
          redirect(home);
        } else {
          echo 'session tidak terbuat';
        }
      } else {
        setFlashData('alert-warning', 'email dan password salah, masukan email dan password yang valid','logincustomer');
      }
    } else {
      setFlashData('alert-warning','isi field yang tersedia untuk login','logincustomer');
    }
  }

  public function logout(){
    if (customerLoggedIn()) {
      $this->session->set_userdata('customer_id','');
      $this->cart->destroy();
      redirect('home');
    }
  }

  public function productview(){
    $this->load->library('pagination');
    $config['base_url'] = site_url('produks');
    $config['total_rows'] = $this->Home_model->getProductAll();
    $config['per_page'] = 9;
    $config['uri_segment'] = 2;

    //pagination style hehe
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li  class="active"><a style="color:red; "href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);
    $page = ($this->uri->segment(2))? $this->uri->segment(2):0;
    $data = array (
      'judul' => 'products views Otomotoshop',
      'products_semua' => $this->Home_model->productsview($config['per_page'], $page),
      'kategori' => $this->Home_model->getKategori(),
      'links' => $this->pagination->create_links(),
      'kategori7' => $this->Home_model->getKategori7()
    );


    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/productsview',$data);
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');
  }

  public function productpage(){
    $url = $this->uri->segment(2);
    $data = array (
      'judul' => $url,
      'products' => $this->Home_model->getproduct($url),
      'kategori7' => $this->Home_model->getKategori7()
    );

    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/productpage',$data);
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');		
  }

  public function search() {
    $yangdicari = $this->input->post('searchval');
    $resultsearch = $this->Home_model->getSearch($yangdicari);
    $viewsearch = '';

    foreach ($resultsearch as $val) {
      $viewsearch= $viewsearch. '<li class="list-group-item" style="cursor:pointer;" onclick="sihiy(\''.$val['nama_products'].'\');">'. $val['nama_products'].'</li>';
    }
    echo $viewsearch;
  }


  public function searchproducts() {
    $inputan = $this->input->post('inputsearch');
    $this->load->library('pagination');
    $config['base_url'] = site_url('cariproduk');
    $config['total_rows'] = $this->Home_model->getsearchlikecount($inputan);
    $config['per_page'] = 9;
    $config['uri_segment'] = 2;

    //pagination style hehe
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li  class="active"><a style="color:red; "href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);
    $page = ($this->uri->segment(2))? $this->uri->segment(2):0;
    $data = array (
      'judul' => 'Pencarian '.$inputan,
      'products_semua' => $this->Home_model->searchproducts($config['per_page'], $page, $inputan),
      'kategori' => $this->Home_model->getKategori(),
      'links' => $this->pagination->create_links(),
      'kategori7' => $this->Home_model->getKategori7()
    );


    if ($data['products_semua']){
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation',$data);
      $this->load->view('client/home/productsview',$data);
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery');
    } else {
      redirect('produktidakditemukan');
    }
  }

  public function searchnotfound(){
      $data = array(
        'judul' => 'product yang anda cari tidak ditemukan',
        'kategori' => $this->Home_model->getKategori(),
        'kategori7' => $this->Home_model->getKategori7()
      );

      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation',$data);
      $this->load->view('client/home/productgakketemu',$data);
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery');
  }

  public function filterKategori(){
    $this->load->library('pagination');
    $config['base_url'] = site_url('home/filterKategori/'.$this->uri->segment(3));
    $coba = $this->uri->segment(3);
    $config['total_rows'] = $this->Home_model->getProductInKategori($coba);
    $config['per_page'] = 9;
    $config['uri_segment'] = 4;

    //pagination style hehe
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li  class="active"><a style="color:red; "href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4))? $this->uri->segment(4):0;
    $data = array (
      'judul' => 'products views Otomotoshop',
      'products_semua' => $this->Home_model->productsviewInId($config['per_page'], $page ,$this->uri->segment(3)),
      'kategori' => $this->Home_model->getKategori(),
      'links' => $this->pagination->create_links(),
      'kategori7' => $this->Home_model->getKategori7()
    );

    if ($data['products_semua'] == FALSE)  {
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation',$data);
      $this->load->view('client/home/productgakketemu');
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery');
    } else {
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation',$data);
      $this->load->view('client/home/productsview');
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery');
    }
  }

  public function add_cart(){
    if (customerLoggedIn()){
      $data = array(
        'id'      => $this->input->post('id_products'),
        'qty'     => $this->input->post('quantity'),
        'price'   => $this->input->post('harga_products'),
        'name'    => $this->input->post('nama_products'),
        'gambar'  => $this->input->post('gambar')
      );

      if ($data['qty'] > 0) {
        $add = $this->cart->insert($data);
        if ($add) {
          $total = $this->cart->total_items();
          echo $total;
          echo "<script>swal({
          position: 'top-end',
            type: 'success',
            title: 'item anda sudah ditambah ke cart',
            showconfirmbutton: false,
            timer: 1500
        });</script>";
        } else {
          echo "<script>Swal({
          position: 'top-end',
            type: 'error',
            title: 'Item tidak berhasil ditambahkan ke cart',
            showConfirmButton: false,
            timer: 1500
        });</script>";
        }
      }  else {
        echo 
          "<script>Swal({
          position: 'top-end',
            type: 'error',
            title: 'quantity yang anda masukkan harus minimal 1',
            showConfirmButton: false,
            timer: 1500
      });</script>";
      }
    }else {
      echo "<script> Swal({
      type: 'error',
        title: 'Anda belum login',
        text: 'Anda Harus Login dulu!',
        footer: '<a style=color:blue; href=".site_url('logincustomer').">Login Disini!</a> <a style=color:red;padding-left:20px; href=".site_url('register').">Belum Punya Akun? Buat Akun Disini</a>'
    }); </script>";
    }				
  }

  public function show_cart(){
    $cart_items = $this->cart->contents();
    print_r($cart_items);
    echo'<hr>';
    $this->load->view('client/home/coba');
  }

  public function delete_cart($rowid) {
    $data = array (
      'rowid' => $rowid,
      'qty' => 0
    );
    $this->cart->update($data);
    $this->load->view('client/home/coba');
  }

  public function caraorder(){
    $data = array(
      'kategori7' => $this->Home_model->getKategori7(),
      'judul' => 'Otomotoshop | Toko Otomotif Jalan Karimata',
      'nama' => 'CaraOrderWebOtomotoshop.pdf'
    );
    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/caraorder');
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');		
  }

  public function tentang(){
    $data = array (
      'judul' => '',
      'kategori7' => $this->Home_model->getKategori7()
    );

    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/tentang');
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');		
  }

  public function kontak(){
    $data = array (
      'judul' => '',
      'kategori7' => $this->Home_model->getKategori7()
    );
    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/contact');
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');		
  }

  public function informasi(){
    $data = array (
      'judul' => '',
      'kategori7' => $this->Home_model->getKategori7()
    );
    $this->load->view('client/templates/header',$data);
    $this->load->view('client/templates/css');
    $this->load->view('client/templates/topnav');
    $this->load->view('client/templates/navigation',$data);
    $this->load->view('client/home/informasi');
    $this->load->view('client/templates/footer');
    $this->load->view('client/templates/jquery');				
  } 
}
