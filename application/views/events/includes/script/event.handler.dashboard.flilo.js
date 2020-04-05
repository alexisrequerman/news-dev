$(document).ready(function(){
  // load tbl_cws dataTable
  show_data_flilo();

  // load DataTable
  $('#tbl_flilo').dataTable();

  // timepicker
  /*
  $('#txt_time_in').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_time_out').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });*/
  $('#txt_time_in').timepicker({
    timeFormat: 'HH:mm',
    interval: 30,
    dynamic: false,
    dropdown: true,
    scrollbar: true,
    zindex: 10
  });
  $('#txt_time_out').timepicker({
    timeFormat: 'HH:mm',
    interval: 30,
    dynamic: false,
    dropdown: true,
    scrollbar: true,
    zindex: 4
  });

  // timepicker
  $('#txt_date_flilo').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });

  // disabled input
  $('#txt_e_id').prop('readonly', true);
  $('#txt_date').prop('readonly', true);
  $('#txt_name').prop('readonly', true);
  $('#txt_dept').prop('readonly', true);

  // populate tbl_cws
  function show_data_flilo()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('failure_to_log_in_and_log_out/flilo_read_user');?>",
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
              '<td>' + data[i].flilo_date_filed + '</td>' +
              '<td>' + data[i].flilo_date_flilo + '</td>' +
              '<td>' +
                data[i].flilo_time_in +
                ' - ' +
                data[i].flilo_time_out +
              '</td>' +
              '<td>' + data[i].flilo_reason + '</td>' +
              '<td>' + data[i].flilo_app_status + '</td>' +
            '</tr>';
        }
        $('#show_all_flilo').html(html);
      }
    });
  }

  $('#btn_add').on('click', function(){
    var data_form = $('#frm_add_flilo').serializeArray();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('failure_to_log_in_and_log_out/flilo_save');?>",
      dataType: "JSON",
      data: data_form,
      success: function(data){
        // show save toast
        toast_data_save();
        // clear all fields
        $('[name="txt_date_flilo"]').val("");
        $('[name="txt_time_in"]').val("");
        $('[name="txt_time_out"]').val("");
        $('[name="txt_reason"]').val("");
        $('[name="txt_app_by_head"]').val("");
        $('[name="txt_app_by_mgr"]').val("");
        // close modal
        $('#modal_add').modal('hide');
        // show flilo data
        show_data_flilo();
      }
    });
    return false;
  });

  // save data toast
  function toast_data_save()
  {
    $.toast({
      heading: 'Failure to Log In and Log Out',
      text: 'Your request was successfuly save for approval!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }


});
