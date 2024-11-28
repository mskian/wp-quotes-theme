<?php

if (post_password_required()) {
    return;
}

?>

<div id="comments" class="section">
    <div class="container">
        <h2 class="title is-5">
            <?php
            printf(
                esc_html(_n('One Comment', '%1$s Comments', get_comments_number(), 'quotes-theme')),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>

        <?php if (have_comments()) : ?>
            <ul class="comment-list">
                <?php
                wp_list_comments([
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size' => 50,
                    'callback'   => function ($comment, $args, $depth) {
                        $tag = ($args['style'] === 'div') ? 'div' : 'li';
                        ?>
                        <<?php echo esc_html($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
                            <figure class="media-left">
                                <?php echo get_avatar($comment, $args['avatar_size'], '', '', ['class' => 'image is-64x64']); ?>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <strong>
                                        <?php
                                        $author_link = get_comment_author_link();
                                        if (!empty($author_link)) {
                                            // Replace the 'class="url"' with our desired class and 'rel' attribute
                                            $author_link = preg_replace(
                                                '/<a(.*?)class="url"(.*?)>/',
                                                '<a$1class="has-text-link has-text-weight-bold"$2>',
                                                $author_link
                                            );
                                            $author_link = preg_replace(
                                                '/<a(.*?)rel="external nofollow ugc"(.*?)>/',
                                                '<a$1rel="ugc"$2>',
                                                $author_link
                                            );
                                            
                                            // Echo the modified author link
                                            echo $author_link;
                                        }
                                        ?>
                                    </strong>
                                    <small>
                                        <?php
                                        printf(
                                            esc_html__(' %s ago', 'quotes-theme'),
                                            esc_html(human_time_diff(get_comment_time('U'), current_time('U')))
                                        );
                                        ?>
                                    </small>
                                    <p class="has-text-grey-dark"><?php echo wp_kses_post(get_comment_text()); ?></p>
                                    <?php if ($comment->comment_approved == '0') : ?>
                                        <em class="has-text-danger">
                                            <?php esc_html_e('Your comment is awaiting moderation.', 'quotes-theme'); ?>
                                        </em>
                                    <?php endif; ?>
                                </div>
                                <div class="comment-reply">
                                    <?php
                                    comment_reply_link(array_merge($args, [
                                        'reply_text' => '<span class="has-text-danger">' . esc_html__('Reply', 'quotes-theme') . '</span>',
                                        'depth'      => $depth,
                                        'max_depth'  => $args['max_depth'],
                                    ]));
                                    ?>
                                </div><br>
                            </div>
                        </<?php echo esc_html($tag); ?>>
                        <?php
                    },
                ]);
                ?>
            </ul>

            <!-- Pagination for comments -->
            <nav class="pagination is-centered" role="navigation" aria-label="comments-navigation">
                <?php paginate_comments_links([
                    'prev_text' => '&laquo; ' . esc_html__('Previous', 'quotes-theme'),
                    'next_text' => esc_html__('Next', 'quotes-theme') . ' &raquo;',
                    'type'      => 'list',
                ]); ?>
            </nav>

        <?php else : ?>
            <p class="notification is-info has-text-centered">
                <?php esc_html_e('No comments yet. Be the first to comment', 'quotes-theme'); ?>
            </p>
        <?php endif; ?>

        <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
            <p class="notification is-danger has-text-centered">
                <?php esc_html_e('Comments are closed for this post.', 'quotes-theme'); ?>
            </p>
        <?php endif; ?>

        <div class="comment-form">
            <?php
            comment_form([
                'class_submit' => 'button is-primary',
                'title_reply'  => '<span class="title is-5">' . esc_html__('Leave a Comment', 'quotes-theme') . '</span>',
                'comment_field' => '<div class="field">
                    <label class="label" for="comment">' . esc_html__('Comment', 'quotes-theme') . '</label>
                    <div class="control">
                        <textarea id="comment" name="comment" class="textarea has-background-light" rows="5" required></textarea>
                    </div>
                </div>',
                'fields'       => [
                    'author' => '<div class="field">
                        <label class="label" for="author">' . esc_html__('Name', 'quotes-theme') . '</label>
                        <div class="control">
                            <input id="author" name="author" type="text" class="input has-background-light" required />
                        </div>
                    </div>',
                    'email'  => '<div class="field">
                        <label class="label" for="email">' . esc_html__('Email', 'quotes-theme') . '</label>
                        <div class="control">
                            <input id="email" name="email" type="email" class="input has-background-light" required />
                        </div>
                    </div>',
                ],
                'submit_button' => '<button type="submit" class="button is-link">' . esc_html__('Post Comment', 'quotes-theme') . '</button>',
            ]);
            ?>
        </div>
    </div>
</div>
