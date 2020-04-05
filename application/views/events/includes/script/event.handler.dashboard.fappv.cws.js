$(document).ready(function(){
  // load data on DataTable
  show_data_cws();

  // load DataTable
  $('#tbl_cws').dataTable();

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // disabled textboxes
  $('#cws_txt_cws_id').attr('disabled', true);
  $('#cws_txt_e_id').attr('disabled', true);
  $('#cws_txt_date').attr('disabled', true);
  $('#cws_txt_name').attr('disabled', true);
  $('#cws_txt_dept').attr('disabled', true);
  $('#cws_txt_date_cws').attr('disabled', true);
  $('#cws_txt_regular_in').attr('disabled', true);
  $('#cws_txt_regular_out').attr('disabled', true);
  $('#cws_txt_actual_in').attr('disabled', true);
  $('#cws_txt_actual_out').attr('disabled', true);
  $('#cws_txt_actual_time').attr('disabled', true);
  $('#cws_txt_reason').attr('disabled', true);
  $('#cws_txt_app_by').attr('disabled', true);
  $('#cws_txt_app_stat').attr('disabled', false);
  $('#cws_txt_rec_by').attr('disabled', true);

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // populate tbl_cws
  function show_data_cws()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('change_in_work_schedule/cws_read_all_fp');?>",
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
              '<td>' + data[i].cws_date_filed + '</td>' +
              '<td>' + data[i].cws_emp_id + '</td>' +
              '<td>' + data[i].cws_emp_name + '</td>' +
              '<td>' + data[i].cws_date_cws + '</td>' +
              '<td>' + data[i].cws_app_status + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-primary btn-xs btn-flat fapp_cws" data-cws_id="'+data[i].cws_id+'" data-cws_date_filed="'+data[i].cws_date_filed+'" data-cws_emp_id="'+data[i].cws_emp_id+'" data-cws_emp_name="'+data[i].cws_emp_name+'" data-cws_department="'+data[i].cws_department+'" data-cws_date_cws="'+data[i].cws_date_cws+'" data-cws_regular_ws_in="'+data[i].cws_regular_ws_in+'" data-cws_regular_ws_out="'+data[i].cws_regular_ws_out+'" data-cws_actual_duty_in="'+data[i].cws_actual_duty_in+'" data-cws_actual_duty_out="'+data[i].cws_actual_duty_out+'" data-cws_actual_time_duty="'+data[i].cws_actual_time_duty+'" data-cws_reason="'+data[i].cws_reason+'" data-cws_approved_by="'+data[i].cws_approved_by+'" data-cws_app_status="'+data[i].cws_app_status+'" data-cws_recorded_by="'+data[i].cws_recorded_by+'"><span class="fa fa-file-text-o"></span> DETAILS</a>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_cws').html(html);
      }
    });
  }

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/


  $('#show_all_cws').on('click', '.fapp_cws', function(){
    var cws_id                = $(this).data('cws_id');
    var cws_date_filed        = $(this).data('cws_date_filed');
    var cws_emp_id            = $(this).data('cws_emp_id');
    var cws_emp_name          = $(this).data('cws_emp_name');
    var cws_department        = $(this).data('cws_department');
    var cws_date_cws          = $(this).data('cws_date_cws');
    var cws_regular_ws_in     = $(this).data('cws_regular_ws_in');
    var cws_regular_ws_out    = $(this).data('cws_regular_ws_out');
    var cws_actual_duty_in    = $(this).data('cws_actual_duty_in');
    var cws_actual_duty_out   = $(this).data('cws_actual_duty_out');
    var cws_actual_duty       = $(this).data('cws_actual_time_duty');
    var cws_reason            = $(this).data('cws_reason');
    var cws_approved_by       = $(this).data('cws_approved_by');
    var cws_app_status        = $(this).data('cws_app_status');
    var cws_recorded_by       = $(this).data('cws_recorded_by');

    $('#modal_cws_appv').modal('show');

    $('#cws_txt_cws_id').val(cws_id);
    $('#cws_txt_e_id').val(cws_emp_id);
    $('#cws_txt_date').val(cws_date_filed);
    $('#cws_txt_name').val(cws_emp_name);
    $('#cws_txt_dept').val(cws_department);
    $('#cws_txt_date_cws').val(cws_date_cws);
    $('#cws_txt_regular_in').val(cws_regular_ws_in);
    $('#cws_txt_regular_out').val(cws_regular_ws_out);
    $('#cws_txt_actual_in').val(cws_actual_duty_in);
    $('#cws_txt_actual_out').val(cws_actual_duty_out);
    $('#cws_txt_actual_time').val(cws_actual_duty);
    $('#cws_txt_reason').val(cws_reason);
    $('#cws_txt_app_by').val(cws_approved_by);
    $('#cws_txt_rec_by').val(cws_recorded_by);
    $('#cws_txt_app_stat').val(cws_app_status);
  });

  // update
  $('#btn_edit_cws').on('click', function(){
    var cws_id          = $('#cws_txt_cws_id').val();
    var cws_app_status  = $('#cws_txt_app_stat').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('for_approval/approve_cws');?>",
      dataType: "JSON",
      data: {cws_id:cws_id, cws_app_status:cws_app_status},
      success: function(data)
      {
        // show update toast
        toast_data_update();
        // 3.5 seconds delay for modal to close
        setTimeout(function(){
          // close modal
          $('#modal_cws_appv').modal('hide');
          // show all documetns
          show_data_cws();
        }, 3500);
      }
    });
    return false;
  });

  // update data toast
  function toast_data_update()
  {
    $.toast({
      heading: 'CHANGE IN WORK SCHEDULE',
      text: 'Request was successfuly save approved!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }


});
