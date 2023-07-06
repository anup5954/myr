<div class="card">



<div class="card-header">

<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){echo "New";}else{echo "Edit";} ?> Client</h3>

<div class="card-options">

<a href="<?= base_url('clients') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>



<div class="card-body">

<div class="row">

<div class="col-lg-12">

<?php if($this->uri->segment(2)=='edit'){

echo form_open_multipart('clients/update/'.$this->uri->segment(3));

}else{

echo form_open_multipart('clients/insert');

}

?>

<?php if ( $client->image!='' ) {?>

<div class="form-group col-lg-12">

<?php echo(img(['src'=>'assets/uploads/'.$client->image,'width'=>'200px'])) ?>

</div>

<?php } ?>



<div class="form-group col-lg-12">

<label style="display:block">Upload Photo</label>

<input type="file" name="image">

</div>



<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Caption:</label>

<input type="text" class="form-control" name="caption" value="<?php echo $client->caption ?>" required>

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