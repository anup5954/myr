<div class="card">

<div class="card-header">

<h3 class="card-title">Received Payments</h3>


</div>

<div class="card-body">

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



<tr>

<td></td>

<td></td>

<td>

<a class="btn btn-info btn-sm" href="<?= base_url( 'benefits/edit/'.$this->uri->segment(3) ) ?>">Edit</a>



<?php //if( $benefit->status=='inactive' ){ ?>



<a class="btn btn-success btn-sm" href="<?= base_url( 'benefits/status/'.$this->uri->segment(3) ) ?>">Make Active</a>



<?php //} else { ?>



<a class="btn btn-danger btn-sm" href="<?= base_url( 'benefits/status/'.$this->uri->segment(3) ) ?>">Make Inactive</a>



<?php //} ?>



<a class="btn btn-danger btn-sm" href="<?= base_url( 'benefits/delete/'.$this->uri->segment(3) ) ?>">Delete</a>



</td>



</tr>







</tbody>



</table>



</div>

</div>

</div>

<!-- Start Listing Post -->

<script>
$(document).ready( function () {
$('#table_id').DataTable();
} );
</script>