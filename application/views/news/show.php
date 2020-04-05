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
							<li><?php echo $_title;?></li>
						</ul>
						<!-- /breadcrumb -->

						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-share">
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
							</div>
							<div class="article-main-img">
								<img src="<?php echo base_url();?>assets/uploads/programs/<?php echo $_image;?>" alt="">
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#"><?php echo $_category;?></a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title"><?php echo $_title;?></h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> <?php echo $_timestamp;?></li>
								</ul>
								<?php echo $_body;?>
							</div>
						</article>
						<!-- /ARTICLE POST -->

						<!-- widget tags -->
						<div class="widget-tags">
							<ul>
							<?php foreach($set_category as $category):?>
								<li><a href="#"><?php echo $category['category_title']?></a></li>
							<?php endforeach;?>
							</ul>
						</div>
						<!-- /widget tags -->

						<!-- article comments -->
						<div class="article-comments">
							<div class="section-title">
								<h2 class="title">Comments</h2>
							</div>

							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img src="<?php echo base_url();?>assets/magnews/img/av-1.jpg" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
									</div>
									<p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec atqui paulo,</p>
									<a href="#" class="reply-btn">Reply</a>
								</div>

							</div>
							<!-- /comment -->
						</div>
						<!-- /article comments -->

						<!-- reply form -->
						<div class="article-reply-form">
							<div class="section-title">
								<h2 class="title">Leave a reply</h2>
							</div>

							<form>
								<input class="input" placeholder="Name" type="text">
								<input class="input" placeholder="Email" type="email">
								<input class="input" placeholder="Website" type="url">
								<textarea class="input" placeholder="Message"></textarea>
								<button class="input-btn">Send Message</button>
							</form>
						</div>
						<!-- /reply form -->
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
		<?php include 'includes/section_related_programs.php';?>
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
