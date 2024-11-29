<?php get_header(); ?>
<main class="section py-2">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <h1 class="title"><?php echo esc_html(get_the_title()); ?></h1>
                <div class="content">
                    <?php echo wp_kses_post(get_the_content()); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>