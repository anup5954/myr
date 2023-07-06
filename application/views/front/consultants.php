<?php include 'include/header.php'; ?>


<div class="consultant_banner">
<img src="<?= base_url('assets/front/img/banner/consultant_banner.jpg') ?>">
<div class="consultant_widget">
<h1>Your Service Expert in India</h1>
<p>Get instant access to reliable and affordable services</p>
<div class="consultant_flex"> 
<div class="wd_input wd_input_flex">
<select class="form-control">
<option> Delhi</option>
<option> Noida</option>
<option> Gurugram</option>
<option>Gaziabad</option>
</select>
</div>
<div class="wd_input position_relative">
<input type="text" placeholder="Search For a service" class="form-control">
<button class="btn consultance_search_icon"> <i class="fa fa-search"> </i> </button>
</div>
</div>
</div>
</div>

<div class="consultance_list">
<div class="container p-0"> 
<div class="row">
<div class="col-xl-9 col-lg-12 col-sm-12 col-md-12">

<?php 
$i=0;
foreach ($consultants as $key => $consultant) {
/*echo "<pre>";
	print_r($consultant);*/
$no_of_articals=$this->mdl->no_of_articles($consultant->user_id);
?>
<div class="consultant_box">
<div class="consutant_list_flex">
	<div class="sub_flex_consultance">
<div class="consutant_list_img">
<?php if( $consultant->image!='' ){ echo img(['src'=>'assets/uploads/'.$consultant->image]); }else{ echo img(['src'=>'assets/uploads/conslutant_profile.png']); } ?>

</div>
<div class="consultant_detail_text consultant_heading_consultant"> 
<div class="consultant_flex_pnl">
<div class="consultant_flex_box">
<ul class="partner_heading">
<li> <i class="fa fa-user"> </i>  <?= $consultant->user_f_name ?> <?= $consultant->user_l_name ?></li>
<li> <i class="fa fa-graduation-cap"> </i> <?= $consultant->user_qualification ?></li>
</ul>
</div>

<div class="consultant_flex_box consultant_pl">
<a href="<?= base_url('articles/constant/'.$consultant->user_id) ?>"> Article <span> <?= $no_of_articals ?> </span> </a>
</div>


</div>

</div>
<div class="consultant_list_p_tag consultant_text_p">
	<p><?= $consultant->user_about_us ?> </p>
</div>
</div>



<div class="contant_text clearfix">
<ul>
<li class="email_partner"> <i class="fa fa-envelope"> </i> <?= $consultant->user_email ?></li>
<li> <i class="fa fa-phone"> </i> <?= $consultant->user_phone ?></li>
<li> <i class="fa fa-map-marker"> </i> <?= $consultant->user_state ?></li>
</ul>

<a href="<?= base_url('consultant/detail/'.$consultant->user_id) ?>" class="c_view_more">View More <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
</div>

</div>
</div>

<?php  $i++; } ?>
</div>
<div class="col-xl-3 col-lg-12 col-sm-12 col-md-12 mb_col_none">
<div class="consltant_list_side">
<div class="consultant_detail_services consultant_nt_o">
<h2>Our Services</h2>
<ul class="consulttant_services_list">
<?php 
$services=$this->mdl->fetch_all_where('services',['status'=>'active']);
foreach( $services as $service ){  

?>
<li> <a href="<?= base_url( 'service/'.$service->id ) ?>"> <?= $service->name ?> </a> </li>
<?php }?>
</ul>
</div>
</div>
</div>
</div>


</div>
</div>

<?php include 'include/footer.php'; ?>
