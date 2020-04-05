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
        USER ACCOUNTS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">System Preferences</li>
        <li class="active">User Accounts</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="javascript:void(0);" class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#modal_user_add">
                <span class="fa fa-plus-square-o"></span> New User
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_users" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>USER ID</th>
                      <th>FULL NAME</th>
                      <th>USERNAME</th>
                      <th>SYSTEM ROLE</th>
                      <th>STATUS</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_users">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!------------------------------->
      <!--- MODAL FOR USER ACCOUNTS --->
      <!------------------------------->

      <!--- Modal User Edit --->
      <div class="modal modal-default fade" id="modal_user_edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">EDIT USER DETAILS</h4>
            </div>
            <form id="frm_user_edit">
              <div class="modal-body">
                <input type="hidden" id="txt_user_id_e" name="txt_user_id_e" required>
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        FULL NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_user_fname_e" name="txt_user_fname_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_user_user_e" name="txt_user_user_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER STATUS
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_user_status_e" name="txt_user_status_e" required>
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
                    <input type="submit" id="btn_update_user" name="btn_update_user" class="btn btn-success btn-block" value="UPDATE USER">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--- Modal User Edit Password --->
      <div class="modal modal-default fade" id="modal_user_edit_password">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">CHANGE USER PASSWORD</h4>
            </div>
            <form>
              <div class="modal-body">
                <input type="hidden" id="txt_user_id_ep" name="txt_user_id_ep">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USERNAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_user_name_ep" name="txt_user_name_ep" class="form-control" value="" disabled>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        NEW PASSWORD
                        <i class="text-danger">*</i>
                      </label>
                      <input type="password" id="txt_user_pass1_e" name="txt_user_pass1_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CONFIRM NEW PASSWORD
                        <i class="text-danger">*</i>
                      </label>
                      <input type="password" id="txt_user_pass2_e" name="txt_user_pass2_e" class="form-control" required>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_update_user_pass" name="btn_update_user_pass" class="btn btn-primary btn-block" value="CHANGE PASSWORD">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--- Modal User Add --->
      <div class="modal modal-default fade" id="modal_user_add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">NEW USER DETAILS</h4>
            </div>
            <form id="frm_user_add">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        FULL NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_user_fname" name="txt_user_fname" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_user_user" name="txt_user_user" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER PASSWORD
                        <i class="text-danger">*</i>
                      </label>
                      <input type="password" id="txt_user_password" name="txt_user_password" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER STATUS
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_user_status" name="txt_user_status" required>
                        <option></option>
                        <option value="active">Active</option>
                        <option value="blocked">Block</option>
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        SYSTEM ROLE
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_user_role" name="txt_user_role" required>
                        <option></option>
                        <option value="user">User</option>
                        <option value="administrator">Administrator</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_add_user" name="btn_add_user" class="btn btn-info btn-block" value="SAVE USER">
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
  <?php include 'includes/script/event.handler.users.js';?>
</script>
</body>
</html>
