<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<?php include 'includes/head.php';?>
<style>
  table.dataTable tbody td {
    vertical-align: middle;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/header.php';?>
  <?php include 'includes/sidebar.php'?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        CLTV36 STAR MILL SCORING SYSTEM
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          <img src="<?php echo base_url();?>assets/media/images/cltv_logo_360.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
        </div>
        <div class="col-md-2">
          <img src="<?php echo base_url();?>assets/media/images/cltv36_ent_logo.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
        </div>
        <div class="col-md-8">
          <img src="<?php echo base_url();?>assets/media/images/star_mill_banner.jpg" class="img-fluid img-thumbnail" alt="Responsive image">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">DEMO VIDEOS</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_dashboard" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>VIDEO</th>
                      <th>DESCRIPTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_play_judge">
                          <span class="fa fa-plus-square-o"></span> Play
                        </button>
                      </td>
                      <td>How to input contestant score on a judge account?</td>
                    </tr>
                    <tr>
                      <td>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_play_sc">
                          <span class="fa fa-plus-square-o"></span> Play
                        </button>
                      </td>
                      <td>How to input shoppers choice score on admin account?</td>
                    </tr>
                    <tr>
                      <td>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_play_pv">
                          <span class="fa fa-plus-square-o"></span> Play
                        </button>
                      </td>
                      <td>How to input popularity votes score on admin account?</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!---->
          <div class="modal modal-default fade" id="modal_play_judge">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-primary">How to input contestant score on a judge account?</h4>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe id="video_judge" src="" frameborder="0" allowfullscreen>
                  </iframe>
                </div>
              </div>
            </div>
          </div>
          <!---->
          <div class="modal modal-default fade" id="modal_play_sc">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-primary">How to input shoppers choice score on admin account?</h4>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe id="video_sc" src="" frameborder="0" allowfullscreen>
                  </iframe>
                </div>
              </div>
            </div>
          </div>
          <!---->
          <div class="modal modal-default fade" id="modal_play_pv">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-primary">How to input popularity votes score on admin account?</h4>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe id="video_pv" src="" frameborder="0" allowfullscreen>
                  </iframe>
                </div>
              </div>
            </div>
          </div>
          <!---->
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
