<header class="Header">
  <h1>
    <a href="<?php echo home_url(); ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.svg" alt="HIC">
    </a>
  </h1>
  <div class="content">
    <ul class="links">
      <li>
        <a href="<?php echo home_url('/about'); ?>">HICとは</a>
      </li>
      <li>
        <a href="<?php echo home_url('/news'); ?>">NEWS</a>
      </li>
      <!-- <li>
        <a href="<?php echo home_url('/media'); ?>">メディア</a>
      </li> -->
      <li><a href="<?php echo home_url('/contact'); ?>">お問い合わせ</a></li>
    </ul>
  </div>
  <div class="expand">
    <div class="wrapper">
      <ul class="details">
        <li><a href="<?php echo home_url('/about'); ?>">HICとは</a>
          <ul>
            <li>
              <a href="<?php echo home_url('/team'); ?>">チーム</a>
            </li>
          </ul>
        </li>
        <li><a href="<?php echo home_url('/news'); ?>">NEWS</a></li>
        <li><a href="<?php echo home_url('/contact'); ?>">お問い合わせ</a></li>
        <!-- <li><a href="<?php echo home_url('/media'); ?>">メディア</a>
          <ul>
            <li>
              <a href="<?php echo home_url('/media/column'); ?>">コラム</a>
            </li>
            <li>
              <a href="<?php echo home_url('/media/story'); ?>">ストーリー</a>
            </li>
          </ul>
        </li>
        <li><a href="<?php echo home_url('/portfolio'); ?>">ポートフォリオ</a></li> -->
      </ul>
    </div>
  </div>
  <button class="menu">
    <span></span>
  </button>
</header>