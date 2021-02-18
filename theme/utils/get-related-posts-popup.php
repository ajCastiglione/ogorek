<?php
function get_related_posts_popup($post)
{

    $related_posts = get_field('similar_posts', $post->ID);
    if (!empty($related_posts)) { ?>
        <div class="related-posts__container">
            <?php foreach ($related_posts as $related_post) { ?>

                <div class="related-posts__single">
                    <?php $link = get_field('external_link', $related_post) ? get_field('link', $related_post) : get_permalink($related_post); ?>
                    <article id="post-<?php the_ID($related_post); ?>" <?php post_class('cf post-card'); ?> role="article">

                        <header class="article-header">

                            <div class="featured-image-container">
                                <a href="<?= $link ?>" class="post-link">
                                    <img src="<?= get_the_post_thumbnail_url($related_post, 'large') ?>" alt="<?= the_title($related_post) ?>" class="featured-image">
                                    <span class="overlay"><i class="far fa-file-alt"></i></span>
                                </a>
                            </div>

                            <div>
                                <h2 class="h2 entry-title">
                                    <a href="<?= $link ?>" rel="bookmark" title="<?php the_title_attribute($related_post); ?>">
                                        <?= get_the_title($related_post); ?>
                                    </a>
                                </h2>
                                <p class="byline entry-meta">
                                    <?php printf(
                                        __('', 'bonestheme') . ' %1$s %2$s',
                                        /* the time the post was published */
                                        '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d', $related_post) . '" itemprop="datePublished">' . get_the_time(get_option('date_format'), $related_post) . '</time>',
                                        /* the categories of the post */
                                        '<span class="by">' . __('|', 'bonestheme') . '</span> <span class="post-categories" itemprop="categories">' .  get_the_category_list(', ', '', $related_post) . '</span>'
                                    ); ?>
                                </p>
                            </div>

                        </header>

                        <div class="article-content hidden">
                            <?php
                            $content = get_the_content(null, false, $related_post);
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            echo $content;
                            ?>
                        </div>

                    </article>
                </div>
            <?php } ?>
        </div>
<?php
    }
}
