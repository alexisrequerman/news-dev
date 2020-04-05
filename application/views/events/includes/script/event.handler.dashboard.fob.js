$(document).ready(function(){
  // load tbl_fob dataTable
  show_data_fob();

  // load DataTable
  $('#tbl_fob').dataTable();

  // timepicker
  $('#txt_time_start').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });
  $('#txt_time_finised').timepicker({
    minuteStep: 1,
    template: false,
    showSeconds: false,
    showMeridian: false,
    defaultTime: false
  });

  // timepicker
  $('#txt_date_fob').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true
  });

  // disabled input
  $('#txt_e_id').prop('readonly', true);
  $('#txt_date').prop('readonly', true);
  $('#txt_name').prop('readonly', true);
  $('#txt_dept').prop('readonly', true);

  // populate tbl_fob
  function show_data_fob()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('fieldwork_official_business/fob_read_user');?>",
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
              '<td>' + data[i].fob_date_filed + '</td>' +
              '<td>' + data[i].fob_date_fob + '</td>' +
              '<td>' +
                data[i].fob_time_start +
                ' - ' +
                data[i].fob_time_finished +
              '</td>' +
              '<td>' + data[i].fob_reason + '</td>' +
              '<td>' + data[i].fob_location + '</td>' +
              '<td>' + data[i].fob_app_status + '</td>' +
            '</tr>';
        }
        $('#show_all_fob').html(html);
      }
    });
  }

  $('#btn_add').on('click', function(){
    var data_date_filed     = $('#txt_date').val();
    var data_emp_id         = $('#txt_e_id').val();
    var data_emp_name       = $('#txt_name').val();
    var data_department     = $('#txt_dept').val();
    var data_reason         = $('#txt_reason').val();
    var data_date_fob       = $('#txt_date_fob').val();
    var data_location       = $('#txt_location').val();
    var data_time_start     = $('#txt_time_start').val();
    var data_time_finished  = $('#txt_time_finised').val();
    var data_approved_by    = $('#txt_app_by_head').val();
    var data_manager_app    = $('#txt_app_by_mgr').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('fieldwork_official_business/fob_save');?>",
      dataType: "JSON",
      data: {data_date_filed:data_date_filed, data_emp_id:data_emp_id, data_emp_name:data_emp_name, data_department:data_department, data_reason:data_reason, data_date_fob:data_date_fob, data_location:data_location, data_time_start:data_time_start, data_time_finished:data_time_finished, data_approved_by:data_approved_by, data_manager_app:data_manager_app},
      success: function(data){
        // show save toast
        toast_data_save();
        // clear all fields
        $('[name="txt_reason"]').val("");
        $('[name="txt_date_fob"]').val("");
        $('[name="txt_location"]').val("");
        $('[name="txt_time_start"]').val("");
        $('[name="txt_time_finised"]').val("");
        $('[name="txt_app_by_head"]').val("");
        $('[name="txt_app_by_mgr"]').val("");
        // close modal
        $('#modal_add').modal('hide');
        // show flilo data
        show_data_fob();
      }
    });
    return false;
  });

  // save data toast
  function toast_data_save()
  {
    $.toast({
      heading: 'Request for Fieldwork / Official Business',
      text: 'Your request was successfuly save for approval!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }


});
