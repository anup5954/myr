<?php include 'include/header.php'; ?>

<link href="<?= base_url('assets/front/css/page/consultantdetails.css') ?>" rel="stylesheet">

<!--Start-here-body-section-->
<!--************************************************-->
<!--start-here-nav-bar-->
<div class="consultantdetails">
<div class="container">

<div class="consultantheadflex">
<div class="consultantheadleft">
<?php if( $consultant->image!='' ){ echo img(['src'=>'assets/uploads/'.$consultant->image]); } ?>
</div>

<div class="consultantheadmid">
<div class="consultanctprofilenamed">
<p><?= $consultant->user_f_name ?> <?= $consultant->user_l_name ?> <span><?= $consultant->user_qualification ?></span></p>
</div>
</div>

<div class="consultantheadright">
<div class="consultantprofileinfo">
<ul>
<li> <i class="fa fa-envelope"> </i> <?= $consultant->user_email ?> </li>
<li> <i class="fa fa-phone"> </i> +91 <?= $consultant->user_phone ?> </li>
<li> <i class="fa fa-map-marker"> </i> <?= $consultant->user_state ?> </li>
</ul>
</div>
</div>
</div>
	
<div class="consultantmidsection">
<div class="consultantmidflex">
<div class="consultantmidleftbox">
<div class="sidnavheading">
<h4>Article</h4>
</div>	

<div class="sidnavlist">
<ul>
<?php 
//$consultant
foreach( $articles as $article ){ //print_r($article); ?>
<li style="text-align: justify;"> <a href="<?php echo base_url(); ?>"> <?php echo $article->title ?> </a> </li>
<?php } ?>
</ul>
</div>
</div>

<div class="consultantmidbox">
<h2 class="headingconsultancy"><?= $consultant->user_bio_heading ?></h2>
<?= $consultant->user_about_us ?>
</div>

<div class="consultantmidrightbox">
<div class="sidnavheading">
<h4>Services</h4>
</div>	

<div class="sidnavlist">
<ul>
<?php foreach( $servicess as $service ){ ?>
<li> <a href="<?php echo base_url( 'service/'.$service->id ); ?>"> <?php echo $service->name ?> </a> </li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>


</div>
</div>

<?php include 'include/footer.php'; ?>

	

	