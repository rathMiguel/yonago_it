 <?php
/*
  Template Name: ニュースの一覧
*/
?>
<?php get_header(); ?>
<div class="wrapper">
  <div class="wrapper-news">
    <div class="block-header">
      <h2 class="title title-block-header title-margin">NEWS & BLOG</h2>
    </div>
    <div class="block-news-list">
      <!-- ループ:ニュースリスト-->
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
          );
          $the_query = new WP_Query( $args );
          if($the_query->have_posts()):
      ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <a href="<?php the_permalink() ?>" class="item-block item-block-news">
        <div class="block-news-photo">
          <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('top-image',array( 'alt' => $title, 'title' => $title));
            }else{
                echo '<img src="'.get_template_directory_uri().'/images/common/pending260x170.png" alt="'. $title .'">';
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
      <?php endwhile; endif; ?>
      <!-- /ループ:ニュースリスト-->
    </div>
  </div>
</div>
<?php get_footer(); ?>
