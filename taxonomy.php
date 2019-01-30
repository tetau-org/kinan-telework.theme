    <?php get_header();
    $template_uri = get_template_directory_uri();
    if(have_posts()) {
        $type = get_post_type_object($post->post_type);
        $term_object = get_queried_object();
    }
    ?>


    <?php if(have_posts()) : ?>

            <div class="contents_wrapper">
                <section class="md_pageHeader page__error">
                    <h2 class="md_pageHeader__Title">お探しのページが見つかりません。</h2>
                    <div class="md_pageHeader__description">
                        <p>大変申し訳ございません。お客さまがお探しのページを見つけることができませんでした。<br>お探しのページはアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
                    </div>
                </section>
            </div>



        <?php else : ?>

            <?php get_header(); ?>

            <div class="contents_wrapper">
                <section class="md_pageHeader page__error">
                    <h2 class="md_pageHeader__Title">お探しのページが見つかりません。</h2>
                    <div class="md_pageHeader__description">
                        <p>大変申し訳ございません。お客さまがお探しのページを見つけることができませんでした。<br>お探しのページはアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
                    </div>
                </section>
            </div>

        <?php endif; ?>


        <?php get_footer(); ?>


