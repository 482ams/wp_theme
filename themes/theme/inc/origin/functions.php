<?php
class Theme_setting{

  private $var = 'hoge';

  function __construct() {

    /* style、script読み込み */
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_scripts' ) );

  }

  /* style、script読み込み */
  public function theme_scripts() {
    wp_enqueue_style( 'add-theme-style', get_template_directory_uri(). '/add.css', 'theme-style' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'theme-style', get_template_directory_uri() . '/js/origin/script.js', array( 'jquery' ), '', true );
  }
}

$thme_setting = new Theme_setting();

?>
