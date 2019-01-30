    (function($) {
        $(function() {
            $('[data-type="modal_trigger"]').on('click', function() {
                $('.md_modal__bg').removeClass('close').addClass('open');
                $('.md_modal__contents').addClass('open');
            });

            $('.md_modal__close').on('click', function() {
                $('.md_modal__bg').removeClass('open').addClass('close');
                $('.md_modal__contents').removeClass('open');
            });

        });
    })(jQuery);
