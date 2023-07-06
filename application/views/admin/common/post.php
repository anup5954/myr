<div class="card">
<div class="card-header">
<h3 class="card-title">Post List</h3>
<div class="card-options">
<a href="<?= base_url( 'blogs/create' ) ?>" class="btn btn-primary btn-sm float-right">New</a>
</div>
</div>
<div class="card-body">
<div class="row1">
<div class="col-lg-12">
<table id="table_id" class="table">
<thead>
<tr>
<th style="width: 10%">Image</th>
<th>id</th>
<th style="width: 45%">Post Title</th>
<th style="width: 15%">Publish Date</th>
<th style="width: 10%">Status</th>
<th style="width: 20%">Action</th>
</tr>
</thead>
<tbody>
<?php
//print_r( $posts );
$i=1;
foreach( $posts as $post ) { 
?>
<tr>
<td><?= ($post->image=='') ? 'No Image' : img(['src'=>'assets/uploads/'.$post->image,'height'=>'50px']); ?></td>
<td><?= $i; ?></td>
<td><?= $post->title; ?></td>
<td><?= ($post->published_at)?date('d/m/Y',$post->published_at):'date missing'; ?></td>
<td><?php if( $post->status==1 ){ echo'Inactive'; }else{ echo'Active'; } ?></td>
<td>

<a class="btn btn-info btn-sm" href="<?= base_url('blogs/edit/'.$post->id) ?>">Edit</a>
<!--<a class="btn btn-danger btn-sm" href="<?= base_url('blogs/delete/'.$post->id) ?>">Delete</a>-->
<?php if( $this->session->userdata('authority')=='administrator' ){?>
<?php if( $post->status==1 ){?>
<a class="btn btn-danger btn-sm" href="<?= base_url('blogs/status/'.$post->id) ?>">Make Deactivate</a>
<?php }else{ ?>
<a class="btn btn-success btn-sm" href="<?= base_url('blogs/status/'.$post->id) ?>">Make Activate</a>
<?php } ?>
<?php } ?>

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
$('#table_id').DataTable({
"order": [[ 1, "desc" ]]	
});
} );
</script>
<style>
table td:nth-child(2){ display:none;}
table th:nth-child(2){ display:none;}
table#fetch_data_table td,th{
text-align :center;
}
</style>