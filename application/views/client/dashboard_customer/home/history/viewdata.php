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
     <h3 class="box-title">Data History Customer</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="mytable" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th class="text-center">No.</th>
         <th class="text-center">Tanggal</th>
		 <th class="text-center">Nama Customer</th>
		 <th class="text-center">Metode Order</th>
		 <th class="text-center">Kode Unik</th>
		 <th class="text-center">Products</th>
		 <th class="text-center">Total Bayar</th>
                 <th class="text-center">Status Bayar</th>
       </tr>
       </thead>
       <tbody>
          <?php 
          $no = 1;
          foreach ($orderans as $orderan): ?>
                <tr>
                    <td align="center" height="5" style="overflow:hidden;"><?php echo $no++."."; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $orderan['tanggal_transaksi']; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $orderan['nama'];  ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $orderan['method_order']; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $orderan['kode_unik']; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><button id="viewproduct" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#lihat<?=$orderan['orders_id'];?>" ><i class="fa fa-eye" aria-hidden="true"></i> View</button></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= 'Rp '.number_format($orderan['total_belanja'],2,',','.'); ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $orderan['status_bayar'] ?></td>
                </tr>
          <?php endforeach; ?>
          </tbody>	
     </table>
   </div>
   <!-- /.box-body -->
 </div>
    </div>
	<!--include disiniii -->
	<?php
		include('lihat.php');
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
