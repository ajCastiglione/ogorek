<?php
$aside_title = get_field('aside_title');
$aside_content = get_field('aside_content');
?>

<article class="service faqs">
  <?= get_template_part('partials/hero'); ?>
  <section class="section-1">
    <div class="col-1 grid-50">

      <div class="faqs">

        <?php if (have_rows('faqs')) : while (have_rows('faqs')) : the_row();
            $title = get_sub_field('section_title');
            $question = get_sub_field('question');
            $answer = get_sub_field('answer');
        ?>
            <div class="faqs__content">
              <?php if (!empty($title)) : ?>
                <h2 class="faqs__section-title"><strong><?= $title ?></strong></h2>
              <?php endif; ?>
              <div class="text">
                <p class="faqs__question">
                  <span><?= $question ?></span>
                  <span><i class="fas fa-plus"></i></span>
                </p>
                <p class="faqs__answer">
                  <?= $answer ?>
                </p>
              </div>
            </div>

        <?php endwhile;
        endif; ?>
      </div>

      <div class="aside">
        <?php if (!empty($aside_title)) : ?>
          <h2 class="aside-title"><?= $aside_title ?></h2>
        <?php endif; ?>
        <div class="aside-text">
          <?= $aside_content ?>
        </div>
      </div>
    </div>
  </section>
</article>