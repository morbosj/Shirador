$(document).ready(function() {
  $("#showHide").click(function() {
    if ($(".password").attr("type") == "password") {
      $(".password").attr("type", "text");

    } else {
      $(".password").attr("type", "password");
    }
  });
});