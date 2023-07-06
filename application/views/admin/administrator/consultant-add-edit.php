<div class="card">
<div class="card-header">
<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){echo "New";}else{echo "Edit";} ?> Consultant</h3>
<div class="card-options">
<a href="<?= base_url('consultant/list') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-lg-12">
<?php if($this->uri->segment(2)=='edit'){ 
echo form_open_multipart('consultant/update/'.$this->uri->segment(3));
}else{
echo form_open_multipart('consultant/insert');
}
?>
</div>
<?php if ( $consultant->image!='' ) {?>
<div class="form-group col-lg-12">
<?php echo(img(['src'=>'assets/uploads/'.$consultant->image,'width'=>'200px'])) ?>
</div>
<?php } ?>

<div class="form-group col-lg-12">
<label style="display:block">Upload Photo</label>
<input type="file" name="image">
</div>

<div class="form-group col-lg-3 col-md-3 col-sm-3">
<label>Published Date:</label>
<input id="publishedDT" type="date" class="form-control" name="published_at" value="<?php echo date('Y-m-d',$consultant->published_at) ?>">
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
<label>Name:</label>
<input type="text" class="form-control" name="name" value="<?php echo $consultant->name ?>">
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
<label>Location:</label>
<input type="text" class="form-control" name="location" value="<?php echo $consultant->location ?>">
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
<label>Designation:</label>
<input type="text" class="form-control" name="designation" value="<?php echo $consultant->designation ?>">
</div>

<div class="form-group col-lg-12 col-md-6 col-sm-12">
<label>Details:</label>
<textarea name="details" class="form-control" ><?php echo $consultant->details ?></textarea>
<script>
CKEDITOR.replace( 'details' );
</script>
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


