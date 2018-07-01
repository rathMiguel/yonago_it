<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no,address=no,email=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header id="header">
      <div class="wrapper">
        <div class="rows">
          <div class="cols col-12">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>/">
                    <img src="<?php bloginfo('template_directory'); ?>/images/common/logo.svg" alt="<?php bloginfo('name'); ?>" width="82"></a></div>
            <div class="header-caption"><p><?php bloginfo('name'); ?></p></div>
          </div>
        </div>
      </div>
    </header>
    <div class="nav-bars">
        <span class="bars"></span>
        <span class="bars"></span>
        <span class="bars"></span>
    </div>
    <nav class="header-nav">
      <div class="wrapper">
        <div class="rows">
          <div class="cols col-12 pdx-0-sm">
            <div class="block-nav-global">
              <ul class="list-global">
                <?php wp_nav_menu(array('theme_location' => 'globalnav', 'container' => false, 'items_wrap' => '%3$s')); ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <main role="main">
