<?php
    foreach($products as $produk): 
?>
<div id="edit<?=$produk['products_id'];?>" class="modal fade" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
  <div>
</div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Data Products</h4>
    </div>
    <?= form_open_multipart('products/editProducts'); ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label" for="nm_brg">Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" value="<?=$produk['nama_products'];?>" id="nm_brg" required>
          <input type="hidden" name="idproducts" value="<?= $produk['products_id'];?>">
          <input type="hidden" name="idproductsdetails" value="<?= $produk['products_details_id'];?>">
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-control" id="kategori" name="kategori" value="<?=$produk['nama'];?>">
            <?php foreach ($kategori as $kat) : ?>
            <option value="<?= $kat['kategori_id'] ;?>"><?=$kat['nama_kategori'];?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="tipe" class="control-label">Tipe</label>
          <input type="text" name="tipe_brg" id="tipe_brg" value="<?=$produk['tipe_products'];?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="deskripsi_barang">Deskripsi Barang</label>
            <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3"> <?= $produk['deskripsi_products']; ?></textarea>
        </div>
        <div class="form-group">
          <label class="control-label" for="hrg_brg">Harga Barang</label>
          <input type="number" name="hrg_brg" class="form-control" id="hrg_brg" value="<?=$produk['harga'];?>" required>
        </div>
        <div class="form-group">
            <label for="categoryname">GAMBAR BARANG</label>
            <?= form_upload('gambar_brg','','class="form-control"','','value='.$produk['gambar'].''); ?>
            <input type="hidden" name="oldGambar" value="<?= $produk['gambar']; ?>">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_submit('edit_products','Edit Products','class="btn btn-success"'); ?>
      </div>
      <?= form_close(); ?>
  </div>
</div>
</div>
    <?php endforeach; ?>