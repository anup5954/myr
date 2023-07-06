<form class="card" action="<?= base_url('Profile/update') ?>" enctype="multipart/form-data" method="post">

<div class="card-body">

<h3 class="card-title">Edit Profile</h3>

<div class="row">

<?php if ( user_detail('image')!='' ) { ?>

<div class="form-group col-lg-12">

<?php echo(img(['src'=>'assets/uploads/'.user_detail('image'),'width'=>'200px'])) ?>

</div>

<?php } ?>

<div class="form-group col-lg-12">

<label style="display:block">Upload Photo</label>

<input type="file" name="image">

</div>

<div class="col-sm-4 col-md-3">

<div class="form-group">

<label class="form-label">Email address</label>

<input type="email" class="form-control"  placeholder="Email" readonly name="" value="<?= user_detail('user_email') ?>">

</div>

</div>

<div class="col-sm-4 col-md-3">

<div class="form-group">

<label class="form-label">Password</label>

<input type="text" class="form-control"  placeholder="Password" name="user_password" value="<?= user_detail('user_password') ?>">

</div>

</div>

<div class="col-sm-6 col-md-2">

<div class="form-group">

<label class="form-label">First Name</label>

<input type="text" class="form-control" placeholder="Company" name="user_f_name" value="<?= user_detail('user_f_name') ?>">

</div>

</div>

<div class="col-sm-6 col-md-2">

<div class="form-group">

<label class="form-label">Last Name</label>

<input type="text" class="form-control" placeholder="Last Name" name="user_l_name" value="<?= user_detail('user_l_name') ?>">

</div>

</div>

<div class="col-sm-4 col-md-2">

<div class="form-group">

<label class="form-label">Phone</label>

<input type="text" class="form-control" placeholder="Phone" name="user_phone" value="<?= user_detail('user_phone') ?>">

</div>

</div>

<?php 

if( $this->session->userdata('authority')=='partner' ){

?>

<div class="col-sm-6 col-md-4">

<div class="form-group">

<label class="form-label">Qualification</label>

<select class="form-control" name="user_qualification">

<option value="">Select</option>

<option value="Chartered Accountant" <?php if(user_detail('user_qualification')=='Chartered Accountant'){ echo "selected"; } ?>>Chartered Accountant(CA)</option>

<option value="Cost and Management Accountant" <?php if(user_detail('user_qualification')=='Cost and Management Accountant'){ echo "selected"; } ?>>Cost and Management Accountant(CMA)</option>

<option value="Lawyer" <?php if(user_detail('user_qualification')=='Lawyer'){ echo "selected"; } ?>>Lawyer</option>

<option value="Company Secretary" <?php if(user_detail('user_qualification')=='Company Secretary'){ echo "selected"; } ?>>Company Secretary(CS)</option>

<option value="Accountant" <?php if(user_detail('user_qualification')=='Accountant'){ echo "selected"; } ?>>Accountant</option>

</select>

</div>

</div>

<div class="col-sm-6 col-md-4">

<div class="form-group">

<label class="form-label">Account Number</label>

<input type="text" class="form-control" placeholder="Account Number" name="account_number" value="<?= user_detail('account_number') ?>">

</div>

</div>

<div class="col-sm-6 col-md-4">

<div class="form-group">

<label class="form-label">IFSC Code</label>

<input type="text" class="form-control" placeholder="IFSC Code" name="ifsc_code" value="<?= user_detail('ifsc_code') ?>">

</div>

</div>

<?php } ?>

<div class="col-md-6">

<div class="form-group">

<label class="form-label">Address Line1</label>

<input type="text" class="form-control" placeholder="Address Line1" name="user_address1" value="<?= user_detail('user_address1') ?>">

</div>

</div>

<div class="col-md-6">

<div class="form-group">

<label class="form-label">Address Line 2</label>

<input type="text" class="form-control" placeholder="Address Line2" name="user_address2" value="<?= user_detail('user_address2') ?>">

</div>

</div>

<div class="col-sm-6 col-md-3">

<div class="form-group">

<label class="form-label">Country</label>

<input type="text" class="form-control" placeholder="Country" name="user_country" value="<?= user_detail('user_country') ?>">

</div>

</div>

<div class="col-sm-6 col-md-3">

<div class="form-group">

<label class="form-label">State</label>

<select class="form-control" name="user_state" >
<option value="">------------Select State------------</option>
<option value="Andaman and Nicobar Islands" <?php if(user_detail('user_state')=='Andaman and Nicobar Islands'){ echo "selected"; } ?>>Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh" <?php if(user_detail('user_state')=='Andhra Pradesh'){ echo "selected"; } ?>>Andhra Pradesh</option>
<option value="Arunachal Pradesh" <?php if(user_detail('user_state')=='Arunachal Pradesh'){ echo "selected"; } ?>>Arunachal Pradesh</option>
<option value="Assam" <?php if(user_detail('user_state')=='Assam'){ echo "selected"; } ?>>Assam</option>
<option value="Bihar" <?php if(user_detail('user_state')=='Bihar'){ echo "selected"; } ?>>Bihar</option>
<option value="Chandigarh" <?php if(user_detail('user_state')=='Chandigarh'){ echo "selected"; } ?>>Chandigarh</option>
<option value="Chhattisgarh" <?php if(user_detail('user_state')=='Chhattisgarh'){ echo "selected"; } ?>>Chhattisgarh</option>
<option value="Dadra and Nagar Haveli" <?php if(user_detail('user_state')=='Dadra and Nagar Haveli'){ echo "selected"; } ?>>Dadra and Nagar Haveli</option>
<option value="Daman and Diu" <?php if(user_detail('user_state')=='Daman and Diu'){ echo "selected"; } ?>>Daman and Diu</option>
<option value="Delhi" <?php if(user_detail('user_state')=='Delhi'){ echo "selected"; } ?>>Delhi</option>
<option value="Goa" <?php if(user_detail('user_state')=='Goa'){ echo "selected"; } ?>>Goa</option>
<option value="Gujarat" <?php if(user_detail('user_state')=='Gujarat'){ echo "selected"; } ?>>Gujarat</option>
<option value="Haryana" <?php if(user_detail('user_state')=='Haryana'){ echo "selected"; } ?>>Haryana</option>
<option value="Himachal Pradesh" <?php if(user_detail('user_state')=='Himachal Pradesh'){ echo "selected"; } ?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir" <?php if(user_detail('user_state')=='Jammu and Kashmir'){ echo "selected"; } ?>>Jammu and Kashmir</option>
<option value="Jharkhand" <?php if(user_detail('user_state')=='Jharkhand'){ echo "selected"; } ?>>Jharkhand</option>
<option value="Karnataka" <?php if(user_detail('user_state')=='Karnataka'){ echo "selected"; } ?>>Karnataka</option>
<option value="Kerala" <?php if(user_detail('user_state')=='Kerala'){ echo "selected"; } ?>>Kerala</option>
<option value="Lakshadweep" <?php if(user_detail('user_state')=='Lakshadweep'){ echo "selected"; } ?>>Lakshadweep</option>
<option value="Madhya Pradesh" <?php if(user_detail('user_state')=='Madhya Pradesh'){ echo "selected"; } ?>>Madhya Pradesh</option>
<option value="Maharashtra" <?php if(user_detail('user_state')=='Maharashtra'){ echo "selected"; } ?>>Maharashtra</option>
<option value="Manipur" <?php if(user_detail('user_state')=='Manipur'){ echo "selected"; } ?>>Manipur</option>
<option value="Meghalaya" <?php if(user_detail('user_state')=='Meghalaya'){ echo "selected"; } ?>>Meghalaya</option>
<option value="Mizoram" <?php if(user_detail('user_state')=='Mizoram'){ echo "selected"; } ?>>Mizoram</option>
<option value="Nagaland" <?php if(user_detail('user_state')=='Nagaland'){ echo "selected"; } ?>>Nagaland</option>
<option value="Orissa" <?php if(user_detail('user_state')=='Orissa'){ echo "selected"; } ?>>Orissa</option>
<option value="Pondicherry" <?php if(user_detail('user_state')=='Pondicherry'){ echo "selected"; } ?>>Pondicherry</option>
<option value="Punjab" <?php if(user_detail('user_state')=='Punjab'){ echo "selected"; } ?>>Punjab</option>
<option value="Rajasthan" <?php if(user_detail('user_state')=='Rajasthan'){ echo "selected"; } ?>>Rajasthan</option>
<option value="Sikkim" <?php if(user_detail('user_state')=='Sikkim'){ echo "selected"; } ?>>Sikkim</option>
<option value="Tamil Nadu" <?php if(user_detail('user_state')=='Tamil Nadu'){ echo "selected"; } ?>>Tamil Nadu</option>
<option value="Tripura" <?php if(user_detail('user_state')=='Tripura'){ echo "selected"; } ?>>Tripura</option>
<option value="Uttaranchal" <?php if(user_detail('user_state')=='Uttaranchal'){ echo "selected"; } ?>>Uttaranchal</option>
<option value="Uttar Pradesh" <?php if(user_detail('user_state')=='Uttar Pradesh'){ echo "selected"; } ?>>Uttar Pradesh</option>
<option value="West Bengal" <?php if(user_detail('user_state')=='West Bengal'){ echo "selected"; } ?>>West Bengal</option>
</select>
</div>

</div>

<div class="col-sm-6 col-md-3">

<div class="form-group">

<label class="form-label">City</label>

<input type="text" class="form-control" placeholder="City" name="user_city" value="<?= user_detail('user_city') ?>">

</div>

</div>

<div class="col-sm-6 col-md-3">

<div class="form-group">

<label class="form-label">Postal Code</label>

<input type="number" class="form-control" placeholder="ZIP Code" name="user_zip" value="<?= user_detail('user_zip') ?>">

</div>

</div>

<div class="col-md-12">

<div class="form-group">
<label class="form-label">Services Provides</label>
<select class="js-example-basic-multiple form-control" name="services_provides[]" multiple="multiple">
<?php foreach ( $services as  $service ) { ?>
<option value="<?= $service->id ?>"
<?php 
if( user_detail('services_provides')!='N;' && user_detail('services_provides')!=''  ){
if( in_array( $service->id, unserialize( user_detail('services_provides') ) )){ echo "selected"; }else{ echo ""; }
}
?>
><?= $service->name ?>
</option>
<?php } ?>
</select>
</div>

</div>

<div class="col-md-12">
<div class="form-group mb-0">
<label class="form-label"><div class="form-group">

<input type="text" class="form-control" placeholder="Write about heading" name="user_bio_heading" value="<?= user_detail('user_bio_heading') ?>">

</div></label>
<textarea rows="5" class="form-control" placeholder="Here can be your description" name="user_about_us"><?= user_detail('user_about_us') ?></textarea>
<script>
CKEDITOR.replace( 'user_about_us' );
</script>
</div>
</div>

</div>
</div>

<div class="card-footer text-right">
<button type="submit" class="btn btn-primary">Update Profile</button>
</div>
</form>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
 $('.js-example-basic-multiple').select2();
});
</script>