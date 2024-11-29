<?php get_header(); ?>
<section class="section py-2">
<?php if (have_posts()) : ?>
    <div class="posts-list">
        <?php 
        while (have_posts()) : the_post(); 
            get_template_part('template-parts/content', 'post'); 
        endwhile; 
        ?>
    </div>
    <!-- Pagination -->
    <div class="pagination-container">
        <?php get_template_part('template-parts/pagination'); ?>
    </div>
<?php else : ?>
    <!-- No posts found message -->
    <div class="notification is-danger">
        <p><?php esc_html_e('No posts found by this author. Please check back later!', 'quotes-theme'); ?></p>
    </div>
<?php endif; ?>
</section>
<?php get_footer(); ?>