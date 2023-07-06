<!--start here footer -->
<footer>
<div class="container">
<div class="row">
<div class="col-md-4">
<h4>My Registration </h4>

<ul class="home_footer">
<li> <a href="<?= base_url() ?>"> Home </a> </li>
<li> <a href="<?= base_url('about') ?>"> About Us</a> </li>
<li> <a href="<?= base_url('privacy-policy') ?>"> Privacy Policy</a> </li>
<li> <a href="<?= base_url('refund-policy') ?>"> Refund Policy</a> </li>
<li> <a href="<?= base_url('terms-conditions') ?>"> Terms & Conditions</a> </li>
<li> <a href="<?= base_url('partner-with-us') ?>"> Partner With Us</a> </li>
<li> <a href="<?= base_url('articles') ?>"> Articles</a> </li>
</ul>
</div>

<div class="col-md-4">
<h4>Our Services</h4>

<ul class="home_footer">
<?php 
$footer_services=$this->mdl->footer_services();
foreach( $footer_services as $service ){ //print_r($service);?>
<li> <a href="<?php echo base_url( 'service/'.$service->id ); ?>"> <?php echo $service->name ?> </a> </li>
<?php } ?>

</ul>
</div>

<div class="col-md-4">
<h4>Our Services</h4>

<ul class="home_footer">
<li> <a href=""> Corporate office- H-182 Creative Plaza South Moti Bagh New Delhi-110021 </a> </li>
<li> <a href=""> Registered office:- H-16/1430 Sangam Vihar ND-110062</a> </li>
<li> <a href=""> info@myregistration.in </a> </li>
<li> <a href=""> (+91) 880008 7676</a> </li>
</ul>

<h4>Follow Us</h4>

<ul class="social_media">
<li><a href="https://www.facebook.com/myregistration.in" target="_blank"><i class="fa fa-facebook"> </i></a></li>
<li><a href="https://twitter.com/myregistration_" target="_blank"><i class="fa fa-twitter"> </i></a></li>
<li><a href="https://myregistration-blog.tumblr.com/" target="_blank"><i class="fa fa-tumblr"> </i></a></li>
<li><a href="https://www.instagram.com/myregistration.in/" target="_blank"><i class="fa fa-instagram"> </i></a></li>
 <li><a href="https://www.linkedin.com/in/myregistration-in-90a475150/?originalSubdomain=in" target="_blank"><i class="fa fa-linkedin"> </i></a></li> 
</ul>
</div>
</div>
</div>

</footer>

<div class="footer_bottom">
<p>Copyright © <?= date('Y') ?> My Registration. All Rights Reserved. || <a href="http://websitebyranking.com" target="_blank">Web Design By: Website By Ranking</a></p>
</div>

<!--js file-->
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/bootstrap/jquery.min.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/bootstrap/bootstrap.min.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/owl.carousel.min.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/datable/dataTables.min.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/datable/dataTables.responsive.min.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/header.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/footer.js"> </script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>js/page/consultant.js"> </script>
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62a5fc997b967b1179941d18/1g5c65eik';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<!--End of Tawk.to Script-->

