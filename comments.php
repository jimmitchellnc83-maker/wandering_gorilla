<?php
/**
 * The template for displaying comments
 * Guest Book style comment system
 *
 * @package Wandering_Gorilla
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf(
                _n(
                    '%s Guest Book Entry',
                    '%s Guest Book Entries',
                    $comments_number,
                    'wandering-gorilla'
                ),
                number_format_i18n($comments_number)
            );
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'wandering_gorilla_comment',
            ));
            ?>
        </ol>

        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
            <nav class="comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link(__('← Older Entries', 'wandering-gorilla')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Entries →', 'wandering-gorilla')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments vintage-label text-center">
            <?php _e('Guest book is currently closed.', 'wandering-gorilla'); ?>
        </p>
    <?php endif; ?>

    <?php
    if (comments_open()) :
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true'" : '');

        $fields = array(
            'author' => '<div class="form-group">
                <label for="author">' . __('Name', 'wandering-gorilla') . ($req ? ' *' : '') . '</label>
                <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />
            </div>',

            'email' => '<div class="form-group">
                <label for="email">' . __('Email', 'wandering-gorilla') . ($req ? ' *' : '') . '</label>
                <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />
                <p class="vintage-label" style="margin-top: 6px;">' . __('(Will not be published)', 'wandering-gorilla') . '</p>
            </div>',

            'url' => '<div class="form-group">
                <label for="url">' . __('Website', 'wandering-gorilla') . '</label>
                <input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" />
            </div>',
        );

        $comment_field = '<div class="form-group">
            <label for="comment">' . __('Your Guest Book Entry *', 'wandering-gorilla') . '</label>
            <textarea id="comment" name="comment" rows="6" aria-required="true"></textarea>
        </div>';

        comment_form(array(
            'title_reply'          => __('Sign the Guest Book', 'wandering-gorilla'),
            'title_reply_to'       => __('Reply to %s', 'wandering-gorilla'),
            'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
            'title_reply_after'    => '</h3>',
            'comment_field'        => $comment_field,
            'fields'               => $fields,
            'comment_notes_before' => '<p class="vintage-label">' . __('Leave your mark in our guest book. Share your thoughts, experiences, or recommendations.', 'wandering-gorilla') . '</p>',
            'comment_notes_after'  => '',
            'submit_button'        => '<button type="submit" name="submit" id="submit" class="submit-button">' . __('Sign Guest Book', 'wandering-gorilla') . '</button>',
            'class_submit'         => 'submit-button',
            'label_submit'         => __('Sign Guest Book', 'wandering-gorilla'),
        ));
    endif;
    ?>

</div><!-- #comments -->
