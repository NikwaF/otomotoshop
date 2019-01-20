<div class="content-wrapper">

  <div class="container">

    <div class="jumbotron">
      <div class="container">
        <div class="card" style="width: 450px;">
          <div class="card-body">
            <h2 class="card-title">Profil</h2>
            <div class="form-group">
                <label class="control-label" for="">Nama</label>
                <input type="text" name="" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="">No.Hp</label>
                <input type="text" name="" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="">Alamat 1</label>
                <input type="text" name="" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="">Kota</label>
                <input type="text" name="" class="form-control" id="" required>
            </div>
			<div class="form-group">
                <label class="control-label" for="">Kode Pos</label>
                <input type="text" name="" class="form-control" id="" required>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit Profil</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- pop up -->
<div class="modal fade" role="dialog" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Edit Profil</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="">Nama</label>
                  <input type="text" name="" class="form-control" id="" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">No.Hp</label>
                  <input type="text" name="" id="" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Alamat 1</label>
                  <input type="text" name="" class="form-control" id="" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Kota</label>
                  <input type="text" name="" class="form-control" id="" required>
                </div>
				<div class="form-group">
                  <label class="control-label" for="">Kode Pos</label>
                  <input type="text" name="" class="form-control" id="" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <?= form_submit('edit_profil','Edit Profil','class="btn btn-success"'); ?>
              </div>
        </div>
    </div>
</div>