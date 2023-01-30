$(document).ready(function () {

    $(".radio-tkh").hide();
    $(".radio-nvbh").hide();
    $(".radio-thh").hide();
    $("#datepick").datepicker();
    $("#datepick1").datepicker();
$(".tkh").click(function (e) { 
    e.preventDefault();
    $(".radio-bcth").hide();
    $(".radio-nvbh").hide();
    $(".radio-thh").hide();
    $(".radio-tkh").show();
    $(".tnvbh").addClass("active-class")
    $(".thh").addClass("active-class")
    $(".bcth").addClass("active-class")
    $(".tkh").removeClass("active-class");
});

$(".tnvbh").click(function (e) { 
    e.preventDefault();
    $(".radio-bcth").hide();
    $(".radio-tkh").hide();
    $(".radio-thh").hide();
    $(".radio-nvbh").show();
    $(".tkh").addClass("active-class")
    $(".thh").addClass("active-class")
    $(".bcth").addClass("active-class")
    $(".tnvbh").removeClass("active-class");
});

$(".thh").click(function (e) { 
    e.preventDefault();
    $(".radio-bcth").hide();
    $(".radio-nvbh").hide();
    $(".radio-tkh").hide();
    $(".radio-thh").show();
    $(".tnvbh").addClass("active-class")
    $(".tkh").addClass("active-class")
    $(".bcth").addClass("active-class")
    $(".thh").removeClass("active-class");
});

$(".bcth").click(function (e) { 
    e.preventDefault();
    $(".radio-tkh").hide();
    $(".radio-nvbh").hide();
    $(".radio-thh").hide();
    $(".radio-bcth").show();
    $(".tnvbh").addClass("active-class");
    $(".tkh").addClass("active-class");
    $(".thh").addClass("active-class");
    $(".bcth").removeClass("active-class");
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
});
$(window).on("load", function(e) {
    $("body").removeClass("preloadings");
    $(".load").delay(3800).fadeOut("fast");
   });