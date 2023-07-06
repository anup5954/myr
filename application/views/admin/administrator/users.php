<div class="card">
<div class="card-header">
<h3 class="card-title"><?= ucwords($this->uri->segment(2)) ?></h3>
<div class="card-options">

</div>
</div>
<div class="card-body">
<div class="row1">
<div class="col-lg-12">
<table id="table_id" class="table">
<thead>
<tr>
<th>#ID</th>
<th>Name</th>
<th>Email</th>
<th>Location</th>
<th>Password</th>
<th>Contact No</th>
<th>Authority</th>
<th>Reg Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach( $users as $user ) {
    $uiid = '';
    if($user->user_authority == 'partner'){
        $uiid = "#Con";
    } else {
        $uiid = "#Cus";
    }
?>
<tr>
<td><?php echo $uiid; ?><?= $user->user_id ?></td>
<td><?= $user->user_f_name.' '.$user->user_l_name ?></td>
<td><?= $user->user_email ?></td>
<td style="text-align:center;"><?php  if($user->user_city==''){echo "-";}else{ echo $user->user_city; } ?></td>
<td><?= $user->user_password ?></td>
<td><?= $user->user_phone ?></td>
<td><?= $user->user_authority ?></td>
<td><?= date('d-M-Y',strtotime($user->created_at)); ?></td>
<td><?= $user->status ?></td>
<td>
<div class="item-action dropdown">
<a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
<button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button></a>
<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">


<?php if( $user->status=='inactive' ){ ?>
<a class="dropdown-item" href="<?= base_url( 'users/status/'.$this->uri->segment(2).'/'.$user->user_id ) ?>">Make Active</a>

<?php }else{ ?>

<a class="dropdown-item" href="<?= base_url( 'users/status/'.$this->uri->segment(2).'/'.$user->user_id ) ?>">Make Inactive</a>
<?php } ?>

</div>
</div>
</td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
</div>
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





