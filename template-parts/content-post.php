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
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="readmore-button" title="<?php echo esc_html(get_the_title()); ?>">
                            <?php esc_html_e('மேலும் படிக்க', 'quotes-theme'); ?>
                         </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</article>