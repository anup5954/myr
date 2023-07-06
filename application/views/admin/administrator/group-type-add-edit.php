<div class="card">

<div class="card-header">

<h3 class="card-title"><?php if($this->uri->segment(2)=='create'){ echo "New"; }else{ echo "Edit"; } ?> Group Type</h3>

<div class="card-options">

<a href="<?= base_url('group_types') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row">

<div class="col-lg-12">
<?php 
if($this->uri->segment(2)=='edit'){
echo form_open_multipart('group_types/update/'.$this->uri->segment(3));
}else{
echo form_open_multipart('group_types/insert');
}
?>

<div class="form-group col-lg-12 col-md-12 col-sm-12">
<label>Group Type Name:</label>
<input type="text" class="form-control" name="name" value="<?php echo $group_type->name ?>" required>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12">
<label>Group:</label>
<select class="form-control" name="group_id">
<option value=""> Select </option>
<?php foreach( $this->mdl->groups() as $group ){ ?>
<option value="<?= $group->id ?>" <?= $group->id==$group_type->group_id ? 'selected' : '' ?>> <?= $group->name ?> </option>
<?php } ?>
</select>
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