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
     <h3 class="box-title">Data Customer</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="mytable" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th class="text-center">No.</th>
         <th class="text-center">Nama</th>
		 <th class="text-center">Email</th>
		 <th class="text-center">No HP</th>
		 <th class="text-center">Alamat</th>
       </tr>
       </thead>
       <tbody>
          <?php 
          $no = 1;
          foreach ($customers as $customer): ?>
                <tr>
                    <td align="center" height="5" style="overflow:hidden;"><?php echo $no++."."; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $customer['nama']; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $customer['email'];  ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $customer['nohp']; ?></td>
                    <td align="center" height="5" style="overflow:hidden;"><?= $customer['alamat']; ?> <p style="color:red;display:inline;">KODEPOS:</p> <?= $customer['kode_pos']; ?>, <p style="color:blue;display:inline;">KOTA:</p> <?= $customer['kota']?></td>
                    
                </tr>
          <?php endforeach; ?>
          </tbody>	
     </table>
   </div>
   <!-- /.box-body -->
 </div>

    <!-- buat include disini eahhhh -->
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