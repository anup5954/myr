<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">

<div class="container">

<div class="row align-items-center">

<div class="col-lg order-lg-first">

<ul class="nav nav-tabs border-0 flex-column flex-lg-row">


<!--
<li class="nav-item">

<a href="<?= base_url('dashboard'); ?>" class="nav-link <?php if($this->uri->segment(1)=='dashboard'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> Home</a>

</li>
-->


<li class="nav-item">

<a href="<?= base_url('customer/my_services'); ?>" class="nav-link 

<?php 

if( $this->uri->segment(2)=='my_services' || $this->uri->segment(2)=='invoice' || $this->uri->segment(2)=='upload_documents_and_details'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> Service Taken</a>

</li>

<li class="nav-item">

<a href="<?= base_url('customer/new_service'); ?>" class="nav-link <?php if($this->uri->segment(2)=='new_service'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> New Service</a>

</li>



</ul>

</div>

</div>

</div>

</div>
<div class="d-xl-none d-lg-none d-block">
<div class="mobile-menue-admin ">
	<a href="<?= base_url('customer/new_service'); ?>" class="nav-link <?php if($this->uri->segment(2)=='new_service'){ echo "active"; } ?>"><i class="fe fe-file-text"></i>  <span>New Service </span> </a>

	<a href="<?= base_url('customer/my_services'); ?>" class="nav-link 

<?php 

if( $this->uri->segment(2)=='my_services' || $this->uri->segment(2)=='invoice' || $this->uri->segment(2)=='upload_documents_and_details'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> <span> Service Taken </span> </a>
</div>
</div>
<?php if(isset($only_main_nav)){ echo $only_main_nav; } ?>

