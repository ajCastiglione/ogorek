<?php
$currentPage = get_query_var('paged');
$currentCat = get_the_category()[0]->slug;
$args = array(
  'category_name' => $currentCat,
  'paged' => $currentPage,
  'posts_per_page' => 9
);
$query = new WP_Query($args);
?>

<div class="blog-posts grid-col-3">
  <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('cf post-card'); ?> role="article">

        <header class="article-header">

          <div class="featured-image-container">
            <a href="<?= the_permalink() ?>" class="post-link">
              <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>" class="featured-image">
              <span class="overlay"><i class="far fa-file-alt"></i></span>
            </a>
          </div>

          <h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
          <p class="byline entry-meta">
            <?php printf(
                  __('', 'bonestheme') . ' %1$s %2$s',
                  /* the time the post was published */
                  '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                  /* the categories of the post */
                  '<span class="by">' . __('|', 'bonestheme') . '</span> <span class="post-categories" itemprop="categories">' .  get_the_category_list(', ') . '</span>'
                ); ?>
          </p>

        </header>

        <section class="excerpt-content cf">
          <a href="<?= the_permalink() ?>" class="post-link">
            <?php the_excerpt(); ?>
          </a>
        </section>

      </article>

    <?php endwhile; ?>

  <?php else : ?>

    <article id="post-not-found" class="hentry cf">
      <header class="article-header">
        <h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
      </header>
      <section class="entry-content">
        <p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
      </section>
      <footer class="article-footer">
        <p><?php _e('Please try clearing your browser\'s cache and cookies if you believe this error should not be occuring.', 'bonestheme'); ?></p>
      </footer>
    </article>

  <?php endif; ?>
</div>