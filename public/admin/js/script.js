$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
         theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });


    //  Working on Reply Form

    $('span.reply-link').click(function() {
        // apear reply form
        $(this).next('.reply-form').fadeToggle(200);
    });

    $('.reply-form form').submit(function() {

        if( $('.reply-form textarea').val() === '') {
            return false;
        }else {
            return true;
        }

    });


    // active home page link

    $('.home-link').click(function() {
       window.open('/', '_blank');
    });


});