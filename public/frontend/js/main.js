$(document).ready(function () {
    //
    // change header style when scrolling in page
    $(window).scroll(function () {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 150) {
            $(".header").addClass("is-sticky");
        } else {
            $(".header").removeClass("is-sticky");
        }
    });
    //
    // back to the top of page
    $('.swip-up').click(function () {
        $("html, body").stop().animate({ scrollTop: 0 }, 500);
    })
    $("button[class*='list-']").on('click', function () {
        //
        // switch format card list
        $(this).parent().find('button').removeClass('active');
        $(this).addClass('active')
    })

    //
    // show and hide mobile navbar
    $('.menu-btn').click(function () {
        $('.overlay').show();
        $('.overlay').css(
            { 'opacity': '0.5' }
        );
        $('.mobile-navbar').slideDown(500);
    })
    $('.overlay, .mobile-navbar .close-btn').click(function () {
        $('.overlay').hide();
        $('.overlay').css(
            { 'opacity': '0' }
        );
        $('.mobile-navbar').slideUp(500);
    })

});
