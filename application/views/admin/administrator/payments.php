<div class="card">

<div class="card-header">
<h3 class="card-title">Services Payment</h3>
</div>

<div class="card-body">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th>#OderId</th>
<th>Services Name</th>
<th>Customer Name</th>
<th>Customer Payment</th>
<th>Partner Paid</th>
<th>Customer Payment Status</th>
<th>Partner Paid Status</th>
</tr>
</thead>
<tbody>
<?php 
foreach( $payments as $payment ){
//echo "<pre>";
//print_r($payment);
$service = $this->mdl->fetch_row_where('services',[ 'id'=>$payment->service_id ]);
$customer = $this->mdl->fetch_row_where('users',[ 'user_id'=>$payment->customer_id ]);
$user_f_name = !empty($customer->user_f_name)?$customer->user_f_name:'';
$user_l_name =  !empty($customer->user_l_name)?$customer->user_l_name:'';
?>
<tr>
<td><?= $payment->id ?></td>
<td><?= $service->name ?></td>
<td><?= $user_f_name.' '.$user_l_name ?></td>
<td><?php if( $payment->service_price==0 ){ echo "-"; }else{ echo $payment->service_price.' Rs'; }  ?></td>
<td><?php if( $payment->partner_offer_price==0 ){ echo "-"; }else{ echo $payment->partner_offer_price.' Rs'; } ?></td>
<td><?= $payment->customer_payment_status ?></td>
<td><?= $payment->partner_payment_status ?></td>

<?php } ?>
</tr>
</tbody>
</table>

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