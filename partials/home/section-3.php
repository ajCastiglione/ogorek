<section class="section-3">
  <div class="col-1 grid-col-4">
    <?php if (have_rows('benefits')) : while (have_rows('benefits')) : the_row(); ?>
        <div class="item">
          <a href="<?= get_sub_field('button_link'); ?>" class="cta"><?= get_sub_field('cta'); ?></a>
          <div class="content">
            <?= get_sub_field('content'); ?>
          </div>
          <div class="btn-container">
            <a href="<?= get_sub_field('button_link'); ?>" class="btn"><?= get_sub_field('button_text'); ?></a>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</section>