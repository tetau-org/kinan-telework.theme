(function($) {
    $(function(){
        //drawer menu
        $('#noscript').remove();

        //fadein
        $(window).on('load', function(){
            $('body').removeClass('fadeout');
        });
        $('a:not([href^="#"]):not([target])').on('click', function(e){
            e.preventDefault();
            url = $(this).attr('href');
            if (url !== '') {
                $('body').addClass('fadeout');
                setTimeout(function(){
                    window.location = url;
                }, 800);
            }
            return false;
        });

        // スムーズスクロール

        var notList = '#togmenu a[href^="#"], a.remodal-close,a[href^="#0"]';
        $('a[href^="#"]').not(notList).click(function(){
            var speed = 300;
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            $("html, body").animate({scrollTop:position}, speed, "swing");
            return false;
        });
        var url = $(location).attr('href');
        if (url.indexOf("?id=") == -1) {
        }else{
            var url_sp = url.split("?id=");
            var hash   = '#' + url_sp[url_sp.length - 1];
            var tgt    = $(hash);
            var pos    = tgt.offset().top;
            $("html, body").animate({scrollTop:pos}, 300, "swing");
        }

        // var slhi = $('.sp-slide').height();
        // $('.heroarea').css('height',slhi+'px');
        // $(window).resize(function() {
        //  var slhi = $('.sp-slide').height();
        //  $('.heroarea').css('height',slhi+'px');
        // });

        //sidrメニュー
        $('#drawer_trigger').sidr({
            name: 'drawer',
            source: '#drawer_menu',
            side: 'right',
            renaming: false,
            onOpen: function() {
                $('#drawer_trigger').addClass('open');
                $('#drawer_triggerBtn').addClass('active');
                $('#drawer_cover').fadeIn(300);
                $('.sidr_slide__close').show();
                $("meta[name='viewport']").attr('content','width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=no');
            },
            onClose: function() {
                $('#drawer_trigger').removeClass('open');
                $('#drawer_triggerBtn').removeClass('active');
                $('#drawer_cover').fadeOut(300);
                $('.sidr_slide__close').hide();
                $("meta[name='viewport']").attr('content','width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=yes');
            }
        });
        $('#drawer_cover').on("click", function () {
            $.sidr('close', 'drawer');
        });
        $('.sidr_slide__close').on("click", function () {
            $.sidr('close', 'drawer');
        });
        $(window).touchwipe({
            wipeRight: function() {
                $.sidr('close', 'drawer');
            },
            // wipeLeft: function() {
            //  $.sidr('open', 'drawer');
            // },
            preventDefaultEvents: false
        });

        //sidrメニューtoggle
        $('ul.child_menu').hide();
        $('.open_btn').on("click", function () {
            $(this).toggleClass('open');
            $(this).next('ul.child_menu').slideToggle('fast');
        });

        //sidrメニューリライト
        $('.personal_1st').addClass('show');
        $('.menu_rewrite').on("click", function () {
            $('.personal_1st').toggleClass('show');
            $('.personal_2nd').toggleClass('show');
        });




    });
})(jQuery);

