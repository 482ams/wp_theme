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
* 開始時アニメーション
================================ */
jQuery(function () {

  jQuery(document).ready(function() {
    jQuery('body').append('<div id="opening_anime" class="opening_anime"><div class="opening_anime__inner"></div></div>');
  });

  jQuery(window).on('load', function() {
    jQuery('#opening_anime')[0].classList.add('end');
  });

});



/* ================================
* スクロール位置検知
* （スクロール位置が最上部以外の時にbodyに.do_scrollを付与）
================================ */
jQuery(function(){

  var scroll_check = (function(){
    if( jQuery(window).scrollTop() <= 0){
      jQuery("body")[0].classList.remove("do_scroll");
    }else{
      jQuery("body")[0].classList.add("do_scroll");
    }
  });

  jQuery(window).on( "load", scroll_check );
  jQuery(window).scroll( scroll_check );

});











// TODO 以下の関数は動作チェックおよび機能の必要可否検討


/* ================================
* ボタンのオン・オフ処理
* .js-toggledが付与された要素に対して動作する
* 押す度に.toggle-onが付いたり外れたりする
* data-toggle-target-parentが指定されている場合、ボタンの親要素に対して.toggle-onが付いたり消えたりする
* data-toggle-code="コード"が指定されている場合、.toggle-onが付与された要素が切り替わる（今まで.toggle-onが付与されていた要素から.toggle-onが削除される）
* data-toggle-append-parentが指定されていて場合、toggle-on時は自身の親要素の
* （アコーディオンなどで使用を想定）
================================ */
// jQuery(function () {
//   jQuery('.js-toggled').on('click', function(event){
//
//     var target = jQuery(this);
//
//     /* 親要素に付ける場合はtargetを変更する */
//     if( jQuery(this).data("toggle-target-parent") ){
//       target = jQuery(this).parent();
//     }
//
//     /* 現在の状態を取得(.toggle-onが設定されている場合はtrue、されていない場合はfalse) */
//     var target_state = target.hasClass("toggle-on");
//
//     /* 同一codeのtoggle-onを消す */
//     var code = jQuery(this).data("toggle-code");
//     if( code ){
//       jQuery('.js-toggled[data-toggle-code=' + code + ']').each(function(){
//         var target = jQuery(this);
//         if( jQuery(this).data("toggle-target-parent") ){
//           target = jQuery(this).parent();
//         }
//         target.removeClass( "toggle-on" );
//       });
//     }
//
//     /* toggle-on をオン・オフする*/
//     if( target_state ){
//       target.removeClass( "toggle-on" );
//     }else{
//       target.addClass( "toggle-on" );
//     }
//   });
// });


/* ================================
* 特定条件でフラグ on を付与
* .js-scroll-togledが付与された要素に対して動作する
* data-toggled-timing=でフラグを付与する基準を設定
*   'page-top'    オブジェクトがページの上部に到達したら
*   'page-bottom' オブジェクトがページ下部に到達したら
* data-toggled-delay=でフラグを付けるタイミングを操作する
* 注意：onが付与された要素に対してposition等位置が変化するcssを適用しないこと
※     サイズ変更などが発生する場合はdelayを使うなどして、場所が変わる事を意識する
================================ */
// jQuery(function(){
//   jQuery(window).on("load",function(){
//     jQuery(".js-scroll-togled").each(function(){
//       var toggled_timing = jQuery(this).attr('data-toggled-timing');
//       if( toggled_timing === undefined || ( toggled_timing !== 'page-top' && toggled_timing !== 'page-bottom' ) ){
//         jQuery(this).attr( 'data-toggled-timing', 'page-top' );
//       }
//       if( jQuery(this).attr('data-toggled-delay') === undefined ){
//         jQuery(this).attr( 'data-toggled-delay', 0 );
//       }
//     });
//   });
//
//   jQuery(window).scroll(function(){
//     jQuery(".js-scroll-togled[data-toggled-timing=page-top]").each(function(){
//        if( jQuery(window).scrollTop() - Number( jQuery(this).offset().top ) > Number( jQuery(this).attr('data-toggled-delay') ) ){
//          jQuery(this).addClass('on');
//        }else{
//          jQuery(this).removeClass('on');
//        }
//     });
//
//     jQuery(".js-scroll-togled[data-toggled-timing=page-bottom]").each(function(){
//       if( (jQuery(window).scrollTop() + window.innerHeight ) - ( Number( jQuery(this).offset().top ) + jQuery(this).height() ) > Number( jQuery(this).attr('data-toggled-delay') ) ){
//         jQuery(this).addClass('on');
//       }else{
//         jQuery(this).removeClass('on');
//       }
//
//     });
//   });
// });


/* ================================
* スクロールに対してフラグ top-on,bottom-on を付与
* .js-scroll-togledが付与された要素に対して動作する
* data-toggled-timing=でフラグを付与する基準を設定
*   'page-top'    オブジェクトがページの上部に到達したら
*   'page-bottom' オブジェクトがページ下部に到達したら
*  'both' 上部、下部両方に到達した場合
* data-toggled-top-delay,data-toggled-bottom-delay=でフラグを付けるタイミングを操作する
* 注意：onが付与された要素に対してposition等位置が変化するcssを適用しないこと
※     サイズ変更などが発生する場合はdelayを使うなどして、場所が変わる事を意識する
================================ */
// jQuery(function(){
//   var scroll_toggled_event = function(){
//
//     jQuery(".js-scroll-togled[data-toggled-timing=page-top]").each(function(){
//        if( jQuery(window).scrollTop() - Number( jQuery(this).offset().top ) > Number( jQuery(this).attr('data-top-toggled-delay') ) ){
//          jQuery(this).addClass('top-on');
//        }else{
//          jQuery(this).removeClass('top-on');
//        }
//     });
//
//     jQuery(".js-scroll-togled[data-toggled-timing=page-bottom]").each(function(){
//       if( (jQuery(window).scrollTop() + window.innerHeight ) - ( Number( jQuery(this).offset().top ) + jQuery(this).height() ) > Number( jQuery(this).attr('data-bottom-toggled-delay') ) ){
//         jQuery(this).addClass('bottom-on');
//       }else{
//         jQuery(this).removeClass('bottom-on');
//       }
//     });
//
//     jQuery(".js-scroll-togled[data-toggled-timing=both]").each(function(){
//        if( jQuery(window).scrollTop() - Number( jQuery(this).offset().top ) > Number( jQuery(this).attr('data-top-toggled-delay') ) ){
//          jQuery(this).addClass('top-on');
//        }else{
//          jQuery(this).removeClass('top-on');
//        }
//
//        if( (jQuery(window).scrollTop() + window.innerHeight ) - ( Number( jQuery(this).offset().top ) + jQuery(this).height() ) > Number( jQuery(this).attr('data-bottom-toggled-delay') ) ){
//          jQuery(this).addClass('bottom-on');
//        }else{
//          jQuery(this).removeClass('bottom-on');
//        }
//     });
//   };
//
//   jQuery(window).on("load",function(){
//     jQuery(".js-scroll-togled").each(function(){
//       var toggled_timing = jQuery(this).attr('data-toggled-timing');
//       if( toggled_timing === undefined || ( toggled_timing !== 'page-top' && toggled_timing !== 'page-bottom' && toggled_timing !== 'both' ) ){
//         jQuery(this).attr( 'data-toggled-timing', 'page-top' );
//       }
//       if( toggled_timing === 'page-top' ){
//         if( jQuery(this).attr('data-top-toggled-delay') === undefined ){
//           jQuery(this).attr( 'data-top-toggled-delay', 0 );
//         }
//       }else if( toggled_timing === 'page-bottom' ){
//         if( jQuery(this).attr('data-bottom-toggled-delay') === undefined ){
//           jQuery(this).attr( 'data-bottom-toggled-delay', 0 );
//         }
//       }else{
//         if( jQuery(this).attr('data-top-toggled-delay') === undefined ){
//           jQuery(this).attr( 'data-top-toggled-delay', 0 );
//         }
//         if( jQuery(this).attr('data-bottom-toggled-delay') === undefined ){
//           jQuery(this).attr( 'data-bottom-toggled-delay', 0 );
//         }
//       }
//     });
//     scroll_toggled_event();
//   });
//
//   jQuery(window).scroll(function(){
//     scroll_toggled_event();
//   });
//
// });

/* ================================
* スクロール位置が特定範囲内の場合、on を付与
* .js-scroll-area-togledが付与された要素に対して動作する
* data-area=""に判定するセレクタを設定（例：#◯◯◯◯）
================================ */
// jQuery(function(){
//   jQuery(window).scroll(function(){
//     jQuery(".js-scroll-area-togled").each(function(){
//
//       var target = jQuery(this).attr('data-area');
//
//       if(jQuery(window).scrollTop() - jQuery(target).offset().top >= 0){
//         jQuery(this).addClass('on');
//       }
//
//       if(jQuery(window).scrollTop() - ( jQuery(target).offset().top + jQuery(target).height() ) >= 0 ){
//         jQuery(this).removeClass('on');
//       }
//
//       if(jQuery(window).scrollTop() - jQuery(target).offset().top < 0){
//         jQuery(this).removeClass('on');
//       }
//
//     });
//   });
// });
