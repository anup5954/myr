<div class="card">

<div class="card-header">

<h3 class="card-title">Benefits List of Service - <?php echo $this->mdl->group_types_name_by_id($this->uri->segment(3))->name ?> </h3>

<div class="card-options">

<a href="<?= base_url('benefits/create/'.$this->uri->segment(3)) ?>" class="btn btn-primary btn-sm">New</a>

<a href="<?= base_url('services') ?>" class="btn btn-danger btn-sm ml-2"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th >Benefits</th>
<th >Status</th>
<th style="width: 20%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $benefits as $benefit ) {
?>
<tr>
<td><?=  $benefit->heading; ?></td>
<td><?= $benefit->status; ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url( 'benefits/edit/'.$this->uri->segment(3).'/'.$benefit->id ) ?>">Edit</a>

<?php if( $benefit->status=='inactive' ){ ?>

<a class="btn btn-success btn-sm" href="<?= base_url( 'benefits/status/'.$this->uri->segment(3).'/'.$benefit->id ) ?>">Make Active</a>

<?php } else { ?>

<a class="btn btn-danger btn-sm" href="<?= base_url( 'benefits/status/'.$this->uri->segment(3).'/'.$benefit->id ) ?>">Make Inactive</a>

<?php } ?>

<a class="btn btn-danger btn-sm" href="<?= base_url( 'benefits/delete/'.$this->uri->segment(3).'/'.$benefit->id ) ?>">Delete</a>

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