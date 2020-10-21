<?php

function get_related_videos($post)
{
    $related_posts = get_field('related_video_commentaries', $post->ID);
    if (!empty($related_posts)) { ?>
        <div class="related-videos__container">
            <?php foreach ($related_posts as $related_post) { ?>

                <div class="related-videos__single">
                    <?php $link = get_field('external_link', $related_post) ? get_field('link', $related_post) : get_permalink($related_post); ?>
                    <article id="post-<?php the_ID($related_post); ?>" <?php post_class('cf post-card'); ?> role="article">

                        <header class="article-header">

                            <div class="featured-image-container">
                                <a href="<?= $link ?>" class="post-link">
                                    <img src="<?= get_the_post_thumbnail_url($related_post, 'large') ?>" alt="<?= the_title($related_post) ?>" class="featured-image">
                                </a>
                            </div>

                            <div class="related-videos__content">

                                <h2 class="h2 entry-title">
                                    <a href="<?= $link ?>" rel="bookmark" title="<?php the_title_attribute($related_post); ?>">
                                        <?= get_the_title($related_post); ?>
                                    </a>
                                </h2>
                                <p class="byline entry-meta">
                                    <?php printf(
                                        __('', 'bonestheme') . ' %1$s',
                                        /* the time the post was published */
                                        '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d', $related_post) . '" itemprop="datePublished">' . get_the_time(get_option('date_format'), $related_post) . '</time>'
                                    ); ?>
                                </p>

                            </div>
                        </header>

                    </article>
                </div>
            <?php } ?>
        </div>
<?php
    }
}
