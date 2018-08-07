<?php
  require get_template_directory() . '/inc/origin/class-plugin_setting.php';

  class Class_plugin_setting__contact_form_7 extends Class_plugin_setting{

      function __construct(){

        /* ============================================================================
         *  アクティブプラグイン名の取得
         ============================================================================ */
        // var_dump( get_option('active_plugins') );


        /* ============================================================================
        *  Contact Form 7のプレースフォルダーを変更
        ============================================================================ */
        // if( $this->is_my_plugin_active('contact-form-7/wp-contact-form-7.php') ){
        //   add_filter('wpcf7_form_elements', array( $this, 'my_wpcf7_form_elements' ) );
        // }

      }


      /* ======== Contact Form 7のプレスフォルダーを変更 ======== */
      public function my_wpcf7_form_elements( $html ) {
          return str_replace( '---', '選択してください', $html );
      }

  }
?>
