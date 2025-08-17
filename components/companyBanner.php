<?php if (get_field('banner_image')): ?>
  <section class="Detail_banner">
    <a href="<?php echo esc_url(get_field('banner_link')); ?>">
      <img src="<?php echo esc_html(get_field('banner_image')); ?>" alt="">
    </a>
  </section>
<?php endif; ?>