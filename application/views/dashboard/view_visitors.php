<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<!-- HEADER FILES -->
<?php include 'includes/head.php';?>
<style>
  table.dataTable tbody td {
    vertical-align: middle;
  }
  .btn-group.special {
    display: flex;
  }
  .special .btn {
    flex: 1
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
        VISITORS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
        <li>Visitors</li>
      </ol>
    </section>

    <section class="content">
      <!-- Total Cards -->
      <div class="row">
        <div class="col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $count_visit;?></h3>
              <p>Total Website Visits</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="#" class="small-box-footer">
              All Time <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <p>Total Website Visits</p>
            </div>
            <div class="icon">
              <i class="fa  fa-file-text-o"></i>
            </div>
            <a href="#" class="small-box-footer">
              Today <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>150</h3>
              <p>Total Articles Visited</p>
            </div>
            <div class="icon">
              <i class="fa fa-television"></i>
            </div>
            <a href="#" class="small-box-footer">
              All Time <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <p>Total Articles Visited</p>
            </div>
            <div class="icon">
              <i class="fa fa-globe"></i>
            </div>
            <a href="#" class="small-box-footer">
              Today <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /Total Cards -->

      <!-- Recent Website Visitors -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Website Visitors</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_visitors" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width:10%;">DATE</th>
                      <th style="width:10%">TIME</th>
                      <th style="width:15%;">WEB PAGE</th>
                      <th style="width:40%;">PAGE TITLE</th>
                      <th style="width:15%;">IP ADDRESS</th>
                      <th style="width:10%;"></th>
                    </tr>
                  </thead>
                  <tbody id="show_all_visitors">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Recent Website Visitors -->

    </section>

  </div>
  <?php include 'includes/footer.php';?>
</div>
<?php include 'includes/script.php';?>
<script>
  <?php include 'includes/script/event.handler.visitors.js';?>
</script>
</body>
</html>
