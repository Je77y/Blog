$(document).ready( function () {

    $('li').click(function () {
        $('li > a.anchor').removeClass('active');
        $('a.anchor').parent($(this)).addClass('active');
    });



});
