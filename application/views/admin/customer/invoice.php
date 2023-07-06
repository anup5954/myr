<?php
$user = $this->mdl->fetch_row_where('users',[ 'user_id'=>$order->customer_id ]);
?>

<div class="col-md-8 offset-2">
<div class="receipt_section">
<table width="100%;" id="printTable">
<tr>
<td colspan="2" style="text-align: center;"><img src="<?= base_url('assets/front/img/logo.png') ?>" style="height:40px;">
</td>
</tr>
<tr>
<td colspan="2" style="text-align: center; font-size:16px; font-weight: bold;">Tax Invoice </td>
</tr>

<tr>
<td colspan="2" style="text-align: center; font-size:14px; font-weight: bold;">Invoice number:
<span><?= $this->uri->segment(3) ?> </span>
</td>
</tr>

<tr>
<td>
<table style="font-size: 14px; margin-top: 50px; margin-bottom: 100px;">
<tr>
<td><strong>Bill To </strong></td>
</tr>

<tr>
<td>Name: <?= $order->customer_firstname ?> <?= $order->customer_lastname ?></td>
</tr>

<tr>
<td>Email: <?= $user->user_email ?></td>
</tr>

<tr>
<td>Business Name: <?php if($order->business_name!=null){ echo $order->business_name; }else{ echo "not updated."; }  ?></td>
</tr>

<tr>
<td>Business Address: <?php if($order->business_address!=null){ echo $order->business_address; }else{ echo "not updated."; }  ?>,&nbsp;  <?php echo $order->area_locality ?></td>
</tr>


<tr>
<td><?= $order->city ?>,&nbsp; <?= $order->state ?>,&nbsp; <?= $order->zipcode ?></td>
</tr>

<tr>
<td>India</td>
</tr>

<tr>
<td>PAN: <span><?php if($order->orderer_PAN!=null){ echo $order->orderer_PAN; }else{ echo "not updated."; }  ?> </span></td>
</tr>
</table>
</td>
<td>
<table style="font-size: 14px; text-align: right; width: 100%;margin-top: 50px; margin-bottom: 100px;">
<tr>
<td><strong>Kathansh India Private Limited </strong></td>
</tr>
<tr>
<td>kathanshindia@gmail.com</td>
</tr>

<tr>
<td>Office:H- 182 creative plaza South Moti Bagh,New Delhi-110021</td>
</tr>

<tr>
<td>Reg office:H-1430 Sangam Vihar,New Delhi-110062 </td>
</tr>

<tr>
<td>India</td>
</tr>

<tr>
<td>GSTIN : <span>07AAGCK6813Q1ZY</span></td>
</tr>

<tr>
<td>PAN: <span>AAGCK6813Q </span></td>
</tr>

<tr>
<td>SAC: 9988</td>
</tr>

</table>
</td>
</tr>
<tr>
<td>
<table style="font-size: 14px; margin-bottom: 50px;">
<tr>
<td><strong>Details </strong></td>
</tr>
<tr>
<td>Invoice Number................ <span><?= $order->id ?></span></td>
</tr>
<tr>
<td>Invoice Date................ <span><?php echo date( 'd-M-Y' ,strtotime($order->order_date) ) ?></span></td>
</tr>
</table>
</td>
<td>
<table style="font-size: 14px; text-align: right; width: 100%; margin-bottom: 50px;">

<tr>
<td style="text-align: left"> <strong>
<?php 
$service=$this->mdl->fetch_row_where('services',[ 'id'=>$order->service_id ]);
echo $service->name;
?> </strong></td>
<td style="text-align: right;"> <strong>₹<?= $order->service_price ?> </strong></td>
</tr>

<?php 
$CGST=0;
$SGST=0;
$IGST=0;
if( $order->state=='Delhi' ){ ?>

<tr>
<td style="text-align: left">CGST (<?= $service->CGST ?>%) </td>
<td style="text-align: right;"> ₹<?php echo $CGST= round(($order->service_price*$service->CGST/100),2) ?></td>
</tr>

<tr>
<td style="text-align: left">SGST (<?= $service->SGST ?>%) </td>
<td style="text-align: right;"> ₹<?php echo $SGST= round(($order->service_price*$service->SGST/100),2) ?></td>
</tr>

<?php }else{ ?>

<tr>
<td style="text-align: left">IGST (<?= $service->IGST ?>%) </td>
<td style="text-align: right;"> ₹<?php echo $IGST= round(($order->service_price*$service->IGST/100),2) ?></td>
</tr>

<?php } ?>

<tr>
<td style="text-align: left">Total in INR</td>
<td style="text-align: right;">₹<?= round(($order->service_price+$SGST+$CGST+$IGST),2) ?></td>
</tr>

</table>
</td>
</tr>
<tr>
<td colspan="2"  style="border-top:1px solid #ddd;">
<p style="margin: 5px; font-size: 14px;">Note: Unless otherwise stated, tax on this invoice is not payable under reverse charge. Supplies under reverse charge are to be mentioned separately.
</p>
</td>
</tr>
</table>
</div>
<div class="clearfix"></div>
<center><button class="btn btn-info">Print Receipt</button></center>
</div>

<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script>