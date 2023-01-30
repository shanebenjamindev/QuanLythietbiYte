$(document).ready(function () {
    $(".button-group-2").hide();
    $(".btn-tab-2").click(function (e) { 
        e.preventDefault();
        $(".button-group-3").show();
        $(".button-group-2").show();
        $(".button-group-1").hide();
        $(".btn-tab-1").addClass("active-class");
        $(".btn-tab-2").removeClass("active-class");
    });
    $(".btn-tab-1").click(function (e) { 
        e.preventDefault();
        $(".button-group-2").hide();
        $(".button-group-1").show();
        $(".btn-tab-2").addClass("active-class");
        $(".btn-tab-1").removeClass("active-class");

    });
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