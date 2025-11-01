<?php

/**
 * Template for NEWS single post
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <main class="Pages">
        <nav class="BreadCrumb">
          <ul class="list">
            <li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
            <li><a href="<?php echo home_url('/news/'); ?>">NEWS</a></li>
            <li><?php the_title(); ?></li>
          </ul>
        </nav>
        <section class="NewsDetail">
          <h2 class="SectionTitle">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_news.svg" alt="NEWS">
            お知らせ
          </h2>

          <?php if (has_post_thumbnail()) : ?>
            <div class="header">
              <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>

          <div class="info">
            <span class="date">
              <?php echo get_the_date('Y.m.d'); ?>
            </span>
            <?php
            $tags = get_the_tags();
            if ($tags) :
              foreach ($tags as $tag) :
            ?>
                <span class="Label">
                  <?php echo esc_html($tag->name); ?>
                </span>
            <?php
              endforeach;
            endif;
            ?>
          </div>

          <div class="content">
            <h1>
              <?php the_title(); ?>
            </h1>
            <?php the_content(); ?>
          </div>

          <div class="footer">
            <div class="pages">
              <?php
              $prev_post = get_previous_post();
              $next_post = get_next_post();
              ?>
              <?php if ($prev_post) : ?>
                <a href="<?php echo get_permalink($prev_post->ID); ?>">前の記事を読む</a>
              <?php endif; ?>
              <?php if ($next_post) : ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>">次の記事を読む</a>
              <?php endif; ?>
            </div>
            <a href="<?php echo home_url('/news/'); ?>" class="Button">NEWS一覧に戻る<span class="arrow-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
              </span></a>
          </div>

          <div class="NewsList">
            <h3 class="title">
              最新のNEWS
            </h3>

            <ul class="list">
              <?php
              // 現在の投稿を除外して、NEWSカスタム投稿タイプの最新3件を取得
              $current_post_id = get_the_ID();

              $recent_news_args = array(
                'post_type' => 'news',
                'posts_per_page' => 3,
                'post__not_in' => array($current_post_id),
                'orderby' => 'date',
                'order' => 'DESC'
              );

              $recent_news = new WP_Query($recent_news_args);

              if ($recent_news->have_posts()) :
                while ($recent_news->have_posts()) : $recent_news->the_post();
                  $post_tags = get_the_tags();
              ?>
                  <li>
                    <a href="<?php the_permalink(); ?>">
                      <span class="date">
                        <?php echo get_the_date('Y.m.d'); ?>
                      </span>
                      <?php if ($post_tags) : ?>
                        <span class="Label">
                          <?php echo esc_html($post_tags[0]->name); ?>
                        </span>
                      <?php endif; ?>
                      <span class="text">
                        <?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?>
                      </span>
                    </a>
                  </li>
                <?php
                endwhile;
                wp_reset_postdata();
              else :
                ?>
                <li>
                  <p>最新の記事はありません。</p>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </section>

      </main>

  <?php endwhile;
  endif; ?>

  <?php get_template_part('components/footer'); ?>
</body>

</html>