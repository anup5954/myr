<div class="card">

<div class="card-header">

<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){echo "New";}else{echo "Edit";} ?> Client</h3>

<div class="card-options">

<a href="<?= base_url('clients_views') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row">

<div class="col-lg-12">

<?php if($this->uri->segment(2)=='edit'){

echo form_open_multipart('clients_views/update/'.$this->uri->segment(3));

}else{

echo form_open_multipart('clients_views/insert');

}

?>

<?php if ( $client_view->image!='' ) {?>

<div class="form-group col-lg-12">

<?php echo(img(['src'=>'assets/uploads/'.$client_view->image,'width'=>'200px'])) ?>

</div>

<?php } ?>

<div class="form-group col-lg-12">

<label style="display:block">Upload Photo</label>

<input type="file" name="image">

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Caption:</label>

<input type="text" class="form-control" name="caption" value="<?php echo $client_view->caption ?>" >

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Client Name:</label>

<input type="text" class="form-control" name="client_name" value="<?php echo $client_view->client_name ?>" required>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Company Name:</label>

<input type="text" class="form-control" name="company_name" value="<?php echo $client_view->company_name ?>" required>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Rating:</label>

<select name="rating" class="form-control">
<option value=""> Select </option>
<?php for( $i=1;$i<=5;$i++  ){ ?>
<option value="<?= $i; ?>" <?php if($client_view->rating==$i){ echo "selected"; } ?>><?= $i; ?></option>
<?php } ?>
</select>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Review:</label>

<textarea class="form-control" name="review"><?php echo $client_view->review ?></textarea>

</div>


<div class="form-group col-lg-12 col-md-12 col-sm-12">

<button type="submit" class="btn btn-primary">

<?php if($this->uri->segment(2)=='create'){echo "Submit";}else{echo "Save";} ?>

</button>

</div>

<?= form_close(); ?>

</div>

</div>

</div>

</div>