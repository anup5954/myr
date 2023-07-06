
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Forgot password - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?= base_url() ?>assets/admin/js/require.min.js"></script>
    <!-- Dashboard Core -->
    <link href="<?= base_url() ?>assets/admin/css/dashboard.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/admin/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?= base_url() ?>assets/admin/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/admin/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?= base_url() ?>assets/admin/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/admin/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?= base_url() ?>assets/admin/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="<?= base_url() ?>assets/admin/plugins/datatables/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="<?= base_url('assets/front/img/logo.png') ?>"  alt="logo">
<span style="margin-bottom: 25px;display: block;"></span>
<?php
if( $this->session->flashdata('s_msg') || $this->session->flashdata('e_msg') ){ ?>
<div class="alert alert-<?php if($this->session->flashdata('s_msg')){ echo "success"; }else{ echo "danger"; } ?>" role="alert">
<strong><?php if($this->session->flashdata('s_msg')){ echo "Success"; }else{ echo "Error"; } ?>!</strong> <?= $this->session->flashdata('s_msg');  ?><?= $this->session->flashdata('e_msg');  ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
              </div>
              <form class="card" action="<?= base_url('forgot-password') ?>" method="post">
                <div class="card-body p-6">
                  <div class="card-title">Forgot password</div>
                  <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                  <div class="form-group">
                    <label class="form-label" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="user_email" placeholder="Enter email" value="<?= set_value('user_email') ?>">
                    <?= form_error('user_email'); ?>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                Forget it, <a href="<?= base_url('login') ?>">send me back</a> to the sign in screen.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>