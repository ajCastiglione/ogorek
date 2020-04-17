<article id="post-<?php the_ID(); ?>" <?php post_class('cf col-1'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

  <header class="article-header entry-header">
    <div class="header__grid">
      <div class="header__info">
        <div class="byline entry-meta vcard">
          <?= get_byline($post); ?>
        </div>

        <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

        <?= get_author($post) ?>
      </div>
      <div class="header__image">
        <?php if (get_the_post_thumbnail_url($post->ID, 'full')) : ?>
          <a href="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>" class="foobox">
            <img src="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>" alt="<?= the_title() ?>" class="featured-image">
          </a>
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