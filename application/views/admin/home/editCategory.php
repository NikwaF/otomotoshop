<div class="content-wrapper pt">
  <div class="row">
    <div class="col-md-6 col-md-offset-1 mt-5">
      <h1 class="text-center">Edit Category</h1>
      <div>
        <?php if($this->session->flashdata('key')): ?>
        <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $this->session->flashdata('pesan'); ?>
        </div>
        <?php endif; ?>
      </div>
      <?= form_open_multipart('admin/updateCategory'); ?>
      <input type="hidden" name="xid" value="<?= $category[0]['catId'];?>">
      <input type="hidden" name="oldImg" value="<?= $category[0]['catDp'];?>">
      <div class="form-group">
        <label for="categoryname">Nama Category</label>
        <?= form_input('CategoryName',$category[0]['catName'],'class="form-control"'); ?>
      </div>
      <div class="form-group">
        <label for="categoryname">Foto Category</label>
        <?= form_upload('CatImages','','class="form-control"'); ?>
      </div>
      <div class="form-group">
        <?= form_submit('updateCategory','Update Category','class="btn btn-primary"'); ?>
      </div>
      <?= form_close(); ?>
    </div>
    <!-- .col-md-3 -->
    <div class="col-md-3">
      <img src="<?= base_url('assets/images/categories/'.$category[0]['catDp']); ?>" alt="" class="img-responsive">
    </div>
    <!-- /.col-md-3 -->
  </div>
</div>
