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
  <main class="PortfolioDetail">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
    </div>
    <figure class="Detail_topImage">
      <?php if (get_field('top_image_pc') && get_field('top_image_sp')): ?>
        <picture>
          <source srcset="<?php echo esc_html(get_field('top_image_sp')); ?>" media="(max-width: 768px)">
          <img src="<?php echo esc_html(get_field('top_image_pc')); ?>" alt="">
        </picture>
      <?php endif; ?>
    </figure>

    <div class="Wrapper">
      <div class="content">
        <div class="Wrapper">
          <section class="Detail_companyHeader">
            <figure class="logo">
              <img src="<?php echo esc_html(get_field('logo')); ?>" alt="" class="logo">
            </figure>
            <div class="texts">
              <h2 class="name">
                <?php echo esc_html(get_field('top_company_name')); ?>
              </h2>
              <a href="<?php echo esc_url(get_field('top_company_url')); ?>"><?php echo esc_html(get_field('top_company_url')); ?></a>
            </div>
          </section>

          <section class="Detail_lead">
            <h3 class="title mincho">
              <?php echo esc_html(get_field('lead')); ?>
            </h3>
          </section>

          <section class="Cms">
            <?php the_content(); ?>
            <div class="Cms_summary Cms_summary_bottom">
              <p class="title">
                <?php echo esc_html(get_field('summary_title')); ?>
              </p>
              <dl class="list">
                <dt>
                  <?php echo esc_html(get_field('summary_item_title_1')); ?>
                </dt>
                <dd>
                  <?php echo esc_html(get_field('summary_item_text_1')); ?>
                </dd>
                <dt>
                  <?php echo esc_html(get_field('summary_item_title_2')); ?>
                </dt>
                <dd>
                  <?php echo esc_html(get_field('summary_item_text_2')); ?>
                </dd>
              </dl>
            </div>
          </section>

          <?php get_template_part('components/companyInfo'); ?>
          <?php get_template_part('components/companyBanner'); ?>

          <section class="Detail_person">
            <div class="Detail_wrapper">
              <h4 class="Detail_sectionTitle">担当者</h4>
              <ul class="list">
                <li class="item">
                  <img src="./img/team_member_1.png" alt="メンバー1">
                  <p class="name">名前が入ります</p>
                </li>
                <li class="item">
                  <img src="./img/team_member_1.png" alt="メンバー1">
                  <p class="name">名前が入ります</p>
                </li>
                <li class="item">
                  <img src="./img/team_member_1.png" alt="メンバー1">
                  <p class="name">名前が入ります</p>
                </li>
              </ul>
            </div>
          </section>

          <section class="Detail_media">
            <div class="Detail_wrapper">
              <h4 class="Detail_sectionTitle">メディア</h4>
              <ul class="MediaList">
                <li class="item">
                  <a href="#">
                    <figure class="image">
                      <img src="./img/team_member_1.png" alt="ポートフォリオ1">
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
                      <img src="./img/team_detail_member_1.png" alt="ポートフォリオ1">
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
          <a href="#" class="Button Button_red Detail_btn">一覧に戻る</a>
        </div>
      </div>
    </div>
    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>