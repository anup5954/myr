<?php include 'include/header.php'; ?>
</head>
<body>
<!--start here slider-->
<div class="banner_pnl">
<div class="banner_overlay"></div>
<div class="owl-carousel owl-theme" id="homebanner">
<?php foreach( $slides as $slide ){ ?>
<div class="item">
<div class="item_flex"> 
<div class="item_img">
<img src="<?= base_url('assets/uploads/'.$slide->image) ?>" alt="<?= $slide->caption ?>">
</div>
<div class="item_text">
<div class="item_pnl">
<h5><?= $slide->heading ?></h5>
<?= $slide->content ?>
<div class="clearfix"></div>
<br>
<a class="btn btn-info" href="<?php echo base_url('service/'.$slide->service_id) ?>"> GET STARTED</a>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<!--End here slider-->
<!--Start here Register-->
<div class="register_pnl text-center">
<h1>Search Company Fast Services </h1>
<a href="https://myregistration.in/all-companies" class="btn ">Click Now Company Search Result</a> 
<div class="container text-center ">
<div class="row justify-content-center">
<div class="col-12 col-md-10 col-lg-8">
<form class="company_serach_form">
<div class="form_search">
<input class="form-control" type="search" id="company_search" placeholder="Enter your Services">
<i class="fa fa-search search_icon"></i>
</div>

<ul class="fast_company_search">
<?php foreach( $PopularServices as $ps ){ ?>  
<li><a href="<?php echo base_url('service/'.$ps->id); ?>"><?php echo $ps->name; ?> </a> </li>
<?php } ?>
</ul>

</form>
</div>


<!--end of col-->
</div>
<button class="btn d-xl-none d-lg-none d-block mx-auto" id="closesearch"><i class="fa-light fa-xmark"></i></button>
</div>
</div>
<!--End here Register-->

<!--Start-here our servies-->
<section class="our_services_pnl py-5">
<div class="container">
<h2 class="our_servies_heading">Welcome To My Registration</h2>
<div class="our_services_list">
<?php 
foreach( $all_services as $servic  ){
?>
<div class="our_services_icon">
<a href="<?= base_url('service/'.$servic->id) ?>">
<p><?= $servic->name; ?></p>
<button class="btn apply_btn">Apply</button>
</a>
</div>
<?php } ?>
</div>
</div>
</section>  
<!--End-here our servies-->

<!--Start here home page us-->
<section class="home_about_us py-5">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="about_img">
<?php if( $page->image!='' && $page->show_priority=='image'){ ?>
<img src="<?= base_url( 'assets/uploads/'.$page->image ) ?>" alt="thumnail"  >
<?php } ?>

<?php if( $page->video!='' && $page->show_priority=='video'){ ?>
<iframe style="width:100%; height:420px;float:left;margin:0px 25px 25px 0px;"  src="https://www.youtube.com/embed/<?= $page->video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php } ?>
</div>
</div>
<div class="col-md-6">
<div class="home_about_content1">
<h2 class="about_heading about_heading_mb"><?php echo $page->title ?></h2>
<div class="about_text1">
<div class="p_text1">
<p><?php
echo $page->short_content;
 ?> </p>
</div>

<a href="<?= base_url('about') ?>" class="readmore_btn"> Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
</div>
</div>
</div>
</div>
</div>
</section>
<!--End here home about us-->

<!--start here home testimonial-->
<section class="testimonial-pnl py-5">
<div class="container-fluid">

<div class="our_client_views_pnl">
<h4 class="our_client_heading">What your client are saying?</h4>
<div class="our_client_view_section">
<div class="owl-carousel owl-theme" id="clientviews">
<?php foreach( $clientviews as $clientview ){  ?>
<div class="item">
<div class="client_view_content">
 <div class="client_img ">
<?php if($clientview->image==''){ ?>
<img src="<?= base_url('assets/front/') ?>img/client_view/profile_1.png">   
<?php }else{ ?>
<img src="<?= base_url('assets/uploads/'.$clientview->image) ?>">   
<?php } ?>
</div>   

<p><?php echo $clientview->review ?> </p>

<div class="cilent_review">
<ul>
<?php for($i=1;$i<=$clientview->rating;$i++){ ?>
<li><i class="fa fa-star"> </i></li>
<?php } ?>
</ul>
</div>
<h6><?= $clientview->company_name ?></h6>
<h5><?php echo $clientview->client_name ?></h5>
</div>
</div>
<?php } ?>
</div>
</div>
</div>

<div class="col-md-3 d-none">
<div class="query-form">
<h4>Need Help From One Of Our Experts?</h4>
<p>Fill Out the form below and someone from our team will contact you with assistance</p>
<form>
<div class="query_form_search">
<input class="form-control" type="search" placeholder="Enter your name">
<i class="fa fa-user search_icon"></i>
</div>

<div class="query_form_search">
<input class="form-control" type="search" placeholder="Enter your email id">
<i class="fa fa-envelope search_icon"></i>
</div>

<div class="query_form_search">
<input class="form-control" type="search" placeholder="Enter your phone number">
<i class="fa fa-phone search_icon"></i>
</div>

<div class="query_form_search">
<select class="form-control" id="sel1">
<option>Select State</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha(Orissa)">Odisha(Orissa)</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
<i class="fa fa-map-marker search_icon"></i>
</div>

<div class="query_form_search">
<textarea class="form-control" rows="2" id="comment"></textarea>
<i class="fa fa-envelope search_icon"></i>
</div>

<div class="query_form_search">
<button class="btn send_query_btn">Send Query</button>

</div>
</form>
</div>
</div>



<div class="col-md-3 d-none">
<div class="popular_blog_pnl clearfix">
<h4 class="blog_heading">Recent Post</h4>
<?php foreach( $recent_posts as $recent_post ){ ?>
<div class="blog_text clearfix">
<p><?= $recent_post->title ?></p>
<a href="<?= base_url( 'article/'.$recent_post->id ) ?>">Read More <i class="fa fa-angle-double-right"></i></a>
</div>
<?php } ?>
<div class="blo_more_blog">
<a href="<?= base_url('consultants') ?>">More <i class="fa fa-angle-double-right"></i></a>
</div>
</div>
</div>


</div>
</section>
<!--end here home testimonial-->

<!--start here client views-->
<section class="client_pnl_img">
<div class="container">
<div class="our_clients_pnl">
<h2 class="about_heading">Our Valued Clients</h2>
<div class="owl-carousel owl-theme" id="clientimg">
<?php foreach( $clients as $client ){ ?>
<div class="item"><img style="height:50px" src="<?= base_url('assets/uploads/'.$client->image) ?>"></div>
<?php } ?>
</div>
</div>
</div>
</section>
<!--end here client views-->

<section class="subscribe_pnl">
<div class="container">
<div class="subscribe_section">
<?php echo form_open('front/subscribe'); ?>
<i class="fa fa-search"> </i>
<input type="email" name="subscribe_email" class="form-control" placeholder="Enter your Email Id" required>
<button class="btn subscribe_btn" >Subscribe</button>
<?php echo form_close(); ?>
</div>
</div>
</section>


<?php include 'include/footer.php'; ?>
<script src="<?= base_url('assets/front/') ?>js/page/home.js"> </script>

<?php //print_r($allservices); 
foreach( $allservices as $service ){

$servic_data[] = array('label'=>$service->name,'value'=>base_url().'service/'.$service->id);

}

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(document).ready(function() {
var projects = <?php echo json_encode( $servic_data ); ?>;
$("#company_search1").autocomplete({
source: projects,
select: function( event, ui ) { 
window.location.href = ui.item.value;
}
});
});
/*  */
var source = <?php echo json_encode( $servic_data ); ?>; 
$(document).ready(function() {
$("input#company_search").autocomplete({
source: source,
select: function( event, ui ) { 
window.location.href = ui.item.value;
}
});
});          
</script>
<script type="text/javascript">
    $("#searchpopup").click(function(){
        $(".register_pnl").addClass("show");
        $("#mobile-body-overly").show();
    })

    $("#closesearch").click(function(){
        $(".register_pnl").removeClass("show");
        $("#mobile-body-overly").hide();
    })
</script>


</body>
</html>