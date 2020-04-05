<div class="section">
  <!-- CONTAINER -->
  <div class="container">
    <!-- ROW -->
    <div class="row">
      <!-- Main Column -->
      <div class="col-md-12">
        <!-- section title -->
        <div class="section-title">
          <h2 class="title">Recent TV Shows</h2>
        </div>
        <!-- /section title -->

        <!-- row -->
        <div class="row">
          <!-- Column 1 -->
          <?php foreach($set_program_limit as $program):?>
          <div class="col-md-3 col-sm-6">
            <!-- ARTICLE -->
            <article class="article">
              <div class="article-img">
                <a href="<?php echo site_url('news/tv_show?show='); echo $program['program_id'];?>">
                  <img src="<?php echo base_url();?>assets/uploads/programs/<?php echo $program['program_image'];?>" alt="" style="height:200px;">
                </a>
                <ul class="article-info">
                  <li class="article-type"><i class="fa fa-camera"></i></li>
                </ul>
              </div>
              <div class="article-body">
                <h4 class="article-title"><a href="<?php echo site_url('news/tv_show?show='); echo $program['program_id'];?>"><?php echo $program['program_title'];?></a></h4>
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
