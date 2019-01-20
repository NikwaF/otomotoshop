<div class="content-wrapper pt">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 mt-5">
      <h1 class="text-center">Tambahkan Category</h1>
      <div>
        <?php if($this->session->flashdata('key')): ?>
        <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $this->session->flashdata('pesan'); ?>
        </div>
        <?php endif; ?>
      </div>
      <?= form_open_multipart('admin/addCategory'); ?>
      <div class="form-group">
        <label for="categoryname">Nama Category</label>
        <?= form_input('CategoryName','','class="form-control"'); ?>
      </div>
      <div class="form-group">
        <label for="categoryname">Nama Category</label>
        <?= form_upload('CatImages','','class="form-control"'); ?>
      </div>
      <div class="form-group">
        <?= form_submit('Add_Category','Add Category','class="btn btn-primary"'); ?>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>