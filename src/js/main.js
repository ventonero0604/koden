import $ from 'jquery';

// ハンバーガーメニューの実装
$(document).ready(function () {
  let scrollTop = 0;

  $('.menu').on('click', function () {
    $('.Header').toggleClass('is-open');
    $(this).toggleClass('is-open');

    // ヘッダーのis-openクラスを監視して背景スクロール制御
    if ($('.Header').hasClass('is-open')) {
      // 現在のスクロール位置を保存
      scrollTop = $(window).scrollTop();
      $('body').css('--scroll-top', `-${scrollTop}px`);
      $('body').addClass('no-scroll');
    } else {
      // スクロール位置を復元
      $('body').removeClass('no-scroll');
      $('body').css('--scroll-top', '');
      $(window).scrollTop(scrollTop);
    }
  });

  // アンカーリンクのスムーススクロール（ヘッダー高さ考慮）
  $('a[href^="#"]').on('click', function (e) {
    const href = $(this).attr('href');

    if (href === '#') {
      return;
    }

    e.preventDefault();

    const target = $(href);
    if (target.length) {
      const headerHeight = $('.Header').outerHeight();
      const targetPosition = target.offset().top - headerHeight;

      $('html, body').animate(
        {
          scrollTop: targetPosition
        },
        200
      );
    }
  });

  // モーダル機能
  $('.js-modal').on('click', function () {
    // 同じli内のfigure.imageのimg要素を取得
    const $li = $(this).closest('li');
    const $img = $li.find('figure.image img');
    const imgSrc = $img.attr('src');
    const imgAlt = $img.attr('alt');

    if (imgSrc) {
      // モーダルに画像をセット
      $('#modal-image').attr('src', imgSrc).attr('alt', imgAlt);
      $('#image-modal').addClass('is-open');

      // 背景スクロールを無効化（簡略版）
      $('body').css('overflow', 'hidden');
    }
  });

  // モーダルを閉じる
  $('.modal-close, .modal').on('click', function (e) {
    if (e.target === this) {
      $('#image-modal').removeClass('is-open');

      // 背景スクロールを復元
      $('body').css('overflow', '');
    }
  });

  // ESCキーでモーダルを閉じる
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape' && $('#image-modal').hasClass('is-open')) {
      $('#image-modal').removeClass('is-open');
      $('body').css('overflow', '');
    }
  });
});
