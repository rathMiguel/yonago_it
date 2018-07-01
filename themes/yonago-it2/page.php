<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper">
  <div class="wrapper-single">
    <div class="block-introduction">
      <div class="block-introduction-photo">
      <?php the_post_thumbnail('main-image',array( 'alt' => get_the_title(), 'title' => get_the_title())); ?>
      </div>
      <div class="block-introduction-header">
        <h1 class="title title-block-header"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="block-contribution">
      <div class="contribution-content">
        <?php the_content() ?>
      </div>
      <?php 
      /*
      次の機能の追加予定
      - シェアボタン
      - 関連記事リンク
      - 前ページ / 次ページリンク
      */
       ?>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
