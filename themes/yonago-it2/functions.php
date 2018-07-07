<?php 

// titleの生成
function my_setup_theme() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_setup_theme' );

// アイキャッチ画像の有効化
add_theme_support('post-thumbnails');

//サムネイルサイズ
add_image_size( 'medium-image', 600, 400, true );
add_image_size( 'main-image', 935, 935 );
add_image_size( 'top-image', 260, 170, true );
add_image_size( 'banner-image', 800, 300, true );

// CSS/JSの追加
add_action('wp_enqueue_scripts','add_addJs');
function add_addJs() {
    wp_enqueue_script( 'googlemap', '//maps.google.com/maps/api/js?key=AIzaSyDswlGJQRHEKcglQh8jEzD0k2kf0mCtzc0' );
    wp_enqueue_script( 'vendor-script', get_template_directory_uri().'/js/vendor.js', array( 'jquery' ));
    wp_enqueue_script( 'basic-script', get_template_directory_uri().'/js/script.js', array( 'jquery' ));
}

add_action('wp_enqueue_scripts', 'add_css' );
function add_css(){
  wp_enqueue_style( 'vendor-style', get_template_directory_uri().'/css/vendor.css', array());
  wp_enqueue_style( 'basic-style', get_template_directory_uri().'/css/style.css', array());
}

function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyDswlGJQRHEKcglQh8jEzD0k2kf0mCtzc0';
  return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


//抜粋の文字数を制御
function custom_excerpt_length( $length ) {
     return 100; 
} 
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// カスタム投稿タイプ：店舗一覧の追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'shop',
    array(
      'supports' => array('title','editor','tag','thumbnail','excerpt'),
      'labels' => array(
        'name' => __( '掲載店舗一覧' ),
        'singular_name' => __( '掲載店舗一覧' ),
      ),
      'has_archive' => true,
      'public' => true,
      'menu_position' =>5
    )
  );

  register_post_type( 'feature',
    array(
      'supports' => array('title','editor','tag','thumbnail','excerpt'),
      'labels' => array(
        'name' => __( 'スペシャル特集' ),
        'singular_name' => __( 'スペシャル特集' ),
      ),
      'has_archive' => true,
      'public' => true,
      'menu_position' =>5
    )
  );
}

//カスタムタクソノミー、カテゴリタイプ
register_taxonomy(
  'genre',
  'shop', 
  array(
    'label' => 'カテゴリ',
    'hierarchical' => true,
    'public' => true,
    'query_var' => true,
    'show_ui' => true,
    'rewrite' => array( 'slug' => 'shop/genre' ),
  )
);



//カスタムタクソノミー、タグタイプ
register_taxonomy(
  'shop-tag', 
  'shop', 
  array(
    'hierarchical' => false, 
    'update_count_callback' => '_update_post_term_count',
    'label' => '店舗のキーワード',
    'singular_label' => '店舗のキーワード',
    'public' => true,
    'show_ui' => true,
    'rewrite' => array( 'slug' => 'shop/shop-tag' ),
  )
);

function acf_table($field){
  $field_obj = get_field_object($field);

  $field_name = $field_obj['label'];
  $field_content = $field_obj['value'];

  if ($field_content) {
    echo "<tr>";
    echo "<th>".$field_name.'</th>';
    echo "<td>".$field_content.'</td>';
    echo "</tr>";
  }
}

// カスタムヘッダー
// add_theme_support(
//   'custom-header',
//   array(
//     'width' => 1920,
//     'height' => 800,
//     'header-text' => false,
//     'default-image' => get_template_directory_uri() . '/images/img_main.jpg'
//   )
// );

// カスタムメニューを有効化
add_theme_support('menus');

register_nav_menu('footernav1', 'フッターナビゲーション1');
register_nav_menu('footernav2', 'フッターナビゲーション2');
register_nav_menu('globalnav', 'グローバルナビゲーション');