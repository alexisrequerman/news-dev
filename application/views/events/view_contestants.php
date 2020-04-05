<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<?php include 'includes/head.php';?>
<style>
  table.dataTable tbody td {
    vertical-align: middle;
  }
  .selectbox {
    border-radius: 0; -webkit-appearance: none;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/header.php';?>
  <?php include 'includes/sidebar.php'?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        SYSTEM PREFERENCES
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">System Preferences</li>
        <li class="active">Contestants</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CONTESTANTS</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_con" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>CONTESTANT ID</th>
                      <th>FULL NAME</th>
                      <th>STATUS</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_con">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer">
              <a href="javascript:void(0);" class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#modal_add_contestant">
                <span class="fa fa-plus-square-o"></span> New Contestant
              </a>
            </div>
          </div>
        </div>
      </div>

      <!------------------------------->
      <!---- MODAL FOR CONTESTANTS ---->
      <!------------------------------->

      <!--- Modal Add Contestant --->
      <div class="modal modal-default fade" id="modal_add_contestant">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">NEW CONTESTANT DETAILS</h4>
            </div>
            <form id="frm_contestant_add">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        FULL NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_contestant_fname" name="txt_contestant_fname" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER STATUS
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_contestant_status" name="txt_contestant_status" required>
                        <option></option>
                        <option value="active">Active</option>
                        <option value="blocked">Block</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_add_contestant" name="btn_add_contestant" class="btn btn-info btn-block" value="SAVE CONTESTANT">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--- Modal Contestant Edit --->
      <div class="modal modal-default fade" id="modal_contestant_edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">EDIT CONTESTANT DETAILS</h4>
            </div>
            <form id="frm_contestant_edit">
              <div class="modal-body">
                <input type="hidden" id="txt_contestant_id_e" name="txt_contestant_id_e" required>
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        FULL NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_contestant_fname_e" name="txt_contestant_fname_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER STATUS
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_contestant_status_e" name="txt_contestant_status_e" required>
                        <option value="active">Active</option>
                        <option value="blocked">Block</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_update_contestant" name="btn_update_contestant" class="btn btn-success btn-block" value="UPDATE CONTESTANT">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
  </div>
  <?php include 'includes/footer.php';?>
</div>
<?php include 'includes/script.php';?>
<script>
  <?php include 'includes/script/event.handler.contestants.js';?>
</script>
</body>
</html>
