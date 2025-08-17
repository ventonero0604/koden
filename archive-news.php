<?php
/*
Template for News Archive
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
            ニュース
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
          if ($news_categories && !is_wp_error($news_categories)) {
            foreach ($news_categories as $category) {
              echo '<li>';
              echo '<a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a>';
              echo '</li>';
            }
          }
          ?>
        </ul>

        <ul class="newsList">
          <?php
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
            echo '<li class="item">ニュースがありません。</li>';
          }
          ?>
        </ul>

        <div class="PageNation">
          <ul class="list font-bold font-bold">
            <li class="item">
              <a href="#" class="Button disabled">
                前の記事
              </a>
            </li>
            <li class="item">
              <a href="#">
                1
              </a>
              <a href="#">
                2
              </a>
              <a href="#">
                3
              </a>
              …
              <a href="#">
                12
              </a>
            </li>
            <li class="item">
              <a href="#" class="Button">
                次の記事
              </a>
            </li>
          </ul>
        </div>
      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>