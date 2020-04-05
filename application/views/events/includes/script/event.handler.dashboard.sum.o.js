$(document).ready(function(){
  // load data on DataTable
  show_data_o();

  // load DataTable
  $('#tbl_o').dataTable({
    dom: 'Bfrtip',
    buttons: [
      'excelHtml5',
      'csvHtml5'
    ]
  });

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // disabled textboxes
  $('#o_txt_o_id').attr('disabled', true);
  $('#o_txt_e_id').attr('disabled', true);
  $('#o_txt_date').attr('disabled', true);
  $('#o_txt_name').attr('disabled', true);
  $('#o_txt_dept').attr('disabled', true);
  $('#o_txt_date_ot').attr('disabled', true);
  $('#o_txt_time_in').attr('disabled', true);
  $('#o_txt_time_out').attr('disabled', true);
  $('#o_txt_time_total').attr('disabled', true);
  $('#o_txt_date_off').attr('disabled', true);
  $('#o_txt_reg_in').attr('disabled', true);
  $('#o_txt_reg_out').attr('disabled', true);
  $('#o_txt_act_in').attr('disabled', true);
  $('#o_txt_act_out').attr('disabled', true);
  $('#o_txt_app_by_sup').attr('disabled', true);
  $('#o_txt_app_by_sup_stat').attr('disabled', true);
  $('#o_txt_app_by_head').attr('disabled', true);
  $('#o_txt_app_by_head_stat').attr('disabled', true);

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // populate tbl_o
  function show_data_o()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('offsetting/o_read_all');?>",
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
              '<td>' +
                '<a href="javascript:void(0);" class="btn btn-primary btn-xs btn-flat fapp_o" data-o_id="'+data[i].o_id+'" data-o_date_filed="'+data[i].o_date_filed+'" data-o_emp_id="'+data[i].o_emp_id+'" data-o_emp_name="'+data[i].o_emp_name+'" data-o_department="'+data[i].o_department+'" data-o_date_overtime="'+data[i].o_date_overtime+'" data-o_time_from="'+data[i].o_time_from+'" data-o_time_to="'+data[i].o_time_to+'" data-o_time_total="'+data[i].o_time_total+'" data-o_date_offset="'+data[i].o_date_offset+'" data-o_regular_from="'+data[i].o_regular_from+'" data-o_regular_to="'+data[i].o_regular_to+'" data-o_actual_from="'+data[i].o_actual_from+'" data-o_actual_to="'+data[i].o_actual_to+'" data-o_recom_sup="'+data[i].o_recom_sup+'" data-o_recom_sup_status="'+data[i].o_recom_sup_status+'" data-o_recom_head="'+data[i].o_recom_head+'" data-o_recom_head_status="'+data[i].o_recom_head_status+'"><span class="fa fa-calendar"></span> '+ data[i].o_date_filed +'</a>' +
              '</td>' +
              '<td>' + data[i].o_emp_name + '</td>' +
              '<td>' + data[i].o_emp_id + '</td>' +
              '<td>' + data[i].o_date_offset + '</td>' +
              '<td>' + data[i].o_time_from + '</td>' +
              '<td>' + data[i].o_time_to + '</td>' +
              '<td>' + data[i].o_recom_sup_status + '</td>' +
            '</tr>';
        }
        $('#show_all_o').html(html);
      }
    });
  }

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  $('#show_all_o').on('click', '.fapp_o', function(){
    var o_id                  = $(this).data('o_id');
    var o_date_filed          = $(this).data('o_date_filed');
    var o_emp_id              = $(this).data('o_emp_id');
    var o_emp_name            = $(this).data('o_emp_name');
    var o_department          = $(this).data('o_department');
    var o_date_overtime       = $(this).data('o_date_overtime');
    var o_time_from           = $(this).data('o_time_from');
    var o_time_to             = $(this).data('o_time_to');
    var o_time_total          = $(this).data('o_time_total');
    var o_date_offset         = $(this).data('o_date_offset');
    var o_regular_from        = $(this).data('o_regular_from');
    var o_regular_to          = $(this).data('o_regular_to');
    var o_actual_from         = $(this).data('o_actual_from');
    var o_actual_to           = $(this).data('o_actual_to');
    var o_recom_sup           = $(this).data('o_recom_sup');
    var o_recom_sup_status    = $(this).data('o_recom_sup_status');
    var o_recom_head          = $(this).data('o_recom_head');
    var o_recom_head_status   = $(this).data('o_recom_head_status');

    $('#modal_o_appv').modal('show');

    $('#o_txt_o_id').val(o_id);
    $('#o_txt_e_id').val(o_date_filed);
    $('#o_txt_date').val(o_emp_id);
    $('#o_txt_name').val(o_emp_name);
    $('#o_txt_dept').val(o_department);
    $('#o_txt_date_ot').val(o_date_overtime);
    $('#o_txt_time_in').val(o_time_from);
    $('#o_txt_time_out').val(o_time_to);
    $('#o_txt_time_total').val(o_time_total);
    $('#o_txt_date_off').val(o_date_offset);
    $('#o_txt_reg_in').val(o_regular_from);
    $('#o_txt_reg_out').val(o_regular_to);
    $('#o_txt_act_in').val(o_actual_from);
    $('#o_txt_act_out').val(o_actual_to);
    $('#o_txt_app_by_sup').val(o_recom_sup);
    $('#o_txt_app_by_sup_stat').val(o_recom_sup_status);
    $('#o_txt_app_by_head').val(o_recom_head);
    $('#o_txt_app_by_head_stat').val(o_recom_head_status);
  });

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // Custom date filter for DataTable
  $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
      var min = $('#o_txt_date_fr_2').datepicker("getDate");
      var max = $('#o_txt_date_to_2').datepicker("getDate");
      var startDate = new Date(data[3]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if (max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    }
  );

  $("#o_txt_date_fr_2").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  $("#o_txt_date_to_2").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  var table = $('#tbl_o').DataTable();

  // Event listener to the two range filtering inputs to redraw on input
  $('#o_txt_date_fr_2, #o_txt_date_to_2').change(function () {
    table.draw();
  });

});
