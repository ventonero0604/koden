<?php
/*
Template for News Category Archive
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <main class="News">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        ニュース
      </h1>
    </div>
    <div class="Wrapper">
      <section class="content">
        <div class="PageTitle">
          <h2 class="title mincho">
            ニュース - <?php single_term_title(); ?>
          </h2>
          <p class="lead">
            株式会社ひろしまインキュベーション&キャピタルが行うイベントについてや活動報告、みなさまにお伝えしたいお知らせについて。
          </p>
        </div>

        <ul class="Categories">
          <li>
            <a href="<?php echo home_url('/news/'); ?>">すべて</a>
          </li>
          <?php
          $news_categories = get_terms(array(
            'taxonomy' => 'news_category',
            'hide_empty' => true,
          ));
          $current_term = get_queried_object();
          if ($news_categories && !is_wp_error($news_categories)) {
            foreach ($news_categories as $category) {
              $is_current = ($current_term && $current_term->term_id === $category->term_id);
              echo '<li>';
              if ($is_current) {
                echo '<a href="' . get_term_link($category) . '" class="font-bold">' . esc_html($category->name) . '</a>';
              } else {
                echo '<a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a>';
              }
              echo '</li>';
            }
          }
          ?>
        </ul>

        <ul class="newsList">
          <?php
          // WordPressの標準クエリを使用
          if (have_posts()) {
            while (have_posts()) {
              the_post();
          ?>
              <li class="item">
                <a href="<?php the_permalink(); ?>">
                  <div class="header">
                    <p class="date">
                      <?php echo get_the_date('Y/n/j'); ?>
                    </p>
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'news_category');
                    if ($categories && !is_wp_error($categories)) {
                      foreach ($categories as $category) {
                        echo '<p class="label">' . esc_html($category->name) . '</p>';
                        break; // 最初のカテゴリーのみ表示
                      }
                    }
                    ?>
                  </div>
                  <p class="title">
                    <?php the_title(); ?>
                  </p>
                </a>
              </li>
          <?php
            }
          } else {
            echo '<li class="item">該当するニュースがありません。</li>';
          }
          ?>
        </ul>

        <div class="PageNation">
          <?php
          global $wp_query;
          $current_page = max(1, get_query_var('paged'));
          $total_pages = $wp_query->max_num_pages;

          if ($total_pages > 1) :
          ?>
            <ul class="list">
              <li class="item">
                <?php if ($current_page > 1) : ?>
                  <a href="<?php echo get_pagenum_link($current_page - 1); ?>" class="Button">
                    前の記事
                  </a>
                <?php else : ?>
                  <span class="Button disabled">
                    前の記事
                  </span>
                <?php endif; ?>
              </li>
              <li class="item number">
                <?php
                // ページ番号の表示範囲を設定
                $start_page = max(1, $current_page - 2);
                $end_page = min($total_pages, $current_page + 2);

                // 最初のページを表示
                if ($start_page > 1) {
                  echo '<a href="' . get_pagenum_link(1) . '">1</a>';
                  if ($start_page > 2) {
                    echo '<span>…</span>';
                  }
                }

                // 中間のページを表示
                for ($i = $start_page; $i <= $end_page; $i++) {
                  if ($i == $current_page) {
                    echo '<span class="current font-bold">' . $i . '</span>';
                  } else {
                    echo '<a href="' . get_pagenum_link($i) . '">' . $i . '</a>';
                  }
                }

                // 最後のページを表示
                if ($end_page < $total_pages) {
                  if ($end_page < $total_pages - 1) {
                    echo '<span>…</span>';
                  }
                  echo '<a href="' . get_pagenum_link($total_pages) . '">' . $total_pages . '</a>';
                }
                ?>
              </li>
              <li class="item">
                <?php if ($current_page < $total_pages) : ?>
                  <a href="<?php echo get_pagenum_link($current_page + 1); ?>" class="Button">
                    次の記事
                  </a>
                <?php else : ?>
                  <span class="Button disabled">
                    次の記事
                  </span>
                <?php endif; ?>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>