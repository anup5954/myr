<div class="col-md-4">

<section class="blog_sidebar">

<!-- <div class="blog_popular_post">

<h4>Search Popular Post</h4>

<div class="search_section">

<form>

<input type="text" name="" class="form-control" placeholder="Search Popular Post">

<i class="fa fa-search"> </i>

<button class="btn search_btn">Search Post</button>

</form>

</div>

</div> -->

</section>

<section class="blog_sidebar">

<div class="blog_popular_post">

<h4>Popular Articles</h4>

<?php 

foreach($recent_articles as $recent_artical){

?>

<div class="blog_popular_post_text">
<!--
<?php if($recent_artical->image!=''){ ?>

<div class="popular_post_img">

<img src="<?= base_url('assets/uploads/'.$recent_artical->image) ?>">

</div>	

<?php } ?>
-->
<div class="blog_popular_post_cnt">

<p><a href="<?= base_url('article/'.$recent_artical->id) ?>"><?= $recent_artical->title ?> </a></p>

</div>

</div>

<?php } ?>

</div>

</section>

<!--

<section class="blog_sidebar">

<div class="blog_popular_post">

<h4>Popular Tag</h4>

<div class="popular_tag">

<ul>

<li> <a href=""> Travel </a></li>

<li> <a href=""> Activity </a></li>

<li> <a href=""> Thrilling </a></li>

<li> <a href=""> Thrilling </a></li>

</ul>

</div>

</div>

</section>

<section class="blog_sidebar">

<div class="blog_popular_post">

<h4>Recent Comment</h4>

<div class="blog_popular_post_text">

<div class="popular_post_img">

<img src="img/Orlando.jpg">

</div>

<div class="blog_popular_post_cnt">

<p> <a href="">What is Lorem Ipsum? </a></p>

</div>

</div>

<div class="blog_popular_post_text">

<div class="popular_post_img">

<img src="img/Orlando.jpg">

</div>

<div class="blog_popular_post_cnt">

<p> <a href="">What is Lorem Ipsum? </a></p>

</div>

</div>

<div class="blog_popular_post_text">

<div class="popular_post_img">

<img src="img/Orlando.jpg">

</div>

<div class="blog_popular_post_cnt">

<p> <a href="">What is Lorem Ipsum? </a></p>

</div>

</div>

<div class="blog_popular_post_text">

<div class="popular_post_img">

<img src="img/Orlando.jpg">

</div>

<div class="blog_popular_post_cnt">

<p> <a href="">What is Lorem Ipsum? </a></p>

</div>

</div>

</div>

</section>

<section class="blog_sidebar">

<div class="blog_archive_post">

<h4>Blog Archive</h4>

<div id="blogarchive">

<ul id="tree3">

<li><a href="#">2010</a>

<ul>

<li>Jan

<ul>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

</ul>

</li>

<li>Feb

<ul>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

</ul>

</li>

</ul>

</li>

<li>2012

<ul>

<li>Jan

<ul>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

</ul>

</li>

<li>Feb

<ul>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

<li>Employee Maint.</li>

</ul>

</li>

</ul>

</li>

</ul>

</div>

</div>

</section>

-->

</div>