<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <?php 
    $title = get_the_title();
   ?>
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
      <div class="block-contribution mgb-4">
        <div class="contribution-content">
          <?php the_content() ?>
        </div>
      </div>
      <div class="block-shop-infomation mgb-2">
        <h1 class="title title-block-header">店舗情報</h1>
      </div>
    </div>
  </div>
  <div class="rows">
    <div class="cols col-4 col-12-sm">
      <div class="shop-infomation-content">
        <div class="shop-infomation-photo">
          <?php 
            $subimage = get_field('subimage');
            $subimage_url = wp_get_attachment_image_src($subimage, 'medium');
           ?>
          <?php if ($subimage): ?>
            <img src="<?php echo $subimage_url[0]; ?>" alt="<?php echo $title; ?>">
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="cols col-8 col-12-sm">
      <div class="shop-infomation-text">
        <?php 
        $info_map = get_field('info_map');
         ?>
        <table class="table table-info">
          <?php if ($info_map): ?>
          <tr>
            <th>住所</th>
            <td><?php echo $info_map['address'] ?></td>
          </tr>
          <?php endif ?>
          <?php acf_table('info_worktime'); ?>
          <?php acf_table('info_shisatsu'); ?>
          <?php acf_table('info_kyushin'); ?>
          <?php acf_table('info_holiday'); ?>
          <?php if (get_field('site_url')): ?>
          <tr>
            <th>公式サイト</th>
            <td><a href="<?php echo get_field('site_url') ?>" target="_blank"><?php echo get_field('site_url') ?></a></td>
          </tr>
          <?php endif ?>
          <?php acf_table('info_pr'); ?>
        </table>
      </div>
    </div>
  </div>
  <?php if ($info_map): ?>
  <div class="rows mgy-2">
    <div class="cols col-12">
      <script>
        $(function(){
        var map;
        map = new google.maps.Map(document.getElementById('google_map'), {
        zoom: 17,
        center: new google.maps.LatLng(<?php echo $info_map['lat'] ?>, <?php echo $info_map['lng'] ?>),
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $info_map['lat'] ?>, <?php echo $info_map['lng'] ?>),
        map: map,
        title: '<?php echo $title ?>'
        });
        })
      </script>
      <div class="mapfield" id="google_map"></div>
    </div>
  </div>
  <?php endif ?>
  <?php // シェアボタンの追加予定 ?>
</div>

  <?php if (get_field('coupon_image')): ?>
  <?php
    $coupon_image = get_field('coupon_image');
    $coupon_image_url = wp_get_attachment_image_src($coupon_image, 'large');
  ?>
  <div class="area-coupon mgy-2">
    <div class="wrapper-single mgt-0">
      <div class="rows">
        <div class="cols col-12">
          <p>最後までお読みいただき、ありがとうございました。<br>お礼にクーポンをプレゼント致します。</p>
          <p>ボタンを押し、表示された画像を店舗の方にお見せください。<br>（※有効期限にご注意ください）</p>
          <a class="button button-rounded button-medium button-primary" href="<?php echo $coupon_image_url[0] ?>">クーポンはこちら</a>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>
  <?php // 前ページ/次ページボタンの追加予定 ?>
<?php endwhile; ?>
<?php get_footer(); ?>
