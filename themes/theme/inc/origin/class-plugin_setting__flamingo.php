<?php
  require get_template_directory() . '/inc/origin/class-plugin_setting.php';

  class Class_plugin_setting__flamingo extends Class_plugin_setting{

      function __construct(){
        /* ============================================================================
         *  アクティブプラグイン名の取得
         ============================================================================ */
        // var_dump( get_option('active_plugins') );



        /* ============================================================================
        *  flamingoの権限変更
        ============================================================================ */
        // if( $this->is_my_plugin_active('flamingo/flamingo.php') ){
        //   remove_filter( 'map_meta_cap', 'flamingo_map_meta_cap' );
        //   add_filter( 'map_meta_cap', array( $this, 'flamingo_custom_cap' ), 5, 4 );
        // }

      }


      /* ======== flamingoの権限変更  ========*/
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

  }
?>
