$(document).ready(function(){
  // populate DataTable with data
  show_users();

  // load DataTable
  $('#tbl_users').dataTable();

  // alphabet and white space only
  $('#txt_user_fname').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z\s]/gi, ''));
  });

  $('#txt_user_fname_e').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z\s]/gi, ''));
  });

  // alphabet only
  $('#txt_user_user').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z]/gi, ''));
  });

  $('#txt_user_user_e').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z]/gi, ''));
  });

  // regular expressions
  $('#txt_user_fname').on('keyup', function() {
    var input = document.getElementById("txt_user_fname");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

  $('#txt_user_fname_e').on('keyup', function() {
    var input = document.getElementById("txt_user_fname_e");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

  // show all users
  function show_users()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('users/read_users');?>",
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
              '<td>' + data[i].user_id + '</td>' +
              '<td>' + data[i].user_fullname + '</td>' +
              '<td>' + data[i].user_name + '</td>' +
              '<td>' + data[i].user_role + '</td>' +
              '<td>' + data[i].user_status + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-success btn-sm btn-flat user_edit" data-user_id="'+data[i].user_id+'" data-user_name="'+data[i].user_name+'" data-user_password="'+data[i].user_password+'" data-user_email="'+data[i].user_email+'" data-user_fullname="'+data[i].user_fullname+'" data-user_role="'+data[i].user_role+'" data-user_status="'+data[i].user_status+'" data-user_pw_dec="'+data[i].user_pw_dec+'">' +
                  '<span class="fa fa-edit"></span> EDIT' +
                '</a>' +
                '&nbsp;' +
                '<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-flat user_edit_pass" data-user_id="'+data[i].user_id+'" data-user_name="'+data[i].user_name+'" data-user_password="'+data[i].user_password+'" data-user_email="'+data[i].user_email+'" data-user_fullname="'+data[i].user_fullname+'" data-user_role="'+data[i].user_role+'" data-user_status="'+data[i].user_status+'" data-user_pw_dec="'+data[i].user_pw_dec+'">' +
                  '<span class="fa fa-lock"></span> CHANGE PASSWORD' +
                '</a>' +
              '</td>' +
            '</tr>';
        }
        $('#show_all_users').html(html);
      }
    });
  }

  // show data for editing
  $('#show_all_users').on('click', '.user_edit', function(){
    var data_id           = $(this).data('user_id');
    var data_name         = $(this).data('user_name');
    var data_fullname     = $(this).data('user_fullname');
    var data_status       = $(this).data('user_status');

    $('#modal_user_edit').modal('show');

    $('#txt_user_id_e').val(data_id);
    $('#txt_user_fname_e').val(data_fullname);
    $('#txt_user_user_e').val(data_name);
    $('#txt_user_status_e').val(data_status);
  });

  // update user data
  $('#btn_update_user').on('click', function(){
    // variables for validation
    var data_id           = $('#txt_user_id_e').val();
    var data_user         = $('#txt_user_user_e').val();
    var data_fullname     = $('#txt_user_fname_e').val();
    var data_status       = $('#txt_user_status_e').val();
    // variable for form serialization
    var data_form = $('#frm_user_edit').serializeArray();

    // check if form has empty field
    if (!data_id || !data_user || !data_fullname || !data_status)
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
        url: "<?php echo site_url('users/edit_user');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data)
        {
          // show update toast
          toast_user_update();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all fields
            $('[name="txt_user_id_e"]').val("");
            $('[name="txt_user_fname_e"]').val("");
            $('[name="txt_user_user_e"]').val("");
            $('[name="txt_user_status_e"]').val("");
            // close modal
            $('#modal_user_edit').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // show data for editing password
  $('#show_all_users').on('click', '.user_edit_pass', function(){
    var data_id           = $(this).data('user_id');
    var data_name         = $(this).data('user_name');
    var data_password     = $(this).data('user_password');
    var data_password2    = $(this).data('user_pw_dec');

    $('#modal_user_edit_password').modal('show');

    $('#txt_user_id_ep').val(data_id);
    $('#txt_user_name_ep').val(data_name);
  });

  // update user password
  $('#btn_update_user_pass').on('click', function(){
    var data_id           = $('#txt_user_id_ep').val();
    var data_name         = $('#txt_user_name_ep').val();
    var data_password     = $('#txt_user_pass1_e').val();
    var data_password2    = $('#txt_user_pass2_e').val();

    if(data_password != data_password2){
      $.toast({
        heading: 'INCORRECT PASSWORD',
        text: 'Password did not match. Please try again.',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
        hideAfter: 3000
      });
      $('[name="txt_user_pass1_e"]').val("");
      $('[name="txt_user_pass2_e"]').val("");
    } else {
      if (!data_password || !data_password2) {
        $.toast({
          heading: 'EMPTY FIELD',
          text: 'Please password and try again.',
          showHideTransition: 'fade',
          icon: 'error',
          position: 'top-right',
          hideAfter: 3000
        });
      } else {
        // disables save button
        $(this).prop("disabled",true);
        // success
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('users/edit_user_password');?>",
          dataType: "JSON",
          data: {data_id:data_id, data_name:data_name, data_password:data_password, data_password2:data_password2},
          success: function(data)
          {
            // show update toast
            toast_user_update();
            // 3.5 seconds delay for modal to close
            setTimeout(function(){
              // clear all fields
              $('[name="txt_user_id_ep"]').val("");
              $('[name="txt_user_name_ep"]').val("");
              $('[name="txt_user_pass1_e"]').val("");
              $('[name="txt_user_pass2_e"]').val("");
              // close modal
              $('#modal_user_edit_password').modal('hide');
              // refresh page
              location.reload();
            }, 3500);
          }
        });
        //return false;
      }
    }
    return false;
  });

  // add new user
  $('#btn_add_user').on('click', function(){
    // variables for validation
    var data_user         = $('#txt_user_user').val();
    var data_password     = $('#txt_user_password').val();
    var data_fullname     = $('#txt_user_fname').val();
    var data_role         = $('#txt_user_role').val();
    var data_status       = $('#txt_user_status').val();
    // variable for form serialization
    var data_form = $('#frm_user_add').serializeArray();

    // check if form has empty field
    if (!data_user || !data_password || !data_fullname || !data_role || !data_status)
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
        url: "<?php echo site_url('users/add_user');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data){
          // show save toast
          toast_user_save();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all text fields
            $('[name="txt_user_fname"]').val("");
            $('[name="txt_user_user"]').val("");
            $('[name="txt_user_password"]').val("");
            $('[name="txt_user_status"]').val("");
            $('[name="txt_user_role"]').val("");
            // close modal with delay
            $('#modal_user_add').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // save user toast
  function toast_user_save()
  {
    $.toast({
      heading: 'NEW USER',
      text: 'A new user was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

  // update user toast
  function toast_user_update()
  {
    $.toast({
      heading: 'EDIT USER DETAILS',
      text: 'Update on this user was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

});
