<?php
/*
Template Name: お問い合わせ
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
            <li>2</li>
            <li>3</li>
          </ul>
          <p class="lead">
            ご質問をお問い合わせフォームにて<br class="sp">受け付けております。<br>
            お問い合わせ内容を選択いただき、必須事項を明記して下記フォームよりご連絡ください。
          </p>
        </div>

        <div class="form">
          <?php the_content(); ?>
        </div>

      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>
  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>