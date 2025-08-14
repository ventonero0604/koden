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

  // URLパラメータをチェックして属性を自動選択
  if ($('.Contact').length) {
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type');

    if (type === 'startup') {
      // スタートアップが選択された場合、属性セレクトボックスを自動選択
      $('#userType').val('startup');
    }
  }
});
