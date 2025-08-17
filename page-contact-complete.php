<?php
/*
Template Name: お問い合わせ 完了
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
            <li class="black">3</li>
          </ul>
          <p class="thanks">
            お問い合わせいただき<br class="sp">ありがとうございました。
          </p>
          <p class="lead left">
            お問い合わせいただきありがとうございました。<br>
            確認のためにお客様に自動返信メールをお送りしております。<br>
            しばらく経ってもメールが届かない場合は、入力頂いたメールアドレスが間違っているか、<br>
            迷惑メールフォルダに振り分けられている可能性がございます。<br>
            また、ドメイン指定をされている場合は、「@XXXX.com」からのメールが受信できるようあらかじめ設定をお願いいたします。<br>
            以上の内容をご確認の上、お手数ですがもう一度フォームよりお問い合わせ頂きますようお願い申し上げます。<br><br>

            なお、お急ぎの場合は電話でもご相談を受け付けております。<br>
            00-0000-0000までご遠慮なくご相談ください。
          </p>
          <a href="/" class="Button Button_red">TOPへ戻る</a>
        </div>
      </section>
    </div>

    <?php get_template_part('components/participate'); ?>
  </main>
  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>