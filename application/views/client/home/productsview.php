	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?= site_url('home'); ?>">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter Kategori</h3>
						<ul class="list-links">
							<?php foreach ($kategori as $k): ?>
							<li><a href="<?= site_url('home/filterKategori/'.$k['kategori_id']);?>"><?= $k['nama_kategori'];?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">

						<div class="pull-right">
							<div class="page-filter">
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<?php echo $links; ?>
							</ul>
							</div>

						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
                                                        <?php $rowcount=0; ?>
							<?php foreach ($products_semua as $products): ?>
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img src="<?= base_url('assets/images/products/').$products->gambar;?>" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price"><?='Rp '.number_format($products->harga,2,',','.');?> </h3>
										<h2 class="product-name"><a href="<?= site_url('produk/'.$products->url); ?>"><?= $products->nama_products; ?></a></h2>
										<div class="product-btns">
											<button onclick="window.location.href='<?= site_url('produk/'.$products->url);?>'" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
                                <?php $rowcount++ ;
                                if ($rowcount % 3 == 0) {
                                  echo '</div><div class="row">';
                                } ?>
							<?php endforeach;?>
							<!-- /Product Single -->
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						
						<div class="pull-right">
							
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<?php echo $links; ?>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
