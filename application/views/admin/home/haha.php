<link rel="stylesheet" href="<?= base_url('assets/admin') ?>/plugins/datatables/dataTables.bootstrap.css"> 
<div class="content-wrapper">
<div class="box-body my-form-body">
        <?php if($this->session->flashdata('key')): ?>
        <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $this->session->flashdata('pesan'); ?>
        </div>
        <?php endif; ?>
<section class="content">
  <div class="box">
   <div class="box-header">
     <h3 class="box-title">Data Products</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="mytable" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th class="text-center">No.</th>
         <th class="text-center">Nama Barang</th>
		 <th class="text-center">Deskripsi Barang</th>
		 <th class="text-center">Harga Barang</th>
		 <th class="text-center">Gambar</th>
         <th style="width: 150px;" class="text-center">Option</th>
       </tr>
       </thead>
       <tbody>
          <?php 
          $no = 1;
          foreach ($products as $produk): ?>
                <tr>
                    <td align="center"><?php echo $no++."."; ?></td>
                    <td align="center"><?= $produk['nama_products']; ?></td>
                    <td align="center"><?= $produk['deskripsi_products']; ?></td>
                    <td align="center"><?= $produk['harga']; ?></td>
                    <td>
                      <img src="../assets/images/products/<?= $produk['gambar']; ?>" width="70px"> 
                    </td>
                    <td align="center">
                      <!-- <a id="edit_brg" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_barang; ?>" data-nama="<?php echo $data->nama_barang; ?>" data-harga="<?php echo $data->harga_barang; ?>" data-stok="<?php echo $data->stok_barang; ?>"data-gambar="<?php echo $data->gambar_barang; ?>"> -->
                        <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                      <!-- <a href="viewBarang/<?= $brg->id_barang; ?>" onclick="return confirm('yakin akan menghapus data ini?')">  -->
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button>
                      </a>
                    </td>
                </tr>
          <?php endforeach; ?>
          </tbody>	
     </table>
   </div>
   <!-- /.box-body -->
 </div>
 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
 
     <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                   <div>
          <?php if($this->session->flashdata('key')): ?>
          <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $this->session->flashdata('pesan'); ?>
          </div>
          <?php endif; ?>
      </div>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Data Products</h4>
            </div>
            <?= form_open_multipart('products/tambahProducts'); ?>
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="nm_brg">Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control" id="nm_brg" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select class="form-control" id="kategori" name="kategori">
                    <?php foreach ($kategori as $kat) : ?>
                    <option value="<?= $kat['kategori_id'] ;?>"><?=$kat['nama_kategori'];?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tipe" class="control-label">Tipe</label>
                  <input type="text" name="tipe_brg" id="tipe_brg" class="form-control">
                </div>
                <div class="form-group">
                    <label for="deskripsi_barang">Deskripsi Barang</label>
                    <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="hrg_brg">Harga Barang</label>
                  <input type="number" name="hrg_brg" class="form-control" id="hrg_brg" required>
                </div>
                <div class="form-group">
                    <label for="categoryname">GAMBAR BARANG</label>
                    <?= form_upload('gambar_brg','','class="form-control"'); ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <?= form_submit('add_products','Add Products','class="btn btn-success"'); ?>
              </div>
              <?= form_close(); ?>
              
          </div>
        </div>
    </div>
 <!-- /.box -->
</section>  
</div>

</div>


<!-- DataTables -->
<script src="<?= base_url('assets/js') ;?>/jquery.js"></script>
<script src="<?= base_url('assets/admin'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
 $(document).ready(function() {
   $('#mytable').dataTable();
 });
</script>    		  