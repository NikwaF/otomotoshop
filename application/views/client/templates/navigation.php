<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Kategori <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li class="dropdown side-dropdown">
						<?php foreach($kategori7 as $kategori): ?>
						<li><a href="<?= site_url('home/filterKategori/'.$kategori['kategori_id']);?>"><?= $kategori['nama_kategori']; ?></a></li>
						<?php endforeach; ?>
						<li><a href="<?= site_url('home/productview'); ?>">View All</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="<?= site_url('home'); ?>">Home</a></li>
						<li><a href="<?= site_url('produks');?>">Products</a></li>
						<li><a href="<?= site_url('caraorder') ?>">Panduan Cara Beli</a></li>
						<li><a href="<?= site_url('tentang')?>">Tentang Kami</a></li>
						<li><a href="<?= site_url('kontak') ?>">Kontak</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
