<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'includes/head.php';?>
  </head>
	<body>

		<!-- Header -->
		<?php include 'includes/header.php';?>
		<!-- /Header -->

		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">

						<!-- breadcrumb -->
						<ul class="article-breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#"><?php echo $_category;?></a></li>
						</ul>
						<!-- /breadcrumb -->

						<!-- ARTICLE POST -->
						<?php foreach($set_post as $post):?>
							<article class="article row-article">
								<div class="article-img">
									<a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
										<img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="">
									</a>
								</div>
								<div class="article-body">
									<ul class="article-info">
										<li class="article-category"><a href="#"><?php echo $post['article_category'];?></a></li>
										<li class="article-type"><i class="fa fa-file-text"></i></li>
									</ul>
									<h3 class="article-title"><a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>"><?php echo substr($post['article_title'], 0, 45);?>...</a></h3>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
									</ul>
									<p><?php echo substr($post['article_title'], 0, 100);?>...</p>
								</div>
							</article>
						<?php endforeach;?>
						<!-- /ARTICLE POST -->
					</div>
					<!-- /Main Column -->

					<!-- Aside Column -->
					<?php include 'includes/sidebar_post.php';?>
					<!-- /Aside Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->

		<!-- AD SECTION -->
		<div class="visible-lg visible-md">
			<img class="center-block" src="<?php echo base_url();?>assets/magnews/img/ad-3.jpg" alt="">
		</div>
		<!-- /AD SECTION -->

		<!-- SECTION -->
		<?php include 'includes/section_related_post.php';?>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<?php include 'includes/footer.php';?>
		<!-- /FOOTER -->

		<!-- Back to top -->
		<div id="back-to-top"></div>
		<!-- Back to top -->

		<!-- jQuery Plugins -->
		<?php include 'includes/script.php';?>

	</body>
</html>
