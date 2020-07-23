<?php
$excerpt = get_field('video_excerpt');
$content = get_the_content();
$vid = get_field('video_url');
?>

<?= get_template_part('partials/hero'); ?>

<article class="video-single">
    <section class="large-wrapper">
        <div class="video"><?= $vid ?></div>
        <div class="content"><?= $content ?></div>
    </section>
</article>