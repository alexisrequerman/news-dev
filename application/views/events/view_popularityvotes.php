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
        POPULARITY VOTES
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Score Sheet</li>
        <li class="active">Popularity Votes</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal_add_pv">
                <span class="fa fa-plus-square-o"></span> New Popularity Votes Score
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_pv" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>PV SCORE</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_score_pv">
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
      <div class="modal modal-default fade" id="modal_add_pv">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">NEW POPULARITY VOTES SCORE</h4>
            </div>
            <form id="frm_score_pv_add">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        DATE
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_score_pv_date" name="txt_score_pv_date" class="form-control" value="<?php echo Date('m/d/Y')?>" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        USER NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="hidden" id="txt_score_pv_uid" name="txt_score_pv_uid" value="<?php echo $ueid;?>" required>
                      <input type="text" id="txt_score_pv_user" name="txt_score_pv_user" class="form-control" value="<?php echo $ufname;?>" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CONTESTANT NAME
                        <i class="text-danger">*</i>
                      </label>
                      <select id="txt_score_pv_name" name="txt_score_pv_name" class="form-control selectbox" required>
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
                        POPULARITY VOTES SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-10)
                      <input type="text" id="txt_score_pv" name="txt_score_pv" class="form-control" required>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_add_score_pv" name="btn_add_score_pv" class="btn btn-primary btn-block" value="SUBMIT SCORE">
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
  <?php include 'includes/script/event.handler.pv.js';?>
</script>
</body>
</html>
