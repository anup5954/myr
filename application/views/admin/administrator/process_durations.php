<div class="card">

<div class="card-header">

<h3 class="card-title">Process Durations List of Service - <?php echo $this->mdl->group_types_name_by_id($this->uri->segment(3))->name ?> </h3>

<div class="card-options">

<a href="<?= base_url('process_durations/create/'.$this->uri->segment(3)) ?>" class="btn btn-primary btn-sm">New</a>

<a href="<?= base_url( 'services' ) ?>" class="btn btn-danger btn-sm ml-2"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

</div>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th >Process Name</th>
<th >Status</th>
<th style="width: 20%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $process_durations as $pd ) {
?>
<tr>
<td><?=  $pd->heading; ?></td>
<td><?= $pd->status; ?></td>
<td>
<a class="btn btn-info    btn-sm" href="<?= base_url( 'process_durations/edit/'.$this->uri->segment(3).'/'.$pd->id ) ?>">Edit</a>
<?php if( $pd->status=='inactive' ){ ?>
<a class="btn btn-success btn-sm" href="<?= base_url( 'process_durations/status/'.$this->uri->segment(3).'/'.$pd->id  ) ?>">Make Active</a>
<?php } else { ?>
<a class="btn btn-danger btn-sm" href="<?= base_url( 'process_durations/status/'.$this->uri->segment(3).'/'.$pd->id  ) ?>">Make Inactive</a>
<?php } ?>
<a class="btn btn-danger btn-sm" href="<?= base_url( 'process_durations/delete/'.$this->uri->segment(3).'/'.$pd->id  ) ?>">Delete</a>
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