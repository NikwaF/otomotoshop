<div class="content-wrapper">
	<div class="box-body my-form-body">
		<div class="row">
			<div class="col-lg-12">
				<h1>Wishlist <small>Barang</small></h1>
			</div>
		</div>
	</div>

	<!-- table -->
		<div class="container">
			<!-- <div class="row"> -->
				<div class="col-lg-12">
					<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
							<thead class="thead-light">
								<tr>
									<th>Nama Barang</th>
									<th>Harga Barang</th>
									<th>Url</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>oli</td>
									<td>43000</td>
									<td>www.google.com</td>
									<td>
										<a href="<?= base_url('user/detailwishlist'); ?>"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Detail</button></a>
									</td>
								</tr>
								<tr>
									<td>ban</td>
									<td>100000</td>
									<td>www.google.com</td>
									<td>
										<a href="<?= base_url('user/detailwishlist'); ?>"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Detail</button></a>
									</td>
								</tr>
							</tbody>	
					</table>
					</div>
				</div>
		</div>
</div>