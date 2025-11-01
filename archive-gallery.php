<?php
/*
Template Name: Galleryアーカイブ
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <main class="Pages">
    <nav class="BreadCrumb">
      <ul class="list">
        <li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
        <li>EXHIBITION</li>
      </ul>
    </nav>
    <section class="Pages_content">
      <h2 class="SectionTitle">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_exhibition.svg" alt="EXHIBITION">
      </h2>

      <ul class="ExhibitionList">
        <?php
        // Galleryカスタム投稿タイプを取得
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'gallery',
          'posts_per_page' => 10,
          'paged' => $paged,
        );
        $gallery_query = new WP_Query($args);
        ?>
        <?php if ($gallery_query->have_posts()) : ?>
          <?php while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <?php
                $main_image = get_field('main_image');
                if ($main_image) :
                ?>
                  <div class="image">
                    <img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt']); ?>">
                  </div>
                <?php endif; ?>
                <div class="texts">
                  <p class="date">
                    <?php
                    $date = get_field('date');
                    if ($date) {
                      echo esc_html($date);
                    }
                    ?>
                  </p>
                  <h3 class="title"><?php the_title(); ?></h3>
                  <p class="text">
                    <?php echo wp_trim_words(get_the_excerpt(), 90, '...'); ?>
                  </p>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>
            <p>展示情報がありません。</p>
          </li>
        <?php endif; ?>
      </ul>

      <?php
      // ページネーション
      echo paginate_links(array(
        'total' => $gallery_query->max_num_pages,
        'current' => $paged,
        'mid_size' => 2,
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
      ));
      ?>
    </section>

  </main>
  <?php get_template_part('components/footer'); ?>
</body>

</html>