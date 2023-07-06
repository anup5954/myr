<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>My Registration  </title>
<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible content"="IE=edge">
<!-- SEO Part -->
<?php 

if( $this->uri->segment(1)=='' && $this->uri->segment(1)=='page'  ){
$meta=$this->mdl->fetch_row_where( 'pages', [ 'slug'=>$this->uri->segment(1) ] );
print_r($meta);
}
 

?>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name= "author" content="">
<!-- SEO Part -->
<!--css link file-->
<link rel="icon" href="<?= base_url('assets/front/') ?>img/favicon.png" type="image/x-icon"/>
<link href="<?= base_url('assets/front/') ?>css/bootstrap/bootstrap.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>css/owlcarouse.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>font/css/font-awesome.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>css/animate.min.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>css/header.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>css/footer.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>css/common.css" rel="stylesheet">
<link href="<?= base_url('assets/front/') ?>css/page/home.css" rel="stylesheet">
<!--css link file-->
</head>
<body>
<?php include 'nav.php'; ?>