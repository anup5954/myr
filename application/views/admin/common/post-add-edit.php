<div class="card">
<div class="card-header">
<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){echo "New";}else{echo "Edit";} ?> Post</h3>
<div class="card-options">
<a href="<?= base_url('blogs') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-lg-12">
<?php if($this->uri->segment(2)=='edit'){ 
echo form_open_multipart('blogs/update/'.$this->uri->segment(3));
}else{
echo form_open_multipart('blogs/insert');
}
?>
</div>
<?php if ( $post->image!='' ) {?>
<div class="form-group col-lg-12">
<?php echo(img(['src'=>'assets/uploads/'.$post->image,'width'=>'200px'])) ?>
</div>
<?php } ?>

<div class="form-group col-lg-12">
<label style="display:block">Upload Photo</label>
<input type="file" name="image">
</div>
    
<div class="form-group col-lg-6">
<label class="form-label">Your Youtube URL</label>
<div class="input-group">
<span class="input-group-prepend" id="basic-addon3">
<span class="input-group-text">https://www.youtube.com/watch?v=</span>
</span>
<input type="text" class="form-control" name="video" value="<?php echo $post->video ?>">
</div>
</div>

<div class="form-group col-lg-3 col-md-3 col-sm-3">
<label>Published Date:</label>
<input id="publishedDT" type="date" class="form-control" name="published_at" value="<?php echo date('Y-m-d',$post->published_at) ?>">
</div>

<div class="col-lg-9 col-md-9 col-sm-9">
<label>Post Title:</label>
<input type="text" class="form-control" name="title" value="<?php echo $post->title ?>" required>
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
<label>Authors Name:</label>
<input type="text" class="form-control" name="author_name" value="<?php echo $post->author_name ?>">
</div>

<div class="form-group col-lg-12 col-md-6 col-sm-12">
<label>Short Content:</label>
<textarea name="short_content" class="form-control"  ><?php echo $post->short_content ?></textarea>
<script>
CKEDITOR.replace( 'short_content' );
</script>
</div>

<div class="form-group col-lg-12 col-md-6 col-sm-12">
<label>Post Content:</label>
<textarea name="content" class="form-control" id="PostContentE" ><?php echo $post->content ?></textarea>
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


