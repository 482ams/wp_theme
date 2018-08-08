// TODO 動作チェックおよび機能の必要可否検討
//
//
//
// /* ================================
// * ページ内 ヘッダーナビの内側を.menu-item-btn-areaでくくる
// * ※cssでposition:absolute配置調整を出来るようにするため
// * ページ内 ヘッダーナビの子要素有りのナビ要素の下に<span><span>を追加
// * ※クリックイベント取得用の要素
// ================================ */
// jQuery('.menu-item > a').wrap('<div class="menu-item-btn-area">');
// jQuery( '.main-navigation .menu-item-has-children > .menu-item-btn-area > a' ).after( '<span class="menu-item-children-control-btn js-toggled" data-toggle-target-parent=ture data-toggle-code=nav ></span>' );
//
//
//
// /* ================================
// * swiper（トップページスライダー）の設定
// ================================ */
//  jQuery(document).ready(function () {
//   var mySwiper = new Swiper ('.swiper-container', {
//     /* オプション */
//     loop: true,
//     noSwiping: true,
//     noSwipingClass: 'no_swipe',
//     autoplay: {
//       delay: 5000,
//     },
//     speed: 2000,
//     // effect:"slide",
//     effect:"fade",
//     // effect:"cube",
//     // effect:"coverflow",
//     // effect:"flip",
//
//     /* ページネーション */
//     // pagination: {
//     //   el: '.swiper-pagination',
//     // },
//
//     /* ナビゲーション */
//     // navigation: {
//     //   nextEl: '.swiper-button-next',
//     //   prevEl: '.swiper-button-prev',
//     // },
//
//     /* スクロールバー */
//     // scrollbar: {
//     //   el: '.swiper-scrollbar',
//     // },
//   })
// })
//
// /* ================================
// * スマホ時headerナビ選択時にナビを非表示にする設定
// ================================ */
// jQuery(function(){
//   jQuery('#primary-menu a').on('click', function(event){
//     var target = '[aria-controls=primary-menu]';
//     if(jQuery(target).attr('aria-expanded')  == "true"){
//       jQuery(target).attr( 'aria-expanded', "false" );
//       jQuery('#site-navigation').removeClass( 'toggled' );
//     }
//
//     var target2 = '#primary-menu ul';
//     if(jQuery(target2).attr('aria-expanded')  == "true"){
//       jQuery(target2).attr( 'aria-expanded', "false" );
//     }
//
//     var target3 = document.getElementById('masthead');
//     if( target3.classList.contains('main-navigation_toggled') ){
//       target3.classList.remove('main-navigation_toggled');
//     }
//
//   });
// });
//
//
// /* ================================
// * colerboxの設定
// ================================ */
// jQuery( document ).ready( function( $ ){
//
//     //背景スクロール抑止用
//     var scroll_pos;
//
//     //モーダルウィンドウ表示
//     $(".iframe_box").colorbox({
//         iframe      : true,
//         fixed       : true,
//         opacity     : 0.7,
//         maxWidth    : "90%",
//         maxHeight   : "90%",
//         innerWidth  : 1280,
//         innerHeight : 1024,
//         scroll      : false,
//     });
//
// });
//
// /* jquery.inviewの設定 */
// jQuery(function() {
//   jQuery('.inview').on('inview', function(event, isInView) {
//     if (isInView) {
//       /* 表示領域に入った時 */
//       jQuery(this).addClass('my_fadeInUp');
//     }
//   });
// });
//
// /* masonry設定 */
// jQuery(window).on("load",function(){
//   jQuery('ul.tile_anime').masonry({
//   	itemSelector: 'li',
//   	isFitWidth: true,
//   	isAnimated: true,
//     gutter: 10,
//   });
//   jQuery(window).trigger('resize');
//
// });
//
//
// /* masonry設定2 */
// jQuery(window).on("load",function(){
//   jQuery('.single-works .works_info ul').masonry({
//   	itemSelector: 'li',
//   	isFitWidth: true,
//   	isAnimated: true,
//     gutter: 0,
//   });
// });
//
//
// /* 画像ページ表示 */
// jQuery(function() {
//
//   const myEvent = function(event){
//       event.preventDefault();
//   }
//
//   /* worksサムネイルをクリックされた時の処理 */
//   jQuery('.iframe_img').on('click', function(event){
//
//     /* hrefの値(画像URL取得) */
//     var url = jQuery(this).attr('href');
//
//     jQuery('.works_show_img', parent.document).addClass('show');
//     jQuery('.works_img_wrapper', parent.document).append('<img>');
//
//     var imgPreloader=new Image();
//     imgPreloader.onload=function() {
//
//       /* 画像サイズ取得 */
//       var img_W = imgPreloader.width;
//     	var img_H = imgPreloader.height;
//
//       /*親要素のサイズ取得*/
//       var win_W = jQuery('.works_show_img', parent.document).innerWidth();
//       var win_H = jQuery('.works_show_img', parent.document).innerHeight();
//
//       /* 画面幅に合わせた場合の画像サイズ */
//       var n_img_H =  ( win_W / img_W ) * img_H;
//       var n_img_W =  (win_H / img_H) * img_W ;
//
//       if( win_H > n_img_H ){
//         //画面に対して上下に空きがある
// 	       jQuery('.works_img_wrapper', parent.document).css('width',win_W);
//          jQuery('.works_img_wrapper', parent.document).css('height',n_img_H);
//          jQuery('.works_img_wrapper', parent.document).css('top',( win_H - n_img_H) / 2 );
//       }else{
//         //画面に対して左右に空きがある
//         jQuery('.works_img_wrapper', parent.document).css('width', n_img_W );
//         jQuery('.works_img_wrapper', parent.document).css('height',win_H );
//         jQuery('.works_img_wrapper', parent.document).css('top',0 );
//       }
//
//     	jQuery('.works_img_wrapper', parent.document).children("img").attr({'src':url});
//       jQuery('.works_img_wrapper img', parent.document).addClass('show');
//       // jQuery('.works_img_clone_btn', parent.document).addClass('show');
//
//     }
//     imgPreloader.src=url;
//     return false;
//   });
//
//
//   /* .works_img_clone_btnをクリックされた時の処理（閉じるボタン） */
//   jQuery('.works_show_img').on('click', function(event){
//
//     /* .works_show_imgに.showを削除 */
//     jQuery('.works_show_img').removeClass('show');
//     // jQuery('.works_img_clone_btn', parent.document).removeClass('show');
//
//     /* .works_img_wrapper内にの画像を削除 */
//     jQuery(".works_img_wrapper img").remove();
//
//     /* スクロールイベントを復活 */
//     // window.removeEventListener('touchmove', myEvent, false);
//
//   });
//
// });
