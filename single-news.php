<?php
/*
Template Name: ニュース詳細
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
          <p class="info">
            <span><?php echo get_the_date('Y/n/j'); ?></span>
            <?php
            $categories = get_the_terms(get_the_ID(), 'news_category');
            if ($categories && !is_wp_error($categories)) {
              foreach ($categories as $category) {
                echo '<span>' . esc_html($category->name) . '</span>';
              }
            }
            ?>
          </p>
        </section>

        <section class="Cms">
          <?php the_content(); ?>
        </section>

        <div class="PageNation separator">
          <ul class="list">
            <?php
            // 前の記事
            $prev_post = get_previous_post();
            ?>
            <li class="item">
              <?php if ($prev_post): ?>
                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="Button">
                  前の記事
                </a>
              <?php else: ?>
                <span class="Button disabled">
                  前の記事
                </span>
              <?php endif; ?>
            </li>
            <li class="item">
              <a href="<?php echo home_url('/news/'); ?>" class="Button">
                一覧に戻る
              </a>
            </li>
            <?php
            // 次の記事
            $next_post = get_next_post();
            ?>
            <li class="item">
              <?php if ($next_post): ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="Button">
                  次の記事
                </a>
              <?php else: ?>
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