$(document).ready(function () {
    $(".button-group-1-1").show();
    $(".button-group-1-2").hide();
    $(".button-group-1-3").hide();
    $(".input-container-10").hide();
    $(".btn-tab-2").click(function (e) { 
        e.preventDefault();
        $(".button-group-1-3").hide();
        $(".button-group-1-1").hide();
        $(".button-group-1-2").show();
        $(".btn-tab-1").addClass("active-class");
        $(".btn-tab-3").addClass("active-class");
        $(".btn-tab-2").removeClass("active-class");
    });
    $(".btn-tab-1").click(function (e) { 
        e.preventDefault();
        $(".button-group-1-3").hide();
        $(".button-group-1-2").hide();
        $(".button-group-1-1").show();
        $(".btn-tab-2").addClass("active-class");
        $(".btn-tab-3").addClass("active-class");
        $(".btn-tab-1").removeClass("active-class");
    });

    $(".btn-tab-3").click(function (e) { 
        e.preventDefault();
        $(".button-group-1-1").hide();
        $(".button-group-1-2").hide();
        $(".button-group-1-3").show();
        $(".btn-tab-1").addClass("active-class");
        $(".btn-tab-2").addClass("active-class");
        $(".btn-tab-3").removeClass("active-class");
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
   

    $(".btn-open").click(function (e) { 
        e.preventDefault();
        $(".container").addClass("hien-ra");
        $(".nen-mo").addClass("hien-ra");
    });
    $("#btn-close").click(function (e) { 
        e.preventDefault();
        $(".container").removeClass("hien-ra");
        $(".nen-mo").removeClass("hien-ra");
       
    });
    $(".nen-mo").click(function (e) { 
        e.preventDefault();
        $(".container").removeClass("hien-ra");
        $(".nen-mo").removeClass("hien-ra");
    });

    $(".btn-nhom").click(function (e) { 
        e.preventDefault();
        $(".container-2").addClass("hien-ra");
        $(".nen-mo-2").addClass("hien-ra");
    });
    $("#btn-close-4").click(function (e) { 
        e.preventDefault();
        $(".container-2").removeClass("hien-ra");
        $(".nen-mo-2").removeClass("hien-ra");
       
    });
    $(".nen-mo-2").click(function (e) { 
        e.preventDefault();
        $(".container-2").removeClass("hien-ra");
        $(".nen-mo-2").removeClass("hien-ra");
    });

    $(".btn-kho").click(function (e) { 
        e.preventDefault();
        $(".container-3").addClass("hien-ra");
        $(".nen-mo-3").addClass("hien-ra");
    });
    $("#btn-close-5").click(function (e) { 
        e.preventDefault();
        $(".container-3").removeClass("hien-ra");
        $(".nen-mo-3").removeClass("hien-ra");
       
    });
    $(".nen-mo-3").click(function (e) { 
        e.preventDefault();
        $(".container-3").removeClass("hien-ra");
        $(".nen-mo-3").removeClass("hien-ra");
    });

    $(".title-10").click(function (e) { 
        e.preventDefault();
      $(".form-1").toggleClass("toggle-hide");
    });
  
    

    $(".title-11").click(function (e) { 
        e.preventDefault();
      $(".form-2").toggleClass("toggle-hide-2");
    });
 

    $(".title-12").click(function (e) { 
        e.preventDefault();
      $(".form-3").toggleClass("toggle-hide-3");
    });

});
