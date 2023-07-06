<div class="card">

<div class="card-header">

<h3 class="card-title">Services List</h3>

<div class="card-options">

<a href="<?= base_url('services/create') ?>" class="btn btn-primary btn-sm float-right">New</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th>Service Name</th>
<th>Group </th>
<th>Group Type</th>
<th>Status</th>
<th style="width:10%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $services as $group ) {
$group_id=$this->mdl->fetch_group_name_by_id( $group->group_id );
?>
<tr>
<td><?=  $group->name; ?></td>
<td><?=  $this->mdl->fetch_group_name_by_id( $group->group_id ); ?></td>
<td><?php echo ($group_id=='-')?'-':$this->mdl->fetch_group_type_name( $group->group_type_id ); ?></td>
<td><?=  $group->status; ?></td>
<td>

<div class="item-action dropdown">
<a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
<button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button></a>
<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
<a class="dropdown-item" href="<?= base_url('services/edit/'.$group->id) ?>">Edit Service</a>
<a class="dropdown-item" href="<?= base_url('services/faqs/'.$group->id) ?>">Manage Service Faqs</a>
<a class="dropdown-item" href="<?= base_url('services/benefits/'.$group->id) ?>">Manage Service Benefits</a>
<a class="dropdown-item" href="<?= base_url('services/process_durations/'.$group->id) ?>">Manage Process Duration</a>
<?php if($group->status=='inactive'){ ?>
<a class="dropdown-item" href="<?= base_url('services/status/'.$group->id) ?>">Make Service Active</a>
<?php }else{ ?>
<a class="dropdown-item" href="<?= base_url('services/status/'.$group->id) ?>">Make Service Inactive</a>
<?php } ?>
<a class="dropdown-item" href="<?= base_url('services/delete/'.$group->id) ?>">Delete</a>
</div>
</div>

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
$('#table_id').dataTable( {
    "order": [[ 0, 'desc' ]]
} );
} );
</script>
