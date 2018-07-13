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

  <?php 

  $post_type = get_post_type();

  // 前ページ / 次ページの情報を取得
  $prevpost = mod_get_adjacent_post('prev', array($post_type));
  $nextpost = mod_get_adjacent_post('next', array($post_type));

  //前の記事、次の記事いずれか存在しているとき
  if( $prevpost or $nextpost ): 
   ?>
  <div class="block-relation">
    <div class="relation-link">
      <?php if ($prevpost): ?>
        <a class="next-page" href="<?php the_permalink($prevpost->ID) ?>">
          <div class="block-next-page"><i class="fa fa-angle-left fa-3x"></i></div>
          <div class="block-next-page2">
            <p class="sub">前のページ</p>
            <p><?php echo $prevpost->post_title; ?></p>
          </div>
        </a>
      <?php endif ?>
      <?php if ($nextpost): ?>
      <a class="back-page" href="<?php the_permalink($nextpost->ID) ?>">
        <div class="block-back-page">
          <p class="sub">次のページ</p>
          <p><?php echo $nextpost->post_title; ?></p>
        </div>
        <div class="block-back-page2"><i class="fa fa-angle-right fa-3x"></i></div>
      </a>
      <?php endif ?>
    </div>
  </div>

  <?php endif; ?>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
