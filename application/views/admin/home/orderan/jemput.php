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
      <h3 class="box-title">Data Penjemputan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="mytable" class="table table-bordered table-striped ">
        <thead>
          <tr>
            <th class="text-center">No.</th>
            <th class="text-center">kode_unik</th>
            <th class="text-center">proses</th>
            <th style="width: 150px;" class="text-center">Option</th>
          </tr>
        </thead>
        <tbody>
<?php 
$no = 1;
foreach($jemput as $jemputt):
?>
<tr>
  <td align="center" height="5" style="overflow:hidden;"><?php echo $no++."."; ?></td>
  <td align="center" height="5" style="overflow:hidden;"><?= $jemputt['kode_unik']; ?></td>
  <td align="center" height="5" style="overflow:hidden;"><?= $jemputt['proses_jemput']; ?></td>
  <td align="center" height="5" style="overflow:hidden;">
    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#selesai<?= $jemputt['id']; ?>" ><i class="fa fa-edit"></i> Selesai</button>
    </a>
  </td>
</tr>
<?php endforeach; ?>
        </tbody>	
      </table>
    </div>
    <!-- /.box-body -->
  </div>

<?php
foreach($jemput as $jemputtt): 
?>
<div class="modal fade" id="selesai<?=$jemputtt['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Proses Jemput Selesai</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= site_url('orderan/selesaikanjemputan') ?>">
        <div class="modal-body">
          <p>Anda yakin proses antar telah selesai untuk kode: <b style="color:red;"><?php echo $jemputtt['kode_unik'];?> ?</b></p>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idantar" value="<?= $jemputtt['id']?>">
          <input type="hidden" name="customerid" value="<?= $jemputtt['customer_id']?>">
          <input type="hidden" name="orderid" value="<?= $jemputtt['orders_id']?>">
          <input type="hidden" name="kodeunik" value="<?= $jemputtt['kode_unik']?>">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-danger">Selesaikan</button>
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
