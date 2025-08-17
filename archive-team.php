<?php
/*
Template for Team Archive
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="Team">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        チーム
      </h1>
    </div>
    <div class="Wrapper">
      <section class="content">
        <div class="PageTitle">
          <h2 class="title mincho">
            チーム
          </h2>
          <p class="lead">
            株式会社ひろしまインキュベーション&キャピタルに所属するチームメンバーを紹介します。
          </p>
        </div>
        <ul class="list">
          <?php
          // WordPressの標準クエリを使用
          if (have_posts()) {
            while (have_posts()) {
              the_post();
              $team_image = get_field('team_image');
              $team_name = get_field('team_name');
          ?>
              <li class="item">
                <a href="<?php the_permalink(); ?>">
                  <?php if ($team_image) : ?>
                    <img src="<?php echo esc_url($team_image); ?>" alt="<?php echo esc_attr($team_name ? $team_name : get_the_title()); ?>">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="<?php echo esc_attr($team_name ? $team_name : get_the_title()); ?>">
                  <?php endif; ?>
                  <p class="name">
                    <?php echo esc_html($team_name ? $team_name : get_the_title()); ?>
                  </p>
                </a>
              </li>
          <?php
            }
          } else {
            echo '<li class="item">チームメンバーがいません。</li>';
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