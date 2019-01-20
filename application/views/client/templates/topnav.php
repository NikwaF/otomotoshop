<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Selamat datang di Otomotshop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="<?= site_url('caraorder'); ?>">Cara Order</a></li>
						<li><a href="<?= base_url('assets/pdf/Norek.pdf'); ?>">Rekening Otomotoshop</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="<?= base_url(); ?>">
							<img src="<?= base_url('assets/e-shop/img/logo.png');?>" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form autocomplete="off" action="<?= site_url('cariproduk'); ?>" method="post">
							<input class="input search-input" name="inputsearch" id="search" type="text" placeholder="Enter your keyword">
							<ul class="list-group" id="listsearch" style="position:absolute; z-index:999;">
							
							</ul>
							<select id="selectkategori" class="input search-categories">
								<option value="0">All Categories</option>
								<?php foreach ($kategori as $kat): ?>
								<option value="<?= $kat['kategori_id']; ?>"><?= $kat['nama_kategori']; ?></option>
								<?php endforeach;?>
							</select>
							<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="<?php if ($this->session->userdata('customer_id')){ echo 'dropdown'; }?>" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<?php if ($this->session->userdata('customer_id')) { 
									echo '<strong  class="text-uppercase">'. $this->session->userdata("customer_name"). ' <i  class="fa fa-caret-down"></i></strong>';
								} else {
									echo '<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>';
								} ?>
							</div>
							<?php if ($this->session->userdata('customer_id')) { ?>
							<a style="display:none; href="<?= site_url('logincustomer'); ?>" class="text-uppercase">Login</a>  <a style="display:none; href="#" class="text-uppercase">Join</a>
							<?php }else { ?>
							<a " href="<?= site_url('logincustomer'); ?>" class="text-uppercase">Login</a> / <a href="<?= site_url('register');?>" class="text-uppercase">Join</a>
							<?php } ?> 
							<ul class="custom-menu">
								<li><a href="<?= site_url('customer_dashboard');?>"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="<?=  site_url('checkoutjemput')?>"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a onclick="logout();" ><i class="fa fa-check"></i> Logout</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<?php $this->load->library('cart'); ?>
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="<?php if ($this->session->userdata('customer_id')){ echo 'dropdown'; }?>" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty" id="jmlcart"><?= $this->cart->total_items(); ?></span>
									<!-- <span class="qty">3</span> -->
								</div>
								<strong class="text-uppercase">keranjang :</strong>
								<br>
								<span><?= 'Rp'.number_format($this->cart->total(),0,',','.'); ?><span>
								<!-- <span>35.20$</span> -->
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
									<?php foreach ($this->cart->contents() as $items): ?>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="<?= base_url('assets/images/products/'.$items['gambar']);?>" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price"><?='Rp '.number_format($items['subtotal'],2,',','.');?> <span class="qty">x<?= $items['qty'];?></span></h3>
												<h2 class="product-name"><a href="#"><?= $items['name']; ?></a></h2>
											</div>
											<button onclick="window.location.href='<?= site_url('cart_oto/removecart/'.$items['rowid']);?>'" class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
									<?php endforeach; ?>
									<div class="shopping-cart-btns">
										<button class="main-btn"><a href="<?= site_url('cart'); ?>">View Cart</a></button>
										<button class="primary-btn"><a href="<?= site_url('checkoutjemput'); ?>">Checkout </a><i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
