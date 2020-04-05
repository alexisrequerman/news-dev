<header id="header">
  <!-- Top Header -->
  <div id="top-header">
    <div class="container">
      <div class="header-links">
        <ul>
          <li><a href="#">About us</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Advertisement</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="<?php echo site_url('login');?>" target="_blank"><i class="fa fa-sign-in"></i> Login</a></li>
        </ul>
      </div>
      <div class="header-social">
        <ul>
          <li><a href="https://www.facebook.com/cltv36official" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/CLTV36" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="https://www.instagram.com/cltv36official/" target="_blank"><i class="fa fa-instagram"></i></a></li>
          <li><a href="https://www.youtube.com/cltv36official" target="_blank"><i class="fa fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Top Header -->

  <!-- Center Header -->
  <div id="center-header">
    <div class="container">
      <div class="header-logo">
        <a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/media/images/cltv_logo_2020.png" alt="" style="width:112px;height:90px;"></a>
      </div>
      <div class="header-ads">
        <img class="center-block" src="<?php echo base_url();?>assets/media/images/cltv_logo_2020.png" alt="">
      </div>
    </div>
  </div>
  <!-- /Center Header -->

  <!-- Nav Header -->
  <div id="nav-header">
    <div class="container">
      <nav id="main-nav">
        <div class="nav-logo">
          <a href="#" class="logo"><img src="<?php echo base_url();?>assets/media/images/cltv_logo_2020.png" alt="" style="width:50%;"></a>
        </div>
        <ul class="main-nav nav navbar-nav">
          <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
          <?php foreach($set_category as $category):?>
          <li><a href="<?php echo site_url('news/pages?page='); echo $category['category_title'];?>"><?php echo $category['category_title'];?></a></li>
          <?php endforeach;?>
        </ul>
      </nav>
      <div class="button-nav">
        <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
      </div>
    </div>
  </div>
  <!-- /Nav Header -->
</header>
