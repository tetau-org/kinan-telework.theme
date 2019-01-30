<?php get_header(); ?>

<h1 class="ac_tele__headLogo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telework_logo.svg" width="200" alt="紀南のテレワーク"></a></h1>

<div class="contents_wrap">
    <div class="ac_tele__head">
        <div class="l_row">
            <div class="ac_tele__headInnr">
                <div class="column">
                    <h2 class="ac_tele__headTtl">
                        <div class="an_block__reveal"><span>自分らしくはたらく、はたらける。</span></div>
                        <div class="an_block__reveal"><span>本州最南端のテレワーク。</span></div>
                    </h2>
                    <ul class="ac_tele__headTag">
                        <li class="an_block__reveal noremain"><span>テレワーク</span></li>
                        <li class="an_block__reveal noremain"><span>在宅ワーク</span></li>
                        <li class="an_block__reveal noremain"><span>リモートワーク</span></li>
                        <li class="an_block__reveal noremain"><span>副業・パラレルワーク</span></li>
                        <li class="an_block__reveal noremain"><span>ワーケーション</span></li>
                        <li class="an_block__reveal noremain"><span>有機的な働き方</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="contents" role="main" class="contents">
        <main>
            <div class="l_row">
                <nav class="fz_15 ac_tele__nav">
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/articlecat/telework/">テレワーク</a></li>
                        <li><a href="<?php echo home_url(); ?>/articlecat/work-at-home/">在宅ワーク</a></li>
                        <li><a href="<?php echo home_url(); ?>/articlecat/remotework/">リモートワーク</a></li>
                        <li><a href="<?php echo home_url(); ?>/articlecat/parallel-work/">副業・パラレルワーク</a></li>
                        <li><a href="<?php echo home_url(); ?>/articlecat/itskill/">ITスキル</a></li>
                        <li><a href="<?php echo home_url(); ?>/articlecat/work-style/">働き方</a></li>
                    </ul>
                </nav>
            </div>
        </main>
    </div>
    <?php if(have_posts()) : ?>
        <section class="ac_tele__article">
            <div class="l_row">
                <div class="md_article__wrap">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="md_article">
                            <a href="<?php the_permalink(); ?>" class="animsition-link md_article__thumbLink">
                                <?php
                                $files = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image");
                                $title = get_the_title();
                                $link = get_permalink();
                                $time = get_the_time('c');
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail('original_16-9__mid', array('alt' =>$title, 'title' => $title, 'class' => 'md_article__thumb'));
                                } elseif (empty($files)){
                                    echo '<div class="md_article__thumb subsitute"></div>';
                                } else {
                                    $keys = array_keys($files);
                                    $lastkeys = array_pop($keys);
                                    $num=$lastkeys;
                                    $thumb=wp_get_attachment_image_src($num, 'original_16-9__mid');
                                    echo '<img src="' . esc_url($thumb[0]) .'" alt="' . esc_attr($title) . '" class="md_article__thumb" />';
                                }?>
                            </a>
                            <div class="md_article__cont">
                                <div class="fz_13 md_article__head">
                                    <p class="md_article__cat color3">テレワーク</p>
                                    <time datetime="<?php the_time('c');?> " class="md_article__time"><?php the_time('Y.m.d'); ?></time>
                                </div>
                                <h2 class="fz_16 fw700 md_article__ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <ul class="fz_12 md_article__tags">
                                    <?php echo get_the_term_list_nolink($post->ID, 'articletag', '<li>', '</li><li>', '</li>');?>
                                </ul>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <div class="md_article__more">
                    <a href="<?php echo home_url(); ?>/articlecat/telework/" class="md_article__moreBtn"><span class="bd">もっと見る</span><span class="arrow"></span></a>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>


