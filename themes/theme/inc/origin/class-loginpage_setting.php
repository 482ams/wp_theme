<?php
class Class_loginpage_setting{
  function __construct(){
    /* ログイン画面 ロゴのリンク先を変更 */
    add_filter( 'login_headerurl', array( $this, 'custom_login_logo_url' ) );

    /* ログイン画面 ロゴのtitleを変更 */
    add_filter( 'login_headertitle', array( $this, 'custom_login_logo_title' ) );

    /* ログイン画面 デザイン変更 */
    add_action( 'login_enqueue_scripts', array( $this, 'custom_login_design' ) );

    /* ログインポップアップ デザイン変更 */
    add_action('admin_print_styles', array( $this, 'custom_login_popup_design' ) );


  }

  /* ログイン画面 ロゴのリンク先を変更 */
  public function custom_login_logo_url() {
    $url = home_url();
    return $url;
  }

  /* ログイン画面 ロゴのtitleを変更 */
  public function custom_login_logo_title() {
    $login_title = get_bloginfo( 'name' );
    return $login_title;
  }

  /* ログイン画面 デザイン変更 */
  public function custom_login_design() {
    $logo_url = get_template_directory_uri() . "/img/logo.svg";
    $bg_clr = "#0066B3";
    ?>
    <style>
      /* ログイン画面の背景 */
      body.login {
        background-color: <?php echo $bg_clr; ?>;
      }
      /* ロゴ */
      body.login h1 a{
        /* background: url(<?php echo $logo_url; ?>); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        width: 100%;
        height : 120px;
      }
      /* 入力フォーム */
      body.login form{
        border-radius: 5px;
      }

      /* パスワードをお忘れですか？、○○○ へ戻る */
      .login #nav,
      .login #backtoblog {
        /* display: none; */
      }

      /* パスワードをお忘れですか？、○○○ へ戻る リンク */
      .login #backtoblog a, .login #nav a {
        color: #ff0 !important;
      }
      .login #backtoblog a:hover, .login #nav a:hover {
        color: #f00 !important;
      }

    </style>
  <?php }

  /* ログインポップアップ デザイン変更 */
  public function custom_login_popup_design() {
    $bg_clr = "#0066B3";
    $close_btn_clr = "#fff";
    ?>
    <style>
      /* ログインポップアップ上部・下部の背景色 */
      .wp-admin #wp-auth-check-wrap #wp-auth-check{
        background-color: <?php echo $bg_clr; ?>;
      }
      /* ログインポップアップ右上 × の色 */
      .wp-admin #wp-auth-check-wrap .wp-auth-check-close:before{
        color : <?php echo $close_btn_clr; ?>;
      }
    </style>
  <?php }

}











?>
