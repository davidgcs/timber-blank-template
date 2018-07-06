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


});