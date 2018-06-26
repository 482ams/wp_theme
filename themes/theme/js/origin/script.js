jQuery(function () {
    /* ページ内 スムーズスクロール */
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
