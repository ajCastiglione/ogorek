<?php
$logos = get_field('footer_logos', 'options');
$disclosures = get_field('disclosures', 'options');
?>
<footer class="landing-footer">
    <div id="inner-footer" class="cf col-1">
        <div class="content">
            <h2 class="title">recognized by</h2>
            <img src="<?= $logos['url']; ?>" alt="Logos" class="logos">
        </div>
    </div>

    <div class="lower-footer">
        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
        <div class="disclosures">
            <?= $disclosures; ?>
        </div>
    </div>

</footer>