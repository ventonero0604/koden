<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('components/head'); ?>

<body>
  <!-- ローディング画面 -->
  <div class="Loading">
    <div class="Loading_logo">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo_gray.svg" alt="HIRODEN ART TRAM" class="logo-base">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo_gray.svg" alt="HIRODEN ART TRAM" class="logo-white">
    </div>
  </div>

  <?php get_template_part('components/header'); ?>

  <main class="Top">
    <section class="Kv">
      <div class="movie">
        <video class="pc" src="<?php echo get_template_directory_uri(); ?>/dist/img/pc.mp4" autoplay muted playsinline loop></video>
        <video class="sp" src="<?php echo get_template_directory_uri(); ?>/dist/img/sp.mp4" autoplay muted playsinline loop></video>
      </div>
    </section>

    <section class="Exhibition" id="exhibition">
      <div class="Wrapper">
        <h2 class="SectionTitle">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_exhibition.svg" alt="EXHIBITION">
          現在開催中の展示
        </h2>
        <?php
        // Galleryカスタム投稿タイプの最新1件を取得
        $current_exhibition_args = array(
          'post_type' => 'gallery',
          'posts_per_page' => 1,
          'orderby' => 'date',
          'order' => 'DESC'
        );
        $current_exhibition = new WP_Query($current_exhibition_args);

        if ($current_exhibition->have_posts()) :
          while ($current_exhibition->have_posts()) : $current_exhibition->the_post();
            $main_image = get_field('main_image');
        ?>
            <a href="<?php the_permalink(); ?>" class="image">
              <img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt'] ?: get_the_title()); ?>">
            </a>
            <div class="navi">
              <a href="<?php the_permalink(); ?>" class="Button">
                現在開催中の展示を見る
                <span class="arrow-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
                </span>
              </a>
            </div>
          <?php
          endwhile;
          wp_reset_postdata();
        else :
          ?>
          <a href="<?php echo home_url('/gallery/'); ?>" class="image">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/exhibition/yasuda.png" alt="展示情報">
          </a>
          <div class="navi">
            <a href="<?php echo home_url('/gallery/'); ?>" class="Button">
              展示情報を見る
              <span class="arrow-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
              </span>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="Archive" id="archive">
      <h2 class="SectionTitle">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_archive.svg" alt="ARCHIVE">
        これまでの展示作品
      </h2>
      <div class="swiper archive-swiper">
        <ul class="swiper-wrapper list">
          <?php
          // 現在開催中の展示のIDを取得
          $current_exhibition_id = null;
          if ($current_exhibition->have_posts()) {
            $current_exhibition->the_post();
            $current_exhibition_id = get_the_ID();
            wp_reset_postdata();
          }

          // Galleryカスタム投稿タイプの2件目以降を取得
          $archive_args = array(
            'post_type' => 'gallery',
            'posts_per_page' => -1, // 全件取得
            'orderby' => 'date',
            'order' => 'DESC'
          );

          // 現在開催中の展示を除外
          if ($current_exhibition_id) {
            $archive_args['post__not_in'] = array($current_exhibition_id);
          }

          $archive_query = new WP_Query($archive_args);

          if ($archive_query->have_posts()) :
            while ($archive_query->have_posts()) : $archive_query->the_post();
              $main_image = get_field('main_image');
          ?>
              <li class="swiper-slide">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt'] ?: get_the_title()); ?>">
                </a>
              </li>
            <?php
            endwhile;
            wp_reset_postdata();
          else :
            ?>
            <li class="swiper-slide">
              <p>過去の展示はありません。</p>
            </li>
          <?php endif; ?>
        </ul>
        <!-- ナビゲーションボタン -->
        <div class="swiper-button-prev archive-button-prev"></div>
        <div class="swiper-button-next archive-button-next"></div>
        <!-- ページネーション -->
        <div class="swiper-pagination archive-pagination"></div>
      </div>
      <a href="<?php echo home_url('/gallery/'); ?>" class="Button">
        過去の展示を見る
        <span class="arrow-icon">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
        </span>
      </a>
    </section>

    <section class="Nowhere" id="nowhere">
      <div class="header">
        <h2 class="SectionTitle">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_nowhere.svg" alt="NOWHERE">
          走行位置情報
        </h2>
        <h3 class="title">
          広島電鉄市内線 通常営業車両と<br class="sp">同様に運行
        </h3>
        <p class="text">
          <span>GPSによる位置情報のため、多少の誤差が生じる場合がございます。</span>
          <span>電車の行先や乗車の可否は把握できかねますので予めご了承ください。</span>
        </p>
      </div>

      <div class="map">
        <iframe src="https://doconeel.com/hiroden/map.php?member=1&map=1" width="100%" height="400"
          frameborder="0"></iframe>
      </div>

      <div class="info Wrapper">
        <h4 class="lines">運行路線</h4>
        <ul class="list">
          <li>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_1.svg" alt="1">
            広島駅～紙屋町東～広島港
          </li>
          <li>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_3.svg" alt="1">
            広電西広島～紙屋町西～広電本社前
          </li>
          <li>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_5.svg" alt="1">
            広島駅 ～ 比治山下 ～ 広島港
          </li>
          <li>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_7.svg" alt="1">
            横川駅 ～ 紙屋町西 ～ 広島港
          </li>
        </ul>
        <small>
          <span>車両検査等により運休する日もあります。</span>
          <span>固定ダイヤではありませんので、運行時刻は毎日変わります。※都合により他の路線を運行する場合があります。</span>
        </small>
      </div>

      <div class="cardWrapper">
        <aside class="Card">
          <div class="content">
            <figure class="image">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/img_voice.svg" alt="">
            </figure>
            <div class="texts">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_voice.svg" alt="VOICE">
              <p class="lead">
                走る美術館アンケート
              </p>
              <p class="text">
                走る美術館にご乗車いただいた皆様の感想をお寄せください。今後こんな展示が見たい！などのご要望、
                ご意見もぜひお待ちしております。
              </p>
            </div>
          </div>
          <a href="https://hiroshimadentetsu.form.kintoneapp.com/public/ab8e34d259fc3c9aaaddced5eae2b31b36a1f07f8dbd0aeeb529207b5016f808" class="Button">
            アンケートはこちら
            <span class="arrow-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
            </span>
          </a>
        </aside>
      </div>
    </section>

    <section class="NewsSec" id="news">
      <div class="NewsList">
        <h2 class="SectionTitle">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_news.svg" alt="NEWS">
          お知らせ
        </h2>
        <ul class="list">
          <?php
          // NEWSカスタム投稿タイプの最新3件を取得
          $news_args = array(
            'post_type' => 'news',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
          );

          $news_query = new WP_Query($news_args);

          if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();
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
                    <?php echo get_the_title(); ?>
                  </span>
                </a>
              </li>
            <?php
            endwhile;
            wp_reset_postdata();
          else :
            ?>
            <li>
              <p>最新のニュースはありません。</p>
            </li>
          <?php
          endif;
          ?>
        </ul>
        <a href="<?php echo home_url('/news/'); ?>" class="Button">
          NEWS一覧はこちら
          <span class="arrow-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ico_button_arrow.svg" alt="→">
          </span>
        </a>
      </div>
    </section>

    <section class="ArtTrain">
      <div class="texts">
        <h3 class="title">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_arttram.svg" alt="HIRODEN ART TRAM">
        </h3>
        <p class="lead">
          文化・芸術をもっと<br>
          身近に感じていただきたい。<br>
          それが走る美術館です。
        </p>
        <p class="name">
          <span>
            車両
          </span>
          グリーンムーバーLEX（1018号）　
        </p>
        <p class="text">
          キャンバスをイメージした真っ白のデザインにロゴをあしらい、どのような芸術作品でも馴染み、<br>
          まちなかを走る姿そのものも一つの芸術作品になるようなデザインとしました。
        </p>
      </div>
      <figure class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/img_arttrain.png" alt="">
      </figure>
    </section>

    <section class="Concept" id="concept">
      <h2 class="SectionTitle">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_concept.svg" alt="CONCEPT">
        コンセプト
      </h2>
      <ul class="list">
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/img_arttown.svg" alt="ARTxTOWN">
          <p class="text">
            文化・芸術作品と身近に触れ合う「まちの広場」としての美術館になります。
          </p>
        </li>
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/img_wakuwaku.png" alt="ワクワク">
          <p class="text">
            広島のワクワクを創造し、元気なまちづくりに貢献する美術館を目指します。
          </p>
        </li>
        <li>
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/img_arthope.svg" alt="ARTxHOPE">
          <p class="text">
            広島の未来を支えるこども達をはじめ、多くのみなさまと共に成長・発展する美術館活動を展開します。
          </p>
        </li>
      </ul>
    </section>

    <figure class="Separator">
      <div class="marquee">
        <div class="marquee-content">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_arttram.svg" alt="HIRODEN ART TRAM">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_arttram.svg" alt="HIRODEN ART TRAM">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_arttram.svg" alt="HIRODEN ART TRAM">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/img/ttl_arttram.svg" alt="HIRODEN ART TRAM">
        </div>
      </div>
    </figure>
  </main>

  <?php get_template_part('components/footer'); ?>
</body>

</html>