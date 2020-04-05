<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">
        <!-- section title -->
        <div class="section-title">
          <h2 class="title">Related Post</h2>
        </div>
        <!-- /section title -->

        <!-- row -->
        <div class="row">
          <!-- Column 1 -->
          <?php foreach($set_recent as $post):?>
          <div class="col-md-3 col-sm-6">
            <!-- ARTICLE -->
            <article class="article">
              <div class="article-img">
                <a href="#">
                  <img src="<?php echo base_url();?>assets/uploads/articles/<?php echo $post['article_image'];?>" alt="">
                </a>
                <ul class="article-info">
                  <li class="article-type"><i class="fa fa-camera"></i></li>
                </ul>
              </div>
              <div class="article-body">
                <h4 class="article-title"><a href="<?php echo site_url('news/post?post_id='); echo $post['article_id'];?>"><?php echo substr($post['article_title'], 0, 40);?>...</a></h4>
                <ul class="article-meta">
                  <li><i class="fa fa-clock-o"></i> <?php echo $post['article_date'];?></li>
                  <li><i class="fa fa-comments"></i> 33</li>
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
