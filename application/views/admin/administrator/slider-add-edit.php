<div class="card">

<div class="card-header">

<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){echo "New";}else{echo "Edit";} ?> Slide</h3>

<div class="card-options">

<a href="<?= base_url('sliders') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row">

<div class="col-lg-12">

<?php if($this->uri->segment(2)=='edit'){

echo form_open_multipart('sliders/update/'.$this->uri->segment(3));

}else{

echo form_open_multipart('sliders/insert');

}

?>

<?php if ( $slide->image!='' ) { ?>

<div class="form-group col-lg-12">

<?php echo(img(['src'=>'assets/uploads/'.$slide->image,'width'=>'200px'])) ?>

</div>

<?php } ?>

<div class="form-group col-lg-12">

<label style="display:block">Upload Photo</label>

<input type="file" name="image">

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Caption:</label>

<input type="text" class="form-control" name="caption" value="<?php echo $slide->caption ?>" required>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Heading:</label>

<input type="text" class="form-control" name="heading" value="<?php echo $slide->heading ?>" required>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12"" >
<label class="form-label">Related To Services</label>
<select class="form-control custom-select" name="service_id">
<option value="" >Selected</option>
<?php 
$services=$this->mdl->fetch_all('services');
foreach( $services as $service ) { 
?>
<option value="<?= $service->id ?>" <?php if($service->id==$slide->service_id){ echo "selected"; } ?>><?= $service->name ?></option>
<?php } ?>
</select>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">
<label>Content:</label>
<textarea class="form-control" id="contentID" name="content"><?php echo $slide->content ?></textarea>
<script>
CKEDITOR.replace( 'content' );
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

</div>



