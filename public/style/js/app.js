/**
 * Created by Fight on 8/20/2016.
 */
$(function () {
    $('.navbar-toggle-sidebar').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);
    });

    $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
        $('.search-input').focus();
    });
});



function upload(maxSize) {
    var fileUpload = document.getElementById("pic");
    if (typeof (fileUpload.files) != "undefined") {
        var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
        if(size > maxSize){
            $("#result").html("<p class='alert alert-danger' >حجم تصویر نمی تواند بیش از "+maxSize+" کیلوبایت باشد</p>");
            return false;
        }
    } else {
        alert("This browser does not support HTML5.");
    }
}