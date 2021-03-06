$(document).ready(function(){
  // load data on DataTable
  show_data_loa();

  // load DataTable
  $('#tbl_loa').dataTable({
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
  $('#loa_txt_loa_id').attr('disabled', true);
  $('#loa_txt_e_id').attr('disabled', true);
  $('#loa_txt_date').attr('disabled', true);
  $('#loa_txt_name').attr('disabled', true);
  $('#loa_txt_dept').attr('disabled', true);
  $('#loa_txt_reason').attr('disabled', true);
  $('#loa_txt_leave_type').attr('disabled', true);
  $('#loa_txt_days').attr('disabled', true);
  $('#loa_txt_date_from').attr('disabled', true);
  $('#loa_txt_date_to').attr('disabled', true);
  $('#loa_txt_app_by_head').attr('disabled', true);
  $('#loa_txt_app_by_head_stat').attr('disabled', true);
  $('#loa_txt_app_by_mgr').attr('disabled', true);
  $('#loa_txt_app_by_mgr_stat').attr('disabled', true);
  $('#loa_txt_timekeeper').attr('disabled', true);

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // populate tbl_loa
  function show_data_loa()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('leave_of_absence/loa_read_all');?>",
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
                '<a href="javascript:void(0);" class="btn btn-primary btn-xs btn-flat fapp_loa" data-loa_id="'+data[i].loa_id+'" data-loa_date_filed="'+data[i].loa_date_filed+'" data-loa_emp_id="'+data[i].loa_emp_id+'" data-loa_emp_name="'+data[i].loa_emp_name+'" data-loa_department="'+data[i].loa_department+'" data-loa_reasons="'+data[i].loa_reasons+'" data-loa_type="'+data[i].loa_type+'" data-loa_days="'+data[i].loa_days+'" data-loa_date_from="'+data[i].loa_date_from+'" data-loa_date_to="'+data[i].loa_date_to+'" data-loa_recom_app="'+data[i].loa_recom_app+'" data-loa_status_recom_app="'+data[i].loa_status_recom_app+'" data-loa_recom_app_vpgm="'+data[i].loa_recom_app_vpgm+'" data-loa_status_recom_app_vpgm="'+data[i].loa_status_recom_app_vpgm+'" data-loa_timekeeper="'+data[i].loa_timekeeper+'"><span class="fa fa-calendar"></span> '+ data[i].loa_date_filed +'</a>' +
              '</td>' +
              '<td>' + data[i].loa_emp_id + '</td>' +
              '<td>' + data[i].loa_emp_name + '</td>' +
              '<td>' + data[i].loa_date_from + '</td>' +
              '<td>' + data[i].loa_date_to + '</td>' +
              '<td>' + data[i].loa_type + '</td>' +
              '<td>' + data[i].loa_status_recom_app + '</td>' +
            '</tr>';
        }
        $('#show_all_loa').html(html);
      }
    });
  }

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  $('#show_all_loa').on('click', '.fapp_loa', function(){
    var loa_id                      = $(this).data('loa_id');
    var loa_date_filed              = $(this).data('loa_date_filed');
    var loa_emp_id                  = $(this).data('loa_emp_id');
    var loa_emp_name                = $(this).data('loa_emp_name');
    var loa_department              = $(this).data('loa_department');
    var loa_reasons                 = $(this).data('loa_reasons');
    var loa_type                    = $(this).data('loa_type');
    var loa_days                    = $(this).data('loa_days');
    var loa_date_from               = $(this).data('loa_date_from');
    var loa_date_to                 = $(this).data('loa_date_to');
    var loa_recom_app               = $(this).data('loa_recom_app');
    var loa_status_recom_app        = $(this).data('loa_status_recom_app');
    var loa_recom_app_vpgm          = $(this).data('loa_recom_app_vpgm');
    var loa_status_recom_app_vpgm   = $(this).data('loa_status_recom_app_vpgm');
    var loa_timekeeper              = $(this).data('loa_timekeeper');

    $('#modal_loa_appv').modal('show');

    $('#loa_txt_loa_id').val(loa_id);
    $('#loa_txt_e_id').val(loa_date_filed);
    $('#loa_txt_date').val(loa_emp_id);
    $('#loa_txt_name').val(loa_emp_name);
    $('#loa_txt_dept').val(loa_department);
    $('#loa_txt_reason').val(loa_reasons);
    $('#loa_txt_leave_type').val(loa_type);
    $('#loa_txt_days').val(loa_days);
    $('#loa_txt_date_from').val(loa_date_from);
    $('#loa_txt_date_to').val(loa_date_to);
    $('#loa_txt_app_by_head').val(loa_recom_app);
    $('#loa_txt_app_by_head_stat').val(loa_status_recom_app);
    $('#loa_txt_app_by_mgr').val(loa_recom_app_vpgm);
    $('#loa_txt_app_by_mgr_stat').val(loa_status_recom_app_vpgm);
    $('#loa_txt_timekeeper').val(loa_timekeeper);
  });

  /*******************************************************/
  /*******************************************************/
  /*******************************************************/

  // Custom date filter for DataTable
  $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
      var min = $('#loa_txt_date_fr_2').datepicker("getDate");
      var max = $('#loa_txt_date_to_2').datepicker("getDate");
      var startDate = new Date(data[3]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if (max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    }
  );

  $("#loa_txt_date_fr_2").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  $("#loa_txt_date_to_2").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, autoclose: true });
  var table = $('#tbl_loa').DataTable();

  // Event listener to the two range filtering inputs to redraw on input
  $('#loa_txt_date_fr_2, #loa_txt_date_to_2').change(function () {
    table.draw();
  });

});
