<div class="card">

<div class="card-header">

<h3 class="card-title">Services Compare Points List </h3>

<div class="card-options">

<a href="<?= base_url('services_compare_points/create/'.$this->uri->segment(3)) ?>" class="btn btn-primary btn-sm">New</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th>Services Compare Points</th>
<th style="width: 15%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $services_compare_points as $scp ) {
?>
<tr>
<td><?= $scp->name; ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url( 'services_compare_points/edit/'.$scp->id ) ?>">Edit</a>

<a class="btn btn-danger btn-sm" href="<?= base_url( 'services_compare_points/delete/'.$scp->id ) ?>">Delete</a>

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