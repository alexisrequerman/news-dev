$(document).ready(function(){
  // populate DataTable with data
  show_score_sc();

  // load DataTable
  $('#tbl_score_sc').dataTable();

  // input mask
  $('#txt_score_sc').inputmask('numeric', {
    min: 0,
    max: 20
  });

  // disabled TextBox
  $("#txt_score_sc_date").attr('readonly', true);
  $("#txt_score_sc_uid").attr('readonly', true);
  $("#txt_score_sc_user").attr('readonly', true);

  // show all scores
  function show_score_sc()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_scoresheet_sc');?>",
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
              '<td>' + data[i].sc_date + '</td>' +
              '<td>' + data[i].sc_contestant_name + '</td>' +
              '<td>' + data[i].sc_score_sc + '</td>' +
            '</tr>';
        }
        $('#show_all_score_sc').html(html);
      }
    });
  }

  // add new score
  $('#btn_add_score_sc').on('click', function(){
    // variables for validation
    var data_name   = $('#txt_score_sc_name').val();
    var data_score  = $('#txt_score_sc').val();
    // variable for form serialization
    var data_form   = $('#frm_score_sc_add').serializeArray();
    // check if form has empty field
    if (!data_name || !data_score)
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
      // disables text boxes
      $("#txt_score_sc_name").attr('readonly', true);
      $("#txt_score_sc").attr('readonly', true);
      // success
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('scoresheet/add_scoresheet_sc');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data){
          // show save toast
          $.toast({
            heading: 'SHOPPERS CHOICE',
            text: data,
            showHideTransition: 'fade',
            icon: 'success',
            position: 'top-right',
            hideAfter: 3000
          });
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all text fields
            $('[name="txt_score_sc_date"]').val("");
            $('[name="txt_score_sc_uid"]').val("");
            $('[name="txt_score_sc_user"]').val("");
            $('[name="txt_score_sc_name"]').val("");
            $('[name="txt_score_sc"]').val("");
            // close modal with delay
            $('#modal_add_sc').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // save score toast
  function toast_score_save()
  {
    $.toast({
      heading: 'NEW SCORESHEET',
      text: 'A new contestant was successfuly scored! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

});
