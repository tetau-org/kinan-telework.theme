<footer>
    <div class="md_footer">
        <?php if(!is_home()): ?>
            <aside class="md_footer__logo">
                <div class="innr">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="紀南Good" class="good" width="200">
                    <div class="text">
                        <span class="fz_12 md_footer__produce">PRESENTED BY</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tetau_logo__txt.svg" alt="TETAU" class="tetau" width="100">
                    </div>
                </div>
<!--             <div class="md_ft__contact">
                <a href="#" class="fz_13">紀南Goodへのご質問・お問い合わせはこちら</a>
            </div> -->
        </aside>
    <?php endif; ?>
    <div class="md_footer__wrap">
        <div class="md_foot__info">
            <p class="fz_12 md_foot__copyright">&copy; TETAU</p>
            <a href="https://www.tetau.jp/" class="fz_12">運営会社について</a>
            <!-- <a href="<?php echo home_url(); ?>/privacypolicy/">プライバシーポリシー</a> -->
            <a href="https://goo.gl/forms/zErv5EURXR2fIlLe2" class="fz_12">お問い合わせ</a>
            <!-- <a href="<?php echo home_url(); ?>/solicitationpolicy/" class="icn"><i class="fab fa-facebook-f"></i></a> -->
            <!-- <a href="<?php echo home_url(); ?>/solicitationpolicy/" class="icn"><i class="fab fa-instagram"></i></a> -->
        </div>
    </div>
</div>
</footer>

</div><!-- .wrapper-->





<!-- .sidr-->
<div class="md_drawer__cover" id="drawer_cover"></div>
<div id="drawer_menu" class="md_drawer__menu">
    <div class="md_drawer__contents"></div>
    <div class="sidr_slide__close"><i class="fal fa-times"></i></div>
</div>

<!-- .sidr-->

<?php wp_footer(); ?>

<?php if(is_home()): ?>

<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.sidr.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.touchwipe.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>

<?php $term_slugs = array('telework','work-style','crowdsourcing','itskill','remotework','parallel-work','work-at-home','work-style',);
    if(is_page('telework') || is_tax('articlecat',$term_slugs) || has_term( $term_slugs, 'articlecat')): ?>
    <nav class="ac_tele__glnav" data-type="modal_trigger">
    <span></span>
    <span></span>
    <span></span>
    </nav>
    <div class="md_modal__contents">
    <nav class="md_modal__nav">
        <div class="innr">
        <h3 class="md_modal__navLogo"><a href="<?php echo home_url(); ?>/telework/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telework_logo.svg" width="200" alt="紀南のテレワーク"></a></h3>
        <ul class="fz_16">
            <li><a href="<?php echo home_url(); ?>/articlecat/telework/">テレワーク</a></li>
            <li><a href="<?php echo home_url(); ?>/articlecat/work-at-home/">在宅ワーク</a></li>
            <li><a href="<?php echo home_url(); ?>/articlecat/remotework/">リモートワーク</a></li>
            <li><a href="<?php echo home_url(); ?>/articlecat/parallel-work/">副業・パラレルワーク</a></li>
            <li><a href="<?php echo home_url(); ?>/articlecat/itskill/">ITスキル</a></li>
            <li><a href="<?php echo home_url(); ?>/articlecat/work-style/">働き方</a></li>
        </ul>
        </div>
    </nav>
    <div class="md_modal__close"><span></span><span></span></div>
    </div>
    <span class="md_modal__bg"></span>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/modules/modal_morphing.css" />
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/modal_morphing.js"></script>
<?php endif; ?>


</body>
</html>
