<?php
$has_img = get_field('image_or_video') == 'image' ? True : False;

$s1content = get_field('s1_content');
$s1vid = get_field('s1_body_video');
$s2title = get_field('s2_title');
$s2subtitle = get_field('s2_subtitle');
$s3title = get_field('s3_title');
$s3content = get_field('s3_content');
$s3img = get_field('s3_image');
$s4title = get_field('s4_title');
$s4subtitle = get_field('s4_subtitle');
?>
<?php if ($has_img) : ?>
    <section id="section-1" class="landing-page-section-content s1">
        <div class="large-wrapper">
            <div class="grid-50">
                <div class="half">
                    <div class="content">
                        <?= $s1content ?>
                    </div>
                </div>
                <div class="half">
                    <video controls playsinline preload="metadata" class="video">
                        <source src="<?= $s1vid ?>#t=0.1">
                    </video>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<section id="section-2" class="landing-page-section-content s2">
    <div class="large-wrapper">
        <h2 class="title"><?= $s2title ?></h2>
        <h3 class="subtitle"><?= $s2subtitle ?></h3>
        <div class="repeater">
            <?php $index = 0;
            if (have_rows('content_boxes')) : while (have_rows('content_boxes')) :
                    the_row();
                    $index++;  ?>
                    <div class="value">
                        <div class="icon"><?= get_sub_field('icon') ?></div>
                        <h3 class="value-title"><?= $index . '. ' . get_sub_field('title') ?></h3>
                        <div class="value-content"><?= get_sub_field('content') ?></div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>

<section class="landing-page-section-content s3">
    <div class="large-wrapper">
        <div class="grid-50">
            <div class="half">
                <img src="<?= $s3img['url'] ?>" alt="<?= $s3img['alt'] ?>" class="img">
            </div>
            <div class="half">
                <h2 class="title"><?= $s3title ?></h2>
                <div class="content">
                    <?= $s3content ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-page-section-content s4">
    <div class="large-wrapper">
        <h2 class="title"><?= $s4title ?></h2>
        <h3 class="subtitle"><?= $s4subtitle ?></h3>
        <div class="repeater">
            <?php if (have_rows('ctas')) : while (have_rows('ctas')) : the_row(); ?>
                    <a href="<?= get_sub_field('cta_link') ?>" class="cta"><?= get_sub_field('icon') . ' ' . get_sub_field('cta_text') ?></a>
            <?php endwhile;
            endif; ?>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2918.9555450795087!2d-78.70237438452394!3d42.97921007915019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d375b4f6a29245%3A0x765bb48d3983de2a!2sOgorek%20Wealth%20Management%20LLC!5e0!3m2!1sen!2sus!4v1610494198033!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>