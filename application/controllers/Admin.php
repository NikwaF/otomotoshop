<?php

class Admin Extends CI_Controller {
  public function index() {
    if ($this->session->userdata('adm_id')) {
      $data = array(
        'transaksi' => $this->Admin_model->berapatransaksi(),
        'customer' => $this->Admin_model->berapacustomer(),
        'products' => $this->Admin_model->berapaproduct(),
        'kategori' => $this->Admin_model->berapakategori(),
        'sudahbayar' => $this->Admin_model->sudahbayar(),
        'belumbayar' => $this->Admin_model->belumbayar(),
        'belumantar' => $this->Admin_model->belumantar(),
        'belumjemput' => $this->Admin_model->belumjemput(),
        'menunggukonfirmasi' => $this->Admin_model->tunggukonfirmasi()
      );
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/index',$data);
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-warning', 'anda belum login, silahkan login','admin/login');
    }
  }

  public function login(){
    $this->load->view('admin/login');
  }

  public function check_admin(){
    $data['adm_email'] = $this->input->post('email',true);
    $data['adm_password'] = $this->input->post('password',true);

    if(!empty($data['adm_email']) && !empty($data['adm_password'])){
      $admindata = $this->Admin_model->check_admin($data);
      if (count($admindata) ==  1) {
        $session_login = array (
          'adm_id' => $admindata[0]['adm_id'],
          'adm_nama' => $admindata[0]['adm_nama'],
          'adm_email' => $admindata[0]['adm_email']
        );

        $this->session->set_userdata($session_login);
        if ($this->session->userdata('adm_id')) {
          redirect('admin');
        } else {
          echo 'session tidak terbuat';
        }
      }else {
        setFlashData('alert-warning','Email atau Password salah','admin/login');
      }
    }else {
      setFlashData('alert-warning','isi email dan password','admin/login');
    }
  }

  public function logout() {
    if ($this->session->userdata('adm_id')) {
      $this->session->set_userdata('adm_id','');
      setFlashData('alert-warning','logout sukses','admin/login');
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function newCategory() {
    if (adminLoggedIn()) {
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/newCategory');
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-warning', 'anda belum login, silahkan login','admin/login');
    }
  }

  public function infotoko(){
    if (adminLoggedIn()){
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/infotoko');
      $this->load->view('admin/templates/footer');      
    } else {
      setFlashData('alert-warning', 'anda belum login, silahkan login','admin/login');
    }
  }

  public function addCategory() {
    if (adminLoggedIn) {
      $data['catName'] = $this->input->post('CategoryName' , true);

      if(!empty($data['catName'])){
        $path = realpath(APPPATH.'../assets/images/categories/');
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'png|jpeg|jpg';

        $this->load->library('upload',$config);
        if (!$this->upload->do_upload('CatImages')){
          $errors = $this->upload->display_errors();
          setFlashData('alert-warning',$errors,'admin/NewCategory');
        } else {
          $fileName = $this->upload->data();
          $data['catDp'] = $fileName['file_name'];
          $date = date('Y-m-d H:i:s');
          $data['catDate'] = $date;
          $data['adminId'] = getAdminId();
        }

        $checkCategory = $this->Admin_model->checkCategory($data);
        if (!$checkCategory->num_rows() > 0) {
          $addCategory = $this->Admin_model->addCategory($data);
          if ($addCategory) {
            setFlashData('alert-success','Category berhasil ditambahkan','admin/newCategory');
          } else {
            setFlashData('alert-warning','Penambahan Category gagal','admin/newCategory');
          }
        } else {
          setFlashData('alert-warning','Category yang akan ditambahkan sudah ada','admin/newCategory');
        }



      } else {
        setFlashData('alert-warning','file foto dibutuhkan, upload foto category','admin/newCategory');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function allCategories() {
    if (adminLoggedIn()) {
      $this->load->library('pagination');
      $config['base_url'] =  site_url('admin/allCategories');
      $config['total_rows'] =  $this->Admin_model->getAllCategories();
      echo $this->Admin_model->getAllCategories();
      $config['per_page'] = 3;
      $config['uri_segment'] = 3;

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
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(3))? $this->uri->segment(3):0;

      $data['allCategories'] = $this->Admin_model->fetchAllCategories($config['per_page'],$page);
      $data['links'] = $this->pagination->create_links();

      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/allCategories',$data);
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-danger','anda belum login, silahkan login','admin/login');
    }
  }

  public function editCategory($catId) {
    if (adminLoggedIn()){
      if (!empty($catId) && isset($catId)){
        $data['category'] = $this->Admin_model->checkCategoryById($catId);
        if (count($data['category']) == 1) {
          $this->load->view('admin/templates/header');
          $this->load->view('admin/templates/css');
          $this->load->view('admin/templates/navbar');
          $this->load->view('admin/templates/sidebar');
          $this->load->view('admin/home/editCategory',$data);
          $this->load->view('admin/templates/footer');
        } else {
          setFlashData('alert-danger','category tidak ditemukan','admin/allCategories');
        }
      } else {
        setFlashData('alert-danger','ada kesalahan','admin/allCategories');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function updateCategory() {
    if (adminLoggedIn()) {
      $data['catName'] = $this->input->post('CategoryName',true);
      $catId = $this->input->post('xid');
      $oldImg = $this->input->post('oldImg');
      if (!empty($data['catName']) && isset($data['catName'])) {
        if (isset($_FILES['CatImages']) && is_uploaded_file($_FILES['CatImages']['tmp_name'])){
          $path = realpath(APPPATH. '../assets/images/categories/');
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'jpeg|jpg|png';
          $this->load->library('upload',$config);

          if (!$this->upload->do_upload('CatImages')) {
            $error = $this->upload->display_errors();
            setFlashData('alert-danger',$error, 'admin/allCategories');
          } else {
            $fileName = $this->upload->data();
            $data['catDp'] = $fileName['file_name'];
          }
        }

        $update = $this->Admin_model->updateCategory($data,$catId);
        if ($update){
          if (!empty($data['catDp']) && isset($data['catDp'])) {
            if (file_exists($path.'/'.$oldImg)) {
              unlink($path.'/'.$oldImg);
            }
          }
          setFlashData('alert-success','category berhasil diupdate','admin/allCategories');
        } else {
          setFlashData('alert-danger','category gagal diupdate','admin/allCategories');
        }
      } else {
        setFlashData('alert-danger', 'nama Category dibutuhkan, silahkan isi','admin/allCategories');
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function viewAllkategori(){
    if (adminLoggedIn()){
      $data['kategori'] = $this->Admin_model->kategori_list();
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/viewAllkategori',$data);
      $this->load->view('admin/templates/footer');
    } 
    else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }


  public function addKategori() {
    if (adminLoggedIn()) {
      $this->load->view('admin/templates/header');
      $this->load->view('admin/templates/css');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/home/addKategori');
      $this->load->view('admin/templates/footer');
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function addnewKategori() {
    if (adminLoggedIn()) {
      $data['nama_kategori'] = $this->input->post('namakategori' , true);
      $date = date('Y-m-d H:i:s');
      $data['updated_at'] = $date;
      $cek_kategori = $this->Admin_model->cekKategori($data);
      if ($data['nama_kategori'] == '') {
        setFlashData('alert-warning','Harus mengisikan nama Kategori','admin/addKategori');
      } else {
        if (!$cek_kategori->num_rows() > 0) {
          $addCategory = $this->Admin_model->tmbKategori($data);
          if ($addCategory) {
            setFlashData('alert-success','Category berhasil ditambahkan','admin/addKategori');
          } else {
            setFlashData('alert-warning','Penambahan Category gagal','admin/addKategori');
          }
        } else {
          setFlashData('alert-warning','Category yang akan ditambahkan sudah ada','admin/addKategori');
        }
      }
    } else {
      setFlashData('alert-warning','anda belum login, silahkan login','admin/login');
    }
  }

  public function EditKategori($kategori_id) {
    if (adminLoggedIn()) {
      if (!empty($kategori_id) && isset($kategori_id)){
        $data['kategori'] = $this->Admin_model->cekKategoriId($kategori_id);
        if (count($data['kategori']) == 1) {
          $this->load->view('admin/templates/header');
          $this->load->view('admin/templates/css');
          $this->load->view('admin/templates/navbar');
          $this->load->view('admin/templates/sidebar');
          $this->load->view('admin/home/editKategori',$data);
          $this->load->view('admin/templates/footer');
        } else {
          setFlashData('alert-warning','kategori tidak ada','admin/viewAllkategori');
        }
      }
    } else {
      setFlashData('alert-warning', 'anda belum login, silahkan login','admin/login');
    }
  }

  public function updateKategori(){
    if (adminLoggedIn()){
      $xid = $this->input->post('xid');
      $data['nama_kategori'] = $this->input->post('namakategori');
      if ($data['nama_kategori'] == '') {
        setFlashData('alert-warning','Harus mengisikan nama Kategori','admin/viewAllkategori');
      } else {
        $update = $this->Admin_model->updateKategori_model($data,$xid);
        if ($update) {
          setFlashData('alert-success', 'kategori berhasil diupdate','admin/viewAllkategori');
        } else {
          setFlashData('alert-warning', 'kategori tidak berhasil diupdate','admin/viewAllkategori');
        }
      }
    } else {
      setFlashData('alert-warning', 'anda belum login, silahkan login','admin/login');
    }
  }

  public function DelKategori($kat_id){
    if (adminLoggedIn()){
      if (!empty($kat_id) && isset($kat_id)){
        $apaada = $this->Admin_model->cekKategoriId($kat_id);
        if (count($apaada) == 1) {
          $hapus = $this->Admin_model->delKategori($kat_id);
          if ($hapus) {
            setFlashData('alert-success', 'kategori berhasil dihapus','admin/viewAllkategori');
          }
        }
      } else {
        setFlashData('alert-warning','kategori tidak ada','admin/viewAllkategori');
      }
    } else {
      setFlashData('alert-warning', 'anda belum login, silahkan login','admin/login');
    }
  }

  }
