<div class="col-md-4">
  <!-- Ad widget -->
  <div class="widget center-block hidden-xs">
    <img class="center-block" src="<?php echo base_url();?>assets/magnews/img/ad-1.jpg" alt="">
  </div>
  <!-- /Ad widget -->

  <!-- social widget -->
  <div class="widget social-widget">
    <div class="widget-title">
      <h2 class="title">Stay Connected</h2>
    </div>
    <ul>
      <li><a href="https://www.facebook.com/cltv36official" class="facebook" target="_blank"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
      <li><a href="https://twitter.com/CLTV36" class="twitter" target="_blank"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
      <li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
      <li><a href="https://www.instagram.com/cltv36official/" class="instagram" target="_blank"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
      <li><a href="https://www.youtube.com/cltv36official" class="youtube" target="_blank"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
      <li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
    </ul>
  </div>
  <!-- /social widget -->

  <!-- article widget -->
  <div class="widget">
    <div class="widget-title">
      <h2 class="title">Most Read</h2>
    </div>

    <!-- owl carousel 3 -->
    <div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav">
      <!-- ARTICLE -->
      <?php foreach($set_post as $post):?>
      <article class="article">
        <div class="article-img">
          <a href="#">
            <img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" style="height:198px;" alt="">
          </a>
          <ul class="article-info">
            <li class="article-type"><i class="fa fa-file-text"></i></li>
          </ul>
        </div>
        <div class="article-body">
          <h4 class="article-title"><a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>"><?php echo substr($post['article_title'], 0, 40);?>...</a></h4>
          <ul class="article-meta">
            <li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
          </ul>
        </div>
      </article>
    <?php endforeach;?>
      <!-- /ARTICLE -->
    </div>
    <!-- /owl carousel 3 -->

    <!-- ARTICLE -->
    <?php foreach($set_recent as $post):?>
    <article class="article widget-article">
      <div class="article-img">
        <a href="#">
          <img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="">
        </a>
      </div>
      <div class="article-body">
        <h4 class="article-title"><a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>"><?php echo substr($post['article_title'], 0, 40);?>...</a></h4>
        <ul class="article-meta">
          <li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
        </ul>
      </div>
    </article>
    <?php endforeach;?>
    <!-- /ARTICLE -->
  </div>
  <!-- /article widget -->

  <!-- article widget -->
  <div class="widget">
    <div class="widget-title">
      <h2 class="title">Featured Posts</h2>
    </div>

    <!-- owl carousel 4 -->
    <div id="owl-carousel-4" class="owl-carousel owl-theme">
      <!-- ARTICLE -->
      <?php foreach($set_recent as $post):?>
      <article class="article thumb-article">
        <div class="article-img">
          <img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" style="height:240px;" alt="">
        </div>
        <div class="article-body">
          <ul class="article-info">
            <li class="article-category"><a href="#"><?php echo $post['article_category'];?></a></li>
            <li class="article-type"><i class="fa fa-video-camera"></i></li>
          </ul>
          <h3 class="article-title"><a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>"><?php echo substr($post['article_title'], 0, 40);?>...</a></h3>
          <ul class="article-meta">
            <li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
          </ul>
        </div>
      </article>
      <?php endforeach;?>
      <!-- /ARTICLE -->
    </div>
    <!-- /owl carousel 4 -->
  </div>
  <!-- /article widget -->
</div>
