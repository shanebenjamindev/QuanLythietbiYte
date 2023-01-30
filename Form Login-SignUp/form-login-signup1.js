$(document).ready(function () {
    $("#btn-signup").click(function (e) { 
        e.preventDefault();
    $(".form-login").addClass("an-di-form-login");
    $(".form-signup").addClass("hien-ra-form-sign-up");
    });
    $("#btn-login").click(function (e) { 
        e.preventDefault();
    $(".form-login").removeClass("an-di-form-login");
    $(".form-signup").removeClass("hien-ra-form-sign-up");
    });
});