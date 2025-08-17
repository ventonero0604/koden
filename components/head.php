<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/favicon.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Shippori+Mincho&display=swap"
    rel="stylesheet">

  <?php wp_head(); ?>
</head>