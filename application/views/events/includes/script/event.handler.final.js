$(document).ready(function(){
  // populate DataTable with data
  show_score_average();
  show_score_judge();
  show_score_sc();
  show_score_pv();
  show_score_judge_average();

  // load DataTable
  $('#tbl_score_ca').dataTable({
    paging: false,
    dom: 'Bfrtip',
    buttons: ['excelHtml5','print']
  });
  $('#tbl_score_judge').dataTable({
    paging: false,
    dom: 'Bfrtip',
    buttons: ['excelHtml5','print']
  });
  $('#tbl_score_sc').dataTable({
    paging: false,
    dom: 'Bfrtip',
    buttons: ['excelHtml5','print']
  });
  $('#tbl_score_pv').dataTable({
    paging: false,
    dom: 'Bfrtip',
    buttons: ['excelHtml5','print']
  });

  $('#tbl_score_average').DataTable({
    "ajax": {
      url : "<?php echo site_url("scoresheet/table_average");?>",
      type : 'GET'
    },
    "order": [[ 0, "asc" ]],
    paging: false
  });

  $('#tbl_score_judge_average').dataTable({
    paging: false,
    dom: 'Bfrtip',
    buttons: ['excelHtml5','print']
  });

  // input mask
  $('#txt_score_talent').inputmask('numeric', {
    min: 0,
    max: 100
  });

  $('#txt_score_star').inputmask('numeric', {
    min: 0,
    max: 100
  });

  // alphabet and white space only
  $('#txt_user_fname').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z\s]/gi, ''));
  });

  $('#txt_user_fname_e').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z\s]/gi, ''));
  });

  // alphabet only
  $('#txt_user_user').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z]/gi, ''));
  });

  $('#txt_user_user_e').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z]/gi, ''));
  });

  // regular expressions
  $('#txt_user_fname').on('keyup', function() {
    var input = document.getElementById("txt_user_fname");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

  $('#txt_user_fname_e').on('keyup', function() {
    var input = document.getElementById("txt_user_fname_e");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

  // disabled TextBox
  $("#txt_score_date").attr('readonly', true);
  $("#txt_score_judge").attr('readonly', true);

  $("#txt_score_id_e").attr('readonly', true);
  $("#txt_score_date_e").attr('readonly', true);
  $("#txt_score_jid_e").attr('readonly', true);
  $("#txt_score_judge_e").attr('readonly', true);
  $("#txt_score_name_e").attr('readonly', true);
  $("#txt_score_talent_e").attr('readonly', true);
  $("#txt_score_star_e").attr('readonly', true);
  $("#txt_score_comment_e").attr('readonly', true);

  // show all average scores
  function show_score_average()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_averagescore');?>",
      async     : false,
      dataType  : "JSON",
      success   : function(data)
      {
        var html = '';
        var i;
        for(i=0; i<data.length; i++)
        {
          if (data[i].cnt_fullname == data[i].ss_contestant_name)
          {
            total_sc = math.sum(data[i].ss_score_talent, data[i].ss_score_talent, data[i].ss_score_talent);
          }
          var total_average = math.sum(data[i].ss_score_talent, data[i].ss_score_star, data[i].sc_score_sc, data[i].pv_score_pv);
          html +=
            '<tr>' +
              '<td>' + data[i].ss_date + '</td>' +
              '<td>' + data[i].cnt_fullname + '</td>' +
              '<td>' + math.sum(data[i].ss_score_talent,data[i].ss_score_talent,data[i].ss_score_talent) + '</td>' +
              '<td>' + data[i].ss_score_star + '</td>' +
              '<td>' + data[i].sc_score_sc + '</td>' +
              '<td>' + data[i].pv_score_pv + '</td>' +
              '<td>' + total_average + '</td>' +
            '</tr>';
        }
        $('#show_all_score_ca').html(html);
      }
    });
  }

  // show all judges scores average
  function show_score_judge_average()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_judges_score');?>",
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
              '<td>' + data[i].ss_contestant_name + '</td>' +
              '<td>' + data[i].totalTalent + '</td>' +
              '<td>' + data[i].totalStar + '</td>' +
              '<td>' + data[i].totalSC + '</td>' +
              '<td>' + data[i].totalPV + '</td>' +
              '<td>' + math.sum(data[i].totalTalent,data[i].totalStar,data[i].totalSC,data[i].totalPV) + '</td>' +
            '</tr>';
        }
        $('#show_all_score_judge_average').html(html);
      }
    });
  }

  // show all judges scores
  function show_score_judge()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_scoresheet');?>",
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
              '<td>' + data[i].ss_date + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="text-primary score_add" data-ss_id="'+data[i].ss_id+'" data-ss_date="'+data[i].ss_date+'" data-ss_uid="'+data[i].ss_uid+'" data-ss_contestant_name="'+data[i].ss_contestant_name+'" data-ss_score_talent="'+data[i].ss_score_talent+'" data-ss_score_star="'+data[i].ss_score_star+'" data-ss_score_choice="'+data[i].ss_score_choice+'" data-ss_judge_name="'+data[i].ss_judge_name+'" data-ss_remarks="'+data[i].ss_remarks+'">'
                  + data[i].ss_contestant_name +
                '</a>' +
              '</td>' +
              '<td>' + data[i].ss_score_talent + '</td>' +
              '<td>' + data[i].ss_score_star + '</td>' +
              '<td>' + data[i].ss_judge_name + '</td>' +
            '</tr>';
        }
        $('#show_all_score_judge').html(html);
      }
    });
  }

  // show all sc scores
  function show_score_sc()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_scoresheet_sc');?>",
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
              '<td>' + data[i].sc_date + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="text-primary score_sc_add" data-sc_id="'+data[i].sc_id+'" data-sc_uid="'+data[i].sc_uid+'" data-sc_user_name="'+data[i].sc_user_name+'" data-sc_date="'+data[i].sc_date+'" data-sc_contestant_name="'+data[i].sc_contestant_name+'" data-sc_score_sc="'+data[i].sc_score_sc+'">'
                  + data[i].sc_contestant_name +
                '</a>' +
              '</td>' +
              '<td>' + data[i].sc_score_sc + '</td>' +
              '<td>' + data[i].sc_user_name + '</td>' +
            '</tr>';
        }
        $('#show_all_score_sc').html(html);
      }
    });
  }

  // show all pv scores
  function show_score_pv()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/read_scoresheet_pv');?>",
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
              '<td>' + data[i].pv_date + '</td>' +
              '<td>' +
                '<a href="javascript:void(0);" class="text-primary score_sc_add" data-pv_id="'+data[i].pv_id+'" data-pv_uid="'+data[i].pv_uid+'" data-pv_user_name="'+data[i].pv_user_name+'" data-pv_date="'+data[i].pv_date+'" data-pv_contestant_name="'+data[i].pv_contestant_name+'" data-pv_score_pv="'+data[i].pv_score_pv+'">'
                  + data[i].pv_contestant_name +
                '</a>' +
              '</td>' +
              '<td>' + data[i].pv_score_pv + '</td>' +
              '<td>' + data[i].pv_user_name + '</td>' +
            '</tr>';
        }
        $('#show_all_score_pv').html(html);
      }
    });
  }

  // add new score
  $('#btn_add_score').on('click', function(){
    // variables for validation
    var data_name     = $('#txt_score_name').val();
    var data_talent   = $('#txt_score_talent').val();
    var data_star     = $('#txt_score_star').val();
    var data_comment  = $('#txt_score_comment').val();
    // variable for form serialization
    var data_form = $('#frm_score_add').serializeArray();
    // check if form has empty field
    if (!data_name || !data_talent || !data_star || !data_comment)
    {
      // error message
      $.toast({
        heading: 'EMPTY FIELD',
        text: 'Please input all required fields!',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
        hideAfter: 3000
      });
    }
    else
    {
      // disables save button
      $(this).prop("disabled",true);
      // success
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('scoresheet/add_scoresheet');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data){
          // show save toast
          toast_score_save();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all text fields
            $('[name="txt_score_date"]').val("");
            $('[name="txt_score_jid"]').val("");
            $('[name="txt_score_name"]').val("");
            $('[name="txt_score_talent"]').val("");
            $('[name="txt_score_star"]').val("");
            $('[name="txt_score_judge"]').val("");
            $('[name="txt_score_comment"]').val("");
            // close modal with delay
            $('#modal_add_score').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // save score toast
  function toast_score_save()
  {
    $.toast({
      heading: 'NEW SCORESHEET',
      text: 'A new contestant was successfuly scored! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

  // show data for editing
  $('#show_all_score').on('click', '.score_add', function(){
    var data_id         = $(this).data('ss_id');
    var data_date       = $(this).data('ss_date');
    var data_uid        = $(this).data('ss_uid');
    var data_contestant = $(this).data('ss_contestant_name');
    var data_talent     = $(this).data('ss_score_talent');
    var data_star       = $(this).data('ss_score_star');
    var data_choice     = $(this).data('ss_score_choice');
    var data_judge      = $(this).data('ss_judge_name');
    var data_remarks    = $(this).data('ss_remarks');

    $('#modal_edit_score').modal('show');

    $('#txt_score_id_e').val(data_id);
    $('#txt_score_date_e').val(data_date);
    $('#txt_score_jid_e').val(data_uid);
    $('#txt_score_name_e').val(data_contestant);
    $('#txt_score_talent_e').val(data_talent);
    $('#txt_score_star_e').val(data_star);
    $('#txt_score_choice_e').val(data_choice);
    $('#txt_score_judge_e').val(data_judge);
    $('#txt_score_comment_e').val(data_remarks);
  });

  // update data
  $('#btn_edit_score').on('click', function(){
    var data_choice = $('#txt_score_choice_e').val();
    var data_form   = $('#frm_score_edit').serializeArray();
    // check if form has empty field
    if (!data_choice)
    {
      // error message
      $.toast({
        heading: 'EMPTY FIELD',
        text: 'Please input all required fields!',
        showHideTransition: 'fade',
        icon: 'error',
        position: 'top-right',
        hideAfter: 3000
      });
    }
    else
    {
      // disables save button
      $(this).prop("disabled",true);
      // success
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('scoresheet/edit_finalscore');?>",
        dataType: "JSON",
        data: data_form,
        success: function(data)
        {
          // show update toast
          toast_score_update();
          // 3.5 seconds delay for modal to close
          setTimeout(function(){
            // clear all fields
            $('[name="txt_score_id_e"]').val("");
            $('[name="txt_score_date_e"]').val("");
            $('[name="txt_score_jid_e"]').val("");
            $('[name="txt_score_judge_e"]').val("");
            $('[name="txt_score_name_e"]').val("");
            $('[name="txt_score_talent_e"]').val("");
            $('[name="txt_score_star_e"]').val("");
            $('[name="txt_score_choice_e"]').val("");
            $('[name="txt_score_comment_e"]').val("");
            // close modal
            $('#modal_edit_score').modal('hide');
            // refresh page
            location.reload();
          }, 3500);
        }
      });
      return false;
    }
  });

  // update score toast
  function toast_score_update()
  {
    $.toast({
      heading: 'EDIT SCORE DETAILS',
      text: 'Update on this score was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

});
