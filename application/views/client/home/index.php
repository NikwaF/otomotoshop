	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="<?= base_url('assets/e-shop/img/BARANG TERUJI.jpg');?>" alt="">
						
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="<?= base_url('assets/e-shop/img/KIRIM.jpg');?>" alt="">
						
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1" href="#">
						<img src="<?= base_url('assets/e-shop/img/Kepuasan.jpg');?>" alt="">
						
					</a>
				</div>
				<!-- /banner -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Products lists</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="<?= base_url('assets/e-shop/img/banner14.jpg');?>" alt="">
						<div class="banner-caption">
							<h2 class="white-color">Jadilah<br>PEMBERANI</h2>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							<?php foreach ($limit3 as $product): ?>
							<div class="product product-single">
								<div class="product-thumb">
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= base_url('assets/images/products/').$product['gambar'];?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?='Rp '.number_format($product['harga'],2,',','.');?></h3>
									<h2 class="product-name"><a href="<?= site_url('produk/'.$product['url']); ?>"><?= $product['nama_products']; ?></a></h2>
									<div class="product-btns">
										<button onclick="window.location.href='<?= site_url('produk/'.$product['url']);?>'" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
                                <!-- .row -->
                                <div class="row">
                                <!-- /.row -->
                                <?php $rowcount = 0; ?>
				<?php foreach ($limit as $product): ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="<?= base_url('assets/images/products/').$product['gambar'];?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?='Rp '.number_format($product['harga'],2,',','.');?></h3>
							<h2 class="product-name"><a href="<?= site_url('produk/'.$product['url']); ?>"><?= $product['nama_products']; ?></a></h2>
							<div class="product-btns">
								<button onclick="window.location.href='<?= site_url('produk/'.$product['url']);?>'" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
                                <?php $rowcount++ ;
                                if ($rowcount % 4 == 0) {
                                  echo '</div><div class="row">';
                                } ?>
				<?php endforeach; ?>
				<!-- /Product Single -->
                                </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
