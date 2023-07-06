<?php include 'include/header.php'; ?>

<link href="<?= base_url('assets/front/') ?>css/page/blog.css" rel="stylesheet">

<!--Start-here-body-section-->

<section class="blog_li_pnl " style="margin-top:100px">

<div class="container">

<div class="row">

<div class="col-md-8">

<section>

<div class="blog_detail">

<div class="blog_detail_ul clearfix">

<!--

<ul class="blog_categories pull-left">

<li>Lorem</li>

<li>Lorem</li>

<li>Lorem</li>

</ul>

-->

</div>



<h2 class="blog_detail_heading"><?= $article->title ?></h2>

<ul class="blog_post_date pull-right">

<li></li>

<li></li>

</ul>

<div class="blog_detail_ul clearfix">

<ul class="blog_post_date pull-right">

<li><?= $article->author_name ?></li>

<li><?= date('d/m/Y',$article->published_at) ?></li>

</ul>

</div>

<?php if( $article->image!='' ){ ?>

<div class="blog_detail_img">

<img src="<?= base_url('assets/uploads/'.$article->image) ?>">

</div>

<?php } ?>

<?php if( $article->video!='' ){ ?>

<iframe src="https://www.youtube.com/embed/<?= $article->video ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="100%" height="315" frameborder="0"></iframe>

<?php } ?>

<div class="blog_detail_paragraph">

<?= $article->content ?>

</div>

<div class="blog_social_media clearfix">

<ul>

<li>Follow Us :</li>

<li><i class="fa fa-facebook"> </i>

<ul class="social_media_drop_down">

<li><a href="#"> <i class="fa fa-thumbs-up"></i></a></li>

<li><a href="#"> <i class="fa fa-share"></i></a></li>

</ul>

</li>

<li><i class="fa fa-twitter"> </i>

<ul class="social_media_drop_down">

<li><a href="#"> <i class="fa fa-thumbs-up"></i></a></li>

<li><a href="#"> <i class="fa fa-share"></i></a></li>

</ul>

</li>

<li><i class="fa fa-instagram"> </i>

<ul class="social_media_drop_down">

<li><a href="#"> <i class="fa fa-thumbs-up"></i></a></li>

<li><a href="#"> <i class="fa fa-share"></i></a></li>

</ul>

</li> 

<li><i class="fa fa-linkedin"> </i>

<ul class="social_media_drop_down">

<li><a href="#"> <i class="fa fa-thumbs-up"></i></a></li>

<li><a href="#"> <i class="fa fa-share"></i></a></li>

</ul>

</li> 

</ul>

</div>

</div>

<div class="blog_comment">

<div class="row">

<div class="col-md-12">

<div class="reviews_pnl">

<div class="reviews_top_pnl">

<div class="reivews_heading">

<h5 class="fa fa-comments"> Comments</h5>

</div>

<div class="reviews_comment">

<button class="btn" id="addcomment">Add Comment</button>

</div>

</div>

<?php if( $this->session->flashdata('s_msg') || $this->session->flashdata('e_msg') ){ ?>
<div class="alert alert-warning alert-dismissible fade show printmsg sake alert-<?php if( $this->session->flashdata('s_msg')){ echo "success";  }else{ echo("danger"); }?>" role="alert">

<strong><?php if( $this->session->flashdata('s_msg')){ echo '<i class="fa fa-check-circle"></i> Success!';  }else{ echo('<i class="fa fa-exclamation-circle"></i> Error!'); }?></strong>
<?= $this->session->flashdata('s_msg');  ?>

<i class="fa fa-close pull-right" aria-label="Close" data-dismiss="alert"></i>
</div>
<script type="text/javascript">
setTimeout(function() {
$('.printmsg').delay(5000).fadeOut('slow');
}, 2000);
</script>
<?php } ?>


<div class="reviews_comment_input comment_hidden" id="commentbox">
<?php echo form_open('front/add_comment'); ?>
<div class="row">
<div class="col-md-6">
<div class="customer_reply clearfix">

<div class="reviews_input">

<input type="text" class="form-control" name="name" placeholder="Enter your Full Name" required> 
<input type="hidden" name="post_id" value="<?= $this->uri->segment(2) ?>"> 

</div>   

</div>

</div>

<div class="col-md-6">

<div class="customer_reply clearfix">

<div class="reviews_input">

<input type="email" class="form-control" name="email" placeholder="Enter your Email Id" required> 

</div>   

</div>

</div>

<div class="col-md-12">

<div class="customer_reply clearfix">

<div class="reviews_input">

<textarea class="form-control" cols="2" rows="2" name="comment" placeholder="Enter your Comments" required></textarea>

<button class="btn">Submit</button>

</div>   

</div>

</div>

</div>
<?php echo form_close(); ?>
</div>

<div class="row">

<div class="col-md-12">

<div class="product_reviews">
<?php 
foreach( $comments as $comment ){
?>
<div class="row">

<div class="col-md-12">

<div class="reviews_profile">

<div class="customer_name">

<p><?= $comment->name ?></p>

</div>

</div>  

</div>

<div class="col-md-12">
<div class="reviews_performance">
<div class="reviews_date">
<p><?= $comment->published_at ?></p>
</div>

<div class="rewviews_like_dislike">
<ul>
<a href="<?= base_url( 'front/make_like/'.$this->uri->segment(2).'/'.($comment->like_count+1).'/'.$comment->id ) ?>"><li class="fa fa-thumbs-up"> <?= $comment->like_count ?></li></a>
<a href="<?= base_url( 'front/make_dislike/'.$this->uri->segment(2).'/'.($comment->dislike_count+1).'/'.$comment->id ) ?>"><li class="fa fa-thumbs-down"> <?= $comment->dislike_count ?></li></a>
</ul>
</div>
</div>

<div class="product_reviews_text">
<p><?= $comment->comment ?></p>
</div>

<?php 
$replys=$this->mdl->fetch_all_where( 'posts_comments_reply',[ 'comment_id'=>$comment->id ] );
foreach( $replys as $reply ){
?>
<div class="customer_reply clearfix">
<p><span>Reply : </span> <?= $reply->reply ?></p>
</div>
<?php } ?>
<div class="customer_reply clearfix">
<br>
<button class="btn fa fa-reply" data-toggle="collapse" href="#collapseExample<?= $comment->id ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= $comment->id ?>"> Reply</button>
<div class="collapse" id="collapseExample<?= $comment->id ?>">
<?php echo form_open('front/add_comment_reply'); ?>
<br>
<input type="hidden" name="comment_id" value="<?= $comment->id ?>"> 
<input type="hidden" name="post_id" value="<?= $this->uri->segment(2) ?>"> 
<textarea class="form-control" name="reply" cols="2" rows="2"></textarea>
<br>
<button class="btn btn-info">Submit</button>
<?php echo form_close(); ?>
</div>  
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include 'include/post-include.php'; ?>
</div>
</div>
</section>

<?php include 'include/footer.php'; ?>

<script src="<?= base_url('assets/front/') ?>js/blog.js"> </script>

</body>

</html>