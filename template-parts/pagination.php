<?php

global $wp_query;

if ($wp_query->max_num_pages > 1) :
    $big = 999999999;
    $pages = paginate_links([
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => __('&laquo;', 'quotes-theme'),
        'next_text' => __('&raquo;', 'quotes-theme'),
    ]);

    if (!empty($pages)) :
        ?>
        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
                <?php foreach ($pages as $page) : ?>
                    <li><?php echo wp_kses_post($page); ?></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php
    endif;
endif;

?>