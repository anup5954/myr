<div class="card">

<div class="card-header">

<h3 class="card-title">Clients Views List</h3>

<div class="card-options">

<a href="<?= base_url('clients_views/create') ?>" class="btn btn-primary btn-sm float-right">New</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th>Image</th>
<th>Client Name</th>
<th>Company Name</th>
<th>Rating</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $clients_views as $client ) { 
?>
<tr>
<td><?= ($client->image=='') ? 'No Image' : img(['src'=>'assets/uploads/'.$client->image,'height'=>'50px']); ?></td>
<td><?=  $client->client_name; ?></td>
<td><?=  $client->company_name; ?></td>
<td><?php
for($i=1;$i<=$client->rating;$i++)
{echo '*'; }
?></td>
<td><?php if($client->status=='0'){ echo 'active'; }else{ echo 'inactive';  } ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url('clients_views/edit/'.$client->id) ?>">Edit</a>
<?php

if($client->status=='0'){ ?>

<a class="btn btn-success btn-sm" href="<?= base_url('clients_views/status/'.$client->id) ?>">Make Active</a>

<?php }else{ ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('clients_views/status/'.$client->id) ?>">Make Inactive</a>

<?php } ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('clients_views/delete/'.$client->id) ?>">Delete</a>

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