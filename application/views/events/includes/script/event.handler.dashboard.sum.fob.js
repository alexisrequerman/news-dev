$(document).ready(function(){
  // load data on DataTable
  show_data_fob();

  // load DataTable
  $('#tbl_fob').dataTable({
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
  $('#fob_txt_fob_id').attr('disabled', true);
  $('#fob_txt_e_id').attr('disabled', true);
  $('#fob_txt_date').attr('disabled', true);
  $('#fob_txt_name').attr('disabled', true);
  $('#fob_txt_dept').attr('disabled', true);
  $('#fob_txt_reason').attr('disabled', true);
  $('#fob_txt_date_fob').attr('disabled', true);
  $('#fob_txt_location').attr('disabled', true);
  $('#fob_txt_time_start').attr('disabled', true);
  $('#fob_txt_time_finised').attr('disabled', true);
  $('#fob_txt_app_by_head').attr('disabled', true);
  $('#fob_txt_app_by_head_stat').attr('disabled', true);
  $('#fob_txt_app_by_mgr').attr('disabled', true);
  $('#fob_txt_app_by_mgr_stat').attr('disabled', true);

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/


  // populate tbl_fob
  function show_data_fob()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('fieldwork_official_business/fob_read_all');?>",
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
              '<a href="javascript:void(0);" class="btn btn-primary btn-xs btn-flat fapp_fob" data-fob_id="'+data[i].fob_id+'" data-fob_date_filed="'+data[i].fob_date_filed+'" data-fob_emp_id="'+data[i].fob_emp_id+'" data-fob_emp_name="'+data[i].fob_emp_name+'" data-fob_department="'+data[i].fob_department+'" data-fob_reason="'+data[i].fob_reason+'" data-fob_date_fob="'+data[i].fob_date_fob+'" data-fob_location="'+data[i].fob_location+'" data-fob_time_start="'+data[i].fob_time_start+'" data-fob_time_finished="'+data[i].fob_time_finished+'" data-fob_approved_by="'+data[i].fob_approved_by+'" data-fob_app_status="'+data[i].fob_app_status+'" data-fob_manager_app="'+data[i].fob_manager_app+'" data-fob_mgr_app_status="'+data[i].fob_mgr_app_status+'"><span class="fa fa-calendar"></span> '+ data[i].fob_date_filed +'</a>' +
            '</td>' +
              '<td>' + data[i].fob_emp_id + '</td>' +
              '<td>' + data[i].fob_emp_name + '</td>' +
              '<td>' + data[i].fob_date_fob + '</td>' +
              '<td>' + data[i].fob_time_start + '</td>' +
              '<td>' + data[i].fob_time_finished + '</td>' +
              '<td>' + data[i].fob_app_status + '</td>' +
            '</tr>';
        }
        $('#show_all_fob').html(html);
      }
    });
  }

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  $('#show_all_fob').on('click', '.fapp_fob', function(){
    var fob_id              = $(this).data('fob_id');
    var fob_date_filed      = $(this).data('fob_date_filed');
    var fob_emp_id          = $(this).data('fob_emp_id');
    var fob_emp_name        = $(this).data('fob_emp_name');
    var fob_department      = $(this).data('fob_department');
    var fob_reason          = $(this).data('fob_reason');
    var fob_date_fob        = $(this).data('fob_date_fob');
    var fob_location        = $(this).data('fob_location');
    var fob_time_start      = $(this).data('fob_time_start');
    var fob_time_finished   = $(this).data('fob_time_finished');
    var fob_approved_by     = $(this).data('fob_approved_by');
    var fob_app_status      = $(this).data('fob_app_status');
    var fob_manager_app     = $(this).data('fob_manager_app');
    var fob_mgr_app_status  = $(this).data('fob_mgr_app_status');

    $('#modal_fob_appv').modal('show');

    $('#fob_txt_fob_id').val(fob_id);
    $('#fob_txt_date').val(fob_date_filed);
    $('#fob_txt_e_id').val(fob_emp_id);
    $('#fob_txt_name').val(fob_emp_name);
    $('#fob_txt_dept').val(fob_department);
    $('#fob_txt_reason').val(fob_reason);
    $('#fob_txt_date_fob').val(fob_date_fob);
    $('#fob_txt_location').val(fob_location);
    $('#fob_txt_time_start').val(fob_time_start);
    $('#fob_txt_time_finised').val(fob_time_finished);
    $('#fob_txt_app_by_head').val(fob_approved_by);
    $('#fob_txt_app_by_head_stat').val(fob_app_status);
    $('#fob_txt_app_by_mgr').val(fob_manager_app);
    $('#fob_txt_app_by_mgr_stat').val(fob_mgr_app_status);
  });

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // Custom date filter for DataTable
  $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
      var min = $('#fob_txt_date_fr').datepicker("getDate");
      var max = $('#fob_txt_date_to').datepicker("getDate");
      var startDate = new Date(data[3]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if (max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    }
  );

  $("#fob_txt_date_fr").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  $("#fob_txt_date_to").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  var table = $('#tbl_fob').DataTable();

  // Event listener to the two range filtering inputs to redraw on input
  $('#fob_txt_date_fr, #fob_txt_date_to').change(function () {
    table.draw();
  });

});
