<?php include 'include/header.php'; ?>



<div class="container page">

<div class="row">

<div class="col-lg-12 col-md-12" style="text-align:center">
	<div class="content-page-logo">
<a href="<?= base_url() ?>" class="scrollto"><img src="<?= base_url('assets/front/') ?>img/logo.png"></a>
</div>
<h1>Thank You For Registration</h1>

<p>Please check your email for activate your account <strong>(Inbox & Spam)</strong></p>

<a href="<?= base_url(); ?>">Continue to home</a>

</div>

</div>

</div>



<?php include 'include/footer.php'; ?>

<script type="text/javascript">

setTimeout(function() {

$('.alert').delay(1000).fadeOut('slow');

}, 2000);

</script>

</body>

</html>