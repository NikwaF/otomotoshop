<div class="content-wrapper">
  <!-- Section Header (Page header) -->
  <section class="content-header">
    <div>
      <?php if($this->session->flashdata('key')): ?>
      <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('pesan'); ?>
      </div>
      <?php endif; ?>
    </div>
    <h1>
      View Categories 
    </h1>
  </section>
  <!-- Section content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12"> 
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">view Categories</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($allCategories): ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama category</th>
                  <th>tanggal</th>
                  <th>Status</th>
                  <th>admin Id</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($allCategories as $category):  ?>
                <tr>
                  <td><?php echo $category->catId; ?></td>
                  <td><?php echo $category->catName; ?></td>
                  <td><?php echo $category->catDate; ?></td>
                  <td><?php echo $category->catStatus; ?></td>
                  <td><?php echo $category->adminId; ?></td>
                  <td><?php echo $category->catDp; ?></td>
                  <td>
                    <a href="<?= site_url('admin/editCategory/'.$category->catId); ?>" class="btn btn-primary btn-xs" role="button">ubah</a>
                    <a href="#" class="btn btn-danger btn-xs" role="button">hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <div class="text-right">
              <ul class="pagination">
                <?php echo $links; ?>
              </ul>
            </div>

            <?php else: ?>
            <h1 class="alert-danger text-center">Category belum ditambahkan</h1>
            <?php endif; ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
