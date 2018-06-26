// (function () {
//   google.maps.event.addDomListener(window, 'load', function () {
//
//       /* googleMapの表示設定 */
//       /* =表示する位置、大きさを指定======================= */
//       var lat = 39.720547;
//       var lng = 140.088159;
//       var map_zoom = 15;
//       /* ============================================== */
//
//       var mapOptions = {
//           zoom: map_zoom,
//           center: new google.maps.LatLng(lat, lng),
//           mapTypeId: google.maps.MapTypeId.ROADMAP,
//           scrollwheel: false
//       };
//       var mp = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
//
//       /* マーカーの表示 */
//       /* =マーカー画像のURLを指定======================= */
//       var marker_img = '[画像のURL]';
//       /* ============================================ */
//       var marker_pos = {lat: lat, lng: lng};
//       new google.maps.Marker({
//           position: marker_pos,
//           map     : mp,
//           icon    : new google.maps.MarkerImage( marker_img )
//       });
//
//       /* スタイルの適用 */
//       /* =地図のスタイルを指定======================= */
//       var style = [
//           {
//               featureType: "all",
//               elementType: "all",
//               stylers: [
//                   {visibility: "simplified" },
//                   { saturation: -100 }
//               ]
//           },
//           {
//               featureType: "water",
//               elementType: "all",
//               stylers: [
//                   {visibility: "simplified" },
//                   { hue: "#00fff7" },
//                   { saturation: 20 }
//               ]
//           },
//           {
//               featureType: "all",
//               elementType: "labels",
//               stylers: [
//                   { visibility: "simplified" },
//                   { lightness: 0 },
//                   { gamma: 0.5 }
//               ]
//           },
//           {
//               featureType: "poi.medical",
//               elementType: "labels",
//               stylers: [
//                   { visibility: "off" }
//               ]
//           },
//           {
//               featureType: "poi.place_of_worship",
//               elementType: "labels", stylers: [
//                   { visibility: "off" }
//               ]
//           },
//           {
//               featureType: "poi.business",
//               elementType: "labels",
//               stylers: [
//                   { visibility: "off" }
//               ]
//           },
//           {
//               featureType: "all",
//               elementType: "all",
//               stylers: [ ]
//           }
//       ];
//       var styledMapOptions = { map: mp, name: "originalstyle" }
//       var stylemap = new google.maps.StyledMapType(style,styledMapOptions);
//       mp.mapTypes.set("originalstyle", stylemap);
//       mp.setMapTypeId("originalstyle");
//       /* ============================================ */
//   });
// })();
