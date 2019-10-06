<!-- Banner Area -->
<section class="hero col-1">
  <div class="owl-carousel owl-theme">
    <?php if (have_rows('slider')) : while (have_rows('slider')) : the_row(); ?>
        <div class="slide" style="background-image:url(<?= get_sub_field('image')['url']; ?>)">
          <div class="slide-content">
            <h2 class="slide-title"><?= get_sub_field('title'); ?></h2>
            <div class="slide-text">
              <?= get_sub_field('content'); ?>
            </div>
            <div>
              <a href="<?= get_sub_field('button_link'); ?>" class="slide-link"><?= get_sub_field('button_text'); ?></a>
            </div>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</section>
<!-- end Banner Area -->