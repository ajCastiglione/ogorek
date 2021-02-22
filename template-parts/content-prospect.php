<?php
$title = get_field('title');
$content = get_field('content');
$form_title = get_field('form_title');
$form_id = get_field('form_id');
$form = do_shortcode("[gravityform id=\"{$form_id}\" title=\"false\" description=\"false\"]");
?>

<section class="prospect">
    <div class="prospect__grid">
        <div class="prospect__content-wrap">
            <div class="prospect__logo-container">
                <img src="https://ogorek.com/wp-content/uploads/2020/04/OGOREK-Logo-White-01.png" alt="Ogorek Wealth Managent" class="prospect__logo">
            </div>
            <h1 class="prospect__title"><span class="inner"><?= $title ?></span></h1>
            <div class="prospect__content"><?= $content ?></div>
        </div>
        <div class="prospect__form">
            <?php if (!empty($form_title)) echo "<h2 class='form-title'>{$form_title}</h2>";
            echo "<div class='form-wrapper'>{$form}</div>";
            ?>
        </div>
    </div>
</section>