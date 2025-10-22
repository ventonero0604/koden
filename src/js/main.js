import $ from 'jquery';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import ScrollReveal from 'scrollreveal';

// ローディング画面 - トップページのみ
if (document.querySelector('.Loading')) {
  // ページ読み込み完了を待つ
  window.addEventListener('load', function () {
    const loading = document.querySelector('.Loading');
    const logo = document.querySelector('.Loading_logo');

    // ロゴを左から白で塗る
    setTimeout(() => {
      logo.classList.add('fill');
    }, 300);

    // ロゴが塗り終わったら少し間を開けてロゴが消え始める
    setTimeout(() => {
      logo.classList.add('slide-up');
    }, 1600); // 300ms + 800ms(fill) + 500ms(間)

    // ロゴが少し消えてから背景を上に持ち上げる
    setTimeout(() => {
      loading.classList.add('hide');
    }, 1875); // 1600ms + 275ms(ロゴが少し消える時間)

    // ローディング画面を完全に削除
    setTimeout(() => {
      loading.remove();
    }, 2675); // 1875ms + 800ms(背景スライド)
  });
}

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

  // Archiveカルーセル
  let archiveSwiper;
  if (document.querySelector('.archive-swiper')) {
    archiveSwiper = new Swiper('.archive-swiper', {
      modules: [Navigation, Pagination],
      loop: true,
      slidesPerView: 'auto',
      spaceBetween: 20,
      freeMode: true,
      grabCursor: true,
      mousewheel: {
        forceToAxis: true
      },
      navigation: {
        nextEl: '.archive-button-next',
        prevEl: '.archive-button-prev'
      },
      pagination: {
        el: '.archive-pagination',
        clickable: true
      },
      breakpoints: {
        769: {
          spaceBetween: 20,
          centeredSlides: false
        },
        0: {
          spaceBetween: 20,
          centeredSlides: true,
          initialSlide: 0
        }
      }
    });
  }

  // ScrollReveal - トップページのみ
  if (document.querySelector('.Top')) {
    const sr = ScrollReveal({
      origin: 'bottom',
      distance: '60px',
      duration: 500,
      delay: 100,
      easing: 'ease-out',
      reset: false,
      mobile: true
    });

    // セクションタイトル
    sr.reveal('.SectionTitle', {
      delay: 100
    });

    // Exhibition セクション
    sr.reveal('.Exhibition .image', {
      delay: 200,
      beforeReveal: el => {
        el.classList.add('reveal-mask');
      }
    });
    sr.reveal('.Exhibition .navi', {
      delay: 300
    });

    // Archive セクション（Swiper以外）
    sr.reveal('.Archive .archive-swiper', {
      delay: 200,
      beforeReveal: () => {
        // Swiperのスライドを順番にアニメーション
        if (archiveSwiper && archiveSwiper.slides) {
          archiveSwiper.slides.forEach((slide, index) => {
            setTimeout(() => {
              slide.classList.add('slide-visible');
            }, index * 300); // 150msずつ遅延
          });
        }
      }
    });
    sr.reveal('.Archive .Button', {
      delay: 300
    });

    // Nowhere セクション
    sr.reveal('.Nowhere .header', {
      delay: 100
    });
    sr.reveal('.Nowhere .map', {
      delay: 200
    });
    sr.reveal('.Nowhere .info', {
      delay: 300
    });
    sr.reveal('.Nowhere .cardWrapper .bg_left', {
      origin: 'left',
      distance: '100px',
      delay: 200
    });
    sr.reveal('.Nowhere .Card', {
      delay: 400
    });
    sr.reveal('.Nowhere .cardWrapper .bg_right', {
      origin: 'right',
      distance: '100px',
      delay: 200
    });

    // News セクション
    sr.reveal('.NewsList .list li', {
      interval: 150
    });

    // ArtTrain セクション
    sr.reveal('.ArtTrain .texts', {
      origin: 'left',
      delay: 200
    });
    sr.reveal('.ArtTrain .image', {
      origin: 'right',
      delay: 300
    });

    // Concept セクション
    sr.reveal('.Concept .list li', {
      interval: 200,
      delay: 200
    });

    // Separator - 電車が走り抜けるアニメーション
    sr.reveal('.Separator', {
      delay: 100,
      beforeReveal: el => {
        el.classList.add('train-running');
      }
    });
  }
});
