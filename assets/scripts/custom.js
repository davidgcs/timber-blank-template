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
    $('.menu-item').hover(()=>{
        $('#submenu').removeClass('d-none');
    }, ()=>{
        $('#submenu').addClass('d-none');
    });
});