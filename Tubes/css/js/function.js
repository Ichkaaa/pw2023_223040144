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


$(document).ready(function () {
  const tombolCari = $(".tombol-cari");
  const keyword = $(".keyword");
  const container = $(".admin-container");

  tombolCari.hide();

  //livesearch admin
  keyword.keyup(function () {
    var keywords = keyword.val().split(" "); // Mengelompokkan kata kunci menjadi array
    $.ajax({
      url: "../ajax/ajax_cari.php",
      data: {
        keywords: keywords, // Menggunakan array kata kunci
      },
      type: "get",
      success: function (response) {
        container.html(response);
      },
    });
  });
});
