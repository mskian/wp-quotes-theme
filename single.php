<?php get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        <section class="section py-2">
        <div class="container content">
        <div class="columns is-centered">
        <div class="column is-two-thirds">
        <div id="post-<?php the_ID(); ?>" >
                <h1 class="is-title is-size-5 has-text-centered"><?php echo esc_html(get_the_title()); ?></h1>
                <hr style="border: 1px solid black;" />
                    <br>
                    <div class="quote-text">
                        <?php
                        // Safely render the content of the post/page
                        the_content();

                        // Pagination for multi-page posts
                        wp_link_pages([
                            'before'      => '<div class="page-links">' . esc_html__('Pages:', 'quotes-theme'),
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ]);
                        ?>
                    </div>
                    <hr style="border: 1px solid black;" />
                    <p class="post-date">
                    <time datetime="<?php echo esc_attr(get_the_modified_time('Y-m-d')); ?>">
                    <?php
                        printf(
                            esc_html__('Date: %s', 'quotes-theme'),
                            esc_html(get_the_modified_time('F j, Y'))
                        );
                        ?></time>
                    </p>
                    <p>
                        <?php
                        echo esc_html__('Category:', 'quotes-theme') . ' ';
                        quotes_theme_display_categories();
                        ?>
                    </p>
                    </div>
                    </div>
                    </div>
                    </div>
                <?php 
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                ?>
        </section>
        </article>
    <?php endwhile; ?>

<?php get_footer(); ?>
