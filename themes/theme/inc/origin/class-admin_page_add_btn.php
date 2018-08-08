<?php
  class Class_admin_page_add_btn{

    function __construct(){
      /* ============================================================================
      *  row_actionsへのボタン追加
      ============================================================================ */
      /* -------- 固定ページ一覧 row_actionsにボタン追加 -------- */
      add_filter('page_row_actions', array( $this, 'page_row_actions' ), 10, 2);


      /* -------- 投稿一覧 row_actionsにボタン追加 -------- */
      add_filter('post_row_actions', array( $this, 'post_row_actions' ), 10, 2);


      /* -------- ユーザ一覧のrow_actionsにボタン追加 -------- */
      add_filter('user_row_actions', array( $this, 'user_row_actions' ), 10, 2);


      /* ============================================================================
      *  tablenavへのボタン追加
      ============================================================================ */
      /* -------- 投稿一覧、固定ページ一覧 tablenavにボタン追加 -------- */
      add_filter('manage_posts_extra_tablenav', array( $this, 'manage_posts_extra_tablenav'), 10, 1);


      /* -------- ユーザ一覧 tablenavにボタン追加 -------- */
      add_filter('manage_users_extra_tablenav', array( $this, 'manage_users_extra_tablenav'), 10, 1);



    }



    /* ======== 固定ページ一覧 row_actionsにボタン追加 ======== */
    public function page_row_actions($actions, $page_object){
      $actions['link_btn'] = '<a href="" class="btn">row_actions追加ボタン</a>';
       return $actions;
    }



    /* ======== 投稿一覧 row_actionsにボタン追加 ======== */
    public function post_row_actions($actions, $page_object){
        if($page_object->post_type === 'post'){
          $actions['link_btn'] = '<a href="" class="btn">row_actions追加ボタン</a>';
        }
       return $actions;
    }



    /* ======== ユーザ一覧 row_actionsにボタン追加 ======== */
    public function user_row_actions($actions, $page_object){
      $actions['link_btn'] = '<a href="" class="btn">row_actions追加ボタン</a>';
       return $actions;
    }



    /* ======== 投稿一覧 tablenavにボタン追加 ======== */
    public function manage_posts_extra_tablenav( $which ){
      global $post_type;

      if($post_type === 'page'){
        if( $which == 'top' ){
          $text = '<div class="alignleft actions"><input type="submit" name="" id="" class="button" value="pagetablenavtop追加ボタン"></div>';
          echo $text;
        }

        if( $which == 'bottom' ){
          $text = '<div class="alignleft actions"><input type="submit" name="" id="" class="button" value="pagetablenavbottom追加ボタン"></div>';
          echo $text;
        }

      } else if( $post_type === 'post' ){
        if( $which == 'top' ){
          $text = '<div class="alignleft actions"><input type="submit" name="" id="" class="button" value="posttablenavtop追加ボタン"></div>';
          echo $text;
        }

        if( $which == 'bottom' ){
          $text = '<div class="alignleft actions"><input type="submit" name="" id="" class="button" value="posttablenavbottom追加ボタン"></div>';
          echo $text;
        }

      }

    }



    /* ======== ユーザ一覧 tablenavにボタン追加 ======== */
    public function manage_users_extra_tablenav( $which ){
      if( $which == 'top' ){
        $text = '<div class="alignleft actions"><input type="submit" name="" id="" class="button" value="tablenavtop追加ボタン"></div>';
        echo $text;
      }

      if( $which == 'bottom' ){
        $text = '<div class="alignleft actions"><input type="submit" name="" id="" class="button" value="tablenavbottom追加ボタン"></div>';
        echo $text;
      }
    }


  }
?>
