<?php 
$order=$this->mdl->fetch_by_id($this->uri->segment(3),'orders');
?>
<div class="card">
<div class="card-header">
<h3 class="card-title">Paid To Partner For Order : #<?= $order->id ?> </h3>
<div class="card-options">
<a href="<?= base_url('orders/completed') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
</div>
</div>
<div class="card-body">
<div class="col-md-6 col-xl-4 offset-md-4">
<form class="form-horizontal" action="<?= base_url('orders/paid_to_partner/'.$this->uri->segment(3)) ?>" method="post">

<div class="form-group row">

<div class="col-sm-12">
<div class="form-group">
<label>Amount Offer (Rs.)</label>
<input type="number" class="form-control" name="" value="<?= $order->partner_offer_price ?>" readonly>
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
<label>Amount Paid to Partner(Rs.)</label>
<input type="number" class="form-control" name="amount_paid" value="" >
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
<label>Description</label>
<input type="text" class="form-control" name="description" value="" >
</div>
</div>
</div>

<button type="submit" class="btn btn-info">Pay</button>
</form> 
</div>

</div>
</div>