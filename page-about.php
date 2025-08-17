<?php
/*
Template Name: HICとは
Template Post Type: page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <?php get_template_part('components/header'); ?>
  <main class="About">
    <section class="kv">
      <div class="main">
        <div class="texts">
          <h1 class="title mincho">
            HICとは
          </h1>
          <p class="text">
            広島インベーションキャピタル（HIC）は、地域の企業とスタートアップの成長を支援するための重要な役割を果たしています。<br>
            HICは、革新的なアイデアを持つ企業に投資し、彼らが世界市場で競争できるようにサポートを提供しています。
          </p>
        </div>
      </div>
      <p class="lead mincho">
        当ファンドは、広島を中心とする中国・四国地域のスタートアップエコシステムの構築や経済の発展を目的に設立し、<br class="pc">
        将来有望な研究シーズの発掘及び支援を実施する。
      </p>
    </section>

    <section class="about">
      <div class="Wrapper">
        <h2 class="About_title">
          投資家が共に育てる<br class="sp">HICと広島
        </h2>
        <p class="lead mincho">
          HICは主に創業直後の不確実性の高い時期より投資し、スタートアップの成長を加速させる役割を担う。
        </p>
        <figure class="image">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/about_figure.svg" alt="投資家が共に育てるHICと広島">
        </figure>
      </div>
    </section>

    <section class="mission">
      <div class="Wrapper">
        <h2 class="About_title">
          HICの<br class="sp">Mission・Vision・Value
        </h2>
        <figure class="image">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/about_mission.svg" alt="HICのMission・Vision・Value" class="pc">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/about_mission_sp.svg" alt="HICのMission・Vision・Value" class="sp">
        </figure>
        <p class="value mincho">
          <em>5</em>年間<br class="sp"><em>50</em>億円
        </p>
        <p class="lead mincho">
          広島大学発スタートアップの成長基盤を多角的に支援
        </p>
        <ul class="list">
          <li class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/about_ico_1.svg" alt="">
            <div class="texts">
              <p class="listTitle">
                スタートアップ向けの経営アドバイスで成長基盤を構築
              </p>
              <p class="listText">
                市場分析や資金計画の強化で、持続可能な成長を実現し、競争力を高める戦略的支援を行う。
              </p>

            </div>
          </li>
          <li class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/about_ico_2.svg" alt="">
            <div class="texts">
              <p class="listTitle">
                パートナー企業との効果的なマッチング支援で成長促進
              </p>
              <p class="listText">
                スタートアップの成長を加速するため、最適なパートナー企業を紹介し、事業拡大を支援します。
              </p>
            </div>
          </li>
          <li class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/about_ico_3.svg" alt="">
            <div class="texts">
              <p class="listTitle">
                市場開拓に向けた具体的なマーケティング支援
              </p>
              <p class="listText">
                スタートアップが新市場を開拓できるよう、ターゲット分析やプロモーション戦略の立案など具体的なマーケティング支援を行います。
              </p>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <section class="us">
      <div class="Wrapper">
        <h2 class="About_title">
          About us
        </h2>
        <table>
          <tbody>
            <tr>
              <th>会社名</th>
              <td>株式会社ひろしまインキュベーション&キャピタル</td>
            </tr>
            <tr>
              <th>設立</th>
              <td>2025年</td>
            </tr>
            <tr>
              <th>所在地</th>
              <td>〒739-0046 <br class="sp">広島県東広島市鏡山１丁目３−２ル</td>
            </tr>
            <tr>
              <th>取締役</th>
              <td>滝上 菊規　木村 嘉宏</td>
            </tr>
            <tr>
              <th>監査役</th>
              <td>名前が入ります</td>
            </tr>
            <tr>
              <th>資本金</th>
              <td>10億円</td>
            </tr>
            <tr>
              <th>株主</th>
              <td>国立大学法人広島大学</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="fund">
      <div class="Wrapper">
        <div class="content">
          <div class="texts">
            <h2 class="About_title red">
              ファンドについて
            </h2>
            <p class="lead">
              大学発スタートアップの成長支援を多角的に提供。経営アドバイス、市場分析、資金計画の強化で持続可能な成長を促進。<br>パートナー企業とのマッチング支援やマーケティング支援で事業拡大を加速します。
            </p>
            <a href="/" class="btn">VIEW MORE</a>
          </div>
        </div>
        <div class="content">
          <div class="texts">
            <h2 class="About_title red">
              Teams
            </h2>
            <p class="lead">
              様々なバッググラウンドを持つメンバーが、<br>
              ひとつひとつの事業を磨きあげていきます。
            </p>
            <a href="/" class="btn">VIEW MORE</a>
          </div>
          <img class="image" src="<?php echo get_template_directory_uri(); ?>/dist/img/about_team.png" alt="">
        </div>
      </div>
    </section>

    <?php get_template_part('components/participate'); ?>
  </main>

  <?php get_template_part('components/footer'); ?>

  <?php wp_footer(); ?>
</body>

</html>