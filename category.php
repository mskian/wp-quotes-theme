<?php get_header(); ?>
<section class="section py-2">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'post'); ?>
        <?php endwhile; ?>
        <?php get_template_part('template-parts/pagination'); ?>
    <?php else : ?>
        <div class="notification is-danger">
            <p><?php esc_html_e('No quotes found in this category. Please check back later!', 'quotes-theme'); ?></p>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>