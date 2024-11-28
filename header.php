<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="navbar">
    <div class="navbar-brand is-flex is-justify-content-center is-flex-grow-1">
       <a class="navbar-item" href="/" title="<?php echo esc_html(get_bloginfo('name')); ?>">
            <div class="site-logo">
            <?php the_custom_logo(); ?>
            </div>
        </a>
    </div>
</nav>