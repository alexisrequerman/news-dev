$(document).ready(function(){

  // load DataTable Data
  show_categories();

  // load DataTable
  $('#tbl_categories').dataTable();

  // show all categories
  function show_categories()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('content/read_categories');?>",
      async     : false,
      dataType  : "JSON",
      success   : function(data)
      {
        var html = '';
        var i;
        for(i=0; i<data.length; i++)
        {
          html +=
            '<tr>' +
              '<td>' + data[i].category_title + '</td>' +
              '<td>' + data[i].category_status + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-success btn-sm btn-flat btn-block cat_edit" data-category_id="'+data[i].category_id+'" data-category_title="'+data[i].category_title+'" data-category_status="'+data[i].category_status+'">' +
                  '<span class="fa fa-edit"></span> EDIT' +
                '</a>' +
              '</td>' +
            '</tr>';
        }
        $('#show_all_categories').html(html);
      }
    });
  }

  // add category user
  $('#btn_add_category').on('click', function(){
    // variables for validation
    var data_title    =   $('#txt_category').val();
    var data_status   =   $('#txt_category_status').val();
    // variable for form serialization
    var data_form = $('#frm_category_add').serializeArray();

    // check if form has empty field
    if (!data_title || !data_status)
    {
      // error message
      $.toast({
        heading: 'EMPTY FIELD',
        text: 'Please input all required fields!',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
        hideAfter: 3000
      });
    }
    else
    {
      // disables save button
      $(this).prop("disabled",true);
      // success
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('content/add_category');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data){
          // show save toast
          toast_cat_save();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all text fields
            $('[name="txt_category"]').val("");
            $('[name="txt_category_status"]').val("");
            // close modal with delay
            $('#modal_category_add').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // show data for editing
  $('#show_all_categories').on('click', '.cat_edit', function(){
    var data_id       =   $(this).data('category_id');
    var data_title    =   $(this).data('category_title');
    var data_status   =   $(this).data('category_status');

    $('#modal_category_edit').modal('show');

    $('#txt_category_id_e').val(data_id);
    $('#txt_category_e').val(data_title);
    $('#txt_category_status_e').val(data_status);
  });

  // update category data
  $('#btn_edit_category').on('click', function(){
    // variables for validation
    var data_id       =   $('#txt_category_id_e').val();
    var data_title    =   $('#txt_category_e').val();
    var data_status   =   $('#txt_category_status_e').val();
    // variable for form serialization
    var data_form = $('#frm_category_edit').serializeArray();

    // check if form has empty field
    if (!data_id || !data_title || !data_status)
    {
      // error message
      $.toast({
        heading: 'EMPTY FIELD',
        text: 'Please input all required fields!',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
        hideAfter: 3000
      });
    }
    else
    {
      // disables save button
      $(this).prop("disabled",true);
      // success
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('content/edit_category');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data)
        {
          // show update toast
          toast_cat_update();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all fields
            $('[name="txt_category_id_e"]').val("");
            $('[name="txt_category_e"]').val("");
            $('[name="txt_category_status_e"]').val("");
            // close modal
            $('#modal_category_edit').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  /*
  *
  *
  * Toast Notification
  *
  *
  */

  // save category toast
  function toast_cat_save()
  {
    $.toast({
      heading: 'NEW CATEGORY',
      text: 'A new category was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

  // update category toast
  function toast_cat_update()
  {
    $.toast({
      heading: 'EDIT CATEGORY DETAILS',
      text: 'Update on this category was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

});
