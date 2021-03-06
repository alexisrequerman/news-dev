$(document).ready(function(){

  /*
  *
  *
  * Script for view_article.php
  *
  *
  */

  // load DataTable data
  show_programs();

  // load DataTable
  $('#tbl_programs').dataTable();

  // show all articles
  function show_programs()
  {
    $.ajax({
      type      : "GET",
      url       : "<?php echo base_url('content/read_programs');?>",
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
              '<td>' + data[i].program_title + '</td>' +
              '<td>' + data[i].program_category + '</td>' +
              '<td>' + data[i].program_status + '</td>' +
              '<td>' +
                '<div class="btn-group btn-group-sm special" role="group">' +
                  '<a href="<?php echo site_url('content/edit_program?program=');?>' + data[i].program_id + '" class="btn btn-primary">' +
                    '<span class="fa fa-edit"></span> EDIT' +
                  '</a>' +
                  '<a href="<?php echo site_url('news/tv_show?show=');?>' + data[i].program_id + '" class="btn btn-info" target="_blank">' +
                    '<span class="fa fa-eye"></span> VIEW' +
                  '</a>' +
                '</div>' +
              '</td>' +
            '</tr>';
        }
        $('#show_all_programs').html(html);
        console.log('Programs table loaded successfuly!');
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
