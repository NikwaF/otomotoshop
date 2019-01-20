<link rel="stylesheet" href="<?= base_url('assets/admin') ?>/plugins/datatables/dataTables.bootstrap.css"> 
<div class="content-wrapper">
  <div class="box-body my-form-body">
    <?php if($this->session->flashdata('key')): ?>
<script>
swal({
title: "Selesai",
  text: "<?php echo $this->session->flashdata('pesan'); ?>",
  timer: 2200,
  showConfirmButton: false,
  type: '<?= $this->session->flashdata('key'); ?>'
});
</script>
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
            <th class="text-center">kode_unik</th>
            <th class="text-center">Tanggal Upload</th>		 
            <th class="text-center">Status</th>
            <th class="text-center">Gambar TF</th>
            <th style="width: 150px;" class="text-center">Option</th>
          </tr>
        </thead>
        <tbody>
<?php 
$no = 1;
foreach($pembayaran as $konfirmasi):
?>
<tr>
  <td align="center" height="5" style="overflow:hidden;"><?php echo $no++."."; ?></td>
  <td align="center" height="5" style="overflow:hidden;"><?= $konfirmasi['kode_unik']; ?></td>
  <td align="center" height="5" style="overflow:hidden;"><?= $konfirmasi['tanggal_upload']; ?></td>
  <td height="5" style="overflow:hidden;"><?= $konfirmasi['status']; ?></td>
  <td><a target="_blank" href="<?= site_url('assets/images/buktitf/'.$konfirmasi['gambar_tf']); ?>"><img src="<?= site_url('assets/images/buktitf/'.$konfirmasi['gambar_tf']); ?>" width="70px"></a></td>
  <td align="center" height="5" style="overflow:hidden;">
    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit<?= $konfirmasi['pembayaran_id']; ?>" ><i class="fa fa-edit"></i> Konfirmasi</button>
    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#hapus<?= $konfirmasi['pembayaran_id']; ?>" ><i class="fa fa-edit"></i> Hapus</button>
    </a>
  </td>
</tr>
<?php endforeach; ?>
        </tbody>	
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div id="edit<?= $konfirmasi['pembayaran_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <?= form_open_multipart('orderan/updatePembayaran'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="nm_brg">Kode Unik</label>
            <input type="text" name="kode_unik" value="<?=$konfirmasi['kode_unik'];?>" class="form-control" id="kode_unik" required>
          </div>
        </div>
        <div class="form-group">
          <label for="kategori">Konfirmasi</label>
          <select class="form-control" name="ahahaha">
            <option value="terkonfirmasi">Konfirmasi</option>
            <option value="belum terkonfirmasi">Tidak Konfirmasi</option>
          </select>
        </div>				
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
          <?= form_submit('konfirmasi','Konfirmasi','class="btn btn-success"'); ?>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>


<?php
foreach($pembayaran as $bukti): 
?>
<div class="modal fade" id="hapus<?=$bukti['pembayaran_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= site_url('orderan/hapuspembayaran') ?>">
        <div class="modal-body">
          <p>Anda yakin mau menghapus bukti pembayaran <b style="color:red;"><?php echo $bukti['kode_unik'];?> ?</b></p>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="pembayaranid" value="<?= $bukti['pembayaran_id'];?>">
          <input type="hidden" name="slippembayaran" value="<?= $bukti['gambar_tf']?>">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>



  </div>
<?php 
  //buat include coy
?>
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
