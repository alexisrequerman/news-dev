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
        EDIT ARTICLE
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Content</li>
        <li class="active">Articles</li>
        <li>Edit</li>
      </ol>
    </section>

    <section class="content">
      <!-- Form Box -->
      <div class="row">

        <div class="col-md-12">
          <?php echo $app_msg;?>
        </div>

        <form id="form_edit_image" name="form_edit_image" action="<?php echo site_url('content/save_edited_article_image');?>" method="post" class="form" role="form" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_image_edit">COVER IMAGE</label>
                  <input type="file" id="txt_article_image_edit" name="txt_article_image_edit" required>
                  <p class="help-block">Required files: jpg, jpeg, png</p>
                </div>
                <input type="hidden" id="txt_article_id_edit_img" name="txt_article_id_edit_img" value="<?php echo $_id;?>" required>
              </div>
              <div class="box-footer">
                <input type="submit" id="btn_article_edit_image" name="btn_article_edit_image" class="btn btn-success btn-md btn-flat btn-block" value="UPDATE IMAGE">
              </div>
            </div>
          </div>
        </form>

        <form id="form_edit_article" name="form_edit_article" action="<?php echo site_url('content/save_edited_article');?>" method="post" class="form" role="form">
          <div class="col-md-8">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_title">TITLE</label>
                  <input type="text" class="form-control" id="txt_article_title_edit" name="txt_article_title_edit" value="<?php echo $_title;?>" required>
                </div>
                <fieldset class="form-group">
                  <label for="txt_article_body">BODY</label>
                  <textarea id="txt_article_body_edit" class="form-control" name="txt_article_body_edit" rows="18"><?php echo $_body;?></textarea>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_video">EMBEDED VIDEO</label>
                  <textarea id="txt_article_video_edit" class="form-control" name="txt_article_video_edit" rows="5"><?php echo $_video;?></textarea>
                  <p class="help-block">Copy embed video from youtube</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_category_edit">CATEGORIES</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_category_edit" id="txt_article_category_edit" value="<?php echo $_category;?>" checked>
                    <label class="form-check-label" for="txt_article_category_edit">
                      <?php echo $_category;?>
                    </label>
                  </div>
                  <label>-----</label>
                  <?php foreach($set_cat as $category):?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_category_edit" id="txt_article_category_edit" value="<?php echo $category['category_title'];?>">
                    <label class="form-check-label" for="txt_article_category_edit">
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
                  <label for="txt_article_status_edit">STATUS</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_status_edit" id="txt_article_status_edit" value="<?php echo $_status;?>" checked>
                    <label class="form-check-label" for="txt_article_status">
                      <?php echo ucfirst($_status);?>
                    </label>
                  </div>
                  <label>-----</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_status_edit" id="txt_article_status_edit" value="published">
                    <label class="form-check-label" for="txt_article_status">
                      Publish
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_status_edit" id="txt_article_status_edit" value="draft">
                    <label class="form-check-label" for="txt_article_status">
                      Draft
                    </label>
                  </div>
                </div>
                <input type="hidden" id="txt_article_author_edit" name="txt_article_author_edit" value="<?php echo $ufname;?>" required>
                <input type="hidden" id="txt_article_id_edit" name="txt_article_id_edit" value="<?php echo $_id;?>" required>
              </div>
              <div class="box-footer">
                <input type="submit" id="btn_article_edit" name="btn_article_edit" class="btn btn-success btn-md btn-flat btn-block" value="UPDATE ARTICLE">
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
  <?php include 'includes/script/event.handler.articles.js';?>
</script>
</body>
</html>
