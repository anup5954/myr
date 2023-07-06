<div class="card">
<div class="card-header">
<h3 class="card-title"><?php echo ucwords(str_replace('-',' ',$this->uri->segment(2))); ?> </h3>
<div class="card-options">
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-lg-12">
<?php echo form_open_multipart('pages/update/'.$this->uri->segment(2)); ?>
<?php if ( $page->image!='' ) {?>
<div class="form-group col-lg-12">
<div class="image-area">
<?php echo(img(['src'=>'assets/uploads/'.$page->image,'height'=>'200px'])) ?>
<a class="remove-image" href="#" style="display: inline;">&#215;</a>

</div>
</div>
<?php } ?>

<div class="form-group col-lg-12">
<label style="display:block">Upload Photo</label>
<input type="file" name="image">
</div>

<div class="form-group">
<label class="form-label">Youtube URL</label>
<div class="input-group">

<span class="input-group-prepend" id="basic-addon3">
<span class="input-group-text">https://www.youtube.com/embed/</span>
</span>
<input type="text" name="video" class="form-control" value="<?php echo $page->video ?>">
</div>
</div>

<div class="form-group">
<div class="form-label">Show Priority</div>
<div class="custom-switches-stacked">
<label class="custom-switch">
<input type="radio" name="show_priority" value="image" class="custom-switch-input" <?php if($page->show_priority=='image'){echo "checked";} ?>>
<span class="custom-switch-indicator"></span>
<span class="custom-switch-description">Image </span>
</label>
<label class="custom-switch">
<input type="radio" name="show_priority" value="video" class="custom-switch-input" <?php if($page->show_priority=='video'){echo "checked";} ?>>
<span class="custom-switch-indicator"></span>
<span class="custom-switch-description">Video</span>
</label>

<label class="custom-switch">
<input type="radio" name="show_priority" value="None" class="custom-switch-input" <?php if($page->show_priority=='None'){echo "checked";} ?>>
<span class="custom-switch-indicator"></span>
<span class="custom-switch-description">None</span>
</label>

</div>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">
<label>Title:</label>
<input type="text" class="form-control" name="title" value="<?php echo $page->title ?>" required>
</div>

<div class="form-group col-lg-12 col-md-6 col-sm-12">
<label>Short Content:</label>
<textarea name="short_content" class="form-control" id="PostContentE" ><?php echo $page->short_content ?></textarea>
<script>
CKEDITOR.replace( 'short_content' );
</script>
</div>

<div class="form-group col-lg-12 col-md-6 col-sm-12">
<label>Content:</label>
<textarea name="content" class="form-control" id="PostContentE" ><?php echo $page->content ?></textarea>
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

