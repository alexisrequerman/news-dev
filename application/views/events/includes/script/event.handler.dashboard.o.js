$(document).ready(function(){
  // load tbl_o dataTable
  show_data_o();

  // load DataTable
  $('#tbl_o').dataTable();

  // timepicker
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
  });
  $('#txt_reg_in').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_reg_out').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_act_in').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_act_out').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });

  // datepicker
  $('#txt_date_ot').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });
  $('#txt_date_off').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });

  // disabled input
  $('#txt_e_id').prop('readonly', true);
  $('#txt_date').prop('readonly', true);
  $('#txt_name').prop('readonly', true);
  $('#txt_dept').prop('readonly', true);

  // populate tbl_o
  function show_data_o()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('offsetting/o_read_user');?>",
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
              '<td>' + data[i].o_date_filed + '</td>' +
              '<td>' +
                data[i].o_date_overtime + ' ' +
                data[i].o_time_from + '-' + data[i]. o_time_to +
              '</td>' +
              '<td>' +
                data[i].o_date_offset + ' ' +
                data[i].o_actual_from + '-' + data[i]. o_actual_to +
              '</td>' +
              '<td>' + data[i].o_recom_sup_status + '</td>' +
            '</tr>';
        }
        $('#show_all_o').html(html);
      }
    });
  }

  $('#btn_add').on('click', function(){
    var data_date_filed     = $('#txt_date').val();
    var data_emp_id         = $('#txt_e_id').val();
    var data_emp_name       = $('#txt_name').val();
    var data_department     = $('#txt_dept').val();
    var data_date_overtime  = $('#txt_date_ot').val();
    var data_time_from      = $('#txt_time_in').val();
    var data_time_to        = $('#txt_time_out').val();
    var data_time_total     = $('#txt_time_total').val();
    var data_date_offset    = $('#txt_date_off').val();
    var data_regular_from   = $('#txt_reg_in').val();
    var data_regular_to     = $('#txt_reg_out').val();
    var data_actual_from    = $('#txt_act_in').val();
    var data_actual_to      = $('#txt_act_out').val();
    var data_recom_sup      = $('#txt_app_by_sup').val();
    var data_recom_head     = $('#txt_app_by_head').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('offsetting/o_save');?>",
      dataType: "JSON",
      data: {data_date_filed:data_date_filed, data_emp_id:data_emp_id, data_emp_name:data_emp_name, data_department:data_department, data_date_overtime:data_date_overtime, data_time_from:data_time_from, data_time_to:data_time_to, data_time_total:data_time_total, data_date_offset:data_date_offset, data_regular_from:data_regular_from, data_regular_to:data_regular_to, data_actual_from:data_actual_from, data_actual_to:data_actual_to, data_recom_sup:data_recom_sup, data_recom_head:data_recom_head},
      success: function(data){
        // show save toast
        toast_data_save();
        // clear all fields
        $('[name="txt_date_ot"]').val("");
        $('[name="txt_time_in"]').val("");
        $('[name="txt_time_out"]').val("");
        $('[name="txt_time_total"]').val("");
        $('[name="txt_date_off"]').val("");
        $('[name="txt_reg_in"]').val("");
        $('[name="txt_reg_out"]').val("");
        $('[name="txt_act_in"]').val("");
        $('[name="txt_act_out"]').val("");
        $('[name="txt_app_by_sup"]').val("");
        $('[name="txt_app_by_head"]').val("");
        // close modal
        $('#modal_add').modal('hide');
        // show o data
        show_data_o();
      }
    });
    return false;
  });

  // save data toast
  function toast_data_save()
  {
    $.toast({
      heading: 'Offsetting',
      text: 'Your offset was successfuly save for approval!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }


});
