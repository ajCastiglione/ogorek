<article id="post-<?php the_ID(); ?>" <?php post_class('cf col-1'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

  <header class="article-header entry-header">
    <div class="header__grid">
      <div class="header__info">
        <div class="byline entry-meta vcard">
          <?php

          if (get_field('post_author')) {
            $post_author = get_the_title(get_field('post_author')[0]->ID);
          } elseif (get_the_author_meta('ID') !== 2 && get_the_author_meta('ID') !== 12) {
            $post_author = get_the_author_link(get_the_author_meta('ID'));
          } else {
            $post_author = get_the_author_meta('display_name', 2);
          }

          printf(
            __('', 'bonestheme') . ' %1$s %2$s %3$s',
            /* the time the post was published */
            '<span class="by">' . __('by', 'bonestheme') . '</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . $post_author . '</span> | ',
            /* the author of the post */
            '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time> | ',
            get_the_category_list(', ')
          ); ?>
        </div>

        <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

        <?= get_author($post) ?>
      </div>
      <div class="header__image">
        <?php if (get_the_post_thumbnail_url($post->ID, 'full')) : ?>
          <img src="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>" alt="<?= the_title() ?>" class="featured-image">
        <?php endif; ?>
      </div>
    </div>
  </header>

  <section class="entry-content" itemprop="articleBody">
    <article class="post-grid">
      <div class="text">
        <?= the_content() ?>
      </div>
      <aside class="related-posts">
        <h2 class="related-posts__title"><?= get_field('related_posts_title') ?></h2>
        <?= get_field('related_posts_content') ?: null ?>
        <?= get_related_posts($post) ?>
      </aside>
    </article>
  </section>

</article>