<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper-single">
  <div class="rows">
    <div class="cols col-12">
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
        <!-- 
        <div class="block-share">
          <p>この記事はいかがでしたか？</p>
          <p>気に入りましたらシェアお願いします！</p>
          <div class="share-icon"><i class="fab fa-facebook fa-3x color-facebook"></i><i class="fab fa-twitter-square fa-3x color-twitter"></i><i class="fab fa-line fa-3x color-line"></i></div>
        </div>
        -->
      </div>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
