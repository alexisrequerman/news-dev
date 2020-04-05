$(document).ready(function(){
  /* Get iframe src attribute value i.e. YouTube video url
  and store it in a variable */
  var url_judge = '<?php echo base_url();?>assets/media/judge_converted.mp4';
  var url_shopp = '<?php echo base_url();?>assets/media/shoppers_converted.mp4';
  var url_popul = '<?php echo base_url();?>assets/media/popularity_converted.mp4';

  /* Assign empty url value to the iframe src attribute when
  modal hide, which stop the video playing */
  $("#modal_play_judge").on('hide.bs.modal', function(){
    $("#video_judge").attr('src', '');
  });

  $("#modal_play_sc").on('hide.bs.modal', function(){
    $("#video_sc").attr('src', '');
  });

  $("#modal_play_pv").on('hide.bs.modal', function(){
    $("#video_pv").attr('src', '');
  });

  /* Assign the initially stored url back to the iframe src
  attribute when modal is displayed again */
  $("#modal_play_judge").on('show.bs.modal', function(){
    $("#video_judge").attr('src', url_judge);
  });

  $("#modal_play_sc").on('show.bs.modal', function(){
    $("#video_sc").attr('src', url_shopp);
  });

  $("#modal_play_pv").on('show.bs.modal', function(){
    $("#video_pv").attr('src', url_popul);
  });
});
