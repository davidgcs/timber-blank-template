<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

include( 'utilities.php' );
$utils = new Utilities();

$post = Timber::query_post();
$context = Timber::get_context();
$context['post'] = $post;

include( 'includes/posts/' . $post->post_name . '.php' );

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'posts/' . $post->ID . '.twig', 'posts/single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
