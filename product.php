<?php
/**
 * Template name: Product
 */

include( 'utilities.php' );
$utils = new Utilities();

$post = new TimberPost();
$context = Timber::get_context();
$context['post'] = $post;

include( 'includes/globals.php');

/* Custom product ACF */
if(get_field('custom_product_content')){
    $context['acf']['custom_product_content'] = get_field('custom_product_content');
    //print_r($context['acf']['custom_product_content']);
}

if(file_exists(get_template_directory().'/includes/products/' . $post->post_name . '.php')){
    include( 'includes/products/' . $post->post_name . '.php' );
}

Timber::render( array( 'products/' . $post->post_name . '.twig', 'product.twig' ), $context );

?>

