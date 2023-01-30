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
    $(".slide-nav-menu ul li a").click(function (e) { 
        e.preventDefault();
        $(".slide-nav").removeClass("active");
        $(this).next().addClass("active");
    });
    $(".slide-nav-menu ul li").click(function (e) { 
        e.preventDefault();
        $(".slide-nav-menu ul li").removeClass("active-class-2");
        $(this).addClass("active-class-2");
    });
});
$(window).on("load", function(e) {
    $("body").removeClass("preloadings");
    $(".load").delay(3800).fadeOut("fast");
   });