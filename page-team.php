<?php
/*
Template Name: チーム一覧
Template Post Type: page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="Team">
    <?php get_template_part('components/breadcrumb'); ?>
    <div class="PageHeader">
      <h1 class="title">
        <?php the_title(); ?>
      </h1>
    </div>
    <div class="Wrapper">
      <section class="content">
        <div class="PageTitlpagee">
          <h2 class="title mincho">
            チーム
          </h2>
          <p class="lead">
            株式会社ひろしまインキュベーション&キャピタルに所属するメンバーを紹介します。
          </p>
        </div>
        <ul class="list">
          <li class="item">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="メンバー1">
              <p class="name">メンバー</p>
            </a>
          </li>
          <li class="item">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="メンバー1">
              <p class="name">メンバー</p>
            </a>
          </li>
          <li class="item">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="メンバー1">
              <p class="name">メンバー</p>
            </a>
          </li>
          <li class="item">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="メンバー1">
              <p class="name">メンバー</p>
            </a>
          </li>
          <li class="item">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/team_member_1.png" alt="メンバー1">
              <p class="name">メンバー</p>
            </a>
          </li>

        </ul>
      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>