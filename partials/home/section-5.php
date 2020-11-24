<?php
$title = get_field('s5_title');
$content = get_field('s5_content');
$per_page = get_field('s5_posts_to_show');
$cat =  get_field('s5_post_category');

$args = array(
  'post_type' => 'post',
  'posts_per_page' => $per_page,
);

if (!empty($cat)) {
  $cat = implode(',', $cat);
  $args['cat'] = $cat;
}

$articles = new WP_Query($args);

?>

<section class="section-5 home-articles">
  <div class="home-articles__info">
    <h2 class="home-articles__title"><?= $title ?></h2>
    <div class="home-articles__content"><?= $content ?></div>
    <div class="home-articles__ctas">
      <?php if (have_rows('s5_ctas')) : while (have_rows('s5_ctas')) : the_row();
          $cta_text = get_sub_field('cta_text');
          $cta_link = get_sub_field('cta_link');
      ?>
          <a href="<?= $cta_link ?>" class="cta"><?= $cta_text ?></a>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
  <div class="home-articles__articles">
    <?php if ($articles->have_posts()) : while ($articles->have_posts()) : $articles->the_post();
        $link = get_permalink();
    ?>
        <article <?php post_class('article-card'); ?> role="article">

          <header class="article-header">

            <div class="featured-image-container">
              <a href="<?= $link ?>" class="post-link">
                <img src="<?= get_the_post_thumbnail_url($post->ID, 'large') ?>" alt="<?= the_title() ?>" class="featured-image">
              </a>
            </div>

          </header>

          <section class="article-content">

            <h2 class="h2 entry-title"><a href="<?= $link ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <p class="byline entry-meta">
              <?php printf(
                __('', 'bonestheme') . ' %1$s %2$s',
                /* the time the post was published */
                '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                /* the categories of the post */
                '<span class="by">' . __('|', 'bonestheme') . '</span> <span class="post-categories" itemprop="categories">' .  get_the_category_list(', ') . '</span>'
              ); ?>
            </p>

          </section>

        </article>
    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>
  </div>
</section>