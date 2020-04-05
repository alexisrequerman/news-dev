<?php
  // support code for 'system role permission of the user' at controllers/Users.php line 69 - 77
  $user0 = "administrator";
  if ($urole == $user0)
  {
    // allows the user to open system preferences
    $sys_role       = site_url('contestants');
    // allows the user to open system preferences
    $sys_users      = site_url('users');
  }
  else
  {
    $sys_role       = 'javascript:void(0);';
    $sys_users      = 'javascript:void(0);';
  }
?>
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
          <i class="fa fa-dashboard text-danger"></i> <span>Dashboard</span>
        </a>
      </li>
    </ul>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">SCORE SHEET</li>
      <li class="<?php echo $side_ssheet;?>">
        <a href="<?php echo site_url('scoresheet');?>">
          <i class="fa fa-circle-o text-aqua"></i> <span>Judge</span>
        </a>
      </li>
      <li class="<?php echo $side_sc;?><?php echo $hide_sidebar;?>">
        <a href="<?php echo site_url('scoresheet/sc_score');?>">
          <i class="fa fa-circle-o text-aqua"></i> <span>Shoppers Vote</span>
        </a>
      </li>
      <li class="<?php echo $side_pv;?><?php echo $hide_sidebar;?>">
        <a href="<?php echo site_url('scoresheet/pv_score');?>">
          <i class="fa fa-circle-o text-aqua"></i> <span>Popularity Votes</span>
        </a>
      </li>
      <li class="<?php echo $side_tabulator;?><?php echo $hide_sidebar;?>">
        <a href="<?php echo site_url('scoresheet/final_score');?>">
          <i class="fa fa-circle-o text-aqua"></i> <span>Final Score</span>
        </a>
      </li>
    </ul>
    <ul class="sidebar-menu<?php echo $hide_sidebar;?>" data-widget="tree">
      <li class="header">SYSTEM PREFERENCES</li>
      <li class="<?php echo $side_contest;?>">
        <a href="<?php echo $sys_role;?>">
          <i class="fa fa-gear text-warning"></i> <span>Contestants</span>
        </a>
      </li>
      <li class="<?php echo $side_users;?>">
        <a href="<?php echo $sys_users;?>">
          <i class="fa fa-gear text-warning"></i> <span>Users</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
