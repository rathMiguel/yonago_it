<?php get_header(); ?>

<div class="wrapper">
  <div class="block-header">
    <h2 class="title title-block-header title-margin">掲載店舗一覧</h2>
  </div>
  <div class="block-filter-header">
    <h4 class="title title-small">フィルターで絞り込み：</h4>
  </div>
  <div class="block-filter">
    <ul class="list-filter">
      <li><button class="button button-rounded button-primary" data-filter="all">全て</button></li>
      <?php $terms = get_terms('genre'); ?>
      <?php foreach ($terms as $val): ?>
      <li><button class="button button-rounded button-primary" data-filter=".cat-<?php echo $val->slug ?>"><?php echo $val->name ?></button></li>
      <?php endforeach ?>
    </ul>
  </div>
  <div class="area-shoplist-main">
    <div class="block-shop-list js-shoplist">
      <!-- ループ:店舗リスト-->
      <?php
        $args = array(
          'post_type' => 'shop',
          'posts_per_page' => -1,
          'orderby' => 'rand'
          );
          $the_query = new WP_Query( $args );
          if($the_query->have_posts()):
      ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php 
        $title = get_the_title();
        $link = get_the_permalink();
        $date = get_the_date();

        $terms = get_the_terms( $post->ID, 'genre');
        $term_id = $terms[0]->term_id;
        $term_idsp = "genre_" . $term_id;
        $color = get_field('area-color', $term_idsp);
       ?>
      <a class="item-block item-block-shop mix cat-<?php echo $terms[0]->slug ?>" href="<?php echo $link ?>">
        <div class="block-shop-photo">
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('top-image',array( 'alt' => $title, 'title' => $title));
            }else{
                echo '<img src="'.bloginfo('template_directory').'/images/pending260x170.png" alt="'. $title .'">';
            }
            ?>

          <?php

          if ($terms[0]) echo '<span class="block-shop-cat cat-'.$terms[0]->slug.'" style="background-color: '.$color.'">'.$terms[0]->name.'</span>';
          ?>
        </div>
        <div class="block-shop-content">
          <ul class="list-shop-tags">
            <?php if ($terms_tag): ?>
              <?php foreach ($terms_tag as $val): ?>
                <li><span class="fa fa-tag"></span><?php echo $val->name ?></li>
              <?php endforeach ?>
            <?php endif ?>
          </ul>
          <h3 class="title title-shop-name"><?php echo $title ?></h3>
          <?php 
          $terms_tag = get_the_terms( $post->ID, 'shop-tag');
           ?>
          <div class="block-shop-footer"><span class="text-primary">詳しく見る</span></div>
        </div>
      </a>
      <?php endwhile; endif; ?>
      <!-- /ループ:店舗リスト-->
    </div>
  </div>
</div>

<?php get_footer(); ?>
