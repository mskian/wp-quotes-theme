<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container content">
        <div class="columns is-centered">
           <div class="column is-half">
                <div class="card custom-card">
                <div class="card-content has-text-centered">
                    <?php quotes_theme_display_categories(); ?>
                    <h2 class="is-title is-size-5">
                        <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                            <?php echo esc_html(get_the_title()); ?>
                        </a>
                        </h2>
                        <hr>
                        <div class="buttons is-centered">
                        <?php
                            $post_id = get_the_ID();
                            if (!empty($post_id) && get_post($post_id)) {
                                quotes_theme_display_read_more_button($post_id);
                            } else {
                                echo '<p class="notification is-danger">Error: Unable to retrieve post information.</p>';
                            }
                        ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</article>