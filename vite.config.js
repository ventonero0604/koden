import { defineConfig } from 'vite';

import { resolve } from 'path';

//handlebarsプラグインimport
import handlebars from 'vite-plugin-handlebars';

//HTML上で出し分けたい各ページごとの情報
const pageData = {
  'index.html': {
    isHome: true,
    title: 'Main Page'
  },
  'hoge.html': {
    isHome: false,
    title: 'Hoge'
  }
};

const root = 'src';

export default defineConfig({
  base: './',
  server: {
    host: true //IPアドレスを有効化
  },
  root: root, //開発ディレクトリ設定
  build: {
    outDir: '../dist', //出力場所の指定
    rollupOptions: {
      //ファイル出力設定
      output: {
        assetFileNames: assetInfo => {
          let extType = assetInfo.name.split('.')[1];
          if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
            extType = 'images';
          }
          //ビルド時のCSS名を明記してコントロールする
          if (extType === 'css') {
            return `assets/css/style.css`;
          }
          return `assets/${extType}/[name][extname]`;
        },
        chunkFileNames: 'assets/js/[name].js',
        entryFileNames: 'assets/js/[name].js'
      },
      input: {
        index: resolve(__dirname, root, 'index.html'),
        exhibition: resolve(__dirname, root, 'exhibition.html'),
        gallery: resolve(__dirname, root, 'gallery.html'),
        gallery_1: resolve(__dirname, root, 'gallery_1.html'),
        gallery_2: resolve(__dirname, root, 'gallery_2.html'),
        gallery_3: resolve(__dirname, root, 'gallery_3.html'),
        gallery_4: resolve(__dirname, root, 'gallery_4.html'),
        gallery_5: resolve(__dirname, root, 'gallery_5.html'),
        gallery_6: resolve(__dirname, root, 'gallery_6.html'),
        news: resolve(__dirname, root, 'news.html'),
        news_detail: resolve(__dirname, root, 'news_detail.html')
      }
    }
  },
  /*
    プラグインの設定を追加
  */
  plugins: [
    handlebars({
      //コンポーネントの格納ディレクトリを指定
      partialDirectory: resolve(__dirname, root, 'components'),
      //各ページ情報の読み込み
      context(pagePath) {
        const pageName = pagePath.split('/').pop();
        return pageData[pageName];
      }
    })
  ]
});
