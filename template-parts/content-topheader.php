<?php if (get_field('show_alert', 'options')) : ?>

  <div class="alert__header">
    <a <?php if (get_field('alert_link', 'options')) : ?> href="<?= get_field('alert_link', 'options') ?>" <?php endif; ?> class="alert__link">
      <div class="alert__inner">
        <?= get_field('alert_icon', 'options') ?: null ?>
        <p><?= get_field('alert_content', 'options') ?: null ?></p>
      </div>
    </a>
  </div>

<?php endif; ?>

<div class="top-header-grid">
  <div class="info">
    <a href="tel:+<?= trim(get_field('phone_number', 'options')); ?>">
      <i class="fas fa-phone"></i> <span><?= trim(get_field('phone_number', 'options')); ?></span>
    </a>
    <a href="mailto:<?= is_page(3595) ? 'trust@ogorek.com' : trim(get_field('email_address', 'options')); ?>">
      <i class="fas fa-envelope"></i> <span><?= is_page(3595) ? 'trust@ogorek.com' : trim(get_field('email_address', 'options')); ?></span>
    </a>
  </div>

  <div class="header-message">
    <div class="text">
      <?php if (have_rows('header_ctas', 'options')) : while (have_rows('header_ctas', 'options')) : the_row(); ?>
          <a href="<?= get_sub_field('cta_link') ?>"><?= get_sub_field('cta_text') ?></a>
      <?php endwhile;
      endif; ?>
    </div>
  </div>

  <!-- 
  <div class="socials">
    <?php /* if (have_rows('social_media', 'options')) : while (have_rows('social_media', 'options')) : the_row(); ?>
        <a href="<?= get_sub_field('social_url'); ?>" target="_blank" rel="noopener noreferrer" class="social-icon">
          <?= (get_sub_field('icon_or_svg')) ? get_sub_field('social_icon') : '<figure>' . get_sub_field('social_icon_svg') . '</figure>'; ?>
        </a>
    <?php endwhile;
    endif; */ ?>
  </div>
   -->
</div>