<section class="comments">
    <div class="comments__form">
        <?php
        add_filter('comment_form_default_fields', 'website_remove');
        function website_remove($fields)
        {
            if (isset($fields['url']))
                unset($fields['url']);
            return $fields;
        }
        $comments_args = array(
            // Change the title of send button 
            'label_submit' => __('Submit', 'textdomain'),
            // Change the title of the reply section
            'title_reply' => __('Submit a comment below!', 'textdomain'),
            // Remove "Text or HTML to be displayed after the set of comment fields".
            'comment_notes_after' => '',
            // Redefine your own textarea (the comment body).
            'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
        );
        echo comment_form($comments_args); ?>
    </div>

    <div class="comments__approved">
        <?php
        $comments = get_approved_comments($post->ID);
        if (!empty($comments)) : ?>
            <h3 class="approved-title">Comments:</h3>
            <?php
            foreach ($comments as $comment) :
                $author = $comment->comment_author;
                $content = $comment->comment_content;
                $time =  strtotime($comment->comment_date);
                $date = date('F d Y', $time);
            ?>
                <div class="comment">
                    <h3 class="comment-author"><?= $author ?> <span class="posted"><i class="far fa-clock"></i> <?= $date ?></span></h3>
                    <div class="comment-content"><?= $content ?></div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</section>