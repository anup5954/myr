<div class="card">

<div class="card-header">

<h3 class="card-title">Clients List</h3>

<div class="card-options">

<a href="<?= base_url('clients/create') ?>" class="btn btn-primary btn-sm float-right">New</a>

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
<th style="width: 15%">Status</th>
<th style="width: 20%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $clients as $client ) {
?>
<tr>
<td><?= ($client->image=='') ? 'No Image' : img(['src'=>'assets/uploads/'.$client->image,'height'=>'50px']); ?></td>
<td><?=  $client->caption; ?></td>
<td><?= $client->status; ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url('clients/edit/'.$client->id) ?>">Edit</a>
<?php

if($client->status=='inactive'){ ?>

<a class="btn btn-success btn-sm" href="<?= base_url('clients/status/'.$client->id) ?>">Make Active</a>

<?php }else{ ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('clients/status/'.$client->id) ?>">Make Inactive</a>

<?php } ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('clients/delete/'.$client->id) ?>">Delete</a>

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