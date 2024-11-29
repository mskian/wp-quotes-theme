<?php

// Add theme support and register Customizer settings
function quotes_theme_setup() {
    // Add theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);
    add_theme_support('custom-logo');

    // Register menus
    // register_nav_menus([
    //     'primary' => __('Primary Menu', 'quotes-theme'),
    //    'footer'  => __('Footer Menu', 'quotes-theme'),
    //]);
}
add_action('after_setup_theme', 'quotes_theme_setup');

// Add Customizer settings for navbar and body colors
function quotes_theme_customize_register($wp_customize) {
    $wp_customize->add_section('quotes_theme_colors', [
        'title'       => __('Colors', 'quotes-theme'),
        'description' => __('Customize the navbar and site background colors.', 'quotes-theme'),
        'priority'    => 30,
    ]);

    // Navbar color setting (gradient support)
    $wp_customize->add_setting('navbar_color', [
        'default'           => 'linear-gradient(90deg, #eff309, #bc09f3)',
        'sanitize_callback' => 'quotes_theme_sanitize_gradient',
    ]);

    $wp_customize->add_control('navbar_color', [
        'label'       => __('Navbar Gradient Color', 'quotes-theme'),
        'description' => __('Enter a valid CSS gradient (e.g., " linear-gradient(90deg, #eff309, #bc09f3) ").', 'quotes-theme'),
        'section'     => 'quotes_theme_colors',
        'type'        => 'text',
    ]);

    // Body background color setting
    $wp_customize->add_setting('background_color_custom', [
        'default'           => '#ecf0f1',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color_custom', [
        'label'    => __('Body Background Color', 'quotes-theme'),
        'section'  => 'quotes_theme_colors',
        'settings' => 'background_color_custom',
    ]));

    $wp_customize->add_section('quotes_theme_readmore', [
        'title'       => __('Read More Button', 'quotes-theme'),
        'description' => __('Customize the text for the Read More button.', 'quotes-theme'),
        'priority'    => 40,
    ]);

    $wp_customize->add_setting('read_more_text', [
        'default'           => __('Read More', 'quotes-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('read_more_text', [
        'label'       => __('Read More Button Text', 'quotes-theme'),
        'description' => __('Enter the text for the Read More button.', 'quotes-theme'),
        'section'     => 'quotes_theme_readmore',
        'type'        => 'text',
    ]);
}
add_action('customize_register', 'quotes_theme_customize_register');

// Sanitize gradient input
function quotes_theme_sanitize_gradient($input) {
    $pattern = '/^(linear|radial|repeating-linear|repeating-radial)-gradient\(.*\)$/i';
    return (preg_match($pattern, $input)) ? $input : 'linear-gradient(90deg, #eff309, #bc09f3)';
}

// Apply Customizer settings dynamically
function quotes_theme_custom_styles() {
    $navbar_color = get_theme_mod('navbar_color', 'linear-gradient(90deg, #eff309, #bc09f3)');
    $background_color = get_theme_mod('background_color_custom', '#ecf0f1');

    ?>
    <style>
        /* Body Background Color */
        body {
            background-color: <?php echo esc_attr($background_color); ?>;
        }
        /* Navbar Gradient Color */
        .navbar {
            background: <?php echo esc_attr($navbar_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'quotes_theme_custom_styles');

function quotes_theme_display_read_more_button($post_id) {

    if (empty($post_id) || !get_post($post_id)) {
        echo '<p class="notification is-danger">Error: Invalid or non-existent post.</p>';
        return;
    }

    // Get the read more text from the theme customizer or fallback to the default text
    $read_more_text = get_theme_mod('read_more_text', __('Read More', 'quotes-theme'));

    // Ensure the text is not empty before using it
    if (empty($read_more_text)) {
        $read_more_text = __('Read More', 'quotes-theme');
    }

    // Get the permalink and title for the given post_id
    $permalink = esc_url(get_permalink($post_id));
    $title = esc_html(get_the_title($post_id));

    if (empty($permalink) || empty($title)) {
        echo '<p class="notification is-warning">Warning: Unable to retrieve post details.</p>';
        return;
    }

    // Output the read more button with the proper values
    echo '<a href="' . $permalink . '" class="readmore-button" title="' . $title . '">' . esc_html($read_more_text) . '</a>';
}

// Enqueue styles and scripts
function quotes_theme_enqueue() {
    // Enqueue the Bulma CSS file
    wp_enqueue_style('bulma-css', get_template_directory_uri() . '/assets/css/bulma.min.css', [], '0.9.4', 'all');
    
    // Enqueue the theme's main stylesheet (style.css)
    wp_enqueue_style('quotes-theme-style', get_stylesheet_uri(), [], '1.0.1');
    
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