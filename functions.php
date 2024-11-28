<?php

// Theme setup
function quotes_theme_setup() {

    // Add theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support( "wp-block-styles" );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'html5', [
        'search-form',  // Enables HTML5 search form
        'comment-form', // Enables HTML5 comment form
        'comment-list', // Enables HTML5 comment list
        'gallery',      // Enables HTML5 gallery
        'caption',      // Enables HTML5 caption support
    ]);

    // Register menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'quotes-theme'),
        'footer'  => __('Footer Menu', 'quotes-theme'),
    ]);

    // Add Custom Logo support
    add_theme_support('custom-logo', [
        'height' => 100, // Adjust the height as needed
        'width'  => 100, // Adjust the width as needed
        'flex-height' => true, // Allow flexible height for the logo
        'flex-width'  => true, // Allow flexible width for the logo
    ]);
}
add_action('after_setup_theme', 'quotes_theme_setup');

// Enqueue styles and scripts
function quotes_theme_enqueue() {
    // Enqueue the Bulma CSS file
    wp_enqueue_style('bulma-css', get_template_directory_uri() . '/assets/css/bulma.min.css', [], '0.9.4', 'all');
    
    // Enqueue the theme's main stylesheet (style.css)
    wp_enqueue_style('quotes-theme-style', get_stylesheet_uri(), [], '1.0.0');
    
    // Enqueue the theme's JavaScript file
   // wp_enqueue_script('quotes-theme-script', get_template_directory_uri() . '/assets/js/script.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'quotes_theme_enqueue');

// Display categories for posts
function quotes_theme_display_categories() {
    $categories = get_the_category();
    if (!empty($categories)) {
        // Get the first category
        $category = $categories[0];
        echo '<span class="post-tags"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></span>';
    }
}

add_post_type_support('post', 'post-formats', 'post-tags');

?>