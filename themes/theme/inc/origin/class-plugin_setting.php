<?php
  class Class_plugin_setting{
      function __construct(){

        /* アクティブプラグイン名の取得 */
        // var_dump( get_option('active_plugins') );

        // /* Contact Form 7のプレースフォルダーを変更 */
        // if( $this->is_my_plugin_active('contact-form-7/wp-contact-form-7.php') ){
        //   add_filter('wpcf7_form_elements', array( $this, 'my_wpcf7_form_elements' ) );
        // }
        //
        // /* flamingoの権限変更 */
        // if( $this->is_my_plugin_active('flamingo/flamingo.php') ){
        //   remove_filter( 'map_meta_cap', 'flamingo_map_meta_cap' );
        //   add_filter( 'map_meta_cap', array( $this, 'flamingo_custom_cap' ), 5, 4 );
        // }
      }



      /* Contact Form 7のプレスフォルダーを変更 */
      public function my_wpcf7_form_elements( $html ) {
          return str_replace( '---', '選択してください', $html );
      }

      /* flamingoの権限変更 */
      public function flamingo_custom_cap( $caps, $cap, $user_id, $args ) {
        /* 投稿権限があるユーザにflamingoの権限を付与 */
        $meta_caps = array(
          'flamingo_edit_contact' => 'edit_posts',
          'flamingo_edit_contacts' => 'edit_posts',
          'flamingo_delete_contact' => 'edit_posts',
          'flamingo_edit_inbound_message' => 'edit_posts',
          'flamingo_edit_inbound_messages' => 'edit_posts',
          'flamingo_delete_inbound_message' => 'edit_posts',
          'flamingo_delete_inbound_messages' => 'edit_posts',
          'flamingo_spam_inbound_message' => 'edit_posts',
          'flamingo_unspam_inbound_message' => 'edit_posts',
          'flamingo_edit_outbound_message' => 'edit_posts',
          'flamingo_edit_outbound_messages' => 'edit_posts',
          'flamingo_delete_outbound_message' => 'edit_posts',
        );

        $caps = array_diff( $caps, array_keys( $meta_caps ) );

        if ( isset( $meta_caps[$cap] ) ){
            $caps[] = $meta_caps[$cap];
        }
        return $caps;
      }



      /* ==== 以下変更しない ==== */

      /* プラグインがアクティブか判定 */
      private function is_my_plugin_active( $plugin ){
        if (function_exists('is_plugin_active')) {
            return is_plugin_active($plugin);
        } else {
            return in_array(
                $plugin,
                get_option('active_plugins')
            );
        }
      }


  }

?>
