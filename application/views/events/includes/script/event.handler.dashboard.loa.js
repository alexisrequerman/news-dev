$(document).ready(function(){
  // load tbl_fob dataTable
  show_data_loa();

  // load DataTable
  $('#tbl_loa').dataTable();

  // timepicker
  $('#txt_date_from').datepicker({
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

  // populate tbl_loa
  function show_data_loa()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('leave_of_absence/loa_read_user');?>",
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
              '<td>' + data[i].loa_date_filed + '</td>' +
              '<td>' + data[i].loa_reasons + '</td>' +
              '<td>' + data[i].loa_type + '</td>' +
              '<td>' + data[i].loa_days + '</td>' +
              '<td>' + data[i].loa_date_from + ' - ' + data[i].loa_date_to + '</td>' +
              '<td>' + data[i].loa_status_recom_app + '</td>' +
            '</tr>';
        }
        $('#show_all_loa').html(html);
      }
    });
  }

  $('#btn_add').on('click', function(){
    var data_date_filed     = $('#txt_date').val();
    var data_emp_id         = $('#txt_e_id').val();
    var data_emp_name       = $('#txt_name').val();
    var data_department     = $('#txt_dept').val();
    var data_reason         = $('#txt_reason').val();
    var data_type           = $('#txt_leave_type').val();
    var data_days           = $('#txt_days').val();
    var data_date_from      = $('#txt_date_from').val();
    var data_date_to        = $('#txt_date_to').val();
    var data_approved_by    = $('#txt_app_by_head').val();
    var data_manager_app    = $('#txt_app_by_mgr').val();
    var data_timekeeper     = $('#txt_timekeeper').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('leave_of_absence/loa_save');?>",
      dataType: "JSON",
      data: {data_date_filed:data_date_filed, data_emp_id:data_emp_id, data_emp_name:data_emp_name, data_department:data_department, data_reason:data_reason, data_type:data_type, data_days:data_days, data_date_from:data_date_from, data_date_to:data_date_to, data_approved_by:data_approved_by, data_manager_app:data_manager_app, data_timekeeper:data_timekeeper},
      success: function(data){
        // show save toast
        toast_data_save();
        // clear all fields
        $('[name="txt_reason"]').val("");
        $('[name="txt_leave_type"]').val("");
        $('[name="txt_days"]').val("");
        $('[name="txt_date_from"]').val("");
        $('[name="txt_date_to"]').val("");
        $('[name="txt_app_by_head"]').val("");
        $('[name="txt_app_by_mgr"]').val("");
        $('[name="txt_timekeeper"]').val("");
        // close modal
        $('#modal_add').modal('hide');
        // show flilo data
        show_data_loa();
      }
    });
    return false;
  });

  // save data toast
  function toast_data_save()
  {
    $.toast({
      heading: 'Request for Leave of Absence',
      text: 'Your request was successfuly save for approval!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }


});
