<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="<?= site_url('home'); ?>">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
</div>		
		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
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
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Detail Product</span>
							</div>
							<div class="one-eight text-center">
								<span>Harga</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Hapus</span>
							</div>
						</div>
						<form action="<?= site_url('cart_oto/updateCart'); ?>" method="post">
						<?php $i=1; foreach($cart as $item): ?>
						
						<div class="product-cart d-flex">

							<div class="one-forth">
								<input type="hidden" name="rowid" value="<?= $item['rowid'] ?> ">
								<div class="product-img" style="background-image: url(<?= base_url('assets/images/products/'.$item['gambar']);?>);">
								</div>
								<div class="display-tc">
									<h3><?= $item['name']; ?></h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price"><?= 'Rp '.number_format($item['price'],2,',','.'); ?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="number" id="quantity" name="quantity<?= $i ?>" class="form-control text-center" value="<?= $item['qty']; ?>" min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price"><?= 'Rp '.number_format($item['subtotal'],2,',','.'); ?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="<?= site_url('cart_oto/removecart/'.$item['rowid']); ?>" class="closed"></a>
								</div>
							</div>
						</div>
						<?php $i++; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-8">
										<div class="row form-group">
											<div class="col-sm-3">
												<input type="submit" value="Update Cart" class="btn btn-primary">
						</form>
											</div>
											<div class="col-sm-3">
												<a class="btn btn-dark" href="<?= site_url('cart_oto/checkout') ?>">Checkout</a>
											</div>
										</div>						
								</div>
								<div class="col-sm-4 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span><?= 'Rp '.number_format($total,2,',','.'); ?></span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span><?= 'Rp '.number_format($total,2,',','.'); ?></span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>