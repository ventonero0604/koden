<?php
/*
Template for Portfolio Archive
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
          if ($portfolio_categories && !is_wp_error($portfolio_categories)) {
            foreach ($portfolio_categories as $category) {
              echo '<li>';
              echo '<a href="' . get_term_link($category) . '">' . esc_html($category->name) . '</a>';
              echo '</li>';
            }
          }
          ?>
        </ul>

        <div class="items">
          <?php
          // カテゴリごとにポートフォリオを表示
          if ($portfolio_categories && !is_wp_error($portfolio_categories)) {
            foreach ($portfolio_categories as $category) {
              // カテゴリに属するポートフォリオを取得
              $portfolio_query = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'portfolio_category',
                    'field'    => 'term_id',
                    'terms'    => $category->term_id,
                  ),
                ),
              ));

              if ($portfolio_query->have_posts()) :
          ?>
                <div class="section">
                  <h3 class="itemsTitle mincho">
                    <?php echo esc_html($category->name); ?>
                  </h3>
                  <ul class="PortfolioList">
                    <?php
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
                          <p class="name">
                            <?php echo esc_html($company_name ? $company_name : get_the_title()); ?>
                          </p>
                        </a>
                      </li>
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              <?php
              endif;
              wp_reset_postdata();
            }
          } else {
            // カテゴリが無い場合は全てのポートフォリオを表示
            $portfolio_query = new WP_Query(array(
              'post_type' => 'portfolio',
              'posts_per_page' => -1,
            ));

            if ($portfolio_query->have_posts()) :
              ?>
              <div class="section">
                <h3 class="itemsTitle mincho">
                  ポートフォリオ
                </h3>
                <ul class="PortfolioList">
                  <?php
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
                        <p class="name">
                          <?php echo esc_html($company_name ? $company_name : get_the_title()); ?>
                        </p>
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
          <?php
            endif;
            wp_reset_postdata();
          }
          ?>
        </div>
      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>