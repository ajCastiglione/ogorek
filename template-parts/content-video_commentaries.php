<?php
$excerpt = get_field('video_excerpt');
$content = get_the_content();
$vid = get_field('video_url');
$related = get_field('related_video_commentaries');
?>

<?= get_template_part('partials/hero'); ?>

<article class="video-single">
    <section class="large-wrapper<?= !empty($related) ? ' grid' : null ?>">
        <?= !empty($related) ? '<div class="content-wrap">' : null ?>
        <div class="video"><?= $vid ?></div>
        <div class="content"><?= $content ?></div>
        <?= !empty($related) ? '</div>' : null ?>
        <?= get_related_videos($post) ?>
    </section>
</article>