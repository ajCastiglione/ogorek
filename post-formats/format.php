<article id="post-<?php the_ID(); ?>" <?php post_class('cf col-1'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

  <header class="article-header entry-header">

    <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

    <p class="byline entry-meta vcard">

      <?php printf(
        __('', 'bonestheme') . ' %1$s %2$s %3$s',
        /* the time the post was published */
        '<span class="by">' . __('by', 'bonestheme') . '</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link(get_the_author_meta('ID')) . '</span> | ',
        /* the author of the post */
        '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time> | ',
        get_the_category_list(', ')
      ); ?>

    </p>

    <?php if (get_the_post_thumbnail_url($post->ID, 'full')) : ?>
      <img src="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>" alt="<?= the_title() ?>" class="featured-image">
    <?php endif; ?>
  </header>

  <section class="entry-content cf" itemprop="articleBody">
    <?php $nn = get_the_author_meta('user_nicename');
    $found = false; ?>
    <?php $a = new WP_Query(array('post_type' => 'team'));
    while ($a->have_posts()) : $a->the_post();
      $un = get_field('user_link')['user_nicename'];
      if ($un === $nn) {
        $found = true; ?>
        <div class="author">
          <img src="<?= get_field('team_member_photo')['url'] ?>" alt="<?= the_title() ?>" class="portrait">
          <h2 class="name"><?= the_title() ?></h2>
          <a href="mailto:<?= get_field('email') ?>" class="email"><?= get_field('email') ?></a>
        </div>
      <?php }
    endwhile;
    wp_reset_query();
    if (!$found && !empty(get_field('post_author'))) {
      $authorID = get_field('post_author')[0]->ID; ?>
      <div class="author">
        <img src="<?= get_field('team_member_photo', $authorID)['url'] ?>" alt="<?= the_title($authorID) ?>" class="portrait">
        <h2 class="name"><?= get_the_title($authorID) ?></h2>
        <a href="mailto:<?= get_field('email', $authorID) ?>" class="email"><?= get_field('email', $authorID) ?></a>
      </div>
    <?php $found = true;
    }
    ?>
    <div class="text <?= $found ? '' : 'full-width' ?>">
      <?php
      the_content();
      ?>
    </div>
  </section>

  <footer class="article-footer">

    <?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>

  </footer>

</article>