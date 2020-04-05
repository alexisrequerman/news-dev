<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<!-- HEADER FILES -->
<?php include 'includes/head.php';?>
<style>
  table.dataTable tbody td {
    vertical-align: middle;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- HEAD MENUBAR -->
  <?php include 'includes/header.php';?>
  <!-- SIDE MENUBAR -->
  <?php include 'includes/sidebar.php'?>
  <!-- PAGE BODY -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        CLTV36 CONTENT MANAGEMENT SYSTEM
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <!-- Control Buttons -->
      <div class="row">
        <div class="col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="#" class="small-box-footer">
              New Post <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="fa  fa-file-text-o"></i>
            </div>
            <a href="#" class="small-box-footer">
              New Category <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>Programs</p>
            </div>
            <div class="icon">
              <i class="fa fa-television"></i>
            </div>
            <a href="#" class="small-box-footer">
              New Program <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $my_ip;?></h3>
              <p>Your IP Address</p>
            </div>
            <div class="icon">
              <i class="fa fa-globe"></i>
            </div>
            <a href="#" class="small-box-footer">
              <?php echo $my_ip;?> <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>

  </div>
  <?php include 'includes/footer.php';?>
</div>
<?php include 'includes/script.php';?>
<script>
  <?php include 'includes/script/event.handler.dashboard.js';?>
</script>
</body>
</html>
