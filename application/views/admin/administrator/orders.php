<div class="card">

<div class="card-header">

<h3 class="card-title"><?php echo ucwords($this->uri->segment(2)); ?> Orders List</h3>

</div>

<div class="card-body">

<div class="row1">

<div class="col-lg-12">

<table id="table_id" class="table">

<thead>

<tr>

<th >#Order Id</th>
<th >Order Date</th>
<th >Service </th>
<th >Customer </th>
<th >Phone</th>
<th >Price</th>
<th >Tax</th>
<th >Partner</th>
<th >Partner Offer Price</th>
<th >Due Date</th>
<th >Order Status</th>
<th >Customer Payment Status</th>
<?php /*if( $this->uri->segment(2)!='assigned' ){*/ ?><th >Action</th><?php /*}*/ ?>

</tr>

</thead>

<tbody>

<?php
foreach( $orders as $order ) { 
//echo "<pre>";
//print_r($order);
$service = $this->mdl->fetch_row_where('services',[ 'id'=>$order->service_id ]);
?>
<tr>
<td><?=  $order->id; ?></td>
<td><?=  date( 'd/m/Y', strtotime($order->order_date) ); ?></td>
<td><?=  $this->mdl->fetch_by_id( $order->service_id, 'services' )->name; ?>  </td>
<td><?=  $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->customer_id] )->user_f_name .' '. $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->customer_id] )->user_l_name; ?>  </td>
<td><?php if( $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->customer_id] )==false ){ echo "-"; }else{ echo $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->customer_id] )->user_phone; } ?>
</td>
<td><?=  $order->service_price; ?> Rs </td>
<td>
<?php
if( $order->state=='Delhi' ){
echo 'CGST:'.$service->CGST.'%, SGST:'.$service->SGST.'%';
}else{
echo 'IGST:'.$service->IGST.'%';	
}
?>
</td>
<td>

<?php 
if( $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->partner_id] )==false ){ 
echo "-"; 
}else{
echo $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->partner_id] )->user_f_name; 

if( $order-> is_partner_accepted==2 ){
echo "<br><span style='color:red'>( Rejected )</span>";
}
} 
?>

</td>
<td>
<?php 
if( $this->mdl->fetch_row_where( 'users', ['user_id'=>$order->partner_id] )==false ){ 
echo "-"; 
}else{
echo $order->partner_offer_price.'Rs';

if( $order-> is_partner_accepted==2 ){
echo "<br><span style='color:red'>( Rejected )</span>";
}
} 
?>
</td>
<td><?php //echo $order->service_status; ?></td>
<td><?php echo $order->service_status; ?></td>
<td><?php echo $order->customer_payment_status; ?></td>

<?php if( $this->uri->segment(2)!='assigned' ){ ?>
<td style="width: 10%">
<div class="item-action dropdown">
<a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
<button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button></a>
<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">

<a class="dropdown-item" href="<?= base_url( 'orders/admin_order_detail/'.$order->id ) ?>">Order Details</a>

<?php if ( $order->is_partner_accepted==0 || $order->is_partner_accepted==2 ) { ?>
<a class="dropdown-item" href="<?= base_url( 'orders/assign_to_partner/'.$order->id ) ?>">Assign To Partner</a>
<?php } ?>
<?php if ($order-> service_status=='completed' ) { ?>
<a class="dropdown-item" href="<?= base_url( 'orders/paid_to_partner/'.$order->id ) ?>">Paid To Partner </a>
<?php } ?>
<?php if ($order-> service_status=='completed' ) { ?>
<!-- <a class="dropdown-item" href="<?= base_url( 'orders/order_detail/'.$order->id ) ?>">Order Details</a> -->
<?php } ?>
<?php if ($order-> service_status=='completed' ) { ?>
<a class="dropdown-item" href="<?= base_url('orders/upload_final_file/' . $order->id . '/' . $order->service_id) ?>">Final Files Upload</a>
<?php } else { ?>
<a class="dropdown-item" href="<?= base_url('orders/change_payment_status/' . $order->id . '/' . $order->service_id) ?>">Change Payment Status</a>
<?php } ?>

</div>
</div>
</td>
<?php } else { ?>
<td>
<a class="btn btn-primary btn-sm" href="<?php echo base_url('orders/upload_final_file/' . $order->id . '/' . $order->service_id); ?>">Final Files Upload</a>
</td>
</div>

<?php } ?>
</tr>

<?php } ?>

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