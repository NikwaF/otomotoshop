<?php
    foreach($products as $produk): 
?>
<div id="lihat<?=$produk['products_id'];?>" class="modal fade" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
  <div>
</div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Lihat Products</h4>
    </div>
      <div class="modal-body">
        <div class="form-group">
            <img style="display:block;margin:auto;" width="250" height="150" src="<?= base_url('assets/images/products/'.$produk['gambar']); ?>" alt="">
        </div>
        <div class="form-group">
            <h4 class="display-1" style="text-align:center;font-weight:600;"><?= $produk['nama_products'];?></h4>
        </div>
        <div class="form-group">
            <p style="font-size:18px; font-weight:800;">TIPE:</p>
            <p><?= $produk['tipe_products'] ?></p>
        </div>
        <div class="form-group">
            <p style="font-size:18px; font-weight:800;">KATEGORI:</p>
            <p><?= $produk['nama_kategori'] ?></p>
        </div>
        <div class="form-group">
        <blockquote class="blockquote">
            <p style="color:red;">Deskripsi:</p>
            <p class="mb-0" style="text-align:justify;"><?= $produk['deskripsi_products']?></p>
        </blockquote>
        </div>
        <div class="form-group">
            <p style="font-size:18px; font-weight:800;">Harga:</p>
            <p><?='Rp '.number_format($produk['harga'],2,',','.');?></p>
        </div>
        <div class="form-group">
            <p style="font-size:18px; font-weight:800;">URL:</p>
            <a style="text-decoration:none;" target="_blank" href="<?= site_url('produk/'.$produk['url']); ?>"><?= site_url('produk/'.$produk['url']); ?></a>
        </div>
      </div>
      <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
      </div>
  </div>
</div>
</div>
    <?php endforeach; ?>
