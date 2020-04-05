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
        PROGRAMS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Content</li>
        <li>Programs</li>
      </ol>
    </section>

    <section class="content">
      <!-- Demo Videos Box -->
      <div class="row">
        <div class="col-md-12">
          <?php echo $app_msg;?>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="<?php echo site_url('content/new_program');?>" class="btn btn-primary btn-sm btn-flat">
                <span class="fa fa-plus"></span> New Program
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_programs" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width:70%;">PROGRAM TITLE</th>
                      <th style="width:10%">CATEGORY</th>
                      <th style="width:10%;">STATUS</th>
                      <th style="width:10%;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_programs">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <?php include 'includes/footer.php';?>
</div>
<?php include 'includes/script.php';?>
<script>
  <?php include 'includes/script/event.handler.programs.js';?>
</script>
</body>
</html>
