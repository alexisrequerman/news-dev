$(document).ready(function(){
  // load tbl_cws dataTable
  show_data_cws();

  // load DataTable
  $('#tbl_cws').dataTable();

  // timepicker
  $('#txt_regular_in').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_regular_out').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_actual_in').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_actual_out').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });

  // timepicker
  $('#txt_date_cws').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });

  // disabled input
  $('#txt_e_id').prop('readonly', true);
  $('#txt_date').prop('readonly', true);
  $('#txt_name').prop('readonly', true);
  $('#txt_dept').prop('readonly', true);

  // populate tbl_cws
  function show_data_cws()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('change_in_work_schedule/cws_read_user');?>",
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
              '<td>' + '<button id="btn_send" name="btn_send" class="btn btn-success btn-xs" value="' + data[i].cws_id + '"><span class="fa fa-send-o"></span> Send</button>' + '</td>' +
              '<td>' + data[i].cws_date_filed + '</td>' +
              '<td>' + data[i].cws_date_cws + '</td>' +
              '<td>' +
                data[i].cws_regular_ws_in +
                ' - ' +
                data[i].cws_regular_ws_out +
              '</td>' +
              '<td>' +
                data[i].cws_actual_duty_in +
                ' - ' +
                data[i].cws_actual_duty_out +
              '</td>' +
              '<td>' + data[i].cws_actual_time_duty + '</td>' +
              '<td>' + data[i].cws_reason + '</td>' +
              '<td>' + data[i].cws_app_status + '</td>' +
            '</tr>';
        }
        $('#show_all_cws').html(html);
      }
    });
  }

  $('#btn_add').on('click', function(){
    var data_date_filed       = $('#txt_date').val();
    var data_emp_id           = $('#txt_e_id').val();
    var data_emp_name         = $('#txt_name').val();
    var data_department       = $('#txt_dept').val();
    var data_date_cws         = $('#txt_date_cws').val();
    var data_regular_ws_in    = $('#txt_regular_in').val();
    var data_regular_ws_out   = $('#txt_regular_out').val();
    var data_actual_duty_in   = $('#txt_actual_in').val();
    var data_actual_duty_out  = $('#txt_actual_out').val();
    var data_reason           = $('#txt_reason').val();
    var data_approved_by      = $('#txt_app_by').val();
    var data_recorded_by      = $('#txt_rec_by').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('change_in_work_schedule/cws_save');?>",
      dataType: "JSON",
      data: {data_date_filed:data_date_filed, data_emp_id:data_emp_id, data_emp_name:data_emp_name, data_department:data_department, data_date_cws:data_date_cws, data_regular_ws_in:data_regular_ws_in, data_regular_ws_out:data_regular_ws_out, data_actual_duty_in:data_actual_duty_in, data_actual_duty_out:data_actual_duty_out, data_reason:data_reason, data_approved_by:data_approved_by, data_recorded_by:data_recorded_by},
      success: function(data){
        // show save toast
        toast_data_save();
        // clear all fields
        $('[name="txt_date_cws"]').val("");
        $('[name="txt_regular_in"]').val("");
        $('[name="txt_regular_out"]').val("");
        $('[name="txt_actual_in"]').val("");
        $('[name="txt_actual_out"]').val("");
        $('[name="txt_reason"]').val("");
        $('[name="txt_app_by"]').val("");
        $('[name="txt_rec_by"]').val("");
        // close modal
        $('#modal_add').modal('hide');
        // show cws data
        show_data_cws();
      }
    });
    return false;
  });

  // save data toast
  function toast_data_save()
  {
    $.toast({
      heading: 'Change in Work Schedule',
      text: 'Your request was successfuly save for approval!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

  // send button action
  $('#btn_send').on('click', function(){
    var select_id = $(this).val();
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('change_in_work_schedule/send_cws_fa');?>",
      dataType: "JSON",
      data: {select_id:select_id},
      success: function(data){
        $.toast({
          heading: 'Change in Work Schedule',
          text: 'Your request was successfuly sent for approval!',
          showHideTransition: 'fade',
          icon: 'success',
          position: 'top-right',
          hideAfter: 3000
        });
      }
    });
    return false;
  });


});
