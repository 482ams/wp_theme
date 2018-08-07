<?php
  class Class_post_taxonomy_setting{
    function __construct(){

      /* ============================================================================
      *  タクソノミーのソート禁止
      ============================================================================ */
      // add_filter( 'wp_terms_checklist_args', array( $this, 'taxonomy_no_sort_wrap' ) , 10, 2 );



      /* ============================================================================
      *  よく使うタクソノミーの非表示
      ============================================================================ */
      // add_action( 'admin_head', array( $this, 'hide_often_use_taxonomy_wrap' ) );



      /* ============================================================================
      *  タクソノミーの単一選択
      ============================================================================ */
      // add_action( 'admin_head', array( $this, 'taxonomy_radio_select_style_wrap' ) );
      // add_action( 'admin_print_footer_scripts', array( $this, 'taxonomy_radio_select_script_wrap' ) );
    }


    /* ======== タクソノミーのソート禁止 ======== */
    public function taxonomy_no_sort_wrap( $args, $post_id ){
      $this->taxonomy_no_sort( $args, array('category') );
    }

    /* ======== よく使うタクソノミーの非表示 ======== */
    public function hide_often_use_taxonomy_wrap(){
      $this->hide_often_use_taxonomy( array('category') );
    }

    /* ======== タクソノミーの単一選択 ======== */
    public function taxonomy_radio_select_style_wrap(){
      $this->taxonomy_radio_select_style( array('category') );
    }
    public function taxonomy_radio_select_script_wrap(){
      $this->taxonomy_radio_select_script( array('category') );
    }


    /* ======== 以下は変更しない ======== */

    /* ======== タクソノミーのソート禁止 ======== */
    private function taxonomy_no_sort( $args, $target_taxonomy ){
      if(in_array( $args['taxonomy'], $target_taxonomy )){
        $args['checked_ontop'] = false;
      }
      return $args;
    }

    /* ======== よく使うタクソノミーの非表示 ======== */
    private function hide_often_use_taxonomy( $target_taxonomy ){
      global $pagenow;
      if( !is_user_logged_in() ){
          return false;
      }
      if( 'post.php' !== $pagenow && 'post-new.php' !== $pagenow  ){
          return false;
      }

      $tmp_tabs = '';
      foreach ( $target_taxonomy as $taxonomy ) {
          $tmp_tabs  = $tmp_tabs. '#'. $taxonomy. '-tabs,' ;
      }

      echo '<style type="text/css" >' . substr( $tmp_tabs, 0, -1 ) . '{ display : none; }' . '</style>';
    }

    /* ======== タクソノミーの単一選択 ======== */
    private function taxonomy_radio_select_style( $target_taxonomy ){
      if( !is_user_logged_in() ){
          return false;
      }

      $js_checkbox_selector = '';
      $js_checkbox_before_selector = '';

      foreach ($target_taxonomy as $value) {
          $js_checkbox_selector = $js_checkbox_selector . '#' . $value . 'checklist input[type="checkbox"], .' . $value . '-checklist input[type="checkbox"],';
          $js_checkbox_before_selector = $js_checkbox_before_selector . '#' . $value . 'checklist input[type="checkbox"]:checked::before, .' . $value . '-checklist input[type="checkbox"]:checked::before,';
      }

      $js_checkbox_selector  = substr( $js_checkbox_selector,  0, -1 );
      $js_checkbox_before_selector  = substr( $js_checkbox_before_selector,  0, -1 );

      ?>
      <style type="text/css">
       <?php echo $js_checkbox_selector; ?>{
          position:relative;
          border-radius: 50%;
       }
       <?php echo $js_checkbox_before_selector; ?>{
          content:'';
          position:absolute;
          display: block;
          background-color: #1e8cbe;
          border-radius: 50%;
          top:0;
          bottom:0;
          left:0;
          right:0;
          margin:auto;
          width:100%;
          height:100%;
       }
      </style>
      <?php
    }

    /* ======== タクソノミーの単一選択 ======== */
    private function taxonomy_radio_select_script( $target_taxonomy ){
      if( !is_user_logged_in() ){
          return false;
      }

      $js_tax_array = '[';
      foreach ($target_taxonomy as $value) {
          $js_tax_array = " " . $js_tax_array . "'" . $value . "',";
      }
      $js_tax_array  = substr($js_tax_array,  0, -1) . " ]";

      ?>
      <script type="text/javascript">
          jQuery( function( $ ) {
              var taxonomy = <?php echo $js_tax_array; ?>;
              taxonomy.forEach(function( tmp_taxonomy ) {

                  /* -------- 投稿画面を単一選択に変更 -------- */
                  $( '#' + tmp_taxonomy + 'checklist input[type=checkbox]' ).click( function() {
                      $( this ).parents('#' + tmp_taxonomy + 'checklist' ).find( ' input[type=checkbox]' ).attr( 'checked', false );
                      $( this ).attr( 'checked', true );
                  } );

                  /* -------- 一覧画面を単一選択に変更 -------- */
                  $( '.' + tmp_taxonomy + '-checklist input[type=checkbox]' ).click( function() {
                      $( this ).parents( '.' + tmp_taxonomy + '-checklist' ).find( ' input[type=checkbox]' ).attr( 'checked', false );
                      $( this ).attr( 'checked', true );
                  } );

              });
          } );
      </script>
      <?php
    }
  }

?>
