<?php
require get_template_directory() . '/inc/origin/class-wp_custom_setting.php';
require get_template_directory() . '/inc/origin/class-post_setting.php';
require get_template_directory() . '/inc/origin/class-post_save_setting.php';
require get_template_directory() . '/inc/origin/class-admin_post_list_setting.php';
require get_template_directory() . '/inc/origin/class-post_taxonomy_setting.php';
require get_template_directory() . '/inc/origin/class-admin_page_setting.php';
require get_template_directory() . '/inc/origin/class-front_setting.php';
require get_template_directory() . '/inc/origin/class-plugin_setting.php';
require get_template_directory() . '/inc/origin/widget/class-wp-widget-recent-posts-add-option.php';


class Theme_setting{

  function __construct() {
    /* style、script読み込み */
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_scripts' ) );

    /* Wordpressの追加基本設定 */
    new Class_wp_custom_setting();

    /* 投稿の設定 */
    new Class_post_setting();

    /* 投稿保存時の処理 */
    new Class_post_save_setting();

    /* 管理画面 投稿一覧の設定 */
    new Class_admin_post_list_setting();

    /* タクソノミーに関する設定（単一設定、良く使うタクソノミーの非表示、ソート禁止など） */
    new Class_post_taxonomy_setting();

    /* 管理画面の表示設定（納品向けの権限毎の管理画面カスタマイズなど） */
    new Class_admin_page_setting();

    /* フロントエンド表示設定（不要なタグの除去など） */
    new Class_front_setting();

    /* プラグイン依存の設定 */
    new Class_plugin_setting();

    /* ウィジェットの追加 */
    add_action( 'widgets_init', array( $this, 'add_widget' ) );

  }

  /* style、script読み込み */
  public function theme_scripts() {
    wp_enqueue_style( 'add-theme-style', get_template_directory_uri(). '/add.css', 'theme-style' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'theme-style', get_template_directory_uri() . '/js/origin/script.js', array( 'jquery' ), '', true );
  }

  /* ウィジェットの追加 */
  public function add_widget(){
    register_widget( 'WP_Widget_Recent_Posts_Add_Option' );
  }

}

$thme_setting = new Theme_setting();

?>
