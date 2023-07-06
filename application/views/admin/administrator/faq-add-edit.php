<div class="card">

<div class="card-header">

<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){echo "New";}else{echo "Edit";} ?> Faq</h3>

<div class="card-options">

<a href="<?= base_url('services/faqs/'.$this->uri->segment(3)) ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row">

<div class="col-lg-12">

<?php if($this->uri->segment(2)=='edit'){

echo form_open_multipart('faqs/update/'.$this->uri->segment(3).'/'.$this->uri->segment(4));

}else{

echo form_open_multipart('faqs/insert/'.$this->uri->segment(3));

}

?>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Question:</label>

<input type="text" class="form-control" name="question" value="<?php echo $faq->question ?>" required>

</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">

<label>Answer:</label>

<textarea class="form-control" name="answer"> <?php echo $faq->answer ?> </textarea>

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