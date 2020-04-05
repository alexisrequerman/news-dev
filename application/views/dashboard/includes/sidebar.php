<aside class="main-sidebar">
  <section class="sidebar">

    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url();?>assets/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $ufname;?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN</li>
      <li class="<?php echo $side_dashboard;?>">
        <a href="<?php echo site_url('dashboard');?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
    </ul>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">CONTENT</li>
      <li class="<?php echo $side_news;?>">
        <a href="<?php echo site_url('content');?>">
          <i class="fa fa-circle-o"></i> <span>Articles</span>
        </a>
      </li>
      <li class="<?php echo $side_categories;?>">
        <a href="<?php echo site_url('content/categories');?>">
          <i class="fa fa-circle-o"></i> <span>Categories</span>
        </a>
      </li>
      <li class="<?php echo $side_programs;?>">
        <a href="<?php echo site_url('content/programs');?>">
          <i class="fa fa-circle-o"></i> <span>Programs</span>
        </a>
      </li>
    </ul>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li class="<?php echo $side_visits;?>">
        <a href="<?php echo site_url('reports');?>">
          <i class="fa fa-globe"></i> <span>Visitors</span>
        </a>
      </li>
    </ul>

    <ul class="sidebar-menu<?php echo $hide_sidebar;?>" data-widget="tree">
      <li class="header">SYSTEM PREFERENCES</li>
      <li class="<?php echo $side_users;?>">
        <a href="<?php echo site_url('users');?>">
          <i class="fa fa-gear"></i> <span>Users</span>
        </a>
      </li>
    </ul>

  </section>
</aside>
