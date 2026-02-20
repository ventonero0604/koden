<header class="Header">
  <h1>
    <a href="<?php echo home_url(); ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.svg" alt="走る美術館">
    </a>
  </h1>
  <div class="content">
    <ul class="links">
      <?php get_template_part('components/menuLinks'); ?>
    </ul>
  </div>
  <div class="expand">
    <div class="wrapper">
      <a href="<?php echo home_url(); ?>" class="innerLogo">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo_white.svg" alt="走る美術館">
      </a>
      <ul class="details">
        <?php get_template_part('components/menuLinks'); ?>
      </ul>
    </div>
  </div>
  <button class="menu">
    <span></span>
  </button>
</header>