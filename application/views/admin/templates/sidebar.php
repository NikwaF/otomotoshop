<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('assets/admin'); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('adm_nama'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree"> 	
      <li class="treeview menu-open pull-right-container">
        <li style="color:white;"><a style="color:white;" href="<?= site_url('admin') ;?>"><i class="fa fa-tachometer" aria-hidden="true"></i></i> Dashboard</a></li>
        <li style="color:white;"><a style="color:white;" href="<?= site_url('admin/viewAllkategori') ;?>"><i class="fa fa-th-large" aria-hidden="true"></i> Kategori</a></li>
        <li style="color:white;"><a style="color:white;" href="<?= site_url('customer/viewdataCustomer') ;?>"><i class="fa fa-users" aria-hidden="true"></i> Customer</a></li>
        <li style="color:white;"><a style="color:white;" href="<?= site_url('products/viewdata') ;?>"><i style="color:white;" class="fa fa-product-hunt" aria-hidden="true"></i> Products</a></li>
        <li style="color:white;"><a style="color:white;" href="<?= site_url('orderan/viewdata') ;?>"><i style="color:white;" class="fa fa-exchange" aria-hidden="true"></i> Transaksi</a></li>
      </li>
      <li class="treeview menu-open">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Proses Order</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="<?= site_url('orderan/antarproses') ?>"><i class="fa fa-circle-o"></i> Antar</a></li>
          <li class=""><a href="<?= site_url('orderan/jemputproses') ?>"><i class="fa fa-circle-o"></i> Jemput</a></li>
          <li class=""><a href="<?= site_url('orderan/bayar') ?>"><i class="fa fa-circle-o"></i> Bayar</a></li>
        </ul>
      </li>

      <li class="header">Panduan Admin</li>
      <li><a href="<?= base_url('assets/pdf/CaraAdmin.pdf'); ?>"><i class="fa fa-circle-o text-red"></i> <span>PDF Admin</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
