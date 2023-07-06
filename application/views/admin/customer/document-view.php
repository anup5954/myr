<center><h2><?= $doc->doc_name ?></h2></center>
<?php 
if( $doc->doc_ext=='.jpg' || $doc->doc_ext=='.jpg' || $doc->doc_ext=='.jpg' || $doc->doc_ext=='.jpg' ){  ?>
<img src="<?= base_url('assets/uploads/'.$doc->doc_url) ?>" alt="img"/>
<?php } ?>

<?php 
if( $doc->doc_ext=='.pdf'){  ?>

 
 <div id="wrapper" style="position: relative;">

<div id="block" style="position: absolute; top: 0; left: 0;  width: 99%; height: 700px"></div>

 <iframe h <iframe height="700px" id="pedash" name="pedash" src="<?= base_url('assets/uploads/'.$doc->doc_url) ?>#toolbar=0" width="100%" scrolling="true"></iframe>

</div>
<?php } ?>
