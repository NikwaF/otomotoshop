		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="home">Home</a></span> / <span><?= $breadcrumb; ?></span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<form method="post" class="colorlib-form">
							<h2>Order Details</h2>
		              	<div class="row">
			               <div class="col-md-12">
			                  <div class="form-group">
			                  	<label>Data diri pengiriman<label>
			                  </div>
			               </div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="lname">Nama Customer</label>
										<input type="text" id="lname" class="form-control" value="<?= $this->session->userdata('customer_name') ?>" placeholder="Your lastname" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="companyname">Email</label>
			                    	<input type="text" id="companyname" value="<?= $this->session->userdata('customer_email'); ?>" disabled class="form-control" placeholder="Company Name">
									</div>
								</div>
									
									<div class="col-md-6">
									<div class="form-group">
										<label for="companyname">Nomer HP</label>
			                    	<input type="text" id="companyname" class="form-control" placeholder="Nomer HP" value="<?= $this->session->userdata('customer_nohp');?>" disabled>	
									</div>									
									</div>
							
						   
								<div class="col-md-6">
									<div class="form-group">
										<label for="stateprovince">Kota</label>
										<input type="text" id="fname" class="form-control" placeholder="Kota" value="<?= $this->session->userdata('customer_kota'); ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lname">Kode Pos</label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="Kode Pos"value="<?= $this->session->userdata('customer_kodepos') ?>">
									</div>
								</div>

			               <div class="col-md-12">
									<div class="form-group">
										<label for="fname">Alamat</label>
			                    	<textarea type="text" id="address" cols="5" rows="5" class="form-control" placeholder="Alamat" value="<?= $this->session->userdata('customer_alamat'); ?>" disabled><?= $this->session->userdata('customer_alamat'); ?></textarea>
			                  </div>
			               </div>
			       

		               </div>
		            </form>
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>Cart Total</h2>
									
									<ul>
									
										<li>
											<span>Subtotal</span> <span id="subtotal"><?= 'Rp '.number_format($total,2,',','.'); ?></span>
											<ul>
											<?php foreach ($cart as $items): ?>
												<li><span><?= $items['qty'];?> x <?= $items['name'];?></span> <span><?= 'Rp '.number_format($items['subtotal'],2,',','.'); ?></span></li>
											<?php endforeach; ?>
											</ul>
										</li>
										<?php $ongkir=$total; ?>
										<li><span>Ongkos Kirim</span> <span id="ongkir"><?=  'Rp '.number_format($onkir,2,',','.');?></span></li>
										<li><span>Order Total</span> <span id="totalharga"><?=  'Rp '.number_format($total,2,',','.');?></span></li>
									</ul>
									
								</div>
						   </div>

						   <div class="w-100"></div>

						   <div class="col-md-12">
								<div class="cart-detail">
									<h2>Metode Order</h2>
									<div class="form-group">
										<a style="font-size:18px;" class="btn btn-primary" href="<?= site_url('checkoutantar') ?>"> Antar</a>
									</div>
									<div class="form-group">
										<a style="font-size:18px;" class="btn btn-success" href="<?= site_url('checkoutjemput') ?>"> Jemput</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p><a id="ordergan" style="border-radius:10px;padding-right:50px;padding-left:50px;padding-top:20px;padding-bottom:20px;background-color:#c1bfbf;color:white;font-size:20px;" href="<?= site_url('suksesjemput'); ?>" class="btn order">Order</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

