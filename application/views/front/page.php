<?php include 'include/header.php'; ?>

<div class="container page">

<div class="row">

<?php if( $page->show_priority!='None'){ ?>
<div class="col-lg-5 col-md-12">
	<?php if( $page->image!='' && $page->show_priority=='image'){ ?>
<img src="<?= base_url( 'assets/uploads/'.$page->image ) ?>" alt="thumnail" style="width:35%;float:left;margin:0px 25px 25px 0px;" >
<?php } ?>

<?php if( $page->video!='' && $page->show_priority=='video'){ ?>
<iframe style="width:100%; height:350px;float:left;margin:0px 25px 25px 0px;"  src="https://www.youtube.com/embed/<?= $page->video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php } ?>
</div>
<?php } ?>
<div class="col-lg-<?php if( $page->show_priority!='None'){ echo "7";}else{ echo"12"; }?> col-md-12">
<h2 class="page_heading"><?= $page->title ?></h2>
<div class="page_text">
<p><?= $page->content ?></p>
</div>
</div>

</div>

</div>

<br/>

</div>

<?php include 'include/footer.php'; ?>

</body>

</html>