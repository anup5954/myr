<div class="card">

<div class="card-header">

<h3 class="card-title">Order Received</h3>

</div>

<div class="card-body">

<div class="col-lg-12">

<table id="table_id" class="table">

<thead>

<tr>
<th>#Order Id</th>
<th>Service Name</th>
<th>Offer Price</th>
<th>Customer </th>
<th>Phone</th>
<th>Date</th>
<th>Status</th>

</tr>

</thead>

<tbody>
<?php
$orders=$this->mdl->fetch_all_where('orders',['partner_id'=>$this->session->userdata('user_id'),'service_status'=>'completed']);

foreach( $orders as $order ){
	$customer=$this->mdl->fetch_row_where('users',['user_id'=>$order->customer_id]);
?>
<tr>
<td><?= $order->id ?></td>
<td><?= $this->mdl->fetch_by_id( $order->service_id, 'services' )->name ?></td>
<td><?= $order->partner_offer_price ?> Rs</td>
<td><?= $customer->user_f_name.' '.$customer->user_l_name ?></td>
<td><?= $customer->user_phone ?></td>
<td><?= date('Y-m-d',strtotime($order->order_date)); ?></td>
<td><?= $order->service_status ?></td>

</tr>
<?php } ?>
</tbody>

</table>

</div>

</div>

</div>

<!-- Start Listing Post -->

<script>
$(document).ready( function () {
$('#table_id').DataTable({
	order: [[0, 'desc']]
});
} );
</script>