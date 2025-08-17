<?php
/*
Single Team Template
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="TeamDetail">
    <?php get_template_part('components/breadcrumb'); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="PageHeader">
          <h1 class="title">
            <?php the_title(); ?>
          </h1>
        </div>
        <div class="Wrapper">
          <div class="content">
            <section class="main">
              <figure class="image">
                <?php
                $team_image = get_field('team_image');
                if ($team_image) :
                ?>
                  <img src="<?php echo esc_url($team_image); ?>" alt="<?php echo esc_attr(get_field('team_name')); ?>" />
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_detail_member_1.png" alt="チームメンバー" />
                <?php endif; ?>
              </figure>
              <div class="texts">
                <div class="header">
                  <p class="job">
                    <?php echo esc_html(get_field('job')); ?>
                  </p>
                  <h2 class="name">
                    <?php echo esc_html(get_field('name')); ?>
                  </h2>
                  <p class="en">
                    <?php echo esc_html(get_field('name_en')); ?>
                  </p>
                </div>
                <div class="profile Cms">
                  <?php the_content(); ?>
                </div>
              </div>
            </section>

            <section class="portfolio">
              <h3 class="title">
                ポートフォリオ
              </h3>
              <ul class="PortfolioList">
                <?php
                // 関連ポートフォリオを表示（例：担当者フィールドがある場合）
                $portfolio_query = new WP_Query(array(
                  'post_type' => 'portfolio',
                  'posts_per_page' => 4,
                  'orderby' => 'date',
                  'order' => 'DESC'
                ));

                if ($portfolio_query->have_posts()) {
                  while ($portfolio_query->have_posts()) {
                    $portfolio_query->the_post();
                    $company_name = get_field('company_name');
                    $logo = get_field('logo');
                ?>
                    <li class="item">
                      <a href="<?php the_permalink(); ?>">
                        <?php if ($logo) : ?>
                          <figure class="image">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($company_name ? $company_name : get_the_title()); ?>">
                          </figure>
                        <?php endif; ?>
                        <p class="name"><?php echo esc_html($company_name ? $company_name : get_the_title()); ?></p>
                      </a>
                    </li>
                <?php
                  }
                  wp_reset_postdata();
                }
                ?>
              </ul>
            </section>

            <section class="media">
              <h3 class="title">
                メディア
              </h3>
              <ul class="MediaList">
                <?php
                // ストーリーとコラムの最新記事を取得
                $media_query = new WP_Query(array(
                  'post_type' => array('story', 'column'),
                  'posts_per_page' => 4,
                  'orderby' => 'date',
                  'order' => 'DESC'
                ));

                if ($media_query->have_posts()) {
                  while ($media_query->have_posts()) {
                    $media_query->the_post();
                    $main_image = get_field('main_image');
                    $post_type = get_post_type();
                    $categories = get_the_terms(get_the_ID(), $post_type . '_category');
                ?>
                    <li class="item">
                      <a href="<?php the_permalink(); ?>">
                        <figure class="image">
                          <?php if ($main_image) : ?>
                            <img src="<?php echo esc_url($main_image); ?>" alt="<?php the_title_attribute(); ?>">
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="<?php the_title_attribute(); ?>">
                          <?php endif; ?>
                        </figure>
                        <div class="texts">
                          <p class="date"><?php echo get_the_date('Y/n/j'); ?></p>
                          <p class="category">
                            <?php
                            if ($categories && !is_wp_error($categories)) {
                              echo esc_html($categories[0]->name);
                            }
                            ?>
                          </p>
                          <p class="text"><?php the_title(); ?></p>
                        </div>
                      </a>
                    </li>
                <?php
                  }
                  wp_reset_postdata();
                }
                ?>
              </ul>
            </section>
            <a href="<?php echo home_url('/team/'); ?>" class="Button Button_red">一覧に戻る</a>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>