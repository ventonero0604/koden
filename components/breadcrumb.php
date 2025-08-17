<div class="BreadCrumb">
  <ul class="list">
    <li class="item">
      <a href="<?php echo home_url(); ?>">TOP</a>
    </li>

    <?php
    // パンくずリスト生成
    if (is_page() && !is_front_page()) {
      // 固定ページの場合
      $ancestors = get_post_ancestors(get_the_ID());
      $ancestors = array_reverse($ancestors);

      foreach ($ancestors as $ancestor) {
        echo '<li class="item">';
        echo '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
        echo '</li>';
      }

      // 現在のページ
      echo '<li class="item">';
      echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
      echo '</li>';
    } elseif (is_single()) {
      // 投稿詳細ページの場合
      $post_type = get_post_type();

      if ($post_type === 'post') {
        // 通常の投稿
        echo '<li class="item"><a href="' . get_permalink(get_option('page_for_posts')) . '">ブログ</a></li>';
      } elseif ($post_type === 'team') {
        echo '<li class="item"><a href="' . home_url('/team/') . '">チーム</a></li>';
      } elseif ($post_type === 'portfolio') {
        echo '<li class="item"><a href="' . home_url('/portfolio/') . '">ポートフォリオ</a></li>';
      } elseif ($post_type === 'news') {
        echo '<li class="item"><a href="' . home_url('/news/') . '">ニュース</a></li>';
      } elseif ($post_type === 'story') {
        echo '<li class="item"><a href="' . home_url('/story/') . '">ストーリー</a></li>';
      } elseif ($post_type === 'column') {
        echo '<li class="item"><a href="' . home_url('/column/') . '">コラム</a></li>';
      }

      // 現在の投稿
      echo '<li class="item">';
      echo '<span>' . get_the_title() . '</span>';
      echo '</li>';
    } elseif (is_archive()) {
      // アーカイブページの場合
      if (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();

        // タクソノミーから投稿タイプを判定
        if ($term->taxonomy === 'portfolio_category') {
          echo '<li class="item"><a href="' . home_url('/portfolio/') . '">ポートフォリオ</a></li>';
        } elseif ($term->taxonomy === 'news_category') {
          echo '<li class="item"><a href="' . home_url('/news/') . '">ニュース</a></li>';
        } elseif ($term->taxonomy === 'story_category') {
          echo '<li class="item"><a href="' . home_url('/story/') . '">ストーリー</a></li>';
        } elseif ($term->taxonomy === 'column_category') {
          echo '<li class="item"><a href="' . home_url('/column/') . '">コラム</a></li>';
        }

        // 現在のカテゴリー
        echo '<li class="item">';
        echo '<span>' . $term->name . '</span>';
        echo '</li>';
      } else {
        // 投稿タイプアーカイブ
        $post_type_obj = get_queried_object();
        echo '<li class="item">';
        echo '<span>' . $post_type_obj->label . '</span>';
        echo '</li>';
      }
    } else {
      // その他の場合（デフォルト）
      echo '<li class="item">';
      echo '<span>' . get_the_title() . '</span>';
      echo '</li>';
    }
    ?>
  </ul>
</div>