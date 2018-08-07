<?php
class Class_admin_page_setting{
  function __construct(){

    if( !current_user_can( 'administrator' ) ){

      /* ============================================================================
      *  メニューの項目調整
      ============================================================================ */
      // add_action('admin_menu', array( $this, 'custom_admin_menus' ) );



      /* ============================================================================
      *  ヘッダーメニューの項目調整
      ============================================================================ */
      // add_action( 'admin_bar_menu', array( $this, 'custom_admin_bar_menu' ), 201 );



      /* ============================================================================
      *  不要なダッシュボードウィジェット削除
      ============================================================================ */
      // add_action('wp_dashboard_setup', array( $this, 'custom_dashboard_widget') );



      /* ============================================================================
      *  ダッシュボード - アクティビティにカスタム投稿表示
      ============================================================================ */
      // add_filter( 'dashboard_recent_posts_query_args', array( $this, 'my_dashboard_recent_posts_query_args' ), 10, 1 );



      /* ============================================================================
      *  管理画面の「Wordpressのご利用ありがとうございます。」の文言削除
      ============================================================================ */
      // add_filter('admin_footer_text', '__return_empty_string');



      /* ============================================================================
      *  バージョンアップ通知の非表示
      ============================================================================ */
      // add_action( 'admin_init', array( $this, 'update_nag_hide' ) );



      /* ============================================================================
      *  管理画面下部のバージョン番号削除
      ============================================================================ */
      // add_action( 'admin_menu', array( $this, 'remove_footer_version' ) );

    }

  }

  /* ======== メニューの項目調整 ======== */
  public function custom_admin_menus(){
    // global $submenu;
    // var_dump($submenu);

    /* -------- 『投稿』の非表示 -------- */
    // remove_menu_page( 'edit.php' );

    /* -------- 『お知らせ(カスタム投稿)』の非表示 -------- */
    // remove_menu_page( 'edit.php?post_type=news' );

    /* -------- 『コメント』の非表示 -------- */
    // remove_menu_page( 'edit-comments.php' );

    /* -------- 『お問い合わせ（Contact Form 7）』の非表示 --------* /
    remove_menu_page( 'wpcf7' );

    /* -------- 『ツール』の非表示 --------*/
    // remove_menu_page( 'tools.php' );
  }


  /* ======== ヘッダメニュー表示項目設定 ======== */
  public function custom_admin_bar_menu(){
    /* -------- WordPressロゴ -------- */
    // $wp_admin_bar->remove_menu('wp-logo');

    /* -------- 参加サイト for マルチサイト -------- */
    // $wp_admin_bar->remove_menu('my-sites');

    /* -------- サイト名 -------- */
    // $wp_admin_bar->remove_menu('site-name');

    /* -------- サイト名 -> サイトを表示 -------- */
    // $wp_admin_bar->remove_menu('view-site');

    /* -------- 更新 -------- */
    // $wp_admin_bar->remove_menu('updates');

    /* -------- コメント -------- */
    // $wp_admin_bar->remove_menu('comments');

    /* -------- 新規 -------- */
    // $wp_admin_bar->remove_menu('new-content');

    /* -------- 新規 -> 投稿（投稿） -------- */
    // $wp_admin_bar->remove_menu('new-post');

    /* -------- 新規 -> 特別ページ（カスタム投稿） -------- */
    // $wp_admin_bar->remove_menu('new-distinations');

    /* -------- 新規 -> メディア -------- */
    // $wp_admin_bar->remove_menu('new-media');

    /* -------- 新規 -> リンク -------- */
    // $wp_admin_bar->remove_menu('new-link');

    /* -------- 新規 -> 固定ページ -------- */
    // $wp_admin_bar->remove_menu('new-page');

    /* -------- 新規 -> ユーザー -------- */
    // $wp_admin_bar->remove_menu('new-user');

    /* -------- マイアカウント -------- */
    // $wp_admin_bar->remove_menu('my-account');

    /* -------- マイアカウント -> プロフィール -------- */
    // $wp_admin_bar->remove_menu('user-info');

    /* -------- マイアカウント -> プロフィール編集 -------- */
    // $wp_admin_bar->remove_menu('edit-profile');

    /* -------- マイアカウント -> ログアウト -------- */
    // $wp_admin_bar->remove_menu('logout');

    /* -------- 検索 -------- */
    // $wp_admin_bar->remove_menu('search');

  }


  /* ======== 不要なダッシュボードウィジェット削除 ======== */
  public function custom_dashboard_widget(){

    /* -------- 概要 -------- */
    // remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

    /* -------- アクティビティ -------- */
    // remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

    /* -------- クイックドラフト -------- */
    // remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

    /* -------- WordPressニュース -------- */
    // remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

  }


  /*------------------
  権限での振り分け時
  ------------------*/
  // if(current_user_can('administrator')){}

  // 購読者 : Subscriber
  // 寄稿者 : Contributor
  // 投稿者 : Author
  // 編集者 : Editor
  // 管理者 : Administrator



  /* ==== 以下変更不要 ==== */

  /* ======== ダッシュボード - アクティビティにカスタム投稿表示 ======== */
  public function my_dashboard_recent_posts_query_args( $query_args ) {
    $query_args['post_type'] = array( 'post', 'page' );
    if ( $query_args['post_status'] == "publish" ){
      $query_args['posts_per_page'] = 10; return $query_args;
    }
  }

  /* ======== バージョンアップ通知の非表示 ======== */
  public function update_nag_hide(){
    remove_action( 'admin_notices', 'update_nag', 3 );
  }

  /* ======== 管理画面下部のバージョン番号削除 ======== */
  public function remove_footer_version() {
      remove_filter( 'update_footer', 'core_update_footer' );
  }

}

?>
