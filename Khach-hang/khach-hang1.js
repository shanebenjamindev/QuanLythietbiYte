$(document).ready(function () {
    $(".button-group-2").hide();
    $(".btn-tab-2").click(function (e) { 
        e.preventDefault();
        $(".button-group-3").show();
        $(".button-group-2").show();
        $(".button-group-1").hide();
    });
    $(".btn-tab-1").click(function (e) { 
        e.preventDefault();
        $(".button-group-2").hide();
        $(".button-group-1").show();
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