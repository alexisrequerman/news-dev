<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<!-- HEADER FILES -->
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
  <!-- HEAD MENUBAR -->
  <?php include 'includes/header.php';?>
  <!-- SIDE MENUBAR -->
  <?php include 'includes/sidebar.php'?>
  <!-- PAGE BODY -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        ADD NEW PROGRAM
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Content</li>
        <li class="active">Programs</li>
        <li>Add New</li>
      </ol>
    </section>

    <section class="content">
      <!-- Form Box -->
      <div class="row">

        <div class="col-md-12">
          <?php echo $app_msg;?>
        </div>

        <form id="form_new_article" name="form_new_article" action="<?php echo site_url('content/add_program');?>" method="post" class="form" role="form" enctype="multipart/form-data">
          <div class="col-md-8">
            <div class="box">
              <div class="box-header with-border">
                <div class="form-group">
                  <label for="txt_program_image">COVER IMAGE</label>
                  <input type="file" id="txt_program_image" name="txt_program_image" required>
                  <p class="help-block">Required files: jpg, jpeg, png</p>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_program_title">TITLE</label>
                  <input type="text" class="form-control" id="txt_program_title" name="txt_program_title" required>
                </div>
                <fieldset class="form-group">
                  <label for="txt_program_body">BODY</label>
                  <textarea id="txt_program_body" class="form-control" name="txt_program_body" rows="10"></textarea>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_program_category">CATEGORIES</label>
                  <?php foreach($set_cat as $category):?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_program_category" id="txt_program_category" value="<?php echo $category['category_title'];?>">
                    <label class="form-check-label" for="txt_program_category">
                      <?php echo $category['category_title'];?>
                    </label>
                  </div>
                  <?php endforeach;?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <label>PUBLISH</label>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_program_status">STATUS</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_program_status" id="txt_program_status" value="published">
                    <label class="form-check-label" for="txt_program_status">
                      Publish
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_program_status" id="txt_program_status" value="draft">
                    <label class="form-check-label" for="txt_program_status">
                      Draft
                    </label>
                  </div>
                </div>
                <input type="hidden" id="txt_program_author" name="txt_program_author" value="<?php echo $ufname;?>" required>
              </div>
              <div class="box-footer">
                <input type="submit" id="btn_program_save" name="btn_program_save" class="btn btn-primary btn-md btn-flat btn-block" value="SAVE NEW PROGRAM">
              </div>
            </div>
          </div>
        </form>

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
