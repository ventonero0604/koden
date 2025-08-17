<?php
/*
Template Name: メディアコラム詳細
Template Post Type: post
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <main class="Detail">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
    </div>
    <div class="content">
      <div class="Wrapper">
        <section class="Detail_header">
          <h2 class="title">
            タイトルが入ります。あなたのDNAが拓く未来、健康と可能性を支えるあなたのDNAが拓く未来、健康と可能性を支える企業
          </h2>
          <p class="name">
            会社名 起業者名
          </p>
          <p class="info">
            <span>2025/1/11</span>
            <span>ストーリー</span>
          </p>
        </section>

        <figure class="Detail_mainImage">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_detail_member_1.png" alt="">
        </figure>

        <section class="Cms">
          <div class="Cms_summary Cms_summary_bottom">
            <p class="title">
              希少性を活用したビジネス展開
            </p>
            <dl class="list">
              <dt>
                独占的な市場地位
              </dt>
              <dd>
                データと技術力を強みに、特定のニッチ市場（例: 遺伝性疾患スクリーニングや希少疾患用創薬）で独占的な地位を構築。
              </dd>
              <dt>
                プレミアムブランド戦略:
              </dt>
              <dd>
                高精度かつ信頼性の高い解析サービスをプレミアム価格で提供し、他社との差別化を図る。
              </dd>
            </dl>
          </div>
        </section>

        <section class="Detail_about">
          <div class="Detail_wrapper">
            <h4 class="Detail_sectionTitle">事業概要</h4>
          </div>
          <table>
            <tbody>
              <tr>
                <th>会社名</th>
                <td>株式会社ひろしまインキュベーション&キャピタル</td>
              </tr>
              <tr>
                <th>設立</th>
                <td>2025年</td>
              </tr>
              <tr>
                <th>所在地</th>
                <td>〒739-0046 <br class="sp">広島県東広島市鏡山１丁目３−２ル</td>
              </tr>
              <tr>
                <th>代表取締役</th>
                <td>滝上 菊規　木村 嘉宏</td>
              </tr>
              <tr>
                <th>監査役</th>
                <td>名前が入ります</td>
              </tr>
              <tr>
                <th>資本金</th>
                <td>10億円</td>
              </tr>
              <tr>
                <th>従業員数</th>
                <td>10名</td>
              </tr>
              <tr>
                <th>ミッション</th>
                <td>「個々の遺伝情報を活用し、健康で豊かな社会を実現する」</td>
              </tr>
            </tbody>
          </table>
        </section>

        <section class="Detail_banner">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/portfolio/banner.png" alt="">
          </a>
        </section>

        <section class="Detail_media">
          <div class="Detail_wrapper">
            <h4 class="Detail_sectionTitle">起業家ストーリー　</h4>
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
          </div>
        </section>

        <div class="PageNation">
          <ul class="list">
            <li class="item">
              <a href="#" class="Button disabled">
                前の記事
              </a>
            </li>
            <li class="item">
              <a href="#" class="Button">
                一覧に戻る
              </a>
            </li>
            <li class="item">
              <a href="#" class="Button">
                次の記事
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>