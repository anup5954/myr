<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
<div class="container">
<div class="row align-items-center">
<div class="col-lg order-lg-first">
<ul class="nav nav-tabs border-0 flex-column flex-lg-row">

<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if (in_array($this->uri->segment(1), ['dashboard', 'sliders', 'clients', 'clients_views'])) {
echo "active";
} ?>"><i class="fe fe-box"></i> Home</a>

<div class="dropdown-menu dropdown-menu-arrow">
<a href="<?= base_url('sliders'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'sliders') {
echo "active";
} ?>">Slider</a>
<a href="<?= base_url('clients'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'clients') {
echo "active";
} ?>">Clients</a>
<a href="<?= base_url('clients_views'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'clients_views') {
echo "active";
} ?>"> Client Views</a>
</div>
</li>

<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'page') {
echo "active";
} ?>"><i class="fe fe-box"></i> Pages</a>
<div class="dropdown-menu dropdown-menu-arrow">
<a href="<?= base_url('page'); ?>/about" class="dropdown-item <?php if ($this->uri->segment(2) == 'about') {
echo "active";
} ?>">About</a>
<a href="<?= base_url('page'); ?>/privacy-policy" class="dropdown-item <?php if ($this->uri->segment(2) == 'privacy-policy') {
echo "active";
} ?>">Privacy Policy</a>
<a href="<?= base_url('page'); ?>/refund-policy" class="dropdown-item <?php if ($this->uri->segment(2) == 'refund-policy') {
echo "active";
} ?>">Refund Policy</a>
<a href="<?= base_url('page'); ?>/terms-conditions" class="dropdown-item <?php if ($this->uri->segment(2) == 'terms-conditions') {
echo "active";
} ?>">Terms & Conditions</a>
<a href="<?= base_url('page'); ?>/partner-with-us" class="dropdown-item <?php if ($this->uri->segment(2) == 'partner-with-us') {
echo "active";
} ?>">Partner With Us</a>
<a href="<?= base_url('page'); ?>/professional-services" class="dropdown-item <?php if ($this->uri->segment(2) == 'professional-services') {
echo "active";
} ?>">Professional Services</a>
<a href="<?= base_url('page'); ?>/audit-returns" class="dropdown-item <?php if ($this->uri->segment(2) == 'audit-returns') {
echo "active";
} ?>">Audit & Returns</a>
<a href="<?= base_url('page'); ?>/registration-services" class="dropdown-item <?php if ($this->uri->segment(2) == 'registration-services') {
echo "active";
} ?>">Registration Services</a>
<a href="<?= base_url('page'); ?>/gst" class="dropdown-item <?php if ($this->uri->segment(2) == 'gst') {
echo "active";
} ?>">GST</a>
</div>
</li>

<li class="nav-item">
<a href="<?= base_url('groups'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'groups') {
echo "active";
} ?>"><i class="fe fe-file-text"></i> Groups</a>
</li>

<li class="nav-item">
<a href="<?= base_url('group_types'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'group_types') {
echo "active";
} ?>"><i class="fe fe-file-text"></i> Group Types</a>
</li>

<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'services' || $this->uri->segment(1) == 'services_compare_points' || $this->uri->segment(1) == 'services_required_document_list') {
echo "active";
} ?>"><i class="fe fe-box"></i> Services</a>
<div class="dropdown-menu dropdown-menu-arrow">

<a href="<?= base_url('services'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'services') {
echo "active";
} ?>">Services List</a>

<a href="<?= base_url('services_compare_points/list'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'services_compare_points') {
echo "active";
} ?>">Services Compare Points </a>

<a href="<?= base_url('services_required_document_list/list'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'services_required_document_list') {
echo "active";
} ?>">Services Required Document List </a>


<a href="<?= base_url('services_upload_by_consultant_document/list'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'services_upload_by_consultant_document') {
echo "active";
} ?>">Services - Files Uploaded By Consultant </a>

</div>
</li>

<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'partner' || $this->uri->segment(2) == 'customer') {
echo "active";
} ?>"><i class="fe fe-box"></i> Users</a>

<div class="dropdown-menu dropdown-menu-arrow">

<a href="<?= base_url('users/customer'); ?>" class="dropdown-item <?php if ($this->uri->segment(2) == 'customer') {
echo "active";
} ?>">Customer </a>

<a href="<?= base_url('users/partner'); ?>" class="dropdown-item <?php if ($this->uri->segment(2) == 'partner') {
echo "active";
} ?>">Partners</a>

</div>
</li>


<li class="nav-item">
<a href="<?= base_url('blogs'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'blogs') {
echo "active";
} ?>"><i class="fe fe-file-text"></i> Articles</a>
</li>


<li class="nav-item dropdown">
<a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'orders') {
echo "active";
} ?>"><i class="fe fe-box"></i> Orders</a>
<div class="dropdown-menu dropdown-menu-arrow">

<a href="<?= base_url('orders/pending'); ?>" class="dropdown-item <?php if ($this->uri->segment(2) == 'pending') {
echo "active";
} ?>">Pending Orders</a>

<a href="<?= base_url('orders/assigned'); ?>" class="dropdown-item <?php if ($this->uri->segment(2) == 'assigned') {
echo "active";
} ?>">Assigned Orders</a>

<a href="<?= base_url('orders/completed'); ?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'completed') {
echo "active";
} ?>">Completed Orders</a>

</div>
</li>

<li class="nav-item">
<a href="<?= base_url('payments'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'payments') {
echo "active";
} ?>"><i class="fe fe-file-text"></i> Payments</a>
</li>

<li class="nav-item">
<a href="<?= base_url('company_upload'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'company_upload') {
echo "active";
} ?>"><i class="fe fe-file-text"></i> Company Upload</a>
</li>


</ul>
</div>
</div>
</div>
</div>
<?php if (isset($only_main_nav)) {
echo $only_main_nav;
} ?>