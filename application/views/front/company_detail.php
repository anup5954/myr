<?php include 'include/header.php'; ?>
<link href="<?php echo base_url('assets/front/') ?>css/page/companysearch.css" rel="stylesheet">

<div  class="companysearchpnl">
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

<div class="companysearchmidsection">
<div class="container">

<div class="row">
<div class="col-lg-4" id="myScrollspy">
<div class="list-group">
<a class="list-group-item list-group-item-action active" href="#overview">Overview</a>
<a class="list-group-item list-group-item-action" href="#basicinformation">Basic Information</a>
<a class="list-group-item list-group-item-action" href="#sharcapital">Share Capital Information</a>
<a class="list-group-item list-group-item-action" href="#annualinformation">Listing And Annual Information</a>
<a class="list-group-item list-group-item-action" href="#chargedetails">Charge Details</a>
<a class="list-group-item list-group-item-action" href="#contactinformation">Contact Information</a>
<a class="list-group-item list-group-item-action" href="#drictors">Directors</a>
</div>
</div>
<div class="col-lg-8 col-md-12">
<div class="searchcompanycontentsec">
<div id="overview" class="py-10">
<h2 class="companysearcheading"><?php echo $company->COMPANY_NAME; ?></h2>
<p><?php echo $company->ACTIVITY_DESCRIPTION; ?></p>
</div>

<div id="basicinformation" class="py-10">
<h2 class="companysearcheading">Basic Information</h2>
<table class="table border companyinformationtbl">
<tr>
<th>CIN</th>
<td> <span> :</span> <?php echo $company->CIN; ?></td>

</tr>

<tr>
<th>Registration Number </th>
<td> <span> :</span><?php echo $company->CIN; ?></td>

</tr>

<tr>
<th>Date of Incorporation</th>
<td> <span> :</span><?php echo $company->DATE_OF_REGISTRATION; ?></td>

</tr>

<tr>
<th>Registered State</th>
<td> <span> :</span><?php echo $company->STATE; ?> </td>

</tr>

<tr>
<th>Registration Of Companies</th>
<td> <span> :</span> <?php echo $company->ROC; ?></td>

</tr>

<tr>
<th>Category</th>
<td> <span> :</span> <?php echo $company->CATEGORY; ?></td>

</tr>

<tr>
<th>Sub Category</th>
<td> <span> :</span> <?php echo $company->COMPANY_TYPE; ?></td>

</tr>

<tr>
<th>Company Class</th>
<td> <span> :</span> <?php echo $company->CLASS; ?></td>

</tr>

<tr>
<th>Company Status</th>
<td> <span> :</span> <?php echo $company->COMPANY_STATUS; ?></td>

</tr>


</table>
</div>

<div id="sharcapital" class="py-10">
<h2 class="companysearcheading">Share Capital Information</h2>

<table class="table border companyinformationtbl">
<tr>
<th>Authorized Capital</th>
<td> <span> :</span> <i class="fa fa-inr"> </i> <?php echo $company->AUTHORIZED_CAPITAL; ?></td>

</tr>

<tr>
<th>Paidup Capital</th>
<td> <span> :</span> <i class="fa fa-inr"></i> <?php echo $company->PAIDUP_CAPITAL; ?> </td>

</tr>

<tr>
<th>Number of Members (Applicable in case of company without Share Capital)</th>
<td> <span> :</span>0</td>

</tr>




</table>
</div>

<div id="annualinformation">
<h2 class="companysearcheading">Listing & Annual Information</h2>
<table class="table border companyinformationtbl">
<tr>
<th>Whether Listed or not</th>
<td> <span> :</span>  Unlisted </td>

</tr>

<tr>
<th>Date of last AGM</th>
<td> <span> :</span> Sep 10, 2019 </td>

</tr>

<tr>
<th>Date of Balance Sheet</th>
<td> <span> :</span> Mar 31, 2019 </td>

</tr>

<tr>
<th>Address other than R/o where all or any books of account and papers are maintained</th>
<td> <span> :</span> -</td>

</tr>

<tr>
<th>Suspended at stock exchange</th>
<td> <span> :</span>   -</td>

</tr>

<tr>
<th>Principal Business Activity</th>
<td> <span> :</span>  Manufacturing (Machinery & Equipments) </td>

</tr>






</table>
</div>

<div id="chargedetails" class="py-10">
<h2 class="companysearcheading">Charge Details</h2>
<p>No charges exists for this company</p>
</div>

<div id="contactinformation" class="py-10">
<h2 class="companysearcheading">Contact Information</h2>
<table class="table border companyinformationtbl">
<tr>
<th>Email Id</th>
<td> <span> :</span><?php echo $company->EMAIL; ?> </td>

</tr>

<tr>
<th>Registered Office Address</th>
<td> <span> :</span> <?php echo $company->REGISTERED_OFFICE_ADDRESS; ?> </td>

</tr>







</table>

<div class="companysearchmap">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31089.033472363582!2d80.18683345901098!3d13.090998260346707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sF-97%2C%20Delhi%20Apartments%20Anna%20Nagar%20East%2C%20chennai%20-600102%2C%20Tamil%20Nadu%2C%20India!5e0!3m2!1sen!2sin!4v1595436719815!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
</div>


<div id="drictors" class="py-10">
<h2 class="companysearcheading">Director Details</h2>


<div class="companyinformationslide">

<div class="owl-carousel owl-theme" id="companyinfoslider">
<div class="item">

<div class="companyinformationsecslid">
<a href="#" class="ancortag">TAKAHIRO TSUBOTA </a>
<table class="table border companyinformationtbl">
<tr>
<th>CIN</th>
<td> <span> :</span>  U34107DL2000PTC108736 </td>

</tr>

<tr>
<th>DIN</th>
<td> <span> :</span> 01104764 </td>

</tr>

<tr>
<th>Present Residential Address</th>
<td> <span> :</span> 3-2-14-501, KOMAOKA, TSURUMI-KU, YOKOHAMA JAPAN 2300071 JP </td>

</tr>


<tr>
<th>Desgination</th>
<td> <span> :</span> Director </td>

</tr>

<tr>
<th>Date of Appoinment</th>
<td> <span> :</span> Jun 23, 2008 </td>

</tr>

<tr>
<th>Whether DSC Registered</th>
<td> <span> :</span> Yes </td>

</tr>

<tr>
<th>Expiry Date of DSC</th>
<td> <span> :</span> Aug 24, 2020 </td>

</tr>







</table>
</div>
</div>
<div class="item">

<div class="companyinformationsecslid">
<a href="#" class="ancortag">TAKAHIRO TSUBOTA </a>
<table class="table border companyinformationtbl">
<tr>
<th>CIN</th>
<td> <span> :</span>  U34107DL2000PTC108736 </td>

</tr>

<tr>
<th>DIN</th>
<td> <span> :</span> 01104764 </td>

</tr>

<tr>
<th>Present Residential Address</th>
<td> <span> :</span> 3-2-14-501, KOMAOKA, TSURUMI-KU, YOKOHAMA JAPAN 2300071 JP </td>

</tr>


<tr>
<th>Desgination</th>
<td> <span> :</span> Director </td>

</tr>

<tr>
<th>Date of Appoinment</th>
<td> <span> :</span> Jun 23, 2008 </td>

</tr>

<tr>
<th>Whether DSC Registered</th>
<td> <span> :</span> Yes </td>

</tr>

<tr>
<th>Expiry Date of DSC</th>
<td> <span> :</span> Aug 24, 2020 </td>

</tr>







</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<?php include 'include/footer.php'; ?>
<!--End-here-body-section-->

<!--js file-->
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/bootstrap/jquery.min.js"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/bootstrap/bootstrap.min.js"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/owl.carousel.min.js"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/common.js"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/header.js"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/footer.js"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/front/'); ?>js/page/companysearch.js"> </script>
<!--js file-->
</body>
</html>



