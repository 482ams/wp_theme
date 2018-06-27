<?php
require get_template_directory() . '/inc/origin/class-wp_custom_setting.php';
require get_template_directory() . '/inc/origin/class-post_setting.php';
require get_template_directory() . '/inc/origin/class-post_save_setting.php';
require get_template_directory() . '/inc/origin/class-post_taxonomy_setting.php';
require get_template_directory() . '/inc/origin/class-admin_post_list_setting.php';
require get_template_directory() . '/inc/origin/class-widgets_area_setting.php';
require get_template_directory() . '/inc/origin/class-admin_page_setting.php';
require get_template_directory() . '/inc/origin/class-search_setting.php';
require get_template_directory() . '/inc/origin/class-front_setting.php';
require get_template_directory() . '/inc/origin/class-loginpage_setting.php';
require get_template_directory() . '/inc/origin/class-plugin_setting.php';
require get_template_directory() . '/inc/origin/widget/class-wp-widget-recent-posts-add-option.php';

class Theme_setting{

  function __construct() {
    /* style、script読み込み */
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_scripts' ) );

    /* Wordpressの追加基本設定 */
    // new Class_wp_custom_setting();

    /* 投稿タイプの追加・削除など */
    // new Class_post_setting();

    /* 投稿保存時の処理（サムネイルのデフォルト設定など） */
    // new Class_post_save_setting();

    /* タクソノミーに関する設定（単一設定、良く使うタクソノミーの非表示、ソート禁止など） */
    // new Class_post_taxonomy_setting();

    /* 管理画面 投稿一覧の設定 */
    // new Class_admin_post_list_setting();

    /* ウィジェットエリアの追加・削除 */
    // new Class_widgets_area_setting();

    /* 管理画面の表示設定（納品向けの権限毎の管理画面カスタマイズなど） */
    // new Class_admin_page_setting();

    /* 検索処理のカスタマイズ */
    // new Class_search_setting();

    /* フロントエンド表示設定（不要なタグの除去など） */
    // new Class_front_setting();

    /* ログイン画面カスタマイズ */
    // new Class_loginpage_setting();

    /* プラグイン依存の設定 */
    // new Class_plugin_setting();

    /* ウィジェットの追加 */
    // add_action( 'widgets_init', array( $this, 'add_widget' ) );

  }

  /* style、script読み込み */
  public function theme_scripts() {
    wp_enqueue_style( 'add-theme-style', get_template_directory_uri(). '/add.css', 'theme-style' );
    // wp_enqueue_style( 'fontawsome', 'href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', 'theme-style' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/origin/script.js', array( 'jquery' ), '', true );

    // /* googlemap表示(google map api使用の場合) */
  	// if( is_page( 'company' ) ){
    //   $google_api_key = "[api_key]";
  	// 	wp_enqueue_script( 'google-map-api', 'https://maps.google.com/maps/api/js?key=' . $google_api_key ,array( 'jquery' ),'' , true );
  	// 	wp_enqueue_script( 'map-script', get_template_directory_uri() . '/js/origin/map.js', array(), '' , true );
  	// }

  }

  /* ウィジェットの追加 */
  public function add_widget(){
    register_widget( 'WP_Widget_Recent_Posts_Add_Option' );
  }

}

$thme_setting = new Theme_setting();

?>
