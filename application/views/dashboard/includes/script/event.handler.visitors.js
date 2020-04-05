$(document).ready(function(){

  /*
  *
  *
  * Script for view_article.php
  *
  *
  */

  // load DataTable data
  show_visitors();

  // load DataTable
  $('#tbl_visitors').dataTable({
    order: [[ 0, 'desc' ], [ 1, 'desc' ]]
  });

  $('#tbl_covid').dataTable({
    order: [[ 0, 'desc' ]]
  });

  $('#tbl_covid_outside').dataTable();

  $('#tbl_covid_suspected').dataTable();


  // show all visitors
  function show_visitors()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('reports/read_visitors');?>",
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
              '<td>' + data[i].visit_date + '</td>' +
              '<td>' + data[i].visit_time + '</td>' +
              '<td>' + data[i].visit_page + '</td>' +
              '<td>' + data[i].visit_page_title + '</td>' +
              '<td>' + data[i].visit_ip + '</td>' +
              '<td>' +
                '<a href="' + data[i].visit_url + '" class="btn btn-xs btn-primary btn-block" target="_blank">' +
                  '<span class="fa fa-eye"></span> VIEW PAGE' +
                '</a>' +
              '</td>' +
            '</tr>';
        }
        $('#show_all_visitors').html(html);
      }
    });
  }

  /*
  *
  *
  * Script for view_article_new.php
  *
  *
  */

  // load Editor
  $('#txt_program_body').tinymce({
    height: 400,
    menubar: false,
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat'
  });

  /*
  *
  *
  * Script for view_article_edit.php
  *
  *
  */

  // load Editor
  $('#txt_program_body_edit').tinymce({
    height: 500,
    menubar: false,
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat'
  });

  /*
  *
  *
  * Toast notification
  *
  *
  */

  // save article toast
  function toast_art_save()
  {
    $.toast({
      heading: 'NEW ARTICLE',
      text: 'A new article was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

  // update article toast
  function toast_art_update()
  {
    $.toast({
      heading: 'EDIT ARTICLE DETAILS',
      text: 'Update on this article was successfuly saved! This modal will automatically closes.',
      showHideTransition: 'fade',
      icon: 'success',
      position: 'top-right',
      hideAfter: 3000
    });
  }

});
