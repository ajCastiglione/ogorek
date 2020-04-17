<?php
function get_byline($post)
{
  if (get_field('post_author')) {
    $post_author = get_the_title(get_field('post_author')[0]->ID);
  } elseif (get_the_author_meta('ID') !== 2 && get_the_author_meta('ID') !== 12) {
    $post_author = get_the_author_link(get_the_author_meta('ID'));
  } else {
    $post_author = get_the_author_meta('display_name', 2);
  }

  if (!strstr($post_author, get_field('post_author', $post->ID)[0]->post_title)) {
    printf(
      __('', 'bonestheme') . ' %1$s %2$s %3$s',
      /* the time the post was published */
      '<span class="by">' . __('by', 'bonestheme') . '</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . $post_author . '</span> | ',
      /* the author of the post */
      '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time> | ',
      get_the_category_list(', ')
    );
  } else {
    printf(
      __('', 'bonestheme') . ' %1$s %2$s',
      /* the time the post was published */
      '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time> | ',
      get_the_category_list(', ')
    );
  }
}
