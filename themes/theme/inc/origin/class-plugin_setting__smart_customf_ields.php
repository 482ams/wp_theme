<?php
  require get_template_directory() . '/inc/origin/class-plugin_setting.php';

  class Class_plugin_setting__smart_customf_ields extends Class_plugin_setting{

      function __construct(){
        /* ============================================================================
         *  アクティブプラグイン名の取得
         ============================================================================ */
        // var_dump( get_option('active_plugins') );



        /* ============================================================================
        *  Smart Custom Fieldsでのカスタムフィールド生成
        ============================================================================ */
        add_filter( 'smart-cf-register-fields', array( $this, 'my_register_fields' ), 10, 4 );

      }



      /* ============================================================================
      *  Smart Custom Fieldsでのカスタムフィールド生成
      ============================================================================ */
      function my_register_fields( $settings, $type, $id, $meta_type ) {
        if( $type == 'works' ){

          /* SCF::add_setting( 'ユニークなID', 'メタボックスのタイトル' ); */
          $setting = SCF::add_setting( 'the_work', '作品の追加' );

          /* $Setting->add_group( 'ユニークなID', 繰り返し可能か, カスタムフィールドの配列 ); */
          $setting->add_group(
            'group-name-1',
            true,
            array(
              array(
                'name'  => 'works_img',
                'label' => '作品画像',
                'type'  => 'image',
              ),
              array(
                'name'    => 'works_img_name',
                'label'   => '作品名',
                'type'    => 'text',
              ),
            )
          );

          $setting->add_group(
            'group-name-2',
            false,
            array(
              array(
                'name'    => 'works_discription',
                'label'   => '作品の説明',
                'type'    => 'textarea',
                'rows'    => '5',
              ),
              array(
                'name'    => 'works_caption',
                'label'   => '作品の補足情報',
                'type'    => 'textarea',
                'rows'    => '3',
              ),
            )
          );

          $settings[] = $setting;
        }

        return $settings;
      }

  }
?>
