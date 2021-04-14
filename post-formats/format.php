<?php
$cta_text = get_field('blog_cta_text', 'options');
$cta_link = get_field('blog_cta_link', 'options');
$cta_text_blurb = get_field('blog_cta_text_blurb', 'options');
$hide_contact_cta = get_field('hide_contact_cta');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf col-1'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

  <header class="article-header entry-header">
    <div class="header__grid">
      <div class="header__info">

        <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
        <div class="byline entry-meta vcard">
          <?= get_byline($post); ?>
        </div>

        <?= get_author($post) ?>

      </div>
      <div class="header__image">
        <?php if (get_the_post_thumbnail_url($post->ID, 'full')) : ?>
          <a href="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>" id="single-image-container" class="foobox">
            <img src="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>" alt="<?= the_title() ?>" class="featured-image">
          </a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <section class="entry-content" itemprop="articleBody">
    <article class="post-grid">
      <div class="text">
        <?= the_content(); ?>
        <?php if (!$hide_contact_cta) : ?>
          <div class="contact-cta">
            <div class="cta-text"><?= $cta_text_blurb ?></div>
            <div class="cta-link"><a href="<?= $cta_link ?>"><?= $cta_text ?> <i class="fas fa-arrow-right"></i></a></div>
          </div>
        <?php endif; ?>
        <?php if (comments_open()) : ?>
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
              <h3 class="approved-title">Comments:</h3>
              <?php
              $comments = get_comments();
              foreach ($comments as $comment) :
                $author = $comment->comment_author;
                $content = $comment->comment_content; ?>
                <div class="comment">
                  <h3 class="comment-author"><?= $author ?></h3>
                  <div class="comment-content"><?= $content ?></div>
                </div>
              <?php
              endforeach;
              ?>
            </div>
          </section>
        <?php endif; ?>
      </div>
      <aside class="related-posts">
        <h2 class="related-posts__title"><?= get_field('related_posts_title') ?></h2>
        <?= get_field('related_posts_content') ?: null ?>
        <?= get_related_posts($post) ?>
      </aside>
    </article>
  </section>

</article>