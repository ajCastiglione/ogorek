<?php
$title = get_field('newsletter_title', 'options');
$formID = get_field('newsletter_form_id', 'options');
$form = do_shortcode("[gravityform id='{$formID}' title='false' description='false']");
?>

<section id="newsletter" class="newsletter-section">
    <div class="wrap">
        <h2 class="title"><?= $title ?></h2>
        <?= $form ?>
    </div>
</section>