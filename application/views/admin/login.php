<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/admin'); ?>/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin'); ?>/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/admin'); ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/admin'); ?>/bower_components/Ionicons/css/ionicons.min.css">
</head>
<body>
    <div class="main">

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                      <figure><img src="<?= base_url('assets/admin'); ?>/image/1.png" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link"></a>
                    </div>

                    <div class="signin-form">
                      <h2 class="form-title">Sign in</h2>
                      <div>
                        <?php if($this->session->flashdata('key')): ?>
                        <div class="alert <?= $this->session->flashdata('key'); ?> alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <?= $this->session->flashdata('pesan'); ?>
                        </div>
                        <?php endif; ?>
                      </div>
                        <form method="POST" class="register-form" action="<?= site_url('admin/check_admin'); ?>">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
 
    </div>
</body>
