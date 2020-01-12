<?php
$logo = get_field('popup_logo', 'options');
$title = get_field('popup_title', 'options');
$content = get_field('popup_content', 'options');
?>

<section class="popup">
    <div class="inner-popup large-wrapper">
        <div class="close">X</div>
        <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>" class="popup-logo">
        <h2 class="popup-title"><?= $title ?></h2>
        <div class="popup-content">
            <?= $content ?>
        </div>
    </div>
</section>