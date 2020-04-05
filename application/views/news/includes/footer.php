<footer id="footer">
  <!-- Top Footer -->
  <div id="top-footer" class="section">
    <!-- CONTAINER -->
    <div class="container">
      <!-- ROW -->
      <div class="row">
        <!-- Column 1 -->
        <div class="col-md-4">
          <!-- footer about -->
          <div class="footer-widget about-widget">
            <div class="footer-logo">
              <a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/media/images/cltv_logo_2020.png" alt="" style="width:112px;height:90px;"></a>
              <p>Championing Local Pride</p>
            </div>
          </div>
          <!-- /footer about -->

          <!-- footer social -->
          <div class="footer-widget social-widget">
            <div class="widget-title">
              <h3 class="title">Follow Us</h3>
            </div>
            <ul>
              <li><a href="https://www.facebook.com/cltv36official" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/CLTV36" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="google"><i class="fa fa-google"></i></a></li>
              <li><a href="https://www.instagram.com/cltv36official/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://www.youtube.com/cltv36official" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
            </ul>
          </div>
          <!-- /footer social -->
        </div>
        <!-- /Column 1 -->

        <!-- Column 2 -->
        <div class="col-md-4">
          <!-- footer article -->
          <div class="footer-widget">
            <div class="widget-title">
              <h2 class="title">Recent Posts</h2>
            </div>

            <!-- ARTICLE -->
            <?php foreach($set_recent_2 as $post):?>
            <article class="article widget-article">
              <div class="article-img">
                <a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
                  <img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="" style="height:65px;">
                </a>
              </div>
              <div class="article-body">
                <h4 class="article-title">
                  <a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
                    <?php echo substr($post['article_title'], 0, 40);?>...
                  </a>
                </h4>
                <ul class="article-meta">
                  <li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
                </ul>
              </div>
            </article>
            <?php endforeach;?>
            <!-- /ARTICLE -->
          </div>
          <!-- /footer article -->
        </div>
        <!-- /Column 2 -->

        <!-- Column 3 -->
        <div class="col-md-4">
          <!-- footer galery -->
          <div class="footer-widget galery-widget">
            <div class="widget-title">
              <h2 class="title">Posts Photos</h2>
            </div>
            <ul>
              <?php foreach($set_recent_12 as $post):?>
              <li>
                <a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>">
                  <img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="">
                </a>
              </li>
              <?php endforeach;?>
            </ul>
          </div>
          <!-- /footer galery -->
        </div>
        <!-- /Column 3 -->
      </div>
      <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
  </div>
  <!-- /Top Footer -->

  <!-- Bottom Footer -->
  <div id="bottom-footer" class="section">
    <!-- CONTAINER -->
    <div class="container">
      <!-- ROW -->
      <div class="row">
        <!-- footer links -->
        <div class="col-md-6 col-md-push-6">
          <ul class="footer-links">
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Advertisement</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
        </div>
        <!-- /footer links -->

        <!-- footer copyright -->
        <div class="col-md-6 col-md-pull-6">
          <div class="footer-copyright">
            <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="<?php echo base_url();?>" target="_blank">CLTV36</a> Championing Local Pride | <a href="<?php echo base_url('license')?>" target="_blank">MIT License</a>.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
          </div>
        </div>
        <!-- /footer copyright -->
      </div>
      <!-- /ROW -->
    </div>
    <!-- /CONTAINER -->
  </div>
  <!-- /Bottom Footer -->
</footer>
