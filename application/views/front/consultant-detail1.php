<?php include 'include/header.php'; ?>

<link href="<?= base_url('assets/front/css/page/consultant.css') ?>" rel="stylesheet">


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

<div class="consultant_detail">
<div class="container">
	
	<div class="consultant_detail_flex">
<div class="consultant_detail_box_1">

<div class="consltant_img_flex">
<div class="consultant_detail_img">
<?php if( $consultant->image!='' ){ echo img(['src'=>'assets/uploads/'.$consultant->image]); } ?>
</div>
<div class="constultant_li_qualification">
<ul>
<li> <i class="fa fa-user"> </i> <?= $consultant->user_f_name ?> <?= $consultant->user_l_name ?></li>
<li> <i class="fa fa-graduation-cap"> </i> <?= $consultant->user_qualification ?></li>
<li> <i class="fa fa-envelope"> </i> <?= $consultant->user_email ?></li>
<li> <i class="fa fa-phone"> </i> <?= $consultant->user_phone ?></li>
<li> <i class="fa fa-map-marker"> </i> <?= $consultant->user_state ?></li>
</ul>
</div>




</div>

<div class="consultant_detail_text"> 
<p><?= $consultant->user_about_us ?></p>
</div>

<div class="recentarticale">
	<div class="consultant_detail_services article_pnl">
		<h2>Article </h2>
<div class="owl-carousel owl-theme" id="recentconsultant">
    <div class="item clearfix"><h4>A handy Lorem Ipsum Generator that helps to create dummy</h4>
    	<a href="#" class="consultantreadmore"> Read More >> </a>
    </div>
     <div class="item clearfix"><h4>A handy Lorem Ipsum Generator that helps to create dummy</h4>
     	<a href="#" class="consultantreadmore"> Read More >> </a>
     </div>
      <div class="item clearfix"><h4>A handy Lorem Ipsum Generator that helps to create dummy</h4>
      	<a href="#" class="consultantreadmore"> Read More >> </a>
      </div>
       <div class="item clearfix"><h4>A handy Lorem Ipsum Generator that helps to create dummy</h4>
       	<a href="#" class="consultantreadmore"> Read More >> </a>
       </div>
        <div class="item clearfix"><h4>A handy Lorem Ipsum Generator that helps to create dummy</h4>
        	<a href="#" class="consultantreadmore"> Read More >> </a>
        </div>
         <div class="item clearfix"><h4>A handy Lorem Ipsum Generator that helps to create dummy</h4>
         	<a href="#" class="consultantreadmore"> Read More >> </a>
         </div>
</div>
</div>
</div>

</div>
<div class="consultant_detail_box_2">


<div class="consultant_detail_services">
<h2>Contact Us</h2>

<div class="row">
  <div class="col-md-12">
    <div class="form-group wd_input_group">
            <label>Full Name <sub>*</sub></label>
            <div class="wd_input">
              <input type="text" class="form-control" name="" placeholder="Enter your First Name">
            </div>
          </div>
  </div>

  <div class="col-md-12">
    <div class="form-group wd_input_group">
            <label>Email Id <sub>*</sub></label>
            <div class="wd_input">
              <input type="email" class="form-control" name="" placeholder="Enter your Email Id">
            </div>
          </div>
  </div>

  <div class="col-md-12">
    <div class="form-group wd_input_group">
            <label>Phone<sub>*</sub></label>
            <div class="wd_input">
              <input type="number" class="form-control" name="" placeholder="Enter your Phone Number">
            </div>
          </div>
  </div>

  <div class="col-md-12">
    <div class="form-group wd_input_group">
            <label>City<sub>*</sub></label>
            <div class="wd_input">
              <select class="form-control">
                <option>Select City</option>
                <option>Delhi</option>
                <option>Noida</option>
                <option>Gurugram</option>
              </select>
            </div>
          </div>
  </div>

<div class="col-md-12">
  <div class="form-group wd_input_group">
            <label>Our Services<sub>*</sub></label>
            <div class="wd_input">
              <select class="form-control">
                <option>Select Services</option>
                <option>GST</option>
                <option>TAX Registration</option>
                <option>Change a Company Name</option>
              </select>
            </div>
          </div>
        </div>

        <div class="col-md-12">
              <div class="wd_input">
              <button class="btn submit_btn">Submit</button>
            </div>
            </div>

</div>
</div>



<div class="consultant_detail_services">
<h2>Our Services</h2>

<ul class="consulttant_services_list">

<?php 
if( count( unserialize( $consultant->services_provides ) )!=0  && $consultant->services_provides!=null ){
foreach( unserialize( $consultant->services_provides ) as $service ){  
$servic=$this->mdl->fetch_by_id( $service,'services' );
?>

<li> <a href="<?= base_url( 'service/'.$servic->id ) ?>"> <?= $servic->name ?> </a> </li>

<?php } }?>
</ul>
</div>




</div>
</div>
</div>
</div>
</div>

<?php include 'include/footer.php'; ?>