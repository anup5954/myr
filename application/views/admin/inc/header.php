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
<link rel="icon" href="<?= base_url('assets/front/') ?>img/favicon.png" type="image/x-icon"/>
<!-- Generated: 2018-04-16 09:29:05 +0200 -->
<title><?= ADMIN_TITAL; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
<!-- Dashboard Core -->
<link href="<?= base_url('assets/admin/css/dashboard.css'); ?>" rel="stylesheet" />
<link href="<?= base_url('assets/admin/')  ?>css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="<?= base_url('assets/admin/')  ?>css/responsive.dataTables.min.css" rel="stylesheet" />
<!-- js library -->
<script src="<?= base_url('assets/admin/')  ?>js/jquery-3.3.1.js"></script>
<script src="<?= base_url('assets/admin/')  ?>js/bootstrap.min.js"></script>
<!-- datatables library -->
<script src="<?= base_url('assets/admin/')  ?>js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/')  ?>js/dataTables.responsive.min.js"></script>
<!--CK Editor-->
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
</head>

<body class="">
<div class="page">
<div class="page-main">
<div class="header py-4">
<div class="container-fluid">
<div class="d-flex header-section-admin">
<?php $this->load->helper('user_detail'); ?>
<a class="header-brand" href="<?= base_url(''); ?>dashboard">
<?= img(['src'=>'assets/front/img/logo.png','class'=>'header-brand-img','alt'=>'tabler logo']); ?>
</a>
<div class=" d-xl-block d-lg-block d-none ml-auto">
<div class="d-flex order-lg-2 ml-auto">
<div class="nav-item d-none d-md-flex">
<a href="<?= base_url(); ?>" class="btn btn-sm btn-outline-primary" target="_blank">Front View</a>
</div>
<div class="dropdown">
<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
<span class="avatar" style="background-image: url(<?= base_url('assets/uploads/'.user_detail('image')) ?>)"></span>
<span class="ml-2 d-none d-lg-block">
<span class="text-default"><?php echo ucwords(user_detail('user_f_name')); ?></span>
<small class="text-muted d-block mt-1"><?= ucwords(user_detail('user_authority')) ?></small>
</span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
<a class="dropdown-item" href="<?= base_url('profile') ?>">
<i class="dropdown-icon fe fe-user"></i> Profile
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item" href="<?= base_url('login/logout'); ?>">
<i class="dropdown-icon fe fe-log-out"></i> Sign out
</a>
</div>
</div>

<a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
<span class="header-toggler-icon"></span>
</a>
</div>
</div>
<?php if( $this->session->flashdata('s_msg') || $this->session->flashdata('e_msg') ){ ?>
<div style="position: absolute;top: 8px;left: 50%;" class="alert animated printmsg sake alert-<?php if( $this->session->flashdata('s_msg')){ echo "success";  }else{ echo("danger"); }?>" role="alert">
<span class="pull-left">
<strong><?php if( $this->session->flashdata('s_msg')){ echo '<i class="fa fa-check-circle"></i> Success!';  }else{ echo('<i class="fa fa-exclamation-circle"></i> Error!'); }?></strong>
<?= $this->session->flashdata('s_msg');  ?>
<?= $this->session->flashdata('e_msg');  ?>
</span>
<i class="fa fa-close pull-right" aria-label="Close" data-dismiss="alert"></i>
</div>
<script type="text/javascript">
setTimeout(function() {
$('.printmsg').delay(2000).fadeOut('slow');
}, 2000);
</script>
<?php } ?>

</div>
</div>
</div>
