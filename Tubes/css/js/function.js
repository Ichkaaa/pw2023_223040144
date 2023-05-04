$(document).ready(function () {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 750) {
      $(".black").css("background", "rgb(222 151 255)");
    } else {
      $(".black").css("background", "transparent");
    }
  });
});
