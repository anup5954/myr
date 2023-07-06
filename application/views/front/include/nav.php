<?php $this->load->helper('user_detail'); ?>
<!-- Header Start Here -->
<div class="header-mobile d-block d-xl-none d-lg-none">
<ul>
	<li><a href="<?= base_url() ?>"><i class="fa-light fa-house"></i> Home</a></li>
	<li id="searchpopup"><a href="#searchpopup"><i class="fa-light fa-magnifying-glass"></i> Search</a></li>
	<li><?php
if( isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
?>

<a href="<?= base_url('dashboard') ?>"><i class="fa-light fa-user"></i><?php echo ucwords(user_detail('user_f_name')); ?></a>
<?php }else{ ?>

<a href="<?= base_url('login') ?>"><i class="fa-light fa-user"></i> My Account</a>
<?php } ?></li>
	<li id="mobile-nav-toggle"><a href="#mobile-nav-toggle"><i class="fa-light fa-bars"></i>Menu</a></li>
</ul>
</div>
<header id="header">

<div class="header_top">


<div class="d-xl-block d-lg-block d-none">
<div class="login_section">

<div class="login_detail mwd30">

<ul class="header_contact">

<li><a href=""><i class="fa fa-phone mobil_no">  <span>(+91) 880008 7676 </span></i></a></li>

<li><a href=""><i class="fa fa-whatsapp mobil_no">  <span>880008 7676 </span></i></a></li>

<li><a href=""><i class="fa fa-envelope mobil_no"> <span>info@myregistration.in </span></i> </a></li>

</ul>

</div>

<div class="login_detail mwd100">

<div class="login_">

<ul class="login_pnl">
<li class=""> <a href="<?= base_url('articles') ?>"> Articles</a> </li>
<li class="contact-us-name"><a href="<?= base_url('contact-us') ?>">Contact Us</a></li>
<li class="sign_pnl d-none d-xl-inline-block d-lg-inline-block"> 

<?php
if( isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
?>

<div class="dropdown">
<a href="<?= base_url('login') ?>" ><i class="fa-light fa-user"></i> <?php echo ucwords(user_detail('user_f_name')); ?></a>

<!-- <div class="dropdown-content">
<a href="<?= base_url('customer/my_services') ?>" > <span class="sign_up_text"> My Services </span>  </a>
<a href="<?= base_url('login/logout') ?>" > <span class="sign_up_text"> Logout </span> </a>
</div> -->  

</div>
<?php }else{ ?>
<a href="<?= base_url('login') ?>" > <i class="fa fa-sign-in"> <span class="sign_up_text"> Sign In | Sign Up </span> </i> </a>

<?php } ?>
</li>

</ul>

</div>

</div>

</div>
</div>


<div class="container-fluid">

<div class="header_menu clearfix">

<div id="logo" class="pull-left">

<a href="<?= base_url() ?>" class="scrollto"><img src="<?= base_url('assets/front/') ?>img/logo.png"></a>

<!-- Uncomment below if you prefer to use an image logo -->

<!-- <a href="#intro"><img src="<?= base_url('assets/front/') ?>img/logo.png" alt="" title="" /></a>-->

</div>

<div class="login_detail d-xl-none d-lg-none d-block ml-auto">

<ul class="header_contact">

<li><a href=""><i class="fa fa-phone mobil_no">  <span>(+91) 880008 7676 </span></i></a></li>

<li><a href=""><i class="fa fa-whatsapp mobil_no">  <span>880008 7676 </span></i></a></li>

<li><a href=""><i class="fa fa-envelope mobil_no"> <span>info@myregistration.in </span></i> </a></li>

</ul>

</div>

<nav id="nav-menu-container">


<i class="fa-light fa-xmark closeicon" id="mobile-nav-toggle"></i>
<ul class="nav-menu">

<li class="<?php if($this->uri->segment(1)==''){echo"menu-active";}{echo"";} ?>"><a href="<?= base_url() ?>">Home</a></li>

<li class="d-xl-none d-lg-none d-block "> <a href="<?= base_url('articles') ?>"> Articles</a> </li>


<li class="<?php if($this->uri->segment(1)=='consultants'){echo"menu-active";}{echo"";} ?>"><a href="<?= base_url('consultants') ?>">Consultants</a></li>

<?php
$groups=$this->mdl->fetch_all('groups');
foreach($groups as $group){
?>
<li class="menu-has-children"><?= $group->name ?> <i class="fa fa-chevron-down down_icon"> </i>

<div class="drop_down_menu">

<div class="row">
<?php
$group_types=$this->mdl->fetch_all_where('group_types',['group_id'=>$group->id]);
foreach($group_types as $group_type){
?>
<div class="col-lg-4">

<h4 class="menu_heading"><?= $group_type->name ?></h4>

<ul class="sub_menu">
<?php

$services=$this->mdl->fetch_all_where('services',['group_id'=>$group->id,'group_type_id'=>$group_type->id,'status'=>'active']);

foreach( $services as $service ){
?>
<li> <a href="<?= base_url('service/'.$service->id) ?>"><?= $service->name ?></a></li>
<?php } ?>
</ul>

</div>
<?php } ?>
</div>

</div>

</li>


<?php }  ?>

<li class="contact-us-named-xl-none d-lg-none d-block "><a href="<?= base_url('contact-us') ?>">Contact Us</a></li>


</ul>

</nav><!-- #nav-menu-container -->

</div>

</div>

</div>

<div class="clearfix"></div>

</header>

<!-- Header End Here -->