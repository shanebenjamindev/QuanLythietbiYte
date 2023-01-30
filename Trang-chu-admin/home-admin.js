$(document).ready(function () {
    $(".btn-button").hover(function (e) { 
        e.preventDefault();
        $(".slidenav").addClass("show");
        $(".right").addClass("hide");
    });
    $(".btn-button2").click(function (e) { 
        e.preventDefault();
        $(".slidenav").removeClass("show");
        $(".right").removeClass("hide");
    });
  
});
$(window).on("load", function(e) {
    $("body").removeClass("preloadings");
    $(".load").delay(3800).fadeOut("fast");
   });