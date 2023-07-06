<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
<div class="container">
<div class="row align-items-center">
<div class="col-lg order-lg-first">
<ul class="nav nav-tabs border-0 flex-column flex-lg-row">
<!--
<li class="nav-item">
<a href="<?= base_url('dashboard'); ?>" class="nav-link <?php if($this->uri->segment(1)=='dashboard'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> Home</a>
</li>-->

<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if( in_array($this->uri->segment(2),['new_orders','complete_orders']) ){ echo "active"; } ?>" ><i class="fe fe-box"></i>  Order Received</a>
<div class="dropdown-menu dropdown-menu-arrow">

<a href="<?= base_url('partner/new_orders'); ?>" class="dropdown-item <?php if( $this->uri->segment(2)=='new_orders' ){ echo "active"; } ?>">New Orders</a>

<a href="<?= base_url('partner/complete_orders'); ?>" class="dropdown-item <?php if( $this->uri->segment(2)=='complete_orders' ){ echo "active"; } ?>">Complete Orders</a>

</div>
</li>

<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if( in_array($this->uri->segment(2),['received_payments','pending_payments']) ){ echo "active"; } ?>" ><i class="fe fe-box"></i> Payments</a>
<div class="dropdown-menu dropdown-menu-arrow">

<a href="<?= base_url('partner/received_payments'); ?>" class="dropdown-item <?php if($this->uri->segment(2)=='received_payments'){ echo "active"; } ?>">Received Payments</a>

<a href="<?= base_url('partner/pending_payments'); ?>" class="dropdown-item <?php if($this->uri->segment(2)=='pending_payments'){ echo "active"; } ?>">Pending Payments</a>

</div>
</li>

<li class="nav-item">
<a href="<?= base_url('blogs'); ?>" class="nav-link <?php if($this->uri->segment(1)=='blogs'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> Articles</a>
</li>

<li class="nav-item">
<a href="<?= base_url('ongoing-work'); ?>" class="nav-link <?php if($this->uri->segment(1)=='ongoing-work'){ echo "active"; } ?>"><i class="fe fe-file-text"></i> OnGoing Work</a>
</li>

</ul>
</div>
</div>
</div>
</div>

<?php if(isset($only_main_nav)){ echo $only_main_nav; } ?>
