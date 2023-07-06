<div class="card">
<div class="card-header">
<h3 class="card-title">Upload Documents and Details To Order : #<?= $this->uri->segment(3) ?> </h3>
<div class="card-options">

<a href="<?= base_url('customer/my_services') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-md-8 col-xl-8">
<h4>Update Details</h4>
<?= form_open( 'customer/upload_documents_and_details/'.$this->uri->segment(3) ); ?>
  <div class="form-group">
    <label>Orderer Name</label><?php //print_r($customer); ?>
    <input type="text" class="form-control" name="orderer_name" value="<?= $order->customer_firstname.' '.$order->customer_lastname ?>" >
  </div>
  <div class="form-group">
    <label>PAN</label>
    <input type="text" class="form-control" name="orderer_PAN" value="<?= $order->orderer_PAN ?>" >
  </div>

  <div class="form-group">
    <label>GSTIN</label>
    <input type="text" class="form-control" name="GSTIN" value="<?= $order->GSTIN ?>" >
  </div>
  <div class="form-group">
    <label>Business  Name</label>
    <input type="text" class="form-control" name="business_name" value="<?= $order->business_name ?>" >
  </div>
  <div class="form-group">
    <label>Business  Email</label>
    <input type="email" class="form-control" name="business_email" value="<?= $order->business_email ?>">
  </div>
  <div class="form-group">
    <label>Business  Mobile No</label>
    <input type="number" class="form-control" name="business_mobile_no" value="<?= $order->business_mobile_no ?>">
  </div>
  <div class="form-group">
    <label>Business  Address</label>
    <input type="text" class="form-control" name="business_address" value="<?= $order->business_address ?>">
	<small class="form-text text-muted">Flat / Door / Block / Street*</small>
  </div>
  
  <div class="form-group">
    <label>Area / Locality</label>
    <input type="text" class="form-control" name="area_locality" value="<?= $order->area_locality ?>">
  </div>
<div class="row">  
<div class="col-md-3 col-xl-3">  
<div class="form-group">
<label>State</label>
<select class="form-control" name="state" required="">
<option value="">Select State</option>
<option value="Andaman and Nicobar Islands" <?php if($order->state=='Andaman and Nicobar Islands'){ echo"selected"; } ?> >Andaman and Nicobar Islands</option>
<option value="Andra Pradesh" <?php if($order->state=='Andaman and Nicobar Islands'){ echo"selected"; } ?> >Andra Pradesh</option>
<option value="Arunachal Pradesh" <?php if($order->state=='Andaman and Nicobar Islands'){ echo"selected"; } ?>>Arunachal Pradesh</option>
<option value="Assam" <?php if($order->state=='Assam'){ echo"selected"; } ?>>Assam</option>
<option value="Bihar" <?php if($order->state=='Bihar'){ echo"selected"; } ?>>Bihar</option>
<option value="Chandigarh" <?php if($order->state=='Chandigarh'){ echo"selected"; } ?>>Chandigarh</option>
<option value="Chhattisgarh" <?php if($order->state=='Chhattisgarh'){ echo"selected"; } ?>>Chhattisgarh</option>
<option value="Dadar and Nagar Haveli" <?php if($order->state=='Dadar and Nagar Haveli'){ echo"selected"; } ?>>Dadar and Nagar Haveli</option>
<option value="Daman and Diu" <?php if($order->state=='Daman and Diu'){ echo"selected"; } ?>>Daman and Diu</option>
<option value="Delhi" <?php if($order->state=='Delhi'){ echo"selected"; } ?>>Delhi</option>
<option value="Goa" <?php if($order->state=='Goa'){ echo"selected"; } ?>>Goa</option>
<option value="Gujarat" <?php if($order->state=='Gujarat'){ echo"selected"; } ?>>Gujarat</option>
<option value="Haryana" <?php if($order->state=='Haryana'){ echo"selected"; } ?>>Haryana</option>
<option value="Himachal Pradesh" <?php if($order->state=='Himachal Pradesh'){ echo"selected"; } ?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir" <?php if($order->state=='Jammu and Kashmir'){ echo"selected"; } ?>>Jammu and Kashmir</option>
<option value="Jharkhand" <?php if($order->state=='Jharkhand'){ echo"selected"; } ?>>Jharkhand</option>
<option value="Karnataka" <?php if($order->state=='Karnataka'){ echo"selected"; } ?>>Karnataka</option>
<option value="Kerala" <?php if($order->state=='Kerala'){ echo"selected"; } ?>>Kerala</option>
<option value="Lakshadeep" <?php if($order->state=='Lakshadeep'){ echo"selected"; } ?>>Lakshadeep</option>
<option value="Madhya Pradesh" <?php if($order->state=='Madhya Pradesh'){ echo"selected"; } ?>>Madhya Pradesh</option>
<option value="Maharashtra" <?php if($order->state=='Maharashtra'){ echo"selected"; } ?>>Maharashtra</option>
<option value="Manipur" <?php if($order->state=='Manipur'){ echo"selected"; } ?>>Manipur</option>
<option value="Meghalaya" <?php if($order->state=='Meghalaya'){ echo"selected"; } ?>>Meghalaya</option>
<option value="Mizoram" <?php if($order->state=='Mizoram'){ echo"selected"; } ?>>Mizoram</option>
<option value="Nagaland" <?php if($order->state=='Nagaland'){ echo"selected"; } ?>>Nagaland</option>
<option value="Orissa" <?php if($order->state=='Orissa'){ echo"selected"; } ?>>Orissa</option>
<option value="Pondicherry" <?php if($order->state=='Pondicherry'){ echo"selected"; } ?>>Pondicherry</option>
<option value="Punjab" <?php if($order->state=='Punjab'){ echo"selected"; } ?>>Punjab</option>
<option value="Rajasthan" <?php if($order->state=='Rajasthan'){ echo"selected"; } ?>>Rajasthan</option>
<option value="Sikkim" <?php if($order->state=='Sikkim'){ echo"selected"; } ?>>Sikkim</option>
<option value="Tamil Nadu" <?php if($order->state=='Tamil Nadu'){ echo"selected"; } ?>>Tamil Nadu</option>
<option value="Tripura" <?php if($order->state=='Tripura'){ echo"selected"; } ?>>Tripura</option>
<option value="Uttar Pradesh" <?php if($order->state=='Uttar Pradesh'){ echo"selected"; } ?>>Uttar Pradesh</option>
<option value="Uttaranchal" <?php if($order->state=='Uttaranchal'){ echo"selected"; } ?>>Uttaranchal</option>
<option value="West Bengal" <?php if($order->state=='West Bengal'){ echo"selected"; } ?>>West Bengal</option>
</select>
</div>
    
</div>  

<div class="col-md-3 col-xl-3"> 
<div class="form-group">
<label>City</label>
<input type="text" class="form-control" name="city" value="<?= $order->city ?>">
</div>
</div>

<div class="col-md-3 col-xl-3"> 
<div class="form-group">
<label>Zipcode</label>
<input type="text" class="form-control" name="zipcode" value="<?= $order->zipcode ?>">
</div>
</div>

<div class="col-md-3 col-xl-3">
<div class="form-group">
<label>Type of Business</label>
<select class="form-control" name="type_of_business">
<option value="Proprietor" <?php if($order->type_of_business=='Proprietor'){ echo "selected"; } ?>>Proprietor</option>
<option value="Partnership" <?php if($order->type_of_business=='Partnership'){ echo "selected"; } ?>>Partnership</option>
<option value="Company" <?php if($order->type_of_business=='Company'){ echo "selected"; } ?>>Company</option>
</select>
</div>
</div>

</div>

 

<div class="form-group">
<label>Business Activity</label>
<input type="text" class="form-control" name="business_activity" value="<?= $order->business_activity ?>">
</div>  

<button type="submit" name="action" value="update_details" class="btn btn-primary">Submit</button>
<?= form_close(); ?>

</div>

<div class="col-md-4 col-xl-4">
<div class="form-group row">

<?php

if($service->services_required_documents!='N;'){
echo "<h4>Upload Documents</h4>";
$docs_ids=unserialize($service->services_required_documents);
foreach ( $docs_ids as $key => $id ) {
$doc = $this->mdl->fetch_by_id( $id, 'my_services_required_document_list' );
?>
<?php if(isset($doc->name)){ 
$udoc = $this->mdl->fetch_row_where( 'documents', [ 'doc_name'=>$doc->name, 'order_id'=>$this->uri->segment(3) ] );
?>
<?php echo form_open_multipart('customer/upload_documents_and_details/'.$this->uri->segment(3),['class'=>'form-horizontal','method'=>'post']); ?>

<div class="form-group">
<label class="form-label"><?= $doc->name;  ?></label>
<div class="input-group">
<input type="file" class="form-control" name="doc_url" required="">
<input type="hidden" name="doc_name" value="<?= $doc->name; ?>">
<span class="input-group-append">
<button name="action" value="upload_doc" class="btn btn-primary" >Upload!</button>
</span>
</div>
<?php if( isset($udoc->id) ){ ?>

<!--<a target="_blank" href="<?php  echo base_url('customer/doc_view/'.$udoc->id) ?>" download="<?= $doc->name; ?>">Download File</a>-->

<a target="_blank" href="<?= base_url('assets/uploads/'.$udoc->doc_url) ?>" download="<?= $doc->name; ?>">Download File</a>

<a style="float:right;color:red" href="<?php  echo base_url('customer/doc_delete/'.$udoc->id.'/'.$this->uri->segment(3)) ?>">Delete File</a>

<?php } ?>

</div>

<?php echo form_close(); ?>
<?php } } }?>
</div>
</div>

</div>
</div>
</div>