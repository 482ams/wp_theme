<?php
  class Class_post_save_setting{

    function __construct(){
      /* サムネイルの自動設定 */
      // add_action('save_post', array( $this, 'save_default_thumbnail') );
    }

    public function save_default_thumbnail( $_post_id ) {
    	if ( wp_is_post_revision( $_post_id ) ) { return false ; }
    	if ( !empty( get_post_meta( $_post_id, '_thumbnail_id', true ) ) ) { return false ; }

    	$update_thumb_id = false;

    	/*
      * ==== post typeの情報取得 ====
      * 投稿タイプが 'post' の投稿
      */
    	// $post_type = get_post_type( $_post_id );
      // if($post_type == 'post' ){
    	//    $update_thumb_id = '1688';
      // }

      /*
      * ---- categoryで振り分け ----
      * カテゴリーが '未分類' の投稿
      */
    	// 	$post_category = get_the_category( $_post_id );
    	// 	if($post_category[0]->name == '未分類'){
    	// 		$update_thumb_id = '57';
    	// 	}

      /*
      * ---- カスタムタクソノミーで振り分け ----
      * カスタムタクソノミー 'custom_category' が空白や特定の名前
      */
      // $custom_taxonomy_name = 'custom_category';
  		// $post_cutom_term = wp_get_post_terms( $_post_id, $custom_taxonomy_name, array( 'orderby' => 'name', 'order' => 'ASC', 'fields' => 'names') );
  		// if( !is_wp_error( $post_cutom_term ) ){
  		// 	if( $post_cutom_term[0]->name == '' ){
  		// 		$update_thumb_id = '60';
  		// 	} else if( $post_cutom_term == '花' ){
  		// 		$update_thumb_id = '61';
  		// 	}
  		// }

      /*
      * ---- カスタムフィールドで振り分け ----
      * カスタムフィールド 'custom_field' が空白や特定の内容
      */
      // $custom_field = 'custom_field';
  		// $target_custom_field = get_post_meta($_post_id, $custom_field, true);
  		// if( $target_custom_field == '' ){
  		// 	$update_thumb_id = '58';
  		// } else if( $target_custom_field == '花' ){
  		// 	$update_thumb_id = '59';
  		// }

    	/* ==== デフォルト画像を設定 ==== */
    	if( $update_thumb_id != false ){
    		update_post_meta( $_post_id, $meta_key = '_thumbnail_id', $meta_value = $update_thumb_id );
    	}

    }
  }
?>
