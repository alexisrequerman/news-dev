$(document).ready(function(){
  // load tbl_ot dataTable
  show_data_ot();

  // load DataTable
  $('#tbl_ot').dataTable();

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

  // datepicker
  $('#txt_date_fr').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });
  $('#txt_date_to').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });

  // disabled input
  $('#txt_e_id').prop('readonly', true);
  $('#txt_date').prop('readonly', true);
  $('#txt_name').prop('readonly', true);
  $('#txt_dept').prop('readonly', true);

  // populate tbl_ot
  function show_data_ot()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('overtime/ot_read_user');?>",
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
              '<td>' + data[i].ot_date_filed + '</td>' +
              '<td>' +
                data[i].ot_date_from +
              '</td>' +
              '<td>' +
                data[i].ot_time_in + '-' + data[i].ot_time_out +
              '</td>' +
              '<td>' + data[i].ot_time_total + '</td>' +
              '<td>' + data[i].ot_reason + '</td>' +
              '<td>' + data[i].ot_app_sup_status + '</td>' +
            '</tr>';
        }
        $('#show_all_ot').html(html);
      }
    });
  }

  $('#btn_add').on('click', function(){
    var ot_date_filed       = $('#txt_date').val();
    var ot_emp_id           = $('#txt_e_id').val();
    var ot_emp_name         = $('#txt_name').val();
    var ot_department       = $('#txt_dept').val();
    var ot_date_from        = $('#txt_date_fr').val();
    var ot_date_to          = $('#txt_date_to').val();
    var ot_time_in          = $('#txt_time_in').val();
    var ot_time_out         = $('#txt_time_out').val();
    var ot_reason           = $('#txt_reason').val();
    var ot_app_sup          = $('#txt_app_by_sup').val();
    var ot_app_head         = $('#txt_app_by_head').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('overtime/ot_save');?>",
      dataType: "JSON",
      data: {ot_date_filed:ot_date_filed, ot_emp_id:ot_emp_id, ot_emp_name:ot_emp_name, ot_department:ot_department, ot_date_from:ot_date_from, ot_date_to:ot_date_to, ot_time_in:ot_time_in, ot_time_out:ot_time_out, ot_reason:ot_reason, ot_app_sup:ot_app_sup, ot_app_head:ot_app_head},
      success: function(data){
        // show save toast
        toast_data_save();
        // clear all fields
        $('[name="txt_date_fr"]').val("");
        $('[name="txt_date_to"]').val("");
        $('[name="txt_time_in"]').val("");
        $('[name="txt_time_out"]').val("");
        $('[name="txt_reason"]').val("");
        $('[name="txt_app_by_sup"]').val("");
        $('[name="txt_app_by_head"]').val("");
        // close modal
        $('#modal_add').modal('hide');
        // show o data
        show_data_ot();
      }
    });
    return false;
  });

  // save data toast
  function toast_data_save()
  {
    $.toast({
      heading: 'Request for Overtime',
      text: 'Your request was successfuly save for approval!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }


});
