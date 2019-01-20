<div class="content-wrapper">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Kategori</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
        <?php if($this->session->flashdata('key')): ?>
        <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $this->session->flashdata('pesan'); ?>
        </div>
        <?php endif; ?>

            <?php echo form_open(base_url('admin/updateKategori'), 'class="form-horizontal"');  ?> 
            
              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Nama Kategori</label>
                <input type="hidden" name="xid" value="<?= $kategori[0]['kategori_id'] ;?>">
                <div class="col-sm-9">
                  <input type="text" name="namakategori" value="<?= $kategori[0]['nama_kategori'] ;?>" class="form-control" id="namakategori" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="update kategori" class="btn btn-info pull-right">
				  <a href="<?= site_url('admin/viewAllkategori'); ?>" style="margin-right:20px;" class="btn btn-success pull-right">view data</a>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  
  </div>

</section> 
<script>
$("#addKategori").addClass('active');
</script>    