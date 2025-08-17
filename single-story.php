<?php
/*
Template Name: メディアストーリー詳細
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
            <?php the_title(); ?>
          </h2>
          <p class="name">
            <?php echo esc_html(get_field('company_head_name')); ?>
          </p>
          <p class="info">
            <span><?php echo get_the_date('Y/n/j'); ?></span>
            <?php
            $categories = get_the_terms(get_the_ID(), 'column_category');
            if ($categories && !is_wp_error($categories)) {
              echo '<span>' . esc_html($categories[0]->name) . '</span>';
            }
            ?>
          </p>
        </section>

        <figure class="Detail_mainImage">
          <img src="<?php echo esc_html(get_field('main_image')); ?>" alt="">
        </figure>

        <section class="Cms">
          <?php the_content(); ?>
        </section>

        <?php get_template_part('components/companyInfo'); ?>
        <?php get_template_part('components/companyBanner'); ?>

        <section class="Detail_media">
          <div class="Detail_wrapper">
            <h4 class="Detail_sectionTitle">ストーリー</h4>
            <ul class="MediaList">
              <?php
              // 現在の投稿を除いて最新4件の起業家を取得
              $related_columns = new WP_Query(array(
                'post_type' => 'column',
                'posts_per_page' => 4,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'date',
                'order' => 'DESC'
              ));

              if ($related_columns->have_posts()) {
                while ($related_columns->have_posts()) {
                  $related_columns->the_post();
                  $main_image = get_field('main_image');
                  $categories = get_the_terms(get_the_ID(), 'column_category');
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
              } else {
                echo '<li class="item">関連記事がありません。</li>';
              }
              ?>
            </ul>
          </div>
        </section>

        <div class="PageNation">
          <ul class="list">
            <li class="item">
              <?php
              $prev_post = get_previous_post(true, '', 'column_category');
              if ($prev_post) :
              ?>
                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="Button">
                  前の記事
                </a>
              <?php else : ?>
                <span class="Button disabled">
                  前の記事
                </span>
              <?php endif; ?>
            </li>
            <li class="item">
              <a href="<?php echo home_url('/column/'); ?>" class="Button">
                一覧に戻る
              </a>
            </li>
            <li class="item">
              <?php
              $next_post = get_next_post(true, '', 'column_category');
              if ($next_post) :
              ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="Button">
                  次の記事
                </a>
              <?php else : ?>
                <span class="Button disabled">
                  次の記事
                </span>
              <?php endif; ?>
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