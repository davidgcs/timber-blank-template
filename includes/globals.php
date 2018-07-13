<?php
$context['menu']->header = new Timber\Menu( 'main-menu' );
$context['menu']->elt = new Timber\Menu( 'elt-social' );
$context['menu']->fp = new Timber\Menu( 'fp-social' );
$context['menu']->footer_top = new Timber\Menu( 'footer-top' );
$context['menu']->footer_bottom = new Timber\Menu( 'footer-bottom' );


/* Languages */
$languages = icl_get_languages('skip_missing=1');
if($languages && count($languages)>=1){
    foreach ($languages as $language){
        if($language['active'] != 1){
            $langs[] = '<li class="p-2">
                        <a href="' . $language['url'] . '">
                            <div class="d-flex">
                                <img src="'.$language['country_flag_url'].'" class="language-icon" alt="'.$languages['native_name'].'">
                                <span class="my-auto">'. strtoupper ($language['code']) .'</span>
                                <span class="icon-up-open my-auto"></span>
                            </div>
                        </a>
                    </li>';
        }
        else{
            $context['currentLanguage'] = '<img src="'.$language['country_flag_url'].'" class="language-icon" alt="'.$languages['native_name'].'">
                    <span class="my-auto">'. strtoupper ($language['code']) .'</span>
                    <span class="icon-down-open my-auto"></span>';
        }
    }
    $context['languages'] = $langs;
}

/* Pagination between siblings */
$siblings = get_pages(array(
    'child_of' => $post->post_parent
));

foreach ($siblings as $index => $sibling){
    if(count($siblings) > 1 && $sibling->ID == $post->ID){
        if($siblings[$index+1]){
            /* if exists next sibling set it */
            $next = $siblings[$index+1];
        }
        else{
            /* else next is the first one */
            $next = $siblings[0];
        }

        if($siblings[$index-1]){
            /* if exists previous sibling set it */
            $previous = $siblings[$index-1];
        }
        else{
            /* else previous is the last one */
            $previous = $siblings[count($siblings)-1];
        }
    }
}
$context['navigation']['next'] = $next;
if($next->ID && get_the_post_thumbnail_url($next->ID))
    $context['navigation']['next']->thumbnail = get_the_post_thumbnail_url($next->ID);
$context['navigation']['previous'] = $previous;
if($previous->ID && get_the_post_thumbnail_url($previous->ID))
    $context['navigation']['previous']->thumbnail = get_the_post_thumbnail_url($previous->ID);
