<?php
// Append this themes stylesheet
function my_theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twentyseventeen-taroomiya-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
	wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/assets/js/fix_nav.js',
        array( 'jquery' )
    );
    if ( ! isset( $content_width ) ) {
        $content_width = 800;
    }
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Add theme support for Portfolio Custom Post Type.
function my_theme_jetpack_portfolio() {
    add_theme_support( 'jetpack-portfolio' );
}
add_action( 'after_setup_theme', my_theme_jetpack_portfolio );

// Adjust tiled gallery width
function my_custom_tiled_gallery_width() {
    return '904';
}
add_filter( 'tiled_gallery_content_width', 'my_custom_tiled_gallery_width' );
?>
