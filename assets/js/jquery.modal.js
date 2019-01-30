(function($) {
$(function(){
    // スクロールバーの横幅を取得
    $('html').append('<div class="scrollbar" style="overflow:scroll;"></div>');
    var scrollsize = window.innerWidth - $('.scrollbar').prop('clientWidth');
    $('.scrollbar').hide();

    // 「.md_modal__open」をクリック
    $('.md_modal__open').click(function(){
        // html、bodyを固定（overflow:hiddenにする）
        $('html, body').addClass('md_modal__lock');
        // オーバーレイ用の要素を追加
        $('body').append('<div class="md_modal__overlay"></div>');
        // オーバーレイをフェードイン
        $('.md_modal__overlay').fadeIn('fast');
        // モーダルコンテンツのIDを取得
        var modal = '#' + $(this).attr('data-target');
         // モーダルコンテンツを囲む要素を追加
        $(modal).wrap("<div class='md_modal__wrap'></div>");
        // モーダルコンテンツを囲む要素を表示
        $('.md_modal__wrap').show();
        // モーダルコンテンツの表示位置を設定
        modalResize();
         // モーダルコンテンツフェードイン
        $(modal).fadeIn('fast');
        // モーダルコンテンツをクリックした時はフェードアウトしない
        $(modal).click(function(e){
            e.stopPropagation();
        });
        $('.md_modal__close').toggleClass('active');
        // 「.md_modal__overlay」あるいは「.md_modal__close」をクリック
        $('.md_modal__wrap, .md_modal__close, .md_modal__imgclose').off().click(function(){
            // モーダルコンテンツとオーバーレイをフェードアウト
            $(modal).fadeOut('fast');
            $('.md_modal__overlay').fadeOut('fast',function(){
                // html、bodyの固定解除
                $('html, body').removeClass('md_modal__lock');
                // オーバーレイを削除
                $('.md_modal__overlay').remove();
                // モーダルコンテンツを囲む要素を削除
                $(modal).unwrap("<div class='md_modal__wrap'></div>");
           });
        });

        // リサイズしたら表示位置を再取得
        $(window).on('resize', function(){
            modalResize();
        });

        // モーダルコンテンツの表示位置を設定する関数
        function modalResize(){
            // ウィンドウの横幅、高さを取得
            var w = $(window).width();
            var h = $(window).height();

            // モーダルコンテンツの横幅、高さを取得
            var mw = $(modal).outerWidth(true);
            var mh = $(modal).outerHeight(true);

            // モーダルコンテンツの表示位置を設定
            if ((mh > h) && (mw > w)) {
                $(modal).css({'left': 0 + 'px','top': 0 + 'px'});
            } else if ((mh > h) && (mw < w)) {
                var x = (w - scrollsize - mw) / 2;
                $(modal).css({'left': x + 'px','top': 0 + 'px'});
            } else if ((mh < h) && (mw > w)) {
                var y = (h - scrollsize - mh) / 2;
                $(modal).css({'left': 0 + 'px','top': y + 'px'});
            } else {
                var x = (w - mw) / 2;
                var y = (h - mh) / 2;
                $(modal).css({'left': x + 'px','top': y + 'px'});
            }
        }

    });
});
})(jQuery);
