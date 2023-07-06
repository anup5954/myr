<div class="card">
<div class="card-header">
<h3 class="card-title">Consultant List</h3>
<div class="card-options">
<a href="<?= base_url('consultant/create') ?>" class="btn btn-primary btn-sm float-right">New</a>
</div>
</div>
<div class="card-body">
<div class="row1">
<div class="col-lg-12">
<table id="table_id" class="table">
<thead>
<tr>
<th style="width: 10%">Image</th>
<th style="width: 50%">Consultant Name</th>
<th style="width: 11%">Publish Date</th>
<th style="width: 20%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $posts as $post ) { 
?>
<tr>
<td><?= ($post->image=='') ? 'No Image' : img(['src'=>'assets/uploads/'.$post->image,'height'=>'50px']); ?></td>
<td><?= $post->name; ?></td>
<td><?= ($post->published_at)?date('d/m/Y',$post->published_at):'date missing'; ?></td>
<td>
<a class="btn btn-info btn-sm" href="<?= base_url('consultant/edit/'.$post->id) ?>">Edit</a>

<?php
if( $post->status=='inactive' ){ ?>
<a class="btn btn-success btn-sm" href="<?= base_url('consultant/status/'.$post->id) ?>">Make Active</a>
<?php }else{ ?>
<a class="btn btn-danger btn-sm" href="<?= base_url('consultant/status/'.$post->id) ?>">Make Inactive</a>
<?php } ?>

<a class="btn btn-danger btn-sm" href="<?= base_url('consultant/delete/'.$post->id) ?>">Delete</a>
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