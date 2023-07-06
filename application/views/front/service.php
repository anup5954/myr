<?php include 'include/header.php'; ?>
<link href="<?= base_url('assets/front/css/page/services.css') ?>" rel="stylesheet" />
<div class="inner_page_pnl" style="margin-top:80px">
<div class="inner_banner online_company_registration">
<div class="inner_banner_overlay"></div>
<div class="container">

<div class="row">
<div class="col-md-6">
<div class="banner_left_content">
<!--<h2><?= $servic->name ?></h2>-->
<?= $servic->service_short_desc ?>
</div>
</div>
<!-- Form -->
<div class="col-md-6">
<div class="banner_form">
<br>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<table class="table">
<tbody>
<tr>
<td>Service Price</td>
<td><i class="fa fa-rupee"></i> <?php echo $servic->price ?></td>
</tr>
<tr>
<td>GST Charges (<?php echo $servic->IGST ?> %)</td>
<td>Applicable <!--<i class="fa fa-rupee"></i> <?php echo $tax_price = (($servic->price*$servic->IGST)/100); ?>--></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<!--
<td>Total Price</td>
<td><i class="fa fa-rupee"></i> <?php echo $Total_price=( $servic->price+$tax_price ) ?></td>-->
</tr>
</tbody>
</table>
</div>
</div>
</div>

<div class="row">

<div class="col-md-4">
<div class="form-group">
</div>
</div>


<div class="col-md-4">
<?php echo form_open( 'apply-service/'.$this->uri->segment(2) );
$this->session->set_userdata( 'is_service_hit', $this->uri->segment(2) );
?>
<input type="hidden" name="amount" value="<?php echo $Total_price; ?>">
<input type="hidden" name="service_id" value="<?php echo $this->uri->segment(2); ?>">
<input type="hidden" name="service_price" value="<?php echo $servic->price ?>">
<input type="hidden" name="GST_Charges" value="<?php echo $tax_price ?>">
<input type="hidden" name="firstname" value="<?php echo user_detail('user_f_name'); ?>">
<input type="hidden" name="lastname" value="<?php echo user_detail('user_l_name'); ?>">
<input type="hidden" name="email" value="<?php echo user_detail('user_email'); ?>">
<input type="hidden" name="phone" value="<?php echo user_detail('user_phone'); ?>">
<input type="hidden" name="productinfo" value="<?php echo $servic->name; ?>">
<input type="hidden" name="address1" value="<?php echo user_detail('user_address1'); ?>">
<input type="hidden" name="address2" value="<?php echo user_detail('user_address2'); ?>">
<input type="hidden" name="state" value="<?php echo user_detail('user_state'); ?>">
<input type="hidden" name="city" value="<?php echo user_detail('user_city'); ?>">
<input type="hidden" name="country" value="<?php echo user_detail('user_country'); ?>">
<input type="hidden" name="zipcode" value="<?php echo user_detail('user_zip'); ?>">
<input type="hidden" name="action" value="applyservice">
<div class="form-group">
<?php 
if( $this->session->userdata('user_id')=='' && $this->session->userdata('authority')=='customer' ){ ?> 
<button class="btn btn-primary btn-block">Get Service</button>
<?php }else{ ?>
<button class="btn btn-primary btn-block">Get Service</button>
<?php } ?>
</div>
<?php echo form_close(); ?>
</div>

<div class="col-md-4">
<div class="form-group">
</div>
</div>

</div>

</div>
</div>

</div>

</div>
</div>

<section>
<div class="container">
<div class="inner_mid_section">
 <?php if( $servic->image=='' && $servic->video=='' ){ ?> 
<article>
<h3><?php echo $servic->bellow_banner_heading ?></h3>
<p><?php echo $servic->bellow_banner_content ?></p>
</article>
<?php } ?> 
<?php if( $servic->image!='' || $servic->video!='' ){ ?>
<article>
<div class="services_section_pnl">

<div class="col-md-6 <?php if( $servic->video_show_direction=='right' ){ echo "pull-left"; }else{ echo "pull-right"; }?>">

<?php if( $servic->video!='' ){ ?> 

<h3><?php echo $servic->bellow_banner_heading ?></h3>
<p><?php echo $servic->bellow_banner_content ?></p>

<?php } ?>

<?php if( $servic->image!='' ){ ?>

<img style="height:350px" src="<?php echo base_url('assets/uploads/'.$servic->image) ?>">

<?php } ?> 

</div>

<div class="col-md-6 <?php if( $servic->video_show_direction=='right' ){ echo "pull-right"; }else{ echo "pull-left"; }?>">

<?php if( $servic->image!='' ){ ?> 
<h3><?php echo $servic->bellow_banner_heading ?></h3>
<p><?php echo $servic->bellow_banner_content ?></p>
<?php } ?>

<?php if($servic->video!=''){ ?>

<iframe src="https://www.youtube.com/embed/<?php echo $servic->video ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="100%" height="315" frameborder="0"></iframe>

<?php } ?>
</div>

</div>
<div class="clearfix"></div>
</article>

<?php } ?>

<article>
<div class="document_cnt">
<?php echo $servic->service_content ?>    
</div>
</article>

<?php if(count($service_benefits)!=0){ ?>
<article>
<div class="document_cnt">
<h3>Benefits of <?= $servic->name ?></h3>
<ul>
<?php foreach( $service_benefits as $service_benefit ){ ?>
<li>
<h5><?= $service_benefit->heading ?></h5>
<p><?=  $service_benefit->content ?></p>
</li>
<?php } ?>
</ul>
</div>
</article>
<?php } ?>

<?php if(count($service_faqs)!=0){ ?>
<article>
<div class="document_cnt">
<h3>FAQs on <?= $servic->name ?></h3>

<div class="faq_pnl">
<div class="panel-group wrap faq_panel_group" id="accordion" role="tablist" aria-multiselectable="true">
<?php 
$i=1;
foreach( $service_faqs as $service_faq ){ ?>
<div class="panel">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?= $service_faq->id ?>" aria-expanded="true" aria-controls="collapseOne<?= $service_faq->id ?>">
<?= $i; ?>. <?= $service_faq->question ?>
</a>
</h4>
</div>
<div id="collapseOne<?= $service_faq->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<?= $service_faq->answer ?>
</div>
</div>
</div>
<?php $i++; } ?>

</div>
</div>
</div>
</article>
<?php } ?>
<?php if(count($process_durations)!=0){ ?>

<article>
<div class="document_cnt">
<h3><?= $servic->name ?> Process Duration</h3>
<ul>
<?php foreach( $process_durations as $pd ){ ?>
<li>
<h5><?= $pd->heading ?></h5>
<p><?= $pd->content ?></p>
</li>
<?php } ?>
</ul>
</div>
</article>

<?php } ?>

</div>
</div>
</section>
</div>

<?php 
if($servic->compare_with_services!='N;'){
$compare_with_services = unserialize( $servic->compare_with_services );
if( count($compare_with_services)!='' ){ 
?>

<section class="company_price_pnl">
<div class="container">
<div class="table_heading">
<h4>Compare Your Options</h4>
<hr>
</div>
<div class="table-responsive">
<div class="membership-pricing-table">
<table width="100%">
<tbody>
<tr>
<th>
</th>
<th class="plan-header plan-header-free">
<div class="pricing-plan-name"> <?= $this->mdl->service_name_by_id($this->uri->segment(2)); ?> </div>
</th>
<?php
$i=0;
foreach( $compare_with_services as $compare_head ){
?>
<th class="plan-header plan-header-free">
<div class="pricing-plan-name">
<?php 
echo $this->mdl->service_name_by_id($compare_head);
?> </div>
</th>
<?php $i++; } ?>
</tr>
<tr>
<td>
</td>
<td class="action-header">
</td>
<?php
foreach( $compare_with_services as $compare_head ){ 
?>
<td class="action-header">
<a href="<?php echo base_url('service/'.$compare_head) ?>" class="btn btn-info">
Know More
</a>
</td>
<?php  } ?>
</tr>
<?php
$i=0;
$services_compare_points=$this->mdl->services_compare_points();
foreach( $services_compare_points as $compare_head ){
?>
<tr>
<td><?= $compare_head->name ?></td>
<td><?php 
if( isset(unserialize( $servic->services_compare_points )[$i]) ){
	echo unserialize( $servic->services_compare_points )[$i];	
}else{
	echo "-";
}
 ?></td>
<?php
$kk=0;
foreach( $compare_with_services as $service_id ){
$servc = $this->mdl->service_by_id( $service_id , $i );
?>
<td><?php echo $servc ?></td>
<?php $kk++; } ?>
</tr>
<?php $i++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</section>

<?php } ?>
<?php } ?>

<?php include 'include/footer.php'; ?>

<script src="<?= base_url('assets/front/') ?>js/owl.carousel.min.js"> </script>
<script src="<?= base_url('assets/front/') ?>js/common.js"> </script>
<script src="<?= base_url('assets/front/') ?>js/header.js"> </script>
<script src="<?= base_url('assets/front/') ?>js/footer.js"> </script>
<script src="<?= base_url('assets/front/') ?>js/page/home.js"> </script>
</body>
</html>