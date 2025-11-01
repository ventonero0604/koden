<?php

/**
 * Template for Gallery single post
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <main class="Gallery">
        <nav class="BreadCrumb">
          <ul class="list">
            <li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
            <li><a href="<?php echo home_url('/gallery/'); ?>">EXHIBITION</a></li>
            <li><?php the_title(); ?></li>
          </ul>
        </nav>

        <section class="main">
          <?php
          $main_image = get_field('main_image');
          if ($main_image) :
          ?>
            <figure class="image">
              <img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt']); ?>">
            </figure>
          <?php endif; ?>
          <div class="texts">
            <h2 class="title">
              <?php the_title(); ?>
            </h2>
            <p class="date">
              <?php
              $date = get_field('date');
              if ($date) {
                echo esc_html($date);
              }
              ?>
            </p>
            <div class="text">
              <?php the_content(); ?>
            </div>
          </div>
        </section>

        <section class="gallery">
          <h2 class="SectionTitle">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_gallery.svg" alt="GALLERY">
          </h2>

          <div class="buttons">
            <?php
            // ギャラリーリンク1〜5をループで生成
            for ($i = 1; $i <= 5; $i++) {
              $link_text = get_field('gallery_link_text_' . $i);
              $link_url = get_field('gallery_link_url_' . $i);

              // テキストとURLの両方が存在する場合のみリンクを表示
              if ($link_text && $link_url) {
                echo '<a href="' . esc_url($link_url) . '" class="Button">' . esc_html($link_text) . '</a>';
              }
            }
            ?>
            <a href="<?php echo home_url('/gallery/'); ?>" class="Button">展示会情報に戻る</a>
          </div>
        </section>

      </main>

      <!-- モーダル -->
      <div id="image-modal" class="modal">
        <div class="modal-content">
          <button class="modal-close" aria-label="閉じる">×</button>
          <img id="modal-image" src="" alt="">
        </div>
      </div>

  <?php endwhile;
  endif; ?>

  <?php get_template_part('components/footer'); ?>
</body>

</html>