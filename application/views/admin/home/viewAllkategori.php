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
     <h3 class="box-title">Kategori Product</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
   
     <table id="mytable" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th>id kategori</th>
         <th>Nama Kategori</th>
         <th style="width: 150px;" class="text-right">Option</th>
       </tr>
       </thead>
       <tbody>
         <?php foreach($kategori as $row): ?>
         <tr>
           <td><?= $row['kategori_id']; ?></td>
           <td><?= $row['nama_kategori']; ?></td>
           <td class="text-right"><a href="<?= base_url('admin/EditKategori/'.$row['kategori_id']); ?>" class="btn btn-info btn-flat">Edit</a><a class="btn btn-danger btn-flat" href="<?= base_url('admin/DelKategori/'.$row['kategori_id']); ?>">Delete</a></td>
         </tr>
         <?php endforeach; ?>
       </tbody>
      
     </table>
	 <a class="btn btn-success pull-left" href="<?= site_url('admin/addKategori'); ?>"> tambah data</a>
   </div>
   <!-- /.box-body -->
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
