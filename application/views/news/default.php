<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include 'includes/head.php';?>
  </head>
  <body>

    <!-- Header -->
		<?php include 'includes/header.php';?>
		<!-- /Header -->

		<!-- Owl Carousel 1 -->
		<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
			<!-- ARTICLE -->
      <?php foreach($set_recent as $post):?>
			<article class="article thumb-article">
				<div class="article-img">
					<img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="" style="height:512px;">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#"><?php echo $post['article_category'];?></a></li>
						<li class="article-type"><i class="fa fa-camera"></i></li>
					</ul>
					<h2 class="article-title"><a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>"><?php echo $post['article_title'];?></a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
			</article>
      <?php endforeach;?>
			<!-- /ARTICLE -->
		</div>
		<!-- /Owl Carousel 1 -->

		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- row -->
						<div class="row">
							<!-- section title -->
							<div class="col-md-12">
								<div class="section-title">
									<h2 class="title">Recent Posts</h2>
								</div>
							</div>
							<!-- /section title -->

							<!-- Column 1 -->
              <?php foreach($set_recent_six as $post):?>
							<div class="col-md-4 col-sm-4">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
											<img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="" style="height:240px;">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-camera"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h3 class="article-title">
                      <a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
                        <?php echo substr($post['article_title'], 0, 40);?>...
                      </a>
                    </h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
              <?php endforeach;?>
							<!-- /Column 1 -->
						</div>
						<!-- /row -->
					</div>
					<!-- /Main Column -->

				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->

		<!-- AD SECTION -->
		<div class="visible-lg visible-md">
			<img class="center-block" src="<?php echo base_url();?>assets/magnews/img/ad-3.jpg" alt="">
      <br><br>
		</div>
		<!-- /AD SECTION -->

		<!-- SECTION -->
		<div class="section" style="background-color:#000000;">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">TV Shows</h2>
							<div id="nav-carousel-2" class="custom-owl-nav pull-right"></div>
						</div>
						<!-- /section title -->

						<!-- owl carousel 2 -->
						<div id="owl-carousel-2" class="owl-carousel owl-theme">
							<!-- ARTICLE -->
              <?php foreach($set_program as $program):?>
							<article class="article thumb-article">
								<div class="article-img">
									<img src="<?php echo base_url();?>assets/uploads/programs/<?php echo $program['program_image'];?>" alt="" style="height:240px;">
								</div>
								<div class="article-body">
									<ul class="article-info">
										<li class="article-category"><a href="#"><?php echo $program['program_category'];?></a></li>
										<li class="article-type"><i class="fa fa-video-camera"></i></li>
									</ul>
									<h3 class="article-title"><a href="<?php echo site_url('news/tv_show?show='); echo $program['program_id'];?>"><?php echo $program['program_title'];?></a></h3>
								</div>
							</article>
              <?php endforeach;?>
							<!-- /ARTICLE -->
						</div>
						<!-- /owl carousel 2 -->
					</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">All Posts</h2>
						</div>
						<!-- /section title -->

            <!-- ROW -->
            <div class="row">
              <!-- Main Column -->
              <?php foreach($set_post as $post):?>
              <div class="col-md-6">
                <!-- ARTICLE -->
    						<article class="article row-article">
    							<div class="article-img">
    								<a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
    									<img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="" style="height:200px;">
    								</a>
    							</div>
    							<div class="article-body">
    								<ul class="article-info">
    									<li class="article-category">
                        <a href="#">
                          <?php echo $post['article_category'];?>
                        </a>
                      </li>
    									<li class="article-type">
                        <i class="fa fa-file-text"></i>
                      </li>
    								</ul>
    								<h3 class="article-title">
                      <a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
                        <?php echo substr($post['article_title'], 0, 50);?>...
                      </a>
                    </h3>
    								<ul class="article-meta">
    									<li>
                        <i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?>
                      </li>
    								</ul>
    							</div>
    						</article>
    						<!-- /ARTICLE -->
              </div>
              <?php endforeach;?>
              <!-- /Main Column -->
            </div>
            <!-- /ROW -->

						<!-- pagination -->
            <!--
						<div class="article-pagination">
							<ul>
								<li class="active"><a href="#" class="active">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
            -->
						<!-- /pagination -->
					</div>
					<!-- /Main Column -->

				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
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
