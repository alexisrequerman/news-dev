$(document).ready(function(){
  // load data on DataTable
  show_data_flilo();

  // load DataTable
  $('#tbl_flilo').dataTable({
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
  $('#flilo_txt_flilo_id').attr('disabled', true);
  $('#flilo_txt_e_id').attr('disabled', true);
  $('#flilo_txt_date').attr('disabled', true);
  $('#flilo_txt_name').attr('disabled', true);
  $('#flilo_txt_dept').attr('disabled', true);
  $('#flilo_txt_date_flilo').attr('disabled', true);
  $('#flilo_txt_time_in').attr('disabled', true);
  $('#flilo_txt_time_out').attr('disabled', true);
  $('#flilo_txt_reason').attr('disabled', true);
  $('#flilo_txt_app_by_head').attr('disabled', true);
  $('#flilo_txt_app_by_head_stat').attr('disabled', true);
  $('#flilo_txt_app_by_mgr').attr('disabled', true);
  $('#flilo_txt_app_by_mgr_stat').attr('disabled', true);

/*******************************************************/
/*******************************************************/
/*******************************************************/

  // populate tbl_flilo
  function show_data_flilo()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('failure_to_log_in_and_log_out/flilo_read_all');?>",
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
                '<a href="javascript:void(0);" class="btn btn-primary btn-xs btn-flat fapp_flilo" data-flilo_id="'+data[i].flilo_id+'" data-flilo_date_filed="'+data[i].flilo_date_filed+'" data-flilo_emp_id="'+data[i].flilo_emp_id+'" data-flilo_emp_name="'+data[i].flilo_emp_name+'" data-flilo_department="'+data[i].flilo_department+'" data-flilo_date_flilo="'+data[i].flilo_date_flilo+'" data-flilo_time_in="'+data[i].flilo_time_in+'" data-flilo_time_out="'+data[i].flilo_time_out+'" data-flilo_reason="'+data[i].flilo_reason+'" data-flilo_approved_by="'+data[i].flilo_approved_by+'" data-flilo_app_status="'+data[i].flilo_app_status+'" data-flilo_manager_app="'+data[i].flilo_manager_app+'" data-flilo_mgr_app_status="'+data[i].flilo_mgr_app_status+'"><span class="fa fa-file-text-o"></span> '+ data[i].flilo_date_filed +'</a>' +
              '</td>' +
              '<td>' + data[i].flilo_emp_id + '</td>' +
              '<td>' + data[i].flilo_emp_name + '</td>' +
              '<td>' + data[i].flilo_date_flilo + '</td>' +
              '<td>' + data[i].flilo_time_in + '</td>' +
              '<td>' + data[i].flilo_time_out + '</td>' +
              '<td>' + data[i].flilo_app_status + '</td>' +
            '</tr>';
        }
        $('#show_all_flilo').html(html);
      }
    });
  }

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/


  $('#show_all_flilo').on('click', '.fapp_flilo', function(){
    var flilo_id              = $(this).data('flilo_id');
    var flilo_date_filed      = $(this).data('flilo_date_filed');
    var flilo_emp_id          = $(this).data('flilo_emp_id');
    var flilo_emp_name        = $(this).data('flilo_emp_name');
    var flilo_department      = $(this).data('flilo_department');
    var flilo_date_flilo      = $(this).data('flilo_date_flilo');
    var flilo_time_in         = $(this).data('flilo_time_in');
    var flilo_time_out        = $(this).data('flilo_time_out');
    var flilo_reason          = $(this).data('flilo_reason');
    var flilo_approved_by     = $(this).data('flilo_approved_by');
    var flilo_app_status      = $(this).data('flilo_app_status');
    var flilo_manager_app     = $(this).data('flilo_manager_app');
    var flilo_mgr_app_status  = $(this).data('flilo_mgr_app_status');

    $('#modal_flilo_appv').modal('show');

    $('#flilo_txt_flilo_id').val(flilo_id);
    $('#flilo_txt_e_id').val(flilo_date_filed);
    $('#flilo_txt_date').val(flilo_emp_id);
    $('#flilo_txt_name').val(flilo_emp_name);
    $('#flilo_txt_dept').val(flilo_department);
    $('#flilo_txt_date_flilo').val(flilo_date_flilo);
    $('#flilo_txt_time_in').val(flilo_time_in);
    $('#flilo_txt_time_out').val(flilo_time_out);
    $('#flilo_txt_reason').val(flilo_reason);
    $('#flilo_txt_app_by_head').val(flilo_approved_by);
    $('#flilo_txt_app_by_head_stat').val(flilo_app_status);
    $('#flilo_txt_app_by_mgr').val(flilo_manager_app);
    $('#flilo_txt_app_by_mgr_stat').val(flilo_mgr_app_status);
  });

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // Custom date filter for DataTable
  $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
      var min = $('#flilo_txt_date_fr').datepicker("getDate");
      var max = $('#flilo_txt_date_to').datepicker("getDate");
      var startDate = new Date(data[3]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if (max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    }
  );

  $("#flilo_txt_date_fr").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  $("#flilo_txt_date_to").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  var table = $('#tbl_flilo').DataTable();

  // Event listener to the two range filtering inputs to redraw on input
  $('#flilo_txt_date_fr, #flilo_txt_date_to').change(function () {
    table.draw();
  });

});
