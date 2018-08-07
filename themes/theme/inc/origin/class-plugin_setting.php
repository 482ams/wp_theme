<?php
  class Class_plugin_setting{
      function __construct(){}

      /* ======== プラグインがアクティブか判定 ======== */
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
