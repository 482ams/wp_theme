<?php
class Class_front_setting{
  function __construct(){
    /* アーカイブタイトル修正（アーカイブの「アーカイブ:」の削除） */
    // add_filter( 'get_the_archive_title', array( $this, 'change_archive_title' ) );

    /* 抜粋文字数調整 */
    // add_filter('excerpt_mblength', array( $this, 'change_excerpt_mblength' ) );

    /* 抜粋オーバー時の文字修正 */
    // add_filter('excerpt_more', array( $this, 'my_excerpt_more' ) );

  }

  /* アーカイブタイトル修正（アーカイブの「アーカイブ:」の削除など） */
  public function change_archive_title( $title ){
      if( is_archive() ){
          $title = ltrim($title, 'アーカイブ:');
          if( is_category() || is_tag() ){
              $title = single_cat_title( '', false );
          }
      }
      return $title;
  }

  /* 抜粋文字数調整 */
  public function change_excerpt_mblength( $length ) {
      return 55;
  }

  /* 抜粋オーバー時の文字修正 */
  public function my_excerpt_more( $more ) {
    return '…';
  }
}

?>
