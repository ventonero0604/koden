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

          <?php if (get_field('gallery_modal_image_1')) : ?>
            <ul class="list">
              <?php
              $i = 1;
              while (get_field('gallery_modal_image_' . $i)) {
                $modal_image = get_field('gallery_modal_image_' . $i);
                $modal_title = get_field('gallery_modal_title_' . $i);
                $modal_artist = get_field('gallery_modal_artist_' . $i);
              ?>
                <li>
                  <figure class="image">
                    <img src="<?php echo esc_url($modal_image); ?>" alt="<?php echo esc_attr($modal_title); ?>">
                  </figure>
                  <div class="texts">
                    <h3 class="title">
                      <?php echo esc_html($modal_title); ?>
                    </h3>
                    <p class="name">
                      <?php echo esc_html($modal_artist); ?>
                    </p>
                    <button class="js-modal" data-image="<?php echo esc_url($modal_image); ?>" data-alt="<?php echo esc_attr($modal_title); ?>">
                      作品を拡大して見る >
                    </button>
                  </div>
                </li>
              <?php
                $i++;
              }
              ?>
            </ul>
          <?php endif; ?>

          <div class="buttons">
            <?php
            // ギャラリーリンク1〜5をループで生成
            for ($i = 1; $i <= 5; $i++) {
              $link_text = get_field('gallery_link_text_' . $i);
              $link_url = get_field('gallery_link_url_' . $i);

              // テキストとURLの両方が存在する場合のみリンクを表示
              if ($link_text && $link_url) {
                $arrow_icon_url = get_template_directory_uri() . '/dist/img/ico_button_arrow.svg';
                echo '<a href="' . esc_url($link_url) . '" class="Button">' . esc_html($link_text) . '<span class="arrow-icon"><img src="' . esc_url($arrow_icon_url) . '" alt="→"></span></a>';
              }
            }
            ?>
            <a href="<?php echo home_url('/gallery/'); ?>" class="Button">展示会情報に戻る
              <span class="arrow-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
              </span>
            </a>
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