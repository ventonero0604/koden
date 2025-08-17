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
              <a href="<?php echo home_url('/story/'); ?>" class="Button pc">VIEW MORE</a>
            </div>
            <ul class="MediaList">
              <?php
              // ストーリーの最新4件を取得
              $story_query = new WP_Query(array(
                'post_type' => 'story',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC'
              ));

              if ($story_query->have_posts()) {
                while ($story_query->have_posts()) {
                  $story_query->the_post();
                  $main_image = get_field('main_image');
                  $categories = get_the_terms(get_the_ID(), 'story_category');
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
                echo '<li class="item">ストーリーがありません。</li>';
              }
              ?>
            </ul>
            <a href="<?php echo home_url('/story/'); ?>" class="Button sp">VIEW MORE</a>
          </div>
          <div class="section" id="column">
            <div class="PageTitle">
              <h3 class="title mincho">
                コラム
              </h3>
              <a href="<?php echo home_url('/column/'); ?>" class="Button pc">VIEW MORE</a>
            </div>
            <ul class="MediaList">
              <?php
              // コラムの最新4件を取得
              $column_query = new WP_Query(array(
                'post_type' => 'column',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC'
              ));

              if ($column_query->have_posts()) {
                while ($column_query->have_posts()) {
                  $column_query->the_post();
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
                echo '<li class="item">コラムがありません。</li>';
              }
              ?>
            </ul>
            <a href="<?php echo home_url('/column/'); ?>" class="Button sp">VIEW MORE</a>
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