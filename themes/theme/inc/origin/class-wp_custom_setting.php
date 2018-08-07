<?php
  class Class_wp_custom_setting{
    function __construct(){



      /* ============================================================================
      *  サムネイル画像サイズ追加
      ============================================================================ */
      add_action( 'after_setup_theme', array( $this, 'add_thumbnail_size' ) );

    }


    /* ======== サムネイル画像サイズ追加 ======== */
    function add_thumbnail_size() {
        /* -------- post-thumbnailsのテーマがサポートされている必要がある -------- */
        // add_theme_support( 'post-thumbnails' );

        /* -------- トリミングしない場合 -------- */
        // add_image_size( 'list-thumbnail', 320, 240, false );

        /* -------- トリミングする場合 -------- */
        // add_image_size( 'list-thumbnail', 320, 240, true );

        /* -------- 中心以外でトリミングする場合 -------- */
        // add_image_size( 'list-thumbnail', 320, 240, array( 'left', 'top' ) );

    }

  }

?>
