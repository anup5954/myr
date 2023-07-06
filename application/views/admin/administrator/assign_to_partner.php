<div class="card">
<div class="card-header">
<h3 class="card-title">Assign Order To Partner:</h3>
<div class="card-options">
<a href="<?= base_url('orders/pending') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
</div>
</div>
<div class="card-body">
<div class="col-md-6 col-xl-4 offset-md-4">
<form class="form-horizontal" action="<?= base_url('orders/assign_to_partner/'.$this->uri->segment(3)) ?>" method="post">

<?php 
$parners=$this->mdl->fetch_all_where('users',['user_authority'=>'partner']);
?> 

<div class="form-group row">
<label class="col-sm-12 col-form-label">Select Partner:</label>
<div class="col-sm-12">
<select class="form-control" name="partner_id">
<option value="">Select</option>
<?php foreach( $parners as $parner ){ ?>
<option value="<?= $parner->user_id ?>"
<?php 
if($parner->user_id==$this->mdl->fetch_row_where( 'orders', [ 'id'=>$this->uri->segment(3) ] )->partner_id){
echo "selected";
}
?>
>#Con<?= $parner->user_id ?> - <?= $parner->user_f_name.' '.$parner->user_l_name ?>  <?php echo !empty($parner->user_city)? '- '. $parner->user_city:'' ?></option>
<?php  } ?>
</select>
</div>
<?php 
$order=$this->mdl->fetch_by_id($this->uri->segment(3),'orders');
?>
<div class="col-sm-12">
<div class="form-group">
<label>Amount Offer (Rs.)</label>
<input type="number" class="form-control" name="partner_offer_price" value="<?= $order->partner_offer_price ?>" >
</div>
</div>

<div class="col-sm-12">
<div class="form-group">
<label>Completion Date</label>
<input type="date" class="form-control" name="completion_date" value="<?= $order->completion_date ?>" >
</div>
</div>
</div>

<button type="submit" class="btn btn-info">Submit</button>
</form> 
</div>

</div>
</div>