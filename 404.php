<?php get_header(); ?>
<section class="section py-2">
    <div class="container">
        <h1 class="title home-title"><?php esc_html_e('404 - Page Not Found', 'quotes-theme'); ?></h1>
        <p style=" display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <?php esc_html_e('It seems the page you are looking for does not exist.', 'quotes-theme'); ?>
            <?php esc_html_e('Try going back to the', 'quotes-theme'); ?>
            <a class="has-text-danger" href="<?php echo esc_url(home_url()); ?>">
                <?php esc_html_e('Homepage', 'quotes-theme'); ?>
            </a>.
        </p>
    </div>
</section>
<?php get_footer(); ?>