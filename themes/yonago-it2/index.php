<?php get_header(); ?>
<div class="block-common block-top block-slider">
  <ul class="js-slider-top slider-top">
    <li><a href="/news/"><img src="https://it-magazine.info/wp-content/uploads/2018/07/staff_banner-1.jpg" alt=""></a></li>
    <li><a href="https://it-magazine.info/news/vol7it_open/"><img src="https://it-magazine.info/wp-content/uploads/2018/07/cover_banner.jpg" alt=""></a></li>
    <li><a href="https://it-magazine.info/2018daisen1300/" target="_blank"><img src="https://it-magazine.info/wp-content/uploads/2018/07/daisen_banner.jpg" alt=""></a></li>
  </ul>
</div>
<div class="block-common block-top">
  <div class="wrapper">
    <div class="rows">
      <div class="cols col-12">
        <div class="block-header">
          <h2 class="title title-block-header">スペシャル特集</h2>
          <span class="title-block-header-sub">SPECIAL FEATURE</span>
        </div>
      </div>
    </div>
    <div class="rows">
      <div class="cols col-12 text-center">
        <p class="caption-block-top">イット編集部が厳選したとっておきのイベントを特集しました</p>
      </div>
    </div>
    <div class="rows">
      <div class="cols col-12 pdx-0-sm">
        <div class="block-feature-list">
          <!-- ループ:スペシャル特集-->
          <?php
            $args = array(
              'post_type' => 'feature',
              );
              $the_query = new WP_Query( $args );
              if($the_query->have_posts()):
          ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php 
            $title = get_the_title();
            $link = get_the_permalink();
            $date = get_the_date();
           ?>
          <a class="item-block item-block-feature" href="<?php echo $link ?>">
            <div class="block-feature-photo">
              <?php 
              if (has_post_thumbnail()) {
                  the_post_thumbnail('banner-image',array( 'alt' => $title, 'title' => $title));
              }else{
                  echo '<img src="'.get_template_directory_uri().'/images/common/pending800x300.png" alt="'. $title .'">';
              }
              ?>
            </div>
          </a>
          <?php endwhile; endif; ?>
          <!-- /ループ:スペシャル特集-->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="block-common block-top">
  <div class="wrapper">
    <div class="rows">
      <div class="cols col-12">
        <div class="block-header">
          <h2 class="title title-block-header">掲載店舗情報</h2><span class="title-block-header-sub">STORES</span>
        </div>
      </div>
    </div>
    <div class="rows">
      <div class="cols col-12 text-center">
        <p class="caption-block-top">旬なお店をピックアップ！</p>
      </div>
    </div>
  </div>
  <div class="area-shoplist-main">
    <div class="block-shop-list">
      <!-- ループ:店舗リスト-->
      <?php
        $args = array(
          'post_type' => 'shop',
          'posts_per_page' => 6,
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
       ?>
      <a class="item-block item-block-shop" href="<?php echo $link ?>">
        <div class="block-shop-photo">
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('top-image',array( 'alt' => $title, 'title' => $title));
            }else{
                echo '<img src="'.get_template_directory_uri().'/images/common/pending260x170.png" alt="'.$title.'">';
            }
            ?>

          <?php
          $terms = get_the_terms( $post->ID, 'genre');
          $term_id = $terms[0]->term_id;
          $term_idsp = "genre_" . $term_id;
          $color = get_field('area-color', $term_idsp);

          if ($terms[0]) echo '<span class="block-shop-cat cat-'.$terms[0]->slug.'" style="background-color: '.$color.'">'.$terms[0]->name.'</span>';
          ?>
        </div>
        <div class="block-shop-content">
          <h3 class="title title-shop-name"><?php echo $title ?></h3>
          <ul class="list-shop-tags">
            <?php $terms_tag = get_the_terms( $post->ID, 'shop-tag'); ?>
            <?php if ($terms_tag): ?>
              <?php foreach ($terms_tag as $val): ?>
                <li><span class="fa fa-tag"></span><?php echo $val->name ?></li>
              <?php endforeach ?>
            <?php endif ?>
          </ul>
          <div class="block-shop-footer"><span class="text-primary">詳しく見る</span></div>
        </div>
      </a>
      <?php endwhile; endif; ?>
      <!-- /ループ:店舗リスト-->
    </div>
    <div class="block-footer"><a class="button button-rounded button-medium button-primary" href="/shop/">もっと見る</a></div>
  </div>
</div>
<div class="block-common block-top">
  <div class="wrapper">
    <div class="rows">
      <div class="cols col-12">
        <div class="block-header">
          <h2 class="title title-block-header">新着情報</h2><span class="title-block-header-sub">NEWS</span>
        </div>
      </div>
    </div>
  </div>
  <div class="wrap-news">
    <div class="block-news">
      <div class="block-divider">
        <div class="block-news-header">
          <h3 class="title title-secondary">NEWS &amp; BLOG</h3>
        </div>
        <div class="block-news-list js-height">
          <!-- ループ:ニュース-->
          <?php if ( have_posts()): ?>
          <?php while( have_posts()): the_post(); ?>
          <a class="item-block item-block-news" href="<?php the_permalink() ?>">
            <div class="block-news-photo">
              <?php 
              if (has_post_thumbnail()) {
                  the_post_thumbnail('thumbnail',array( 'alt' => $title, 'title' => $title));
              }else{
                  echo '<img src="'.get_template_directory_uri().'/images/common/pending150x150.png" alt="'. $title .'">';
              }
              ?>
            </div>
            <div class="block-news-content">
              <div class="block-news-meta"><span class="text-date"><?php the_time('Y.m.d') ?></span>
                <h3 class="title title-news"><?php the_title() ?></h3>
                <p class="news-excerpt"><?php echo mb_substr(get_the_excerpt(), 0, 60); ?></p>
              </div>
              <div class="block-news-footer"><span class="link link-primary">続きを読む</span></div>
            </div>
          </a>
          <?php endwhile; endif; ?>

          <!-- /ループ:ニュース-->
        </div>
        <div class="block-news-footer"><a class="button button-rounded button-medium button-primary" href="/news/">もっと見る</a></div>
      </div>
    </div>
    <div class="block-facebook">
      <div class="block-divider">
        <div class="block-facebook-header">
          <h3 class="title title-secondary">FACEBOOK</h3>
        </div>
        <div class="block-facebook-main js-height">
          <p class="color-gray">旬な情報を定期的に発信中！</p>
          <div class="text-center">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffp.It.YCF%2F&amp;tabs=timeline&amp;width=500&amp;height=500&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=362851420751625" width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
        <div class="block-facebook-footer"><a class="button button-rounded button-medium button-fblue" href="https://www.facebook.com/fp.It.YCF/" target="_blank"><span class="fab fa-facebook"></span>FACEBOOKページへ</a></div>
      </div>
    </div>
  </div>
</div>
<div class="block-common block-top">
  <div class="wrapper">
    <div class="rows">
      <div class="cols col-12">
        <div class="block-header">
          <h2 class="title title-block-header">フォトギャラリー</h2>
          <span class="title-block-header-sub">PHOTO GALLERY</span>
        </div>
      </div>
    </div>
    <div class="rows">
      <div class="cols col-12">
        <div class="block-gallery">
          <ul class="list-gallery" id="instafeed">
          </ul>
        </div>
      </div>
    </div>
    <div class="block-footer"><a class="button button-rounded button-medium button-igpurple" href="https://www.instagram.com/yonagofactory" target="_blank"><span class="fab fa-instagram"></span>もっと見る（Instagramページへ）</a></div>
  </div>
</div>
<?php get_footer(); ?>
