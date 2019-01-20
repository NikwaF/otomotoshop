  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/admin'); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('customer_name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        </li>
        <li class="treeview menu-open pull-right-container">
		  <li style="color:white;"><a style="color:white;" href="<?= site_url('Customer_dashboard') ;?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
		  <li style="color:white;"><a style="color:white;" href="<?= site_url('Customer_dashboard/history') ;?>"><i class="fa fa-book" aria-hidden="true"></i> Riwayat Transaksi</a></li>
		  <li style="color:white;"><a style="color:white;" href="<?= site_url('Customer_dashboard/pembayaran') ;?>"><i class="fa fa-book" aria-hidden="true"></i> Konfirmasi Pembayaran</a></li>
        </li>
		<li class="header">CONTINUE SHOPPING</li>
			<li><a href="<?= site_url('home'); ?>"><i class="fa fa-circle-o text-red"></i> <span>Kembali Ke Toko</span></a></li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
