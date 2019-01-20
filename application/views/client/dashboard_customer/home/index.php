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
     <h3 class="box-title">Profile</h3>
	         <div class="card" style="width: 450px;">
				<div class="card-body">
            <h2 class="card-title">Profil</h2>
			<p style="color:red;"> *setelah edit data otomatis akan logout</p>
            <div class="form-group">
                <label class="control-form" for="">Nama :</label>
				<input class="form-control" value="<?= $this->session->userdata('customer_name'); ?>" disabled>
            </div>
            <div class="form-group">
                <label class="control-label" for="">Email :</label>
				<input class="form-control" value="<?= $this->session->userdata('customer_email'); ?>" disabled>
            </div>
            <div class="form-group">
                <label class="control-label" for="">NoHP :</label>
				<input class="form-control" value="<?= $this->session->userdata('customer_nohp'); ?>" disabled>
            </div>
            <div class="form-group">
                <label class="control-label" for="">Alamat :</label>
				<textarea disabled class="form-control"><?= $this->session->userdata('customer_alamat'); ?></textarea>
            </div>
			<div class="form-group">
                <label class="control-label" for="">Kota :</label>
                <input class="form-control" value="<?= $this->session->userdata('customer_kota'); ?>" disabled>
            </div>
			<div class="form-group">
                <label class="control-label" for="">Kode Pos :</label>
				<input class="form-control" value="<?= $this->session->userdata('customer_kodepos'); ?>" disabled>
            </div>			
            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#edit<?= $this->session->userdata('customer_id')?> ">Edit Profil</button>
          </div>
   </div>
	</div>
	
	
	     <div id="edit<?= $this->session->userdata('customer_id'); ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit</h4>
            </div>
            <?= form_open_multipart('Customer_dashboard/editProfile'); ?>
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="nm_brg">Nama Customer</label>
                  <input type="text" name="nama_customer" value="<?= $this->session->userdata('customer_name'); ?>" class="form-control" id="nm_brg" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nm_brg">No HP</label>
                  <input type="text" name="nohp" class="form-control" value="<?= $this->session->userdata('customer_nohp'); ?>" id="nm_brg" required>
                </div>        
                <div class="form-group">
                  <label class="control-label" for="nm_brg">Kota</label>
                  <input type="text" name="kota" class="form-control" value="<?= $this->session->userdata('customer_kota'); ?>" id="nm_brg" required>
                </div>  
                <div class="form-group">
                  <label class="control-label" for="nm_brg">Kode POS</label>
                  <input type="text" name="kodepos" class="form-control" value="<?= $this->session->userdata('customer_kodepos'); ?>" id="nm_brg" required>
                </div>  				
                <div class="form-group">
                    <label for="deskripsi_barang">Alamat</label>
                    <textarea class="form-control" id="deskripsi_barang" name="alamat" rows="3"><?= $this->session->userdata('customer_alamat'); ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <?= form_submit('edit_profile','Edit Profile','class="btn btn-success"'); ?>
              </div>
              <?= form_close(); ?>
          </div>
        </div>
        
    </div>
 <!-- /.box -->
</section>  
</div>
</div>