$(document).ready(function(){
  // load data on DataTable
  show_data_cws();
  show_data_flilo();
  show_data_fob();
  show_data_loa();
  show_data_o();
  show_data_ot();

  // load DataTable
  $('#tbl_cws').dataTable();
  $('#tbl_flilo').dataTable();
  $('#tbl_fob').dataTable();
  $('#tbl_loa').dataTable();
  $('#tbl_o').dataTable();
  $('#tbl_ot').dataTable();

/*******************************************************/
/*******************************************************/
/*******************************************************/

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
              '<td>' + data[i].cws_date_filed + '</td>' +
              '<td>' + data[i].cws_emp_id + '</td>' +
              '<td>' + data[i].cws_emp_name + '</td>' +
              '<td>' + data[i].cws_date_cws + '</td>' +
              '<td>' + data[i].cws_app_status + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-success btn-xs btn-flat fapp_cws" data-cws_id="'+data[i].cws_id+'" data-cws_date_filed="'+data[i].cws_date_filed+'" data-cws_emp_id="'+data[i].cws_emp_id+'" data-cws_emp_name="'+data[i].cws_emp_name+'" data-cws_department="'+data[i].cws_department+'" data-cws_date_cws="'+data[i].cws_date_cws+'" data-cws_regular_ws_in="'+data[i].cws_regular_ws_in+'" data-cws_regular_ws_out="'+data[i].cws_regular_ws_out+'" data-cws_actual_duty_in="'+data[i].cws_actual_duty_in+'" data-cws_actual_duty_out="'+data[i].cws_actual_duty_out+'" data-cws_reason="'+data[i].cws_reason+'" data-cws_approved_by="'+data[i].cws_approved_by+'" data-cws_app_status="'+data[i].cws_app_status+'" data-cws_recorded_by="'+data[i].cws_recorded_by+'"><span class="fa fa-thumbs-up"></span></a>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_cws').html(html);
      }
    });
  }

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
              '<td>' + data[i].flilo_emp_id + '</td>' +
              '<td>' + data[i].flilo_emp_name + '</td>' +
              '<td>' + data[i].flilo_date_flilo + '</td>' +
              '<td>' + data[i].flilo_app_status + '</td>' +
              '<td>' + data[i].flilo_mgr_app_status + '</td>' +
              '<td>' +
                '<div class="btn-group">' +
                  '<a href="javascript:void(0);" class="btn btn-success btn-xs"><span class="fa fa-thumbs-up"></span></a>' +
                  '<a href="javascript:void(0);" class="btn btn-danger btn-xs"><span class="fa fa-thumbs-down"></span></a>' +
                '</div>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_flilo').html(html);
      }
    });
  }

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
              '<td>' + data[i].fob_mgr_app_status + '</td>' +
              '<td>' +
                '<div class="btn-group">' +
                  '<a href="javascript:void(0);" class="btn btn-success btn-xs"><span class="fa fa-thumbs-up"></span></a>' +
                  '<a href="javascript:void(0);" class="btn btn-danger btn-xs"><span class="fa fa-thumbs-down"></span></a>' +
                '</div>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_fob').html(html);
      }
    });
  }
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
              '<td>' + data[i].loa_status_recom_app_vpgm + '</td>' +
              '<td>' +
                '<div class="btn-group">' +
                  '<a href="javascript:void(0);" class="btn btn-success btn-xs"><span class="fa fa-thumbs-up"></span></a>' +
                  '<a href="javascript:void(0);" class="btn btn-danger btn-xs"><span class="fa fa-thumbs-down"></span></a>' +
                '</div>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_loa').html(html);
      }
    });
  }
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
              '<td>' + data[i].o_recom_head_status + '</td>' +
              '<td>' +
                '<div class="btn-group">' +
                  '<a href="javascript:void(0);" class="btn btn-success btn-xs"><span class="fa fa-thumbs-up"></span></a>' +
                  '<a href="javascript:void(0);" class="btn btn-danger btn-xs"><span class="fa fa-thumbs-down"></span></a>' +
                '</div>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_o').html(html);
      }
    });
  }
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
                data[i].ot_date_from + '-' + data[i].ot_date_to +
              '</td>' +
              '<td>' +
                data[i].ot_time_in + '-' + data[i].ot_time_out +
              '</td>' +
              '<td>' + data[i].ot_reason + '</td>' +
              '<td>' + data[i].ot_app_sup_status + '</td>' +
              '<td>' + data[i].ot_app_head_status + '</td>' +
              '<td>' +
                '<div class="btn-group">' +
                  '<a href="javascript:void(0);" class="btn btn-success btn-xs"><span class="fa fa-thumbs-up"></span></a>' +
                  '<a href="javascript:void(0);" class="btn btn-danger btn-xs"><span class="fa fa-thumbs-down"></span></a>' +
                '</div>' +
              '</td>'
            '</tr>';
        }
        $('#show_all_ot').html(html);
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
    var cws_reason            = $(this).data('cws_reason');
    var cws_approved_by       = $(this).data('cws_approved_by');
    var cws_app_status        = $(this).data('cws_app_status');
    var cws_recorded_by       = $(this).data('cws_recorded_by');

    $('#modal_cws_appv').modal('show');

    $('#txt_e_id').val(cws_emp_id);
    $('#txt_date').val(cws_date_filed);
    $('#txt_name').val(cws_emp_name);
    $('#txt_dept').val(cws_department);
    $('#txt_date_cws').val(cws_date_cws);
    $('#txt_regular_in').val(cws_regular_ws_in);
    $('#txt_regular_out').val(cws_regular_ws_out);
    $('#txt_actual_in').val(cws_actual_duty_in);
    $('#txt_actual_out').val(cws_actual_duty_out);
    $('#txt_reason').val(cws_reason);
    $('#txt_app_by').val(cws_approved_by);
    $('#txt_rec_by').val(cws_recorded_by);
  });


  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

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
