<?php
/*
Template Name: ポートフォリオ詳細
Template Post Type: post
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="TeamDetail">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
    </div>
    <div class="Wrapper">
      <div class="content">
        <section class="main">
          <figure class="image">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_detail_member_1.png" alt="メンバー1" />
          </figure>
          <div class="texts">
            <div class="header">
              <p class="job">
                代表取締役社長
              </p>
              <h2 class="name">
                山田 太郎
              </h2>
              <p class="en">
                Tarou Yamada
              </p>

            </div>
            <div class="profile">
              <p class="title">
                プロフィール
              </p>
              <p class="text">
                プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。プロフィール文章が入ります。
              </p>

              <p class="text">
                ・広島大学大学院法学研究科修了（法学修士）。<br>
                ・一般社団法人HONGO AI　理事
              </p>
            </div>
          </div>
        </section>

        <section class="portfolio">
          <h3 class="title">
            ポートフォリオ
          </h3>
          <ul class="PortfolioList">
            <li class="item">
              <a href="#">
                <figure class="image">
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/img/portfolio/logo1.png" alt="ポートフォリオ1">
                </figure>
                <p class="name">会社名が入ります会社名が入ります</p>
              </a>
            </li>
            <li class="item">
              <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/portfolio/logo2.png" alt="ポートフォリオ1">
                <p class="name">会社名が入ります</p>
              </a>
            </li>
            <li class="item">
              <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/portfolio/logo3.png" alt="ポートフォリオ1">
                <p class="name">会社名が入ります</p>
              </a>
            </li>
            <li class="item">
              <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/portfolio/logo3.png" alt="ポートフォリオ1">
                <p class="name">会社名が入ります</p>
              </a>
            </li>
          </ul>
        </section>

        <section class="media">
          <h3 class="title">
            メディア
          </h3>
          <ul class="MediaList">
            <li class="item">
              <a href="#">
                <figure class="image">
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="ポートフォリオ1">
                </figure>
                <div class="texts">
                  <p class="date">2025/1/11</p>
                  <p class="category">起業家ストーリー</p>
                  <p class="text">「精豆菌」で新たな市場を切り開く。「精豆菌」で新たな市場を切り開く。食糧危機に挑む起業家の情熱食糧危機に挑む起業家の情熱</p>
                </div>
              </a>
            </li>
            <li class="item">
              <a href="#">
                <figure class="image">
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_detail_member_1.png" alt="ポートフォリオ1">
                </figure>
                <div class="texts">
                  <p class="date">2025/1/11</p>
                  <p class="category">起業家ストーリー</p>
                  <p class="text">「精豆菌」で新たな市場を切り開く。「精豆菌」で新たな市場を切り開く。食糧危機に挑む起業家の情熱食糧危機に挑む起業家の情熱</p>
                </div>
              </a>
            </li>
          </ul>
        </section>
        <a href="#" class="Button Button_red">一覧に戻る</a>
      </div>
    </div>
    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>