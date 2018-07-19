/**
 * Created by david on 20/06/2018.
 */
jQuery(document).ready(function ($) {
    $('.search-input').bind("enterKey",function(e){
        $query = $(this).val();
        // window.location.href = window.location.protocol + "//" + window.location.host + "/?s=" + $query;
    });
    $('.search-input').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });

    /* Show submenu on menu item hover */
    $lastElem = null;

    $('.menu-item-parent').hover(function (){
        $current = $(this).find('.menu-index').val();
        $(this).addClass('hover');
        $('.submenu').each(function () {$(this).addClass('d-none');});
        $('.submenu.submenu-index-'+$current).removeClass('d-none');
    }, function(){
        $lastElem = $(this);
        $('.submenu').each(function () {$(this).addClass('d-none');});
        $('.menu-item-parent').each(function(){$(this).removeClass('hover')});
    });

    $('.submenu .submenu-space').hover(function (){
        $('.submenu.submenu-index-'+$current).removeClass('d-none');
        if($lastElem){
            $lastElem.addClass('hover');
        }
    }, function(){
        $('.submenu').each(function () {$(this).addClass('d-none');});
        $('.menu-item-parent').each(function(){$(this).removeClass('hover')})
    });


    /* Languages */
    $('.current-language').click(function () {
        $('.language-select').toggleClass('d-none')
        $(this).find('span.icon-down-open,span.icon-up-open').toggleClass("icon-down-open icon-up-open");
    });

    /* Product Tabs change */
    $('.page-template-product .tab-name').click(function () {
        $('.page-template-product .tab-name').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $('.page-template-product .content').each(function () {
            $(this).addClass('d-none');
        });
        $('.page-template-product .content-'+$(this).attr('id')).removeClass('d-none');
    });


    /* Swiper */
    $(document).ready(function () {
        //initialize swiper when document ready
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            simulateTouch: true,
            shortSwipes: false,
            freeMode: true,
            grabCursor: true,
            slidesPerView: 'auto',
            centeredSlides: true,
            slideToClickedSlide: true
        })
    });

});