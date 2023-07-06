<div class="card">

<div class="card-header">

<h3 class="card-title">Slider List</h3>

<div class="card-options">

<a href="<?= base_url('sliders/create') ?>" class="btn btn-primary btn-sm float-right">New</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th style="width: 15%">Image</th>
<th style="width: 25%">Caption</th>
<th style="width: 25%">Heading</th>
<th style="width: 15%">Status</th>
<th style="width: 20%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $slides as $slide ) {
?>
<tr>
<td><?= ($slide->image=='') ? 'No Image' : img(['src'=>'assets/uploads/'.$slide->image,'height'=>'50px']); ?></td>
<td><?=  $slide->caption; ?></td>
<td><?=  $slide->heading; ?></td>
<td><?= $slide->status; ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url('sliders/edit/'.$slide->id) ?>">Edit</a>
<?php

if($slide->status=='inactive'){ ?>

<a class="btn btn-success btn-sm" href="<?= base_url('sliders/status/'.$slide->id) ?>">Make Active</a>

<?php }else{ ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('sliders/status/'.$slide->id) ?>">Make Inactive</a>

<?php } ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('sliders/delete/'.$slide->id) ?>">Delete</a>

</td>

</tr>

<?php $i++; } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<!-- Start Listing Post -->

<script>



$(document).ready( function () {

$('#table_id').DataTable();

} );

</script>