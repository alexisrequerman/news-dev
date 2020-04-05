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
        CATEGORIES
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Content</li>
        <li>Categories</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal_category_add">
                <span class="fa fa-plus-square-o"></span> New Category
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_categories" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width:80%;">CATEGORY</th>
                      <th style="width:10%;">STATUS</th>
                      <th style="width:10%;">ACTION</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_categories">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!---------------------------->
      <!--- MODAL FOR CATEGORIES --->
      <!---------------------------->

      <!--- Modal Category Edit --->
      <div class="modal modal-default fade" id="modal_category_edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">EDIT CATEGORY</h4>
            </div>
            <form id="frm_category_edit">
              <input type="hidden" id="txt_category_id_e" name="txt_category_id_e" value="">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CATEGORY
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_category_e" name="txt_category_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CATEGORY STATUS
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_category_status_e" name="txt_category_status_e" required>
                        <option value="active">Active</option>
                        <option value="disabled">Disable</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_edit_category" name="btn_edit_category" class="btn btn-primary btn-block" value="UPDATE">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--- Modal Category Add --->
      <div class="modal modal-default fade" id="modal_category_add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">NEW CATEGORY</h4>
            </div>
            <form id="frm_category_add">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CATEGORY
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_category" name="txt_category" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CATEGORY STATUS
                        <i class="text-danger">*</i>
                      </label>
                      <select class="form-control selectbox" id="txt_category_status" name="txt_category_status" required>
                        <option value="active">Active</option>
                        <option value="disabled">Disable</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_add_category" name="btn_add_category" class="btn btn-primary btn-block" value="SAVE">
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
  <?php include 'includes/script/event.handler.categories.js';?>
</script>
</body>
</html>
