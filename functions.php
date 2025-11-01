<?php

/**
 * KODEN Theme Functions
 */

// CSS・JSの読み込み
function koden_enqueue_scripts()
{
  // SwiperのCSS
  wp_enqueue_style(
    'koden-swiper-style',
    get_template_directory_uri() . '/dist/assets/css/style.css',
    array(),
    filemtime(get_template_directory() . '/dist/assets/css/style.css')
  );

  // メインCSS(dist/assets/css から読み込み)
  wp_enqueue_style(
    'koden-main-style',
    get_template_directory_uri() . '/dist/assets/css/style2.css',
    array('koden-swiper-style'), // Swiperスタイルに依存
    filemtime(get_template_directory() . '/dist/assets/css/style2.css')
  );

  // メインJS (ESモジュールとして読み込み)
  if (file_exists(get_template_directory() . '/dist/assets/js/main.js')) {
    wp_enqueue_script(
      'koden-main-script',
      get_template_directory_uri() . '/dist/assets/js/main.js',
      array(), // 依存関係を削除（モジュール内でimportされているため）
      filemtime(get_template_directory() . '/dist/assets/js/main.js'),
      false // headで読み込む(trueからfalseに変更)
    );
    // ESモジュールとして読み込むための属性を追加
    add_filter('script_loader_tag', function ($tag, $handle) {
      if ('koden-main-script' === $handle) {
        $tag = str_replace('<script ', '<script type="module" ', $tag);
      }
      return $tag;
    }, 10, 2);
  }
}
add_action('wp_enqueue_scripts', 'koden_enqueue_scripts');

// カスタム投稿タイプを登録
function koden_register_custom_post_types()
{
  // NEWS カスタム投稿タイプ
  register_post_type('news', array(
    'labels' => array(
      'name' => 'NEWS',
      'singular_name' => 'NEWS',
      'add_new' => '新規追加',
      'add_new_item' => '新しいNEWSを追加',
      'edit_item' => 'NEWSを編集',
      'new_item' => '新しいNEWS',
      'view_item' => 'NEWSを表示',
      'search_items' => 'NEWSを検索',
      'not_found' => 'NEWSが見つかりませんでした',
      'not_found_in_trash' => 'ゴミ箱にNEWSはありません',
    ),
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-megaphone',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'news'),
    'show_in_rest' => true,
    'taxonomies' => array('post_tag'), // タグを有効化
  ));

  // Gallery カスタム投稿タイプ
  register_post_type('gallery', array(
    'labels' => array(
      'name' => 'Gallery',
      'singular_name' => 'Gallery',
      'add_new' => '新規追加',
      'add_new_item' => '新しいGalleryを追加',
      'edit_item' => 'Galleryを編集',
      'new_item' => '新しいGallery',
      'view_item' => 'Galleryを表示',
      'search_items' => 'Galleryを検索',
      'not_found' => 'Galleryが見つかりませんでした',
      'not_found_in_trash' => 'ゴミ箱にGalleryはありません',
    ),
    'public' => true,
    'has_archive' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-images-alt2',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'gallery'),
    'show_in_rest' => true,
    'taxonomies' => array('post_tag'), // タグを有効化
  ));
}
add_action('init', 'koden_register_custom_post_types');
