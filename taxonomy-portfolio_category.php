<?php
/*
Template for Portfolio Category Archive
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="Portfolio">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        ポートフォリオ
      </h1>
    </div>
    <div class="Wrapper">
      <section class="content">
        <div class="PageTitle">
          <h2 class="title mincho">
            研究とビジネスの架け橋として、<br>
            多様な連携を推進。
          </h2>
        </div>

        <ul class="Categories">
          <li>
            <a href="<?php echo home_url('/portfolio/'); ?>">すべて</a>
          </li>
          <?php
          $portfolio_categories = get_terms(array(
            'taxonomy' => 'portfolio_category',
            'hide_empty' => true,
          ));
          $current_term = get_queried_object();
          if ($portfolio_categories && !is_wp_error($portfolio_categories)) {
            foreach ($portfolio_categories as $category) {
              $is_current = ($current_term && $current_term->term_id === $category->term_id);
              echo '<li>';
              if ($is_current) {
                echo '<a href="' . get_term_link($category) . '" class="font-bold">' . esc_html($category->name) . '</a>';
              } else {
                echo '<a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a>';
              }
              echo '</li>';
            }
          }
          ?>
        </ul>

        <div class="items">
          <div class="section">
            <h3 class="itemsTitle mincho">
              <?php single_term_title(); ?>
            </h3>
            <ul class="PortfolioList">
              <?php
              // WordPressの標準クエリを使用
              if (have_posts()) {
                while (have_posts()) {
                  the_post();
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
                      <p class="name">
                        <?php echo esc_html($company_name ? $company_name : get_the_title()); ?>
                      </p>
                    </a>
                  </li>
              <?php
                }
              } else {
                echo '<li class="item">該当するポートフォリオがありません。</li>';
              }
              ?>
            </ul>
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