<?php
/**
 * Template for displaying comments
 * Compatible with Theme Check (uses wp_list_comments & get_avatar)
 */

if (post_password_required()) {
    return;
}
?>
<hr>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(
                    __('Un comentario en "%s"', 'serin'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    _n('%s comentario en "%s"', '%s comentarios en "%s"', $comments_number, 'serin'),
                    number_format_i18n($comments_number),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'avatar_size' => 60,
                'short_ping' => true,
                'callback' => null, // usa el callback por defecto para mantener compatibilidad
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation">
                <div class="nav-previous"><?php previous_comments_link(__('← Comentarios anteriores', 'serin')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Comentarios siguientes →', 'serin')); ?></div>
            </nav>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="no-comments"><?php _e('Los comentarios están cerrados.', 'serin'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => __('Deja un comentario', 'serin'),
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h3>',
        'class_submit' => 'btn btn-primary',
        'comment_field' => '
            <p class="comment-form-comment">
                <label for="comment">' . __('Comentario', 'serin') . '</label>
                <textarea id="comment" name="comment" cols="45" rows="6" required></textarea>
            </p>',
        'fields' => array(
            'author' =>
                '<p class="comment-form-author">
                    <label for="author">' . __('Nombre', 'serin') . '</label>
                    <input id="author" name="author" type="text" required />
                </p>',
            'email' =>
                '<p class="comment-form-email">
                    <label for="email">' . __('Correo electrónico', 'serin') . '</label>
                    <input id="email" name="email" type="email" required />
                </p>',
        ),
    ));
    ?>
</div>
<hr>