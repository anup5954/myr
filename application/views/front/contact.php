<?php include 'include/header.php'; ?>

<link href="<?= base_url('assets/front/css/page/contact_us.css') ?>" rel="stylesheet">

<div class="banner_section">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14014.184989256448!2d77.16602798196952!3d28.583385268993514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sH-182%20Creative%20Plaza%20South%20Moti%20Bagh%20New%20Delhi-110021!5e0!3m2!1sen!2sin!4v1652865161979!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="contact_section">
	<div class="container">
		<div class="row">
		
<div class="col-md-8">

<?php if( $this->session->flashdata('s_msg') || $this->session->flashdata('e_msg') ){ ?>
<div class="alert animated MSg bounceInDown alert-<?php if( $this->session->flashdata('s_msg')){ echo "success";  }else{ echo("danger"); }?>" role="alert">
<strong><?php if( $this->session->flashdata('s_msg')){ echo "Success! ";  }else{ echo("Error! "); }?></strong>
<?= $this->session->flashdata('s_msg');  ?>
<?= $this->session->flashdata('e_msg');  ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>

<div class="contact_form">
<h2 class="page_headding">Contact Form</h2>
<?php echo form_open('contact-us'); ?>
<div class="row">

<div class="col-md-6">
<div class="form-group wd_input_group">
<label>First Name <sub>*</sub></label>
<div class="wd_input">
<input type="text" class="form-control" name="f_name" value="<?= set_value('f_name'); ?>" placeholder="Enter your First Name">
<?= form_error('f_name'); ?>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group wd_input_group">
<label>Last Name <sub>*</sub></label>
<div class="wd_input">
<input type="text" class="form-control" name="l_name" value="<?= set_value('l_name'); ?>" placeholder="Enter your Last Name">
<?= form_error('l_name'); ?>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group wd_input_group">
<label>Email Id <sub>*</sub></label>
<div class="wd_input">
<input type="email" class="form-control" name="email_id" value="<?= set_value('email_id'); ?>" placeholder="Enter your email id">
<?= form_error('email_id'); ?>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group wd_input_group">
<label>Mobile Number <sub>*</sub></label>
<div class="wd_input">
<input type="text" class="form-control" name="mobile_no" value="<?= set_value('mobile_no'); ?>" placeholder="Enter your mobile No">
<?= form_error('mobile_no'); ?>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group wd_input_group">
<label>City<sub>*</sub></label>
<div class="wd_input">
<select class="form-control" name="city" >
<option value="">Select City</option>
<option value="Delhi" <?php echo set_select('city', 'Delhi', TRUE); ?>>Delhi</option>
<option value="Noida" <?php echo set_select('city', 'Noida', TRUE); ?>>Noida</option>
<option value="Gurugram" <?php echo set_select('city', 'Gurugram', TRUE); ?>>Gurugram</option>
</select>
<?= form_error('city'); ?>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group wd_input_group">
<label>Our Services<sub>*</sub></label>
<div class="wd_input">
<select class="form-control" name="service">
<option value="">Select Services</option>
<option value="GST" <?php echo set_select('service', 'GST', TRUE); ?>>GST</option>
<option value="TAX Registration" <?php echo set_select('service', 'TAX Registration', TRUE); ?>>TAX Registration</option>
<option value="Change a Company Name" <?php echo set_select('service', 'Change a Company Name', TRUE); ?>>Change a Company Name</option>
</select>
<?= form_error('service'); ?>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group wd_input_group">
<label>Messages<sub>*</sub></label>
<div class="wd_input">
<textarea class="form-control" name="message" value="<?= set_value('message'); ?>" rows="5"></textarea>
<?= form_error('message'); ?>
</div>
</div>
</div>
<div class="col-md-12">
<div class="wd_input">
<button class="btn submit_btn">Submit</button>
</div>
</div>

</div>
<?php echo form_close(); ?>
</div>
</div>

<div class="col-md-4">
<div class="registered_office">
<h3 class="page_headding">Registred Office</h3>
<ul class="contact_detail">
<li>Corporate Office:- <span> H-182 Creative Plaza South Moti Bagh New Delhi-110021 </span></li>
<li>Registered office:- <span> H-16/1430 Sangam Vihar ND-110062 </span></li>
<li>CIN:  <span>U74900TN2014PTC098414 </span> </li>
<li>Mobile  <span> (+91) 880 008 7676 </span> </li>
<li>Email Id  <span>info@myregistration.in </span> </li>
</ul>
</div>
</div>
			
</div>
</div>
</div>

<?php include 'include/footer.php'; ?>