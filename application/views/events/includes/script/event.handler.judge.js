$(document).ready(function(){
  // populate DataTable with data
  show_score();

  // load DataTable
  $('#tbl_score').dataTable();

  // input mask
  $('#txt_score_talent').inputmask('numeric', {
    min: 0,
    max: 50
  });

  $('#txt_score_star').inputmask('numeric', {
    min: 0,
    max: 20
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

  // show all scores
  function show_score()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('scoresheet/').$score;?>",
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
              '<td>' + data[i].ss_contestant_name + '</td>' +
              '<td>' + data[i].ss_score_talent + '</td>' +
              '<td>' + data[i].ss_score_star + '</td>' +
              '<td>' + data[i].ss_remarks + '</td>' +
              '<td>' + data[i].ss_judge_name + '</td>' +
            '</tr>';
        }
        $('#show_all_score').html(html);
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
    if (!data_name || !data_talent || !data_star)
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
      // jconfirm
      $.confirm({
        title: 'ARE YOU SURE?',
        content: 'By clicking the confirm button, the score you provide will be save to database and you can never edit your score.',
        buttons: {
          confirm: function() {
            // disables save button
            $('#btn_add_score').prop("disabled",true);
            // disables textboxes
            $("#txt_score_name").attr('readonly', true);
            $("#txt_score_talent").attr('readonly', true);
            $("#txt_score_star").attr('readonly', true);
            $("#txt_score_comment").attr('readonly', true);
            // success
            $.ajax({
              type: "POST",
              url: "<?php echo site_url('scoresheet/add_scoresheet');?>",
              dataType: "JSON",
              data: data_form,
              success: function(data){
                // show save toast
                $.toast({
                  heading: 'JUDGE SCORE SHEET',
                  text: data,
                  showHideTransition: 'fade',
                  icon: 'success',
                  position: 'top-right',
                  hideAfter: 3000
                });
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
            //return false;
          },
          cancel: function() {
            $.alert('Canceled!');
          }
        }
      });
    }
    return false;
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

});
