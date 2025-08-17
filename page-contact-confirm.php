<?php
/*
Template Name: お問い合わせ 確認
Template Post Type: page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>

  <main class="Contact">
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
            お問い合わせ
          </h2>
          <ul class="number">
            <li class="black">1</li>
            <li class="black">2</li>
            <li>3</li>
          </ul>
          <p class="lead">
            入力内容の確認画面です。<br>
            内容確認の上、「送信」を押してください。
          </p>
        </div>

        <div class="form">
          <div class="confirm">
            <?php the_content(); ?>
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