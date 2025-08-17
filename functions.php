<?php

/**
 * HIC Theme Functions
 */

// テーマサポート
function hic_theme_support()
{
  // HTML5サポート
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption'
  ));

  // 投稿サムネイル
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'hic_theme_support');

// CSS・JSの読み込み
function hic_enqueue_scripts()
{
  // メインCSS（dist/assets/css から読み込み）
  wp_enqueue_style(
    'hic-main-style',
    get_template_directory_uri() . '/dist/assets/css/style.css',
    array(),
    filemtime(get_template_directory() . '/dist/assets/css/style.css')
  );

  // メインJS
  if (file_exists(get_template_directory() . '/dist/assets/js/main.js')) {
    wp_enqueue_script(
      'hic-main-script',
      get_template_directory_uri() . '/dist/assets/js/main.js',
      array(),
      filemtime(get_template_directory() . '/dist/assets/js/main.js'),
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'hic_enqueue_scripts');

// 管理画面でのCSS・JS読み込み（必要に応じて）
function hic_admin_enqueue_scripts()
{
  if (file_exists(get_template_directory() . '/dist/assets/css/admin.css')) {
    wp_enqueue_style(
      'hic-admin-style',
      get_template_directory_uri() . '/dist/assets/css/admin.css',
      array(),
      filemtime(get_template_directory() . '/dist/assets/css/admin.css')
    );
  }
}
add_action('admin_enqueue_scripts', 'hic_admin_enqueue_scripts');

// 画像パス取得のためのヘルパー関数
function hic_img_url($filename = '')
{
  return get_template_directory_uri() . '/img/' . $filename;
}

// カスタム投稿タイプの作成
function hic_create_custom_post_types()
{
  // Member（メンバー）
  register_post_type('member', array(
    'labels' => array(
      'name' => 'メンバー',
      'singular_name' => 'メンバー',
      'add_new' => '新規追加',
      'add_new_item' => 'メンバーを追加',
      'edit_item' => 'メンバーを編集',
      'new_item' => '新しいメンバー',
      'view_item' => 'メンバーを表示',
      'search_items' => 'メンバーを検索',
      'not_found' => 'メンバーが見つかりません',
      'not_found_in_trash' => 'ゴミ箱にメンバーはありません'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'menu_icon' => 'dashicons-groups',
    'show_in_rest' => true,
  ));

  // Portfolio（ポートフォリオ）
  register_post_type('portfolio', array(
    'labels' => array(
      'name' => 'ポートフォリオ',
      'singular_name' => 'ポートフォリオ',
      'add_new' => '新規追加',
      'add_new_item' => 'ポートフォリオを追加',
      'edit_item' => 'ポートフォリオを編集',
      'new_item' => '新しいポートフォリオ',
      'view_item' => 'ポートフォリオを表示',
      'search_items' => 'ポートフォリオを検索',
      'not_found' => 'ポートフォリオが見つかりません',
      'not_found_in_trash' => 'ゴミ箱にポートフォリオはありません'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'menu_icon' => 'dashicons-portfolio',
    'show_in_rest' => true,
  ));

  // News（ニュース）
  register_post_type('news', array(
    'labels' => array(
      'name' => 'ニュース',
      'singular_name' => 'ニュース',
      'add_new' => '新規追加',
      'add_new_item' => 'ニュースを追加',
      'edit_item' => 'ニュースを編集',
      'new_item' => '新しいニュース',
      'view_item' => 'ニュースを表示',
      'search_items' => 'ニュースを検索',
      'not_found' => 'ニュースが見つかりません',
      'not_found_in_trash' => 'ゴミ箱にニュースはありません'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'menu_icon' => 'dashicons-megaphone',
    'show_in_rest' => true,
  ));

  // Story（ストーリー）
  register_post_type('story', array(
    'labels' => array(
      'name' => 'ストーリー',
      'singular_name' => 'ストーリー',
      'add_new' => '新規追加',
      'add_new_item' => 'ストーリーを追加',
      'edit_item' => 'ストーリーを編集',
      'new_item' => '新しいストーリー',
      'view_item' => 'ストーリーを表示',
      'search_items' => 'ストーリーを検索',
      'not_found' => 'ストーリーが見つかりません',
      'not_found_in_trash' => 'ゴミ箱にストーリーはありません'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'menu_icon' => 'dashicons-book-alt',
    'show_in_rest' => true,
  ));

  // Column（コラム）
  register_post_type('column', array(
    'labels' => array(
      'name' => 'コラム',
      'singular_name' => 'コラム',
      'add_new' => '新規追加',
      'add_new_item' => 'コラムを追加',
      'edit_item' => 'コラムを編集',
      'new_item' => '新しいコラム',
      'view_item' => 'コラムを表示',
      'search_items' => 'コラムを検索',
      'not_found' => 'コラムが見つかりません',
      'not_found_in_trash' => 'ゴミ箱にコラムはありません'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'menu_icon' => 'dashicons-edit-page',
    'show_in_rest' => true,
  ));
}
add_action('init', 'hic_create_custom_post_types');

// カスタムタクソノミー（カテゴリー）の作成
function hic_create_custom_taxonomies()
{
  // Portfolio カテゴリー
  register_taxonomy('portfolio_category', 'portfolio', array(
    'labels' => array(
      'name' => 'ポートフォリオカテゴリー',
      'singular_name' => 'ポートフォリオカテゴリー',
      'add_new_item' => '新しいカテゴリーを追加',
      'edit_item' => 'カテゴリーを編集',
      'update_item' => 'カテゴリーを更新',
      'view_item' => 'カテゴリーを表示',
      'search_items' => 'カテゴリーを検索',
      'not_found' => 'カテゴリーが見つかりません'
    ),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
  ));

  // News カテゴリー
  register_taxonomy('news_category', 'news', array(
    'labels' => array(
      'name' => 'ニュースカテゴリー',
      'singular_name' => 'ニュースカテゴリー',
      'add_new_item' => '新しいカテゴリーを追加',
      'edit_item' => 'カテゴリーを編集',
      'update_item' => 'カテゴリーを更新',
      'view_item' => 'カテゴリーを表示',
      'search_items' => 'カテゴリーを検索',
      'not_found' => 'カテゴリーが見つかりません'
    ),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
  ));

  // Story カテゴリー
  register_taxonomy('story_category', 'story', array(
    'labels' => array(
      'name' => 'ストーリーカテゴリー',
      'singular_name' => 'ストーリーカテゴリー',
      'add_new_item' => '新しいカテゴリーを追加',
      'edit_item' => 'カテゴリーを編集',
      'update_item' => 'カテゴリーを更新',
      'view_item' => 'カテゴリーを表示',
      'search_items' => 'カテゴリーを検索',
      'not_found' => 'カテゴリーが見つかりません'
    ),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
  ));

  // Column カテゴリー
  register_taxonomy('column_category', 'column', array(
    'labels' => array(
      'name' => 'コラムカテゴリー',
      'singular_name' => 'コラムカテゴリー',
      'add_new_item' => '新しいカテゴリーを追加',
      'edit_item' => 'カテゴリーを編集',
      'update_item' => 'カテゴリーを更新',
      'view_item' => 'カテゴリーを表示',
      'search_items' => 'カテゴリーを検索',
      'not_found' => 'カテゴリーが見つかりません'
    ),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_rest' => true,
  ));
}
add_action('init', 'hic_create_custom_taxonomies');

// リライトルールをフラッシュ（テーマ有効化時に実行）
function hic_flush_rewrite_rules()
{
  hic_create_custom_post_types();
  hic_create_custom_taxonomies();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'hic_flush_rewrite_rules');

// セキュリティ対策：直接アクセス禁止
if (!defined('ABSPATH')) {
  exit;
}
