<?php include 'include/header.php'; ?>

<link href="<?= base_url('assets/front/') ?>css/page/blog.css" rel="stylesheet">

<!--Start-here-body-section-->

<section class="blog_li_pnl" style="margin-top:100px">

<div class="container">

<div class="row ">

<div class="col-md-8">

<div class="blog_pnl_list" id="pagingBox">  

<?php foreach( $articles as $article ){ //echo print_r($article);?>

<section class="blog_pnl">

<article>

<div class="row">

<?php if($article->image!=''){ ?>

<div class="col-md-5">

<div class="blog_li_img">

<?= img(['src'=>'assets/uploads/'.$article->image]) ?>

</div>

</div>

<?php } ?>

<div class="col-md-<?php if($article->image!=''){ echo 7; }else{ echo 12; }?>">

<div class="blog_content">

<!--<ul class="blog_categories">

<li>Lorem</li>

<li>Lorem</li>

<li>Lorem</li>

</ul>

-->

<h2><?= $article->title ?></h2>

<ul class="blog_post_date">

<li><?= $article->author_name ?></li>

<li><?= date('d/m/Y h:i:s A',$article->published_at) ?></li>

</ul>

<div class="blog_paragraph">

<p><?= $article->short_content ?></p>

<a href="<?= base_url('article/'.$article->id) ?>" class="read_more pull-right">Read More</a>

</div>

</div>

</div>

</div>

</article>

</section>

<?php } ?>

</div>

<div id='page_navigation'>

<nav aria-label="...">

<ul class="pagination">

<?php for($i=1;$i<=$total_article;$i++){ 

if($this->input->get('page')==$i){

?>	

<li class="page-item active">

<a class="page-link" href="<?php base_url('articles?page='.$i) ?>"><?= $i ?> <span class="sr-only">(current)</span></a>

</li>

<?php }else{ ?>

<li class="page-item"><a class="page-link" href="<?= base_url('articles?page='.$i) ?>"><?= $i ?></a></li>		

<?php } } ?>	

</ul>

</nav>

</div>

</div>

<?php include 'include/post-include.php'; ?>

</div>

</div>

</section>

<?php include 'include/footer.php'; ?>

<script src="<?= base_url('assets/front/') ?>js/blog.js"> </script>

</body>

</html>