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
<!-- Generated: 2018-04-16 09:29:05 +0200 -->
<title>Login - <?= ADMIN_TITAL; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
<script src="<?= base_url('assets/admin/js/require.min.js') ?>"></script>
<!-- Dashboard Core -->
<link href="<?= base_url('assets/admin/css/dashboard.css') ?>" rel="stylesheet" />
<script src="<?= base_url('assets/admin/js/dashboard.js') ?>"></script>
</head>
<body class="">
<div class="page">
<div class="page-single">
<div class="container">
<div class="row">
<div class="col col-login mx-auto">
<div class="text-center mb-6">
<?= img('assets/front/img/logo.png'); ?>
<span style="margin-bottom: 25px;display: block;"></span>
<?php
if( $this->session->flashdata('s_msg') || $this->session->flashdata('e_msg') ){ ?>
<div class="alert alert-<?php if($this->session->flashdata('s_msg')){ echo "success"; }else{ echo "danger"; } ?>" role="alert">
<strong><?php if($this->session->flashdata('s_msg')){ echo "Success"; }else{ echo "Error"; } ?>!</strong> <?= $this->session->flashdata('s_msg');  ?><?= $this->session->flashdata('e_msg');  ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
</div>
<?= form_open('login/login_validate',['class'=>'card']); ?>
<div class="card-body p-6">
<div class="card-title">Login to your account</div>
<div class="form-group">
<label class="form-label">Email address</label>
<?= form_input(['name' => 'user_email', 'class' => 'form-control', 'placeholder' => 'Enter email','value'=>set_value('user_email'),'aria-describedby'=>'emailHelp']); ?>
<?= form_error('user_email'); ?>
</div>
<div class="form-group">
<label class="form-label">
Password
<a href="<?= base_url('forgot-password') ?>" class="float-right small">I forgot password</a>
</label>
<?= form_password(['name'=>'user_password','class' => 'form-control', 'placeholder' => 'Password','value'=>set_value('user_password')]); ?>
<?= form_error('user_password'); ?>

</div>
<div class="form-footer">
<button type="submit" class="btn btn-primary btn-block">Sign in</button>
</div>
</div>
<?= form_close(); ?>

<div class="text-center text-muted">
Don't have account yet? <a href="<?= base_url('register') ?>">Sign up</a>
</div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>