<?php get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        <section class="section">
        <div class="container content">
        <div class="columns is-centered">
        <div class="column is-two-thirds">
        <div id="post-<?php the_ID(); ?>" >
                <h1 class="is-title is-size-5 has-text-centered"><?php echo esc_html(get_the_title()); ?></h1>
                <hr style="border: 1px solid black;" />
                    <br>
                    <div class="quote-text">
                        <?php
   
                        the_content();

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
                        <?php
                        printf(
                            esc_html__('Date: %s', 'quotes-theme'),
                            esc_html(get_the_modified_time('F j, Y'))
                        );
                        ?>
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
