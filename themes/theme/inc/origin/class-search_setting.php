<?php
  class Class_search_setting{

    function __construct(){
      add_action('pre_get_posts', array( $this, 'search_setting' ) );
    }

    // function search_setting( $query ) {
    //   if ( is_admin() || ! $query->is_main_query() || ! $query->is_search() ){
    //     return;
    //   }
    //
    //   /* カスタムフィールドの検索 */
    //   $new_meta_query = array();
    //
    //   if( !empty( $_GET['param_1'] ) ){
    //     $param_1 = $_GET['param_1']; /* TODO サニタイズ処理実施 */
    //     array_push(
    //         $new_meta_query,
    //         array(
    //             'key'     => 'カスタムフィールド名', //カスタムフィールド名
    //             'value'   => $param_1, //カスタムフィールドの値
    //             "compare" => '=', //比較方法
    //             'type'    => 'NUMERIC' //データタイプ
    //         )
    //     );
    //   }
    //
    //   if( !empty( $new_meta_query ) ){
    //     $query->set( 'meta_query', $new_meta_query );
    //   }
    //
    //
    //   /* 特定の投稿のみを出力する */
    //   if( !empty( $_GET['param_2'] ) ){
    //     /* $_GET['param_2']が投稿のチェックボックスなどの想定 */
    //     $query->set( 'post__in', $_GET['param_2'] );
    //   }
    //
    // }
  }

?>
