<?php
$context['menu']->header = new Timber\Menu( 'main-menu' );
$context['menu']->elt = new Timber\Menu( 'elt-social' );
$context['menu']->fp = new Timber\Menu( 'fp-social' );
$context['menu']->footer_top = new Timber\Menu( 'footer-top' );
$context['menu']->footer_bottom = new Timber\Menu( 'footer-bottom' );

if(get_field('custom_page_content')){
    $context['acf']['custom_page_content'] = get_field('custom_page_content');
//    print_r($context['acf']['custom_page_content']);
}
