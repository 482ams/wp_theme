<?php
  class Class_post_setting{

    function __construct() {

      /* ============================================================================
      *  デフォルトの投稿削除（「投稿」の名称を変更する等の場合）
      ============================================================================ */
      // add_action('admin_menu', array( $this, 'delete_def_post' ) );



      /* ============================================================================
      *  投稿設定（デフォルトの投稿の再設定やカスタム投稿の追加など）
      ============================================================================ */
      // add_action('init', array( $this, 'post_settings' ), 1);

    }



    /* ======== デフォルトの投稿削除 ======== */
    public function delete_def_post(){ remove_menu_page('edit.php'); }

    /* ======== 投稿の設定 ======== */
    public function post_settings(){

      /* -------- 投稿の設定 -------- */
      $this->register_post();

      /* -------- タクソノミーの設定（タクソノミーの追加など） -------- */
      $this->setting_taxonomy();

      /* -------- 一覧取得時のクエリの調整（一覧取得数の変更など） -------- */
      $this->custom_pre_get_posts();
    }


    /* ======== 投稿の設定 ======== */
    private function register_post(){

        /* -------- postの再定義（お知らせとして再定義） -------- */
        register_post_type('post', array(
            'labels' => array(
                'name'          => 'お知らせ',
                'singular_name' => 'お知らせ'
            ),
            'menu_position'   => 5,
            'public'          => true,
            'capability_type' => 'post',
            'has_archive'     => true,
            'hierarchical'    => false,
            'rewrite'         => array( 'slug' => 'info', 'with_front' => false ),
        ));

        /* -------- カスタム投稿定義（業務実績） -------- */
        register_post_type('works', array(
            'labels' => array(
                'name'          => '業務実績',
                'singular_name' => '業務実績'
            ),
            'menu_position'   => 5,
            'public'          => true,
            'capability_type' => 'post',
            'has_archive'     => true,
            'hierarchical'    => false,
            'rewrite'         => array( 'slug' => 'works', 'with_front' => false ),
            'menu_icon'       =>'dashicons-heart',/* アイコン */
            'supports' => array(
                'title',/* タイトル */
                'editor',/* エディタ */
                'thumbnail',/* アイキャッチ */
                'excerpt',/* 抜粋 */
                'trackbacks',/* トラックバック */
                'custom-fields',/* カスタムフィールド */
                'comments',/* ディスカッション */
                'author', /* 投稿者(設定しないと投稿者を変更できない) */
                'revisions',/* リビジョン */
                // 'page-attributes', /* 属性(順序) */
                // 'post-formats'/* ポストフォーマット */
             ),
        ));

    }



    /* ======== タクソノミーの設定（タクソノミーの追加など） ======== */
    private function setting_taxonomy(){

        /* -------- デフォルト投稿の "タグ" の削除 -------- */
        unregister_taxonomy_for_object_type( 'post_tag', 'post' );

        /* -------- "カテゴリー" の再定義（URLの変更） -------- */
        register_taxonomy(
            'category',
            'post',
            array(
                'hierarchical' => true,
                'rewrite' => array( 'slug' => 'info/category', ),
            )
        );

        /* -------- タクソノミー キーワードの定義（業務実績に地域を追加） -------- */
        register_taxonomy(
            'area',
            null,
            array(
              'labels' => array(
                  'name'          => '地域',
                  'singular_name' => '地域'
              ),
                'hierarchical' => true,
                'rewrite' => array( 'slug' => 'works/area', ),
            )
        );
        register_taxonomy_for_object_type( 'area', 'works' );
    }



    /* ======== 一覧取得時のクエリの調整（一覧取得数の変更など） ======== */
    private function custom_pre_get_posts(){
      if ( is_admin() || ! $query->is_main_query() ){
        return;
      }

      if ( $query->is_archive() ) {
        if($query->query['post_type'] == 'works'){
              $query->set( 'posts_per_page', 9 );
        }
      }

    }

  }
?>
