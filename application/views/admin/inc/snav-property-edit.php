<?php if(isset($s_nav_top)){ echo $s_nav_top; } ?>


<ul class="nav nav-tabs">

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='details'){ echo "active"; } ?>" href="<?= base_url('property/details/'.$this->uri->segment(3).''); ?>">Details</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='manage'){ echo "active"; } ?>" href="<?= base_url('property/manage/'.$this->uri->segment(3).''); ?>">Manage</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='pricing'){ echo "active"; } ?>" href="<?= base_url('property/pricing/'.$this->uri->segment(3).''); ?>">Pricing</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='fees'){ echo "active"; } ?>" href="<?= base_url('property/fees/'.$this->uri->segment(3).''); ?>">Fees</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='location'){ echo "active"; } ?>" href="<?= base_url('property/location/'.$this->uri->segment(3).''); ?>">Location</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='images'){ echo "active"; } ?>" href="<?= base_url('property/images/'.$this->uri->segment(3).''); ?>">Images</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($this->uri->segment(2)=='amenties'){ echo "active"; } ?>" href="<?= base_url('property/amenties/'.$this->uri->segment(3).''); ?>">Amenties</a>

</li>

</ul>





<?php if(isset($s_nav_bottom)){ echo $s_nav_bottom; } ?>



