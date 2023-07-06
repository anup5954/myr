<?php include 'include/header.php'; ?>
<?php //print_r($_POST);	 ?>
<style type="text/css">
	.patmentstatus{margin: 150px 0px;}
	.flexpnl{display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 30px;
    background-color: #ddd;
    max-width: 450px;
    margin: auto;
    -webkit-box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.75);
}
	.successfulpayment p {margin-bottom: 0px; font-size: 14px;}
	.successfulpayment i {color:#07ab07; font-size: 20px;}
	.succsesfultext{font-size: 25px!important; font-weight: bold;color:#07ab07;}
	.cancelpayment p {margin-bottom: 0px; font-size: 14px;}
	.cancelpayment i {color:#d74338; font-size: 20px;}
	.canceltext{font-size: 25px!important; font-weight: bold;color:#d74338;}
	.paymentnotify p {margin-bottom: 0px; font-size: 14px;}
	.paymentnotify i {color:#eabf11; font-size: 20px;}
	.paymentnotifytext{font-size: 25px!important; font-weight: bold;color:#eabf11;}
	.button1 {  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;} /* Green */
</style>
<div class="patmentstatus">

<div class="container">

<?php if( $_POST['status']=='success' ){ ?>	

<div class="flexpnl">
<div class="successfulpayment">
    <i class="fa fa-check"></i>
    <p class="succsesfultext">Successful Payment <i class="fa fa-smile-o"> </i> </p>
    <p>Your Payment was successful</p>
    <p>Thank you for your payment. We will be in contact with more details shortly</p>
</div>
</div>
 
<div style="text-align:center;margin-top:25px">
<a class="btn btn-outline-primary btn-lg"  href="<?php echo base_url('customer/upload_documents_and_details/'.$order_id.''); ?>" >Go to service </a>
</div>

<?php }if( $_POST['status']=='failure' ){ ?>

<div class="flexpnl">
<div class="cancelpayment">
    <i class="fa fa-close"> </i>
    <p class="canceltext">Cancel Payment <i class="fa fa-frown-o"> </i> </p>
     <p>Your Payment was processed unsuccessful  </p>
	
	 <a  href="<?php echo base_url(); ?>" >Go to home </a>

	 
</div>
</div>

<?php 
}if( $_POST['status']=='1failure' ){
?>

<div class="flexpnl">
<div class="paymentnotify">
<i class="fa fa-exclamation-triangle"></i>
<p class="paymentnotifytext">Notify Payment</p>
</div>
</div>

<?php } ?>

</div>
</div>
<?php include 'include/footer.php'; ?>
<?php if( $_POST['status']=='success' ){ ?>	
<script>
$(document).ready(function() {
   window.setTimeout(function(){window.location.href = "https://www.myregistration.in/customer/upload_documents_and_details/<?php echo $order_id; ?>"},5000);
});
</script>
<?php } ?>
</body>
</html>