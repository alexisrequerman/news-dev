$(document).ready(function(){
  // load data on DataTable
  show_data_ot();

  // load DataTable
  $('#tbl_ot').dataTable();

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // disabled textboxes
  $('#ot_txt_ot_id').attr('disabled', true);
  $('#ot_txt_date').attr('disabled', true);
  $('#ot_txt_e_id').attr('disabled', true);
  $('#ot_txt_name').attr('disabled', true);
  $('#ot_txt_dept').attr('disabled', true);
  $('#ot_txt_date_fr').attr('disabled', true);
  $('#ot_txt_date_to').attr('disabled', true);
  $('#ot_txt_time_in').attr('disabled', true);
  $('#ot_txt_time_out').attr('disabled', true);
  $('#ot_txt_reason').attr('disabled', true);
  $('#ot_txt_app_by_sup').attr('disabled', true);
  $('#ot_txt_app_by_sup_stat').attr('disabled', false);
  $('#ot_txt_app_by_head').attr('disabled', true);
  $('#ot_txt_app_by_head_stat').attr('disabled', false);

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // populate tbl_ot
  function show_data_ot()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('overtime/ot_read_fp');?>",
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
              '<td>' + data[i].ot_emp_id + '</td>' +
              '<td>' + data[i].ot_emp_name + '</td>' +
              '<td>' +
                data[i].ot_date_from +
              '</td>' +
              '<td>' + data[i].ot_app_sup_status + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-primary btn-xs btn-flat fapp_ot" data-ot_id="'+data[i].ot_id+'" data-ot_date_filed="'+data[i].ot_date_filed+'" data-ot_emp_id="'+data[i].ot_emp_id+'" data-ot_emp_name="'+data[i].ot_emp_name+'" data-ot_department="'+data[i].ot_department+'" data-ot_date_from="'+data[i].ot_date_from+'" data-ot_date_to="'+data[i].ot_date_to+'" data-ot_time_in="'+data[i].ot_time_in+'" data-ot_time_out="'+data[i].ot_time_out+'" data-ot_reason="'+data[i].ot_reason+'" data-ot_app_sup="'+data[i].ot_app_sup+'" data-ot_app_sup_status="'+data[i].ot_app_sup_status+'" data-ot_app_head="'+data[i].ot_app_head+'" data-ot_app_head_status="'+data[i].ot_app_head_status+'"><span class="fa fa-file-text-o"></span> DETAILS</a>' +
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

  $('#show_all_ot').on('click', '.fapp_ot', function(){
    var ot_id = $(this).data('ot_id');
    var ot_date_filed = $(this).data('ot_date_filed');
    var ot_emp_id = $(this).data('ot_emp_id');
    var ot_emp_name = $(this).data('ot_emp_name');
    var ot_department = $(this).data('ot_department');
    var ot_date_from = $(this).data('ot_date_from');
    var ot_date_to = $(this).data('ot_date_to');
    var ot_time_in = $(this).data('ot_time_in');
    var ot_time_out = $(this).data('ot_time_out');
    var ot_reason = $(this).data('ot_reason');
    var ot_app_sup = $(this).data('ot_app_sup');
    var ot_app_sup_status = $(this).data('ot_app_sup_status');
    var ot_app_head = $(this).data('ot_app_head');
    var ot_app_head_status = $(this).data('ot_app_head_status');

    $('#modal_ot_appv').modal('show');

    $('#ot_txt_ot_id').val(ot_id);
    $('#ot_txt_date').val(ot_date_filed);
    $('#ot_txt_e_id').val(ot_emp_id);
    $('#ot_txt_name').val(ot_emp_name);
    $('#ot_txt_dept').val(ot_department);
    $('#ot_txt_date_fr').val(ot_date_from);
    $('#ot_txt_date_to').val(ot_date_to);
    $('#ot_txt_time_in').val(ot_time_in);
    $('#ot_txt_time_out').val(ot_time_out);
    $('#ot_txt_reason').val(ot_reason);
    $('#ot_txt_app_by_sup').val(ot_app_sup);
    $('#ot_txt_app_by_sup_stat').val(ot_app_sup_status);
    $('#ot_txt_app_by_head').val(ot_app_head);
    $('#ot_txt_app_by_head_stat').val(ot_app_head_status);
  });

  // update
  $('#btn_edit_ot').on('click', function(){
    var ot_id               = $('#ot_txt_ot_id').val();
    var ot_app_sup_status   = $('#ot_txt_app_by_sup_stat').val();
    var ot_app_head_status  = $('#ot_txt_app_by_head_stat').val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('for_approval/approve_ot');?>",
      dataType: "JSON",
      data: {ot_id:ot_id, ot_app_sup_status:ot_app_sup_status, ot_app_head_status:ot_app_head_status},
      success: function(data)
      {
        // show update toast
        toast_data_update();
        // 3.5 seconds delay for modal to close
        setTimeout(function(){
          // close modal
          $('#modal_ot_appv').modal('hide');
          // show all documetns
          show_data_ot();
        }, 3500);
      }
    });
    return false;
  });

  // update data toast
  function toast_data_update()
  {
    $.toast({
      heading: 'REQUEST FOR OVERTIME',
      text: 'Request was successfuly save approved!',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

});
