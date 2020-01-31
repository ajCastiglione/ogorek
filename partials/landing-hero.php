<?php
$logo = get_field('logo', 'options')['url'];
$hero = get_field('hero_image')['url'];
$formID = get_field('contact_form');
$form = do_shortcode("[gravityform id='{$formID}' title='false' description='false']");
$title = get_field('above_form_title');
$subtitle = get_field('above_form_subtitle');
$formTitle = get_field('form_title');
$formSubtitle = get_field('form_subtitle');
?>

<section class="hero-landing-page">
    <div class="grid-50">
        <div class="left" style="background-image:url(<?= $hero ?>)">
            <img src="<?= $logo ?>" alt="Ogorek Wealth Management" class="logo">
        </div>
        <div class="right">
            <h1 class="title"><?= $title ?></h1>
            <h2 class="subtitle"><?= $subtitle ?></h2>
            <button class="get-started">get started!</button>
            <div class="popup-container">
                <div class="form">
                    <button class="close"><i class="fas fa-times-circle"></i></button>
                    <h2 class="form-title"><?= $formTitle ?></h2>
                    <h3 class="form-subtitle"><?= $formSubtitle ?></h3>
                    <?= $form ?>
                </div>
            </div>
            <a href="#section-1" class="learn-more">learn more <svg class="down-arrow" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M23.245 4l-11.245 14.374-11.219-14.374-.781.619 12 15.381 12-15.391-.755-.609z" /></svg></a>
        </div>
    </div>
</section>