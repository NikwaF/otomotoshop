<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Customer</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/register/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/register/vendor/jquery-ui/jquery-ui.min.css'); ?>">
    <script src="<?= base_url('assets/sweet/sweetalert2.all.js');?>"></script>

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/register/css/style.css'); ?>">
  </head>
  <body>

    <div class="main">



      <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
          <div class="signup-content">
            <form method="POST" action="<?= site_url('home/insertregister');?>" id="signup-form" class="signup-form">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-input" name="nama" id="nama" />
              </div>
              <div class="form-group">
                <label for="phone_number">Email</label>
                <input type="email" class="form-input" name="email" id="email" />						
              </div>
              <div class="form-group form-icon">
                <div class="form-group form-icon">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="text" class="form-input" name="tgl_lahir" id="birth_date" placeholder="YYYY-MM-DD" />	
                </div>
              </div>
              <div class="form-group">
                <label for="nohp">Nomor HP</label>
                <input type="number" class="form-input" name="nohp" id="nohp" />
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-input" name="password" id="password"/>
                </div>
                <div class="form-group">
                  <label for="re_password">Ketik Ulang password</label>
                  <input type="password" class="form-input" name="re_password" id="re_password"/>
                </div>
              </div>
              <div class="form-text">
                <a href="#" class="add-info-link"><i class="zmdi zmdi-chevron-right"></i>Info Lain</a>
                <div class="add_info">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-input" name="alamat" id="alamat"/>
                  </div>
                  <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-input" name="kota" id="kota"/>
                  </div>
                  <div class="form-group">
                    <label for="kota">Kode Pos</label>
                    <input type="text" class="form-input" name="kodepos" id="kodepos"/>
                  </div>								
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" id="submit" class="form-submit" value="Daftar"/>
              </div>
            </form>
          </div>
        </div>
      </section>

    </div>

    <!-- JS -->
    <script src="<?= base_url('assets/register/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/register/vendor/jquery-ui/jquery-ui.min.js');?>"></script>
    <script src="<?= base_url('assets/register/vendor/jquery-validation/dist/jquery.validate.min.js');?>"></script>
    <script src="<?= base_url('assets/register/vendor/jquery-validation/dist/additional-methods.min.js');?>"></script>
    <script src="<?= base_url('assets/register/js/main.js');?>"></script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
