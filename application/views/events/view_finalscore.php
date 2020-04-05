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
        FINAL SCORE
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Score Sheet</li>
        <li class="active">Final Score</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- JUDGE FINAL SCORE -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Final Score</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_judge_average" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>CONTESTANT</th>
                      <th>TALENT</th>
                      <th>STAR FACTOR</th>
                      <th>SHOPPERS CHOICE</th>
                      <th>POPULARITY CONTEST</th>
                      <th>TOTAL SCORE</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_score_judge_average">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- FINAL SCORE 2 -->
        <!--
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contestants Average Score</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_average" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>TALENT (50%)</th>
                      <th>STAR FACTOR (20%)</th>
                      <th>SHOPPERS SCHOICE (20%)</th>
                      <th>POPULARITY VOTES (10%)</th>
                      <th>TOTAL SCORE</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        -->
        <!-- FINAL SCORE -->
        <!--
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contestants Average Score</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_ca" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>TALENT (50%)</th>
                      <th>STAR FACTOR (20%)</th>
                      <th>SHOPPERS SCHOICE (20%)</th>
                      <th>POPULARITY VOTES (10%)</th>
                      <th>TOTAL SCORE</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_score_ca">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        -->
        <!-- JUDGE -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Judge's Score</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_judge" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>TALENT</th>
                      <th>STAR FACTOR</th>
                      <th>JUDGE</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_score_judge">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- SHOPPERS CHOICE -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Shoppers Vote</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_sc" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>SV SCORE</th>
                      <th>ENCODED BY</th>
                    </tr>
                  </thead>
                  <tbody id="show_all_score_sc">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- POPULARITY VOTES -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Popularity Votes</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tbl_score_pv" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CONTESTANT</th>
                      <th>PV SCORE</th>
                      <th>ENCODED BY</th>
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
                      (1-100)
                      <input type="text" id="txt_score_talent" name="txt_score_talent" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        STAR FACTOR SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-100)
                      <input type="text" id="txt_score_star" name="txt_score_star" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        COMMENT
                        <i class="text-danger">*</i>
                      </label>
                      <textarea id="txt_score_comment" name="txt_score_comment" rows="8" class="form-control" required></textarea>
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
      <div class="modal modal-default fade" id="modal_edit_score">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary">NEW CONTESTANT SCORE</h4>
            </div>
            <form id="frm_score_edit">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        DATE
                        <i class="text-danger">*</i>
                      </label>
                      <input type="hidden" id="txt_score_id_e" name="txt_score_id_e" required>
                      <input type="text" id="txt_score_date_e" name="txt_score_date_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        JUDGE NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="hidden" id="txt_score_jid_e" name="txt_score_jid_e" required>
                      <input type="text" id="txt_score_judge_e" name="txt_score_judge_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        CONTESTANT NAME
                        <i class="text-danger">*</i>
                      </label>
                      <input type="text" id="txt_score_name_e" name="txt_score_name_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        TALENT SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-100)
                      <input type="text" id="txt_score_talent_e" name="txt_score_talent_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        STAR FACTOR SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-100)
                      <input type="text" id="txt_score_star_e" name="txt_score_star_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        SHOPPERS CHOICE / POPULARITY VOTES SCORE
                        <i class="text-danger">*</i>
                      </label>
                      (1-100)
                      <input type="text" id="txt_score_choice_e" name="txt_score_choice_e" class="form-control" required>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset class="form-group">
                      <label class="text-primary">
                        COMMENT
                        <i class="text-danger">*</i>
                      </label>
                      <textarea id="txt_score_comment_e" name="txt_score_comment_e" rows="8" class="form-control" required></textarea>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" id="btn_edit_score" name="btn_edit_score" class="btn btn-primary btn-block" value="UPDATE">
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
  <?php include 'includes/script/event.handler.final.js';?>
</script>
</body>
</html>
