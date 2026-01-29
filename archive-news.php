<?php
/*
Template Name: NEWSアーカイブ
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <main class="News">
    <nav class="BreadCrumb">
      <ul class="list">
        <li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
        <li>NEWS</li>
      </ul>
    </nav>
    <section class="NewsList">
      <h2 class="SectionTitle">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_news.svg" alt="NEWS">
        お知らせ
      </h2>

      <ul class="list">
        <?php
        // NEWSカスタム投稿タイプを取得
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'news',
          'posts_per_page' => 10,
          'paged' => $paged,
        );
        $news_query = new WP_Query($args);
        ?>
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : $news_query->the_post();
            $post_tags = get_the_tags();
          ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <span class="date">
                  <?php echo get_the_date('Y.m.d'); ?>
                </span>
                <?php if ($post_tags) : ?>
                  <span class="Label">
                    <?php echo esc_html($post_tags[0]->name); ?>
                  </span>
                <?php endif; ?>
                <span class="text">
                  <?php echo get_the_title(); ?>
                </span>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>
            <p>記事がありません。</p>
          </li>
        <?php endif; ?>
      </ul>

      <?php
      // ページネーション
      echo paginate_links(array(
        'total' => $news_query->max_num_pages,
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