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

<div class="col-md-6 mx-auto">

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

<form class="card" action="<?= base_url('register/process') ?>" method="post" >

<div class="card-body p-6">

<div class="card-title">Create new account</div>

<div class="row">

<div class="col-md-12">
<div class="form-group">

<div class="form-label">Register As</div>

<div class="custom-controls-stacked">

<label class="custom-control custom-radio custom-control-inline">

<input type="radio" class="custom-control-input" name="user_authority" value="customer">

<span class="custom-control-label">Customer</span>

</label>

<label class="custom-control custom-radio custom-control-inline">

<input type="radio" class="custom-control-input" name="user_authority" value="partner">

<span class="custom-control-label">Consultant</span>

</label>

</div>

<?= form_error('user_authority'); ?>

</div>
</div>


<div class="col-md-6">
<div class="form-group">

<label class="form-label">First Name</label>

<input type="text" class="form-control" name="user_f_name" value="<?= set_value('user_f_name') ?>" placeholder="First name">

<?= form_error('user_f_name'); ?>

</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label class="form-label">Last Name</label>

<input type="text" class="form-control" name="user_l_name" value="<?= set_value('user_l_name') ?>" placeholder="Last name">

<?= form_error('user_l_name'); ?>

</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label class="form-label">Email address</label>

<input type="email" class="form-control" name="user_email" value="<?= set_value('user_email') ?>" placeholder="email">

<?= form_error('user_email'); ?>

</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label class="form-label">Contact No</label>

<input type="text" class="form-control" name="user_phone" value="<?= set_value('user_phone') ?>" placeholder="Phone">

<?= form_error('user_phone'); ?>

</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label class="form-label">Password</label>

<input type="password" class="form-control" name="user_password" value="<?= set_value('user_password') ?>" placeholder="Password">

<?= form_error('user_password'); ?>

</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label class="form-label">Password Confirm</label>

<input type="password" class="form-control" name="passconf" value="<?= set_value('passconf') ?>" placeholder="Password Confirm">

<?= form_error('passconf'); ?>

</div>
</div>



<div class="col-md-12">

<div class="form-footer">

<button type="submit" class="btn btn-primary btn-block">Create new account</button>

</div>
</div>
</div>


</div>

</form>

<div class="text-center text-muted">



Already have account? <a href="<?= base_url('login') ?>">Sign in</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>