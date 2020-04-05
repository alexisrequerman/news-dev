$(document).ready(function(){
  /*
  *
  * alphabet and white space only
  *
  */

  $('#txt_name').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z_ ]/gi, ''));
  });

  $('#txt_comment').on('input', function() {
    var node = $(this);
    node.val(node.val().replace(/[^a-z0-9,.!?\s]/gi, ''));
  });

  /*
  *
  * Capitalized every word
  *
  */

  $('#txt_name').on('keyup', function() {
    var input = document.getElementById("txt_name");
    var word = input.value.split(" ");
    for (var i = 0; i < word.length; i++) {
      word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
    }
    input.value = word.join(" ");
  });

});
