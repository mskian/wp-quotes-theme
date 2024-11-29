<?php get_header(); ?>
<section class="section py-2">
    <h1 class="title is-5 home-title">
        <?php printf(
            esc_html__('Search Results for: %s', 'quotes-theme'),
            esc_html(get_search_query())
        ); ?>
    </h1>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'post'); ?>
        <?php endwhile; ?>
        <?php get_template_part('template-parts/pagination'); ?>
    <?php else : ?>
        <div class="notification is-danger">
            <p><?php esc_html_e('No results found. Try searching with different keywords.', 'quotes-theme'); ?></p>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>