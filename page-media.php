<?php
/*
Template Name: メディア一覧
Template Post Type: page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="Media">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
    </div>
    <div class="Wrapper">
      <section class="content">
        <div class="PageTitle">
          <h2 class="title mincho">
            メディア
          </h2>
          <p class="lead">
            東大IPCが支援するディープテック系ベンチャーの創業者・経営者・エンジニアへのインタビュー記事、<br>
            これまでに行ったセミナーなどイベントレポートや動画、起業にまつわる用語解説などを掲載しております。
          </p>
        </div>

        <div class="switch">
          <a href="#story" class="Button">
            ストーリー
          </a>
          <a href="#column" class="Button">
            コラム
          </a>
        </div>

        <div class="items">
          <div class="section" id="story">
            <div class="PageTitle">
              <h3 class="title mincho">
                ストーリー
              </h3>
              <a href="#" class="Button pc">VIEW MORE</a>
            </div>
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
            <a href="#" class="Button sp">VIEW MORE</a>
          </div>
          <div class="section" id="column">
            <div class="PageTitle">
              <h3 class="title mincho">
                コラム
              </h3>
              <a href="#" class="Button pc">VIEW MORE</a>
            </div>
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
            <a href="#" class="Button sp">VIEW MORE</a>
          </div>
        </div>
      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>