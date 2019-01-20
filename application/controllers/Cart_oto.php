<?php

class Cart_oto Extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('client_model/Cart_model');
    $this->load->library('cart');
  }    

  public function index(){
    if (customerLoggedIn()){
      $data = array (
        'judul' => 'Otomotoshop | Cart Belanja',
        'cart' => $this->cart->contents(),
        'total' => $this->cart->total()
      );
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css2');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation');
      $this->load->view('client/cart/cart',$data);
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery2'); 
    } else {

    }       
  }

  public function updateCart(){
    if (customerLoggedIn()){
      $i = 1;
      foreach ($this->cart->contents() as $item) {
        $this->cart->update(array('rowid' => $item['rowid'], 'qty' => $_POST['quantity'.$i]));
        $i++;
      }
      redirect('Cart_oto');
    }
  }

  public function removecart($rowid){
    if (customerLoggedIn()){
      $data = array(
        'rowid' => $rowid,
        'qty' => 0
      );

      $this->cart->update($data);
    }
    redirect('cart');
  }

  public function checkout(){
    if (customerLoggedIn()){
      $data = array (
        'judul' => 'Otomotoshop | Cart Jemput',
        'cart' => $this->cart->contents(),
        'total' => $this->cart->total(),
        'onkir' => 0,
        'breadcrumb' => 'checkout Jemput',
        'kodeunik' => $this->randomString()
      );
      if (count($data['cart']) > 0 ) {
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css2');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation');
      $this->load->view('client/cart/checkout_jemput',$data);
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery2');    		
      } else {
        echo 'Keranjang anda kosong, tidak bisa melakukan checkout, minimal ada 1 item' ;
        echo '<br>';
        echo '<a href="'.site_url('home').'"> kembali ke home</a>';
      }
    }
  }

  public function checkoutantar(){
    if (customerLoggedIn()){
      $data = array (
        'judul' => 'Otomotoshop | Checkout Antar',
        'cart' => $this->cart->contents(),
        'total' => $this->cart->total()+20000,
        'onkir' => 20000,
        'breadcrumb' => 'checkout Antar',
        'kodeunik' => $this->randomString()
      );
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css2');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation');
      $this->load->view('client/cart/checkout_antar',$data);
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery2');			
    }
  }

  public function randomString($length = 6) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
    }
    return $str;
  }

  public function checkout_recordjemput(){
    if (customerLoggedIn()){
      $orders = array (
        'method_order' => 'jemput',
        'customer_id' => $this->session->userdata('customer_id'),
        'total_belanja' => $this->cart->total(),
        'status_bayar' => 'belum bayar'
      );

      $insert_orders = $this->Cart_model->insertOrders($orders);

      $kode_unik = array(
        'kode_unik' => $this->randomString(),
        'orders_id' => $insert_orders
      );

      $insert_kodeunik = $this->Cart_model->insertKodeUnik($kode_unik);

      if ($cart_isi = $this->cart->contents()){
        foreach($cart_isi as $items){
          $order_details = array(
            'orders_id' => $insert_orders,
            'nama_products' => $items['name'],
            'harga_products' => $items['price'],
            'quantity' => $items['qty'],
            'subtotal' => $items['subtotal'],
            'products_id' => $items['id']
          );
          $detailsorder = $this->Cart_model->insertOrdersDetails($order_details);
        }
      }

      $this->cart->destroy();
      redirect('cart_oto/orderComplete/'.$insert_orders);
    }
  }

  public function checkout_recordantar(){
    if (customerLoggedIn()){
      $orders = array (
        'method_order' => 'antar',
        'customer_id' => $this->session->userdata('customer_id'),
        'total_belanja' => $this->cart->total()+20000,
        'status_bayar' => 'belum bayar'
      );

      $insert_orders = $this->Cart_model->insertOrders($orders);

      $kode_unik = array(
        'kode_unik' => $this->randomString(),
        'orders_id' => $insert_orders
      );

      $insert_kodeunik = $this->Cart_model->insertKodeUnik($kode_unik);

      if ($cart_isi = $this->cart->contents()){
        foreach($cart_isi as $items){
          $order_details = array(
            'nama_products' => $items['name'],
            'harga_products' => $items['price'],
            'quantity' => $items['qty'],
            'subtotal' => $items['subtotal'],
            'orders_id' => $insert_orders,
            'products_id' => $items['id']
          );
          $detailsorder = $this->Cart_model->insertOrdersDetails($order_details);
        }
      }  
      $this->cart->destroy();

      redirect('cart_oto/orderComplete/'.$insert_orders);
    }		
  }

  public function orderComplete($ordersid){
    if (customerLoggedIn()){
      $data = array(
        'judul' => 'Otomotoshop | Order Sukses!',
        'kode_unik' => $this->Cart_model->getKodeUnik($ordersid)
      );
      $this->load->view('client/templates/header',$data);
      $this->load->view('client/templates/css2');
      $this->load->view('client/templates/topnav');
      $this->load->view('client/templates/navigation');
      $this->load->view('client/cart/order_complete',$data);
      $this->load->view('client/templates/footer');
      $this->load->view('client/templates/jquery2');			
    }
  }
}
