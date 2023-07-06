<div class="card">

<div class="card-header">

<h3 class="card-title">Group Types List</h3>

<div class="card-options">

<a href="<?= base_url('group_types/create') ?>" class="btn btn-primary btn-sm float-right">New</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th>Group Type</th>
<th>Group</th>
<th>Status</th>
<th style="width:20%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $group_types as $group ) {
?>
<tr>
<td><?=  $group->name; ?></td>
<td><?=  $this->mdl->fetch_group_name_by_id( $group->group_id ); ?></td>
<td><?=  $group->status; ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url('group_types/edit/'.$group->id) ?>">Edit</a>
<?php

if($group->status=='inactive'){ ?>

<a class="btn btn-success btn-sm" href="<?= base_url('group_types/status/'.$group->id) ?>">Make Active</a>

<?php }else{ ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('group_types/status/'.$group->id) ?>">Make Inactive</a>

<?php } ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('group_types/delete/'.$group->id) ?>">Delete</a>

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