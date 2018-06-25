<?php
  class Class_admin_post_list_setting{

    function __construct(){
      // /* 一覧に項目を追加 */
      // add_filter( 'manage_edit-post_columns', array( $this, 'post_list_columns' ) );
      // /* 投稿タイプの指定は manage_edit-[投稿タイプ]_columns */
      //
      // /* 項目内容の変更 */
      // add_action( 'manage_post_posts_custom_column', array( $this, 'add_post_list_column' ), 10, 2 );
      // /* 投稿タイプの指定は manage_[投稿タイプ]_posts_custom_column */

    }

    /* 一覧に項目を追加 */
    public function post_list_columns( $_columns ) {
      /* ---- 項目の追加 ---- */
    	foreach ($_columns as $key => $value) {
        if( $key === 'title' ){
          $new_columns['post_id'] = '投稿ID';
        }
        $new_columns[$key] = $value;
    	}

    	/* ---- 項目の削除 ---- */
      // unset($new_columns["comments"]); // コメント
      // unset($new_columns["title"]); //タイトル
      // unset($new_columns["author"]); //作成者
      // unset($new_columns["date"]); //日付
      return $new_columns;
    }

    /* 項目内容の変更 */
    function add_post_list_column( $column_name, $post_id ){
      if( $column_name == 'post_id' ) {
         echo $post_id ;
       }
    }

  }
?>
