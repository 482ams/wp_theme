<?php
  class Class_wp_custom_setting{
    function __construct(){

      /* カスタム投稿の月別アーカイブを可能にする */
      // add_filter( 'getarchives_where', array( $this, 'my_getarchives_where' ), 10, 2 );
      // add_filter( 'get_archives_link', array( $this, 'my_get_archives_link' ) );

      /* サムネイル画像サイズ追加 */
      add_action( 'after_setup_theme', array( $this, 'add_thumbnail_size' ) );
    }

    /* カスタム投稿の月別アーカイブ */
    function my_getarchives_where( $where, $r ) {
        global $my_archives_post_type;
        if ( isset($r['post_type']) ) {
            $my_archives_post_type = $r['post_type'];
            $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
        } else {
            $my_archives_post_type = '';
        }
        return $where;
    }

    /* カスタム投稿の月別アーカイブ */
    function my_get_archives_link( $link_html ) {
        global $my_archives_post_type;
        $add_link = '';
        if ( '' != $my_archives_post_type ){
            $add_link = '?post_type=' . $my_archives_post_type;
        }
        $link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link." '",$link_html);

        return $link_html;
    }

    /* サムネイル画像サイズ追加 */
    function add_thumbnail_size() {
        /* post-thumbnailsのテーマがサポートされている必要がある */
        // add_theme_support( 'post-thumbnails' );

        // TODO どのようにトリミングされるかテスト必要
        // /* トリミングしない場合 */
        // add_image_size( 'list-thumbnail', 320, 240, false );
        // /* トリミングする場合 */
        // add_image_size( 'list-thumbnail', 320, 240, true );
        // /* 中心以外でトリミングする場合 */
        // add_image_size( 'list-thumbnail', 320, 240, array( 'left', 'top' ) );

    }

  }

?>
