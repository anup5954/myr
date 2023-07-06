<?php include 'include/header.php'; ?>
<link href="<?= base_url('assets/front/') ?>css/page/companysearch.css" rel="stylesheet">
<!--css link file-->  

<div  class="companysearchpnl d-none">
<div class="companysearchbanner">
<div class="container">
<div class="companysearchbannerflex">
<div class="companysearchbannerbox compansearchfld companysearchpadding">
<div class="companysearchtextbanner"> 
<h1 class="companysearcheading">Name Your Company in a Minute</h1>
<div class="companysearchtext">
<p>Search the entire database on the MCA in a single search. Find out availability of your company, LLP and OPC name right away..</p>

<div class="companysearchfield">
<div class="companysearchrbtn">
<label class="companysearchbtn" >COMPANY/CIN
<input type="radio" checked="checked" name="radio" id="companycin">
<span class="checkmark"></span>
</label>
<label class="companysearchbtn" >DIRECTOR/DIN
<input type="radio" name="radio" id="directodin">
<span class="checkmark"></span>
</label>
<label class="companysearchbtn" >ADDRESS
<input type="radio" name="radio" id="addresscompany">
<span class="checkmark"></span>
</label>
</div>
<div class="wdinput companysearchinput positionrelative" id="companycininput">
<input type="text" name="" placeholder="Enter Company Name or CIN" class="form-control ">
<i class="fa fa-search iconposition"> </i>
</div>  

<div class="wdinput companysearchinput positionrelative hidden" id="companydirectodininput">
<input type="text" name="" placeholder="Enter Director / DIN" class="form-control">
<i class="fa fa-search iconposition"> </i>
</div>  

<div class="wdinput companysearchinput positionrelative hidden" id="companyaddressinput">
<input type="text" name="" placeholder="Enter Companies by Address" class="form-control">
<i class="fa fa-search iconposition"> </i>
</div>    
</div>


</div>
<div class="companyancortag">
<a href="#"> Browse Companies by Activity, Age and Location </a>
</div>
</div>
</div>

<div class="companysearchbannerbox">
<div class="companyregisterfield">
<h2 class="companysearcheading">Register your Company</h2>

<div class="companysearchfields">
<div class="row">
<div class="col-md-6">
<div class="wdinputgroup">
<label class=""> Email Id <span> * </span></label>


<div class="wdinput">
<input type="text" name="" placeholder="Enter your email id" class="form-control">
</div>

</div>
</div>

<div class="col-md-6">
<div class="wdinputgroup form-group">
<label> Mobile Number <span> * </span></label>


<div class="wdinput">
<input type="text" name="" placeholder="Enter your Mobile Number" class="form-control">
</div>

</div>
</div>

<div class="col-md-6">
<div class="wdinputgroup form-group">
<label> Select City <span> * </span></label>


<div class="wdinput positionrelative">
<input type="text" name="" placeholder="Select City" class="form-control">

<div class="iconrightposition">
<i class="fa fa-angle-down"> </i>
</div>
</div>

</div>
</div>

<div class="col-md-6">
<div class="wdinputgroup form-group">
<label> Select Language <span> * </span></label>


<div class="wdinput positionrelative">
<input type="text" name="" placeholder="Select Language" class="form-control">

<div class="iconrightposition">
<i class="fa fa-angle-down"> </i>
</div>
</div>

</div>
</div>

<div class="col-md-6">
<div class="companysearchinr form-group">

<h5> <i class="fa fa-inr"> </i>  249 <span> + Govt Fees </span></h5>
<sup>*limited time period only.</sup>
</div>
</div>

<div class="col-md-6">
<div class="companysearchaddtocart form-group">
<div class="wdinput">
<button type="button" class="btn addtocart"> Add to Cart </button>
</div>
</div>
</div>

<div class="col-md-12 text-center">
<p>Need to speak to an expert? <a href="#" class="ancortag">Get Free Consultation</a> </p>
</div>
</div>
</div>
</div>

<div class="companysearcflextbox">
<div class="companyflextabbox">
<h5> <i class=" fa fa-briefcase"> </i> 400,000+ </h5>

<p>Business Served</p>

</div>

<div class="companyflextabbox">
<h5> <i class=" fa fa-star"> </i> 4.3/5 </h5>

<p>Google Ratings</p>

</div>

<div class="companyflextabbox">
<h5> <i class=" fa fa-smile-o"> </i> EMI </h5>

<p>Easy EMI Options</p>

</div>
</div>
</div>

</div>
</div>
</div>
</div>
<div class="consultant_banner">
<img src="<?= base_url('assets/front/img/banner/consultant_banner.jpg') ?>">
<div class="consultant_widget">
<h1>Your Service Expert in India</h1>
<p>Get instant access to reliable and affordable services</p>

</div>

<div class="companysearchlistpnl">
<div class="container">

<h1 class="companysearcheading text-center">Companies Incorporated in India</h1>
           <h3 align="center"><?php //echo $title; ?></h3><br />  
         
          <table id="user_data" class="display responsive nowrap" style="width:100%">  
                     <thead>  
                          <tr>  
                               <th width="10%">CIN</th>  
                               <th width="35%">Company Name</th>  
                               <th width="35%">RoC</th>  
                               <th width="10%">Status</th>  
                               
                          </tr>  
                     </thead>  
                </table>   

</div>
</div>      

<?php include 'include/footer.php'; ?>

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  -->

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'front/fetch_com'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 </script>  
