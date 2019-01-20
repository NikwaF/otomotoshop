<!-- BREADCRUMB -->
<div id="breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?= site_url('home'); ?>">Home</a></li>
      <li><a href="<?= site_url('home/productview'); ?>">Products</a></li>
      <li class="active"><?= $products[0]['nama_products'] ?></li>
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
      <!--  Product Details -->
      <div class="product product-details clearfix">
        <div class="col-md-6">
          <div id="product-main-view">
            <div class="product-view">
              <img src="<?= base_url('assets/images/products/'.$products[0]['gambar']) ;?>" alt="">
            </div>						
          </div>
          <div id="product-view">
            <div class="product-view">
              <img src="<?= base_url('assets/images/products/'.$products[0]['gambar']) ;?>" alt="">
            </div>							
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-body">
            <h2 class="product-name"><?= $products[0]['nama_products']; ?></h2>
            <h3 class="product-price"><?='Rp '.number_format($products[0]['harga'],2,',','.');?> </h3>
            <p><strong>Tipe:</strong> <?= $products[0]['tipe_products'] ?></p>
            <p><strong>Description:</strong> <?= $products[0]['deskripsi_products']; ?></p>
            <?php $inikata = 'saya tertarik dengan '.current_url().' \n apa saya boleh tanya-tanya?'; ?>
            <p><strong>Tanya Stok:</strong><a target="_blank" href="<?= ' https://wa.me/62895380894476?text='.urldecode('saya tertarik dengan '.urldecode(current_url()). '  apakah barang ini tersedia?') ; ?>"><i style="font-size:29px; padding-left:20px;"class="fa fa-whatsapp" aria-hidden="true"></i></a></p>

            <div class="product-btns">
              <div class="qty-input">
                <span class="text-uppercase">QTY: </span>
                <input class="input"  min="1" id="quantity" value="1" type="number" required>
                <input type="hidden" name="id_products" id="id_products" value="<?= $products[0]['products_id'];?>">
                <input type="hidden" name="nama_products" id="nama_products" value="<?= $products[0]['nama_products']; ?>">
                <input type="hidden" name="harga_products" id="harga_products" value="<?= $products[0]['harga']; ?>">
                <input type="hidden" name="gambar_products" id="gambar_products" value="<?= $products[0]['gambar']; ?>">
              </div>
              <button id="addtocart" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
              <div class="pull-right">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="product-tab">
            <ul class="tab-nav">
              <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
              <li><a data-toggle="tab" href="#tab1">Details</a></li>
            </ul>
            <div class="tab-content">
              <div id="tab1" class="tab-pane fade in active">
                <p><?= $products[0]['deskripsi_products']; ?></p>
              </div>
              <div id="tab2" class="tab-pane fade in">

              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /Product Details -->
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
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
