<?php get_header(); ?>
<div class="wrapper">
  <div class="wrapper-news">
    <div class="block-header">
      <h2 class="title title-block-header title-margin">スペシャル特集</h2>
    </div>
    <div class="block-news-list">
      <!-- ループ:ニュースリスト-->
      <?php while ( have_posts() ) : the_post(); ?>
      <a href="<?php the_permalink() ?>" class="item-block item-block-news">
        <div class="block-news-photo">
          <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('top-image',array( 'alt' => $title, 'title' => $title));
            }else{
                echo '<img src="'.bloginfo('template_directory').'/images/pending260x170.png" alt="'. $title .'">';
            }
            ?>
        </div>
        <div class="block-news-content">
          <div class="block-news-header">
            <p class="date"><?php the_time('Y.m.d') ?></p>
            <h3 class="title title-news-name"><?php the_title() ?></h3>
          </div>
          <div class="block-news-text">
            <?php echo mb_substr(get_the_excerpt(), 0, 60).'...'; ?>
          </div>
          <div class="block-news-footer"><span class="text-primary">もっと見る</span></div>
        </div>
      </a>
      <?php endwhile; ?>
      <!-- /ループ:ニュースリスト-->
    </div>
  </div>
</div>
<?php get_footer(); ?>
