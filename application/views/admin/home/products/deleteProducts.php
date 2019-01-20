<?php
foreach($products as $produk): 
?>
<div class="modal fade" id="hapus<?=$produk['products_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= site_url('products/hapusProducts') ?>">
        <div class="modal-body">
          <p>Anda yakin mau menghapus <b style="color:red;"><?php echo $produk['nama_products'];?> ?</b></p>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idproducts" value="<?= $produk['products_id'];?>">
          <input type="hidden" name="idproductsdetails" value="<?= $produk['products_details_id'];?>">
          <input type="hidden" name="oldGambar" value="<?= $produk['gambar']; ?>">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
