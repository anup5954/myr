<div class="card">

<div class="card-header">
<h3 class="card-title">New Service</h3>
</div>

<div class="card-body">

<div class="col-lg-12">

<table id="table_id" class="table">
<thead>
<tr>
<th>#ID</th>
<th>Service Name</th>
<th>Service Payment</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach ($services as $service) { ?>
<tr>
<td><?= $service->id ?></td>
<td><?= $service->name ?></td>
<td><?= $service->price ?> Rs</td>
<td>
<a class="btn btn-info btn-sm" target="_blank" href="<?= base_url('service/'.$service->id) ?>">Buy</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>

<script>
$(document).ready(function () {
    $('#table_id').DataTable({
        order: [[0, 'desc']],
    });
});
</script>
</script>