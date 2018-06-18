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

//抜粋の文字数を制御
function custom_excerpt_length( $length ) {
     return 100; 
} 
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//ウィジェットエリア
register_sidebar(
  array(
    'name'=>'サイドバー',
    'before_widget'=>'<div class="panel-side">',
    'after_widget'=>'</div>',
    'before_title' => '<h3 class="title title-sidebar">',
    'after_title' => '</h3>' 
  ));

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
 
// メンバーの出力
function itMembers(){
  ob_start();
  get_template_part('members');
  return ob_get_clean();
}

add_shortcode('memberlist', 'itMembers');

// テーブル用カスタムフィールドの出力
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

// カスタムウィジェット
class MyWidgetItem extends WP_Widget {
  function MyWidgetItem() {
      parent::WP_Widget(false, $name = 'サイドバー用ブロック');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $subtitle = apply_filters( 'widget_subtitle', $instance['subtitle'] );
        $body = apply_filters( 'widget_body', $instance['body'] );
      ?>
        <div class="panel-side">
          <h3 class="title title-sidebar"><?php echo $title; ?>
            <?php if ($subtitle): ?>
            <small><?php echo $subtitle; ?></small>
            <?php endif ?>
          </h3>
          <?php echo $body; ?>
        </div>
        <?php
    }
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['subtitle'] = strip_tags($new_instance['subtitle']);
    $instance['body'] = trim($new_instance['body']);
        return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        $subtitle = esc_attr($instance['subtitle']);
        $body = esc_attr($instance['body']);
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php _e('タイトル:'); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('subtitle'); ?>">
          <?php _e('サブタイトル:'); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" />
        </p>
        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php _e('サイトに表示されるコンテンツ:'); ?>
           </label>
           <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>">
           <?php echo $body; ?>
           </textarea>
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem");'));

// カスタムヘッダー
add_theme_support(
  'custom-header',
  array(
    'width' => 1920,
    'height' => 800,
    'header-text' => false,
    'default-image' => get_template_directory_uri() . '/images/img_main.jpg'
  )
);

// カスタムメニューを有効化
add_theme_support('menus');

register_nav_menu('topnav', '上部ナビゲーション');
register_nav_menu('globalnav', 'グローバルナビゲーション');