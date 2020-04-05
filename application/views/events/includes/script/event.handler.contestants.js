$(document).ready(function(){
  // populate DataTable with data
  show_contestants();

  // load DataTable
  $('#tbl_con').dataTable();

  // alphbet and white space only
  $('#txt_contestant_fname').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z\s]/gi, ''));
  });

  $('#txt_contestant_fname_e').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z\s]/gi, ''));
  });

  // regular expressions
  $('#txt_contestant_fname').on('keyup', function() {
    var input = document.getElementById("txt_contestant_fname");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

  $('#txt_contestant_fname_e').on('keyup', function() {
    var input = document.getElementById("txt_contestant_fname_e");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

  // show all contestants
  function show_contestants()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('contestants/read_contestants');?>",
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
              '<td>' + data[i].cnt_id + '</td>' +
              '<td>' + data[i].cnt_fullname + '</td>' +
              '<td>' + data[i].cnt_status + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-success btn-sm btn-flat contestant_edit" data-cnt_id="'+data[i].cnt_id+'" data-cnt_fullname="'+data[i].cnt_fullname+'" data-cnt_status="'+data[i].cnt_status+'">' +
                  '<span class="fa fa-edit"></span> EDIT' +
                '</a>' +
              '</td>' +
            '</tr>';
        }
        $('#show_all_con').html(html);
      }
    });
  }

  // add contestant
  $('#btn_add_contestant').on('click', function(){
    // variables for validation
    var data_fullname     = $('#txt_contestant_fname').val();
    var data_status       = $('#txt_contestant_status').val();
    // variable for form serialization
    var data_form = $('#frm_contestant_add').serializeArray();

    // check if form has empty field
    if (!data_fullname || !data_status)
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
        url: "<?php echo site_url('contestants/add_contestant');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data){
          // show save toast
          toast_contestant_save();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all text fields
            $('[name="txt_user_fname"]').val("");
            $('[name="txt_user_status"]').val("");
            // close modal with delay
            $('#modal_add_contestant').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // save contestant toast
  function toast_contestant_save()
  {
    $.toast({
      heading: 'NEW CONTESTANT',
      text: 'A new contestant was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

  // show data for editing
  $('#show_all_con').on('click', '.contestant_edit', function(){
    var data_id       = $(this).data('cnt_id');
    var data_fullname = $(this).data('cnt_fullname');
    var data_status   = $(this).data('cnt_status');

    $('#modal_contestant_edit').modal('show');

    $('#txt_contestant_id_e').val(data_id);
    $('#txt_contestant_fname_e').val(data_fullname);
    $('#txt_contestant_status_e').val(data_status);
  });

  // update contestant data
  $('#btn_update_contestant').on('click', function(){
    // variables for validation
    var data_id       = $('#txt_contestant_id_e').val();
    var data_fullname = $('#txt_contestant_fname_e').val();
    var data_status   = $('#txt_contestant_status_e').val();
    // variable for form serialization
    var data_form     = $('#frm_contestant_edit').serializeArray();

    // check if form has empty field
    if (!data_id || !data_fullname || !data_status)
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
        url: "<?php echo site_url('contestants/edit_contestant');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data)
        {
          // show update toast
          toast_contestant_update();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all fields
            $('[name="txt_contestant_id_e"]').val("");
            $('[name="txt_contestant_fname_e"]').val("");
            $('[name="txt_contestant_status_e"]').val("");
            // close modal
            $('#modal_contestant_edit').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // update contestant toast
  function toast_contestant_update()
  {
    $.toast({
      heading: 'EDIT CONTESTANT DETAILS',
      text: 'Update on this contestant was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }





});
