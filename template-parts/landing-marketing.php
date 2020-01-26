<?php
$title = get_field('s1_title');
$content = get_field('s1_content');
$img = get_field('s1_image');
?>

<section class="landing-page-content s1">
    <div class="large-wrapper">
        <div class="grid-50">
            <div class="half">
                <h1 class="title"><?= $title ?></h1>
                <div class="content">
                    <?= $content ?>
                </div>
            </div>
            <div class="half">
                <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>" class="img">
            </div>
        </div>
    </div>
</section>