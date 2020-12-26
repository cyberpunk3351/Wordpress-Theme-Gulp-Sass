<?php

function breakbeat01_scripts() {
	wp_enqueue_style( 'breakbeat01-style', get_stylesheet_uri());

	// wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.min.css');

	// wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array(), null, true);

}



add_action( 'wp_enqueue_scripts', 'breakbeat01_scripts' );

add_theme_support( 'post-thumbnails', array( 'post' ) );
add_image_size('my-custom-thumb', 260, 150, true);
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-background' );

require get_template_directory() . '/inc/template-tags.php';

add_filter( 'excerpt_length', function(){
	return 20;
} );

?>