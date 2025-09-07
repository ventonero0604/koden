import $ from 'jquery';

// ScrollReveal初期化
document.addEventListener('DOMContentLoaded', function () {
  if (typeof ScrollReveal !== 'undefined') {
    // ScrollReveal初期化
    const sr = ScrollReveal({
      origin: 'bottom',
      distance: '60px',
      duration: 800,
      delay: 200,
      reset: false,
      easing: 'ease-out'
    });

    // 各セクションにアニメーション適用

    // KVセクション
    sr.reveal('.kv .logo', {
      delay: 300,
      distance: '30px'
    });

    sr.reveal('.kv .title', {
      delay: 500,
      distance: '30px'
    });

    sr.reveal('.kv .texts .text', {
      delay: 100,
      interval: 200
    });

    // Aboutセクション
    // sr.reveal('.about .header', {
    //   distance: '50px'
    // });

    sr.reveal('.about .items .item', {
      interval: 300,
      distance: '40px'
    });

    // Supportセクション
    sr.reveal('.support .title', {
      distance: '30px'
    });

    sr.reveal('.support .lead', {
      delay: 300,
      distance: '30px'
    });

    // Portfolioセクション
    sr.reveal('.portfolio .SectionTitle', {
      distance: '30px'
    });

    sr.reveal('.portfolio .texts', {
      origin: 'left',
      distance: '60px',
      delay: 200
    });

    sr.reveal('.portfolio .image', {
      origin: 'right',
      distance: '60px',
      delay: 400
    });

    // Separatorセクション
    sr.reveal('.separator', {
      distance: '30px',
      scale: 0.9
    });

    // Teamセクション
    sr.reveal('.team .SectionTitle', {
      distance: '30px'
    });

    sr.reveal('.team .texts', {
      origin: 'left',
      distance: '60px',
      delay: 200
    });

    sr.reveal('.team .slider .item', {
      origin: 'bottom',
      distance: '40px',
      interval: 150,
      delay: 400
    });

    // Newsセクション
    sr.reveal('.news .SectionTitle', {
      distance: '30px'
    });

    sr.reveal('.news .list .item', {
      interval: 200,
      distance: '40px'
    });

    sr.reveal('.news .ViewMore', {
      delay: 600,
      distance: '30px'
    });

    // Participateセクション
    // sr.reveal('.Participate .container', {
    //   distance: '50px'
    // });

    sr.reveal('.Participate .links .startup', {
      origin: 'left',
      distance: '60px',
      delay: 200
    });

    sr.reveal('.Participate .links .investor', {
      origin: 'right',
      distance: '60px',
      delay: 400
    });
  }
});

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
