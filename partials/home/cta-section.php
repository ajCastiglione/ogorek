<?php

$cta_title = get_field('cta_title');
$cta_text = get_field('cta_text');
$cta_button = get_field('cta_button');

?>

<section class="cta-section">
    <div class="grid col-1">
        <div class="cta-section__content">
            <h2 class="cta-section__title"><?= $cta_title ?></h2>
            <div class="cta-section__text"><?= $cta_text ?></div>
        </div>
        <div class="cta-section__btn-container">
            <a href="<?= $cta_button['link'] ?>" class="cta-section__btn"><?= $cta_button['title'] ?></a>
        </div>
    </div>
</section>