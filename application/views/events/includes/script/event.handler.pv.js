$(document).ready(function(){
  // populate DataTable with data
  show_score_pv();

  // load DataTable
  $('#tbl_score_pv').dataTable();

  // input mask
  $('#txt_score_pv').inputmask('numeric', {
    min: 0,
    max: 10
  });

  // disabled TextBox
  $("#txt_score_pv_date").attr('readonly', true);
  $("#txt_score_pv_uid").attr('readonly', true);
  $("#txt_score_pv_user").attr('readonly', true);

  // show all scores
  function show_score_pv()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_scoresheet_pv');?>",
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
              '<td>' + data[i].pv_date + '</td>' +
              '<td>' + data[i].pv_contestant_name + '</td>' +
              '<td>' + data[i].pv_score_pv + '</td>' +
            '</tr>';
        }
        $('#show_all_score_pv').html(html);
      }
    });
  }

  // add new score
  $('#btn_add_score_pv').on('click', function(){
    // variables for validation
    var data_name   = $('#txt_score_pv_name').val();
    var data_score  = $('#txt_score_pv').val();
    // variable for form serialization
    var data_form   = $('#frm_score_pv_add').serializeArray();
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
      $("#txt_score_pv_name").attr('readonly', true);
      $("#txt_score_pv").attr('readonly', true);
      // success
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('scoresheet/add_scoresheet_pv');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data){
          // show save toast
          $.toast({
            heading: 'POPULARITY VOTES',
            text: data,
            showHideTransition: 'fade',
            icon: 'success',
            position: 'top-right',
            hideAfter: 3000
          });
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all text fields
            $('[name="txt_score_pv_date"]').val("");
            $('[name="txt_score_pv_uid"]').val("");
            $('[name="txt_score_pv_user"]').val("");
            $('[name="txt_score_pv_name"]').val("");
            $('[name="txt_score_pv"]').val("");
            // close modal with delay
            $('#modal_add_pv').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

});
