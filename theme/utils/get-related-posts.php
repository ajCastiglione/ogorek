<?php
function get_related_posts($post)
{
  $related_posts = get_field('similar_posts', $post->ID);
  if (!empty($related_posts)) { ?>
    <div class="related-posts__container">
      <?php foreach ($related_posts as $post) { ?>
        <div class="related-posts__single">
          <?php $link = get_field('external_link', $post->ID) ? get_field('link', $post->ID) : get_permalink($post->ID); ?>
          <article id="post-<?php the_ID($post->ID); ?>" <?php post_class('cf post-card'); ?> role="article">

            <header class="article-header">

              <div class="featured-image-container">
                <a href="<?= $link ?>" class="post-link">
                  <img src="<?= get_the_post_thumbnail_url($post->ID, 'large') ?>" alt="<?= the_title($post->ID) ?>" class="featured-image">
                  <span class="overlay"><i class="far fa-file-alt"></i></span>
                </a>
              </div>

              <h2 class="h2 entry-title">
                <a href="<?= $link ?>" rel="bookmark" title="<?php the_title_attribute($post->ID); ?>">
                  <?php the_title(); ?>
                </a>
              </h2>
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

          </article>
        </div>
      <?php } ?>
    </div>
  <?php
  } else {
    $cats = '';
    $post_categories = wp_get_post_categories($post->ID);
    foreach ($post_categories as $index => $c) {
      $cat = get_category($c);
      $cats .= $index !== count($post_categories) - 1 ? $cat->name . ', ' : $cat->name;
    }
    $args = array(
      'post_type' => 'post',
      'category_name' => $cats,
      'posts_per_page' => 3
    );
    $query = new WP_Query($args); ?>

    <div class="related-posts__container">
      <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <div class="related-posts__single">
            <?php $link = get_field('external_link', $query->post->ID) ? get_field('link', $query->post->ID) : get_permalink($query->post->ID); ?>
            <article id="post-<?php the_ID($query->post->ID); ?>" <?php post_class('cf post-card'); ?> role="article">

              <header class="article-header">

                <div class="featured-image-container">
                  <a href="<?= $link ?>" class="post-link">
                    <img src="<?= get_the_post_thumbnail_url($query->post->ID, 'large') ?>" alt="<?= the_title($query->post->ID) ?>" class="featured-image">
                    <span class="overlay"><i class="far fa-file-alt"></i></span>
                  </a>
                </div>

                <h2 class="h2 entry-title">
                  <a href="<?= $link ?>" rel="bookmark" title="<?php the_title_attribute($query->post->ID); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>
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

            </article>
          </div>

      <?php endwhile;
      endif; ?>

    </div>
<?php
  }
}
