<?php get_header(); ?>
    <?php if (have_posts()) : ?>
        <main>
        <section class="section py-2">
        <?php while (have_posts()) : the_post(); ?>
            <?php 
            get_template_part('template-parts/content', 'post'); 
            ?>
        <?php endwhile; ?>
        <?php get_template_part('template-parts/pagination'); ?>
    <?php else : ?>
        <div class="notification is-danger">
            <p><?php esc_html_e('No quotes found. Please check back later!', 'quotes-theme'); ?></p>
        </div>
    <?php endif; ?>
    </section>
    </main>
<?php get_footer(); ?>