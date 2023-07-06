<div class="card">

<div class="card-header">

<h3 class="card-title"><?php if( $this->uri->segment(2)=='create' ){echo "New";}else{echo "Edit";} ?> Process Duration</h3>

<div class="card-options">

<a href="<?= base_url('services/process_durations/'.$this->uri->segment(3)) ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row">

<div class="col-lg-12">

<?php if($this->uri->segment(2)=='edit'){
echo form_open_multipart('process_durations/update/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
}else{
echo form_open_multipart('process_durations/insert/'.$this->uri->segment(3));
}
?>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Heading:</label>

<input type="text" class="form-control" name="heading" value="<?php echo $process_duration->heading ?>" required>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Content:</label>

<textarea class="form-control" name="content"> <?php echo $process_duration->content ?> </textarea>

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