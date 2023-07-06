<label class="form-label">Home Content</label>
<textarea class="form-control" id="editor">vdfvd</textarea>
<br>
<label class="form-label">Home Slider</label>

<table id="fetch_data_table" class="display nowrap table table-striped table-bordered table-sm" style="width:100%">
<thead class="thead-dark">
<tr>
<th style="width:30%">Slider Image</th>
<th style="width:30%">Slider Caption</th>
<th style="width:10%">Status</th>
<th style="width:20%">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>slider image</td>
<td>Beautiful home has had an extensive</td>
<td>Active</td>
<td>
<div class="item-action dropdown">
<a href="#" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-edit"></i></a>
<div class="dropdown-menu dropdown-menu-left" x-placement="top-end" style="position: absolute; transform: translate3d(15px, -1px, 0px); top: 0px; left: 0px; will-change: transform;">
<a href="#" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Edit </a>
<a href="#" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Make Active </a>
<a href="#" class="dropdown-item"><i class="dropdown-icon fe fe-delete"></i> Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>slider image</td>
<td>Beautiful home has had an extensive</td>
<td>03/09/2016</td>
<td>
<div class="item-action dropdown">
<a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-edit"></i></a>
<div class="dropdown-menu dropdown-menu-left" x-placement="top-end" style="position: absolute; transform: translate3d(15px, -1px, 0px); top: 0px; left: 0px; will-change: transform;">
<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Edit </a>
<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit"></i> Make Active </a>
<a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-delete"></i> Delete</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>
   <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog">
<div class="modal-content">

  <!-- Modal Header -->
  <div class="modal-header">
	<h4 class="modal-title">Modal Heading</h4>
	<button type="button" class="close" data-dismiss="modal"></button>
  </div>

  <!-- Modal body -->
  <div class="modal-body">
	Modal body..
  </div>

  <!-- Modal footer -->
  <div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  </div>

</div>
</div>
</div>


<script>
/* Fetch DataTable */
var fetch_data_table;
$(document).ready(function() {
fetch_data_table = $("#fetch_data_table").DataTable();
});
</script>

<script>
ClassicEditor.create( document.querySelector( '#editor' ) );
</script>
