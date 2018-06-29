/* ================================
* ページ内 スムーズスクロール
================================ */
jQuery(function () {
    jQuery('a[href^="#"]').click(function () {
        /* スクロールの速度（ミリ秒） */
        var speed = 2000;

        var href = jQuery(this).attr("href");
        var target = jQuery(href === "#" || href === "" ? 'html' : href);
        var position = target.offset().top;
        jQuery('body,html').animate({scrollTop: position}, speed, 'swing');
        return false;
    });
});

/* ================================
* ページ内 ヘッダーナビの内側を.menu-item-btn-areaでくくる
* ※cssでposition:absolute配置調整を出来るようにするため
* ページ内 ヘッダーナビの子要素有りのナビ要素の下に<span><span>を追加
* ※クリックイベント取得用の要素
================================ */
jQuery('.menu-item > a').wrap('<div class="menu-item-btn-area">');
jQuery( '.main-navigation .menu-item-has-children > .menu-item-btn-area > a' ).after( '<span class="menu-item-children-control-btn js-toggled" data-toggle-target-parent=ture data-toggle-code=nav ></span>' );

/* ================================
* ボタンのオン・オフ処理
* .js-toggledが付与された要素に対して動作する
* 押す度に.toggle-onが付いたり外れたりする
* data-toggle-target-parentが指定されている場合、ボタンの親要素に対して.toggle-onが付いたり消えたりする
* data-toggle-code="コード"が指定されている場合、.toggle-onが付与された要素が切り替わる（今まで.toggle-onが付与されていた要素から.toggle-onが削除される）
* data-toggle-append-parentが指定されていて場合、toggle-on時は自身の親要素の
* （アコーディオンなどで使用を想定）
================================ */
jQuery(function () {
  jQuery('.js-toggled').on('click', function(event){

    var target = jQuery(this);

    /* 親要素に付ける場合はtargetを変更する */
    if( jQuery(this).data("toggle-target-parent") ){
      target = jQuery(this).parent();
    }

    /* 現在の状態を取得(.toggle-onが設定されている場合はtrue、されていない場合はfalse) */
    var target_state = target.hasClass("toggle-on");

    /* 同一codeのtoggle-onを消す */
    var code = jQuery(this).data("toggle-code");
    if( code ){
      jQuery('.js-toggled[data-toggle-code=' + code + ']').each(function(){
        var target = jQuery(this);
        if( jQuery(this).data("toggle-target-parent") ){
          target = jQuery(this).parent();
        }
        target.removeClass( "toggle-on" );
      });
    }

    /* toggle-on をオン・オフする*/
    if( target_state ){
      target.removeClass( "toggle-on" );
    }else{
      target.addClass( "toggle-on" );
    }

    /* data-toggle-dont-change-parentが付与されている場合 */

  });

});
