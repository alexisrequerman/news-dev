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
        ADD NEW ARTICLE
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Content</li>
        <li class="active">Articles</li>
        <li>Add New</li>
      </ol>
    </section>

    <section class="content">
      <!-- Form Box -->
      <div class="row">

        <div class="col-md-12">
          <?php echo $app_msg;?>
        </div>

        <form id="form_new_article" name="form_new_article" action="<?php echo site_url('content/add_article');?>" method="post" class="form" role="form" enctype="multipart/form-data">
          <div class="col-md-8">
            <div class="box">
              <div class="box-header with-border">
                <div class="form-group">
                  <label for="exampleInputFile">COVER IMAGE</label>
                  <input type="file" id="txt_article_image" name="txt_article_image" required>
                  <p class="help-block">Required files: jpg, jpeg, png</p>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_title">TITLE</label>
                  <input type="text" class="form-control" id="txt_article_title" name="txt_article_title" required>
                </div>
                <fieldset class="form-group">
                  <label for="txt_article_body">BODY</label>
                  <input type="hidden" name="hidden">
                  <textarea id="txt_article_body" class="form-control" name="txt_article_body" rows="18"></textarea>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_video">EMBEDED VIDEO</label>
                  <textarea id="txt_article_video" class="form-control" name="txt_article_video" rows="5"></textarea>
                  <p class="help-block">Copy embed video from youtube</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="txt_article_category">CATEGORIES</label>
                  <?php foreach($set_cat as $category):?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_category" id="txt_article_category" value="<?php echo $category['category_title'];?>">
                    <label class="form-check-label" for="txt_article_category">
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
                  <label for="txt_article_status">STATUS</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_status" id="txt_article_status" value="published">
                    <label class="form-check-label" for="txt_article_status">
                      Publish
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="txt_article_status" id="txt_article_status" value="draft">
                    <label class="form-check-label" for="txt_article_status">
                      Draft
                    </label>
                  </div>
                </div>
                <input type="hidden" id="txt_article_author" name="txt_article_author" value="<?php echo $ufname;?>" required>
              </div>
              <div class="box-footer">
                <input type="submit" id="btn_article_save" name="btn_article_save" class="btn btn-primary btn-md btn-flat btn-block" value="PUBLISH">
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
