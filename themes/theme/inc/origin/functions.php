<?php

class Origin_Theme_setting{
  function __construct() {

    /* ============================================================================
    *  必須設定（コメントアウトしないこと）
    ============================================================================ */
    require get_template_directory() . '/inc/origin/class-necessary_setting.php';
    new Class_necessary_setting();



    /* ============================================================================
     * style、script読み込み（コメントアウトしないこと）
     ============================================================================ */
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_styles_scripts' ) );



    /* ============================================================================
    *  Wordpressの追加基本設定
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-wp_custom_setting.php';
    // new Class_wp_custom_setting();



    /* ============================================================================
    *  投稿タイプ・タクソノミーの追加・削除など TODO プラグイン化検討が必要
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-post_setting.php';
    // new Class_post_setting();



    /* ============================================================================
    *  投稿保存時の処理（サムネイルのデフォルト設定など）
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-post_save_setting.php';
    // new Class_post_save_setting();



    /* ============================================================================
    *  タクソノミーに関する設定（単一設定、良く使うタクソノミーの非表示、ソート禁止など） TODO プラグイン化検討が必要
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-post_taxonomy_setting.php';
    // new Class_post_taxonomy_setting();



    /* ============================================================================
    *  管理画面 投稿一覧の設定
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-admin_post_list_setting.php';
    // new Class_admin_post_list_setting();



    /* ============================================================================
    *  ウィジェットエリアの追加・削除
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-widgets_area_setting.php';
    // new Class_widgets_area_setting();



    /* ============================================================================
    *  管理画面の表示設定（納品向けの権限毎の管理画面カスタマイズなど）
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-admin_page_setting.php';
    // new Class_admin_page_setting();



    /* ============================================================================
    *  検索処理のカスタマイズ
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-search_setting.php';
    // new Class_search_setting();



    /* ============================================================================
    *  フロントエンド表示設定
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-front_setting.php';
    // new Class_front_setting();



    /* ============================================================================
    *  ログイン画面カスタマイズ
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/class-loginpage_setting.php';
    // new Class_loginpage_setting();



    /* ============================================================================
    *  プラグイン依存の設定
    ============================================================================ */

    /* -------- framingo設定 -------- */
    // require get_template_directory() . '/inc/origin/class-plugin_setting__flamingo.php';
    // new Class_plugin_setting__flamingo();


    /* -------- Contact Form 7設定 -------- */
    // require get_template_directory() . '/inc/origin/class-plugin_setting__contact_form_7.php';
    // new Class_plugin_setting__contact_form_7();


    /* -------- Smart Custom Fields設定 -------- */
    // require get_template_directory() . '/inc/origin/class-plugin_setting__smart_customf_ields.php';
    // new Class_plugin_setting__smart_customf_ields();



    /* ============================================================================
    *  ウィジェットの追加
    ============================================================================ */
    // require get_template_directory() . '/inc/origin/widget/class-wp-widget-recent-posts-add-option.php';
    // add_action( 'widgets_init', array( $this, 'add_widget' ) );

  }



  /* ======== style、script読み込み ======== */
  public function theme_styles_scripts() {


    /* -------- jquery -------- */
    wp_enqueue_script( 'jquery' );


    /* -------- add.cssの読み込み（スタイル追記用css） -------- */
    wp_enqueue_style( 'theme-main-style', get_template_directory_uri(). '/css/theme-style.css', 'theme-style' );
    wp_enqueue_style( 'add-theme-style', get_template_directory_uri(). '/css/add.css', array('theme-style','theme-main-style') );


    /* <img srcset > 未対応ブラウザのポリフィル */
    wp_enqueue_script( 'picturefill', get_template_directory_uri() .'/plugins/picturefill.js', '', true );


    /* -------- google font読み込み(open_sans) -------- */
    // wp_enqueue_style( 'open_sans_bold', 'https://fonts.googleapis.com/css?family=Open+Sans:700', 'theme-style' );


    /* -------- fontawsome -------- */
    // wp_enqueue_style( 'fontawsome', 'href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', 'theme-style' );


    /* -------- コンテンツが表示領域に入った場合のアニメーション -------- */
    // wp_enqueue_script( 'jquery_inview_script', get_template_directory_uri() .'/plugins/jquery.inview.min.js', array( 'jquery' ), '', true );
    // wp_enqueue_style( 'animate_style', get_template_directory_uri() .'/plugins/animate.css' );


    /* -------- swiper（スライダー） -------- */
    wp_enqueue_style( 'swiper_style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css' );
    wp_enqueue_script( 'swiper_script', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js', array(), '', true );


    /* -------- masonryの読み込み（タイル表示）  -------- */
    // wp_enqueue_script( 'masonry_script', get_template_directory_uri() .'/plugins/masonry.pkgd.min.js', array( 'jquery' ), '', true );


    /* -------- colorboxの読み込み（モーダルウインドウ）--------  */
    // wp_enqueue_style( 'colorbox_style', get_template_directory_uri() .'/plugins/colorbox-master/example2/colorbox.css' );
    // wp_enqueue_script( 'colorbox_script', get_template_directory_uri() .'/plugins/colorbox-master/jquery.colorbox-min.js', array( 'jquery' ), '', true );


    /* -------- 共通js（機能） -------- */
    wp_enqueue_script( 'theme-component-script', get_template_directory_uri() . '/js/origin/component.js', array( 'jquery' ), '', true );

    /* -------- 共通js（設定） -------- */
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/origin/script.js', array( 'jquery','swiper_script' ), '', true );


    /* -------- Google Map（api使用時） -------- */
  	// if( is_page( 'company' ) ){
    //   $google_api_key = "[api_key]"; //apiキーを入力
  	// 	wp_enqueue_script( 'google-map-api', 'https://maps.google.com/maps/api/js?key=' . $google_api_key ,array( 'jquery' ),'' , true );
  	// 	wp_enqueue_script( 'map-script', get_template_directory_uri() . '/js/origin/map.js', array(), '' , true );
  	// }

  }

  /* ======== ウィジェットの追加 ======== */
  // public function add_widget(){
  //   register_widget( 'WP_Widget_Recent_Posts_Add_Option' );
  // }

}

$origin_thme_setting = new Origin_Theme_setting();

?>
