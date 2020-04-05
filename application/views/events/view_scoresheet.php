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
        SCORE SHEET
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Score Sheet</li>
        <li class="active">Judge</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-flat <?php echo $no_admin;?>" data-toggle="modal" data-target="#modal_add_score">
                <span class="fa fa-plus-square-o"></span> New Contestant Score
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>TALENT</th>
                      <th>STAR FACTOR</th>
                      <th>COMMENT</th>
                      <th>JUDGE</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_score">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!------------------------------->
      <!---- MODAL FOR CONTESTANTS ---->
      <!------------------------------->

      <!--- Modal Add Contestant --->
      <div class="modal modal-default fade" id="modal_add_score">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">NEW CONTESTANT SCORE</h4>
            </div>
            <form id="frm_score_add">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label class="text-danger pull-right"><i>* REQUIRED FIELDS</i></label>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        DATE
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_score_date" name="txt_score_date" class="form-control" value="<?php echo Date('m/d/Y')?>" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        JUDGE NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="hidden" id="txt_score_jid" name="txt_score_jid" value="<?php echo $ueid;?>" required>
                      <input type="text" id="txt_score_judge" name="txt_score_judge" class="form-control" value="<?php echo $ufname;?>" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CONTESTANT NAME
                        <i class="text-danger">*</i>
                      </label>
                      <select id="txt_score_name" name="txt_score_name" class="form-control selectbox" required>
                        <option>&nbsp;</option>
                        <?php foreach ($set_ss as $ssname):?>
                          <option value="<?php echo $ssname['cnt_fullname'];?>">
                            <?php echo $ssname['cnt_fullname'];?>
                          </option>
                        <?php endforeach;?>
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        TALENT SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-50)
                      <input type="text" id="txt_score_talent" name="txt_score_talent" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        STAR FACTOR SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-20)
                      <input type="text" id="txt_score_star" name="txt_score_star" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        COMMENT
                      </label>
                      <textarea id="txt_score_comment" name="txt_score_comment" rows="4" class="form-control"></textarea>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_add_score" name="btn_add_score" class="btn btn-primary btn-block" value="SUBMIT SCORE">
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
  <?php include 'includes/script/event.handler.judge.js';?>
</script>
</body>
</html>
