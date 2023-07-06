<form method="post" id="import_form" enctype="multipart/form-data">
   <p><label>Select Excel File</label>
   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
   <br />
   <input type="submit" name="import" id='Importbtn' value="Import" class="btn btn-info" />
  </form>


<script>
$(document).ready(function(){

 //load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>excel_import/fetch",
   method:"POST",
   success:function(data){
    $('#customer_data').html(data);
   }
  })
 }

 $('#import_form').on('submit', function(event){
  event.preventDefault();
  
  document.getElementById("Importbtn").value = "File Uploading.....";
  $.ajax({
   url:"<?php echo base_url(); ?>Company_upload/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){  	
    $('#file').val('');
    document.getElementById("Importbtn").value = "Import";
    //load_data();
    //window.location.href="<?php echo base_url('uploads/bhav_copy'); ?>";
    alert(data);
   }
  })
 });

});
</script>