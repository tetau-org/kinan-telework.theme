<?php get_header(); ?>

<?php
$type = get_post_type_object($post->post_type);
$template_uri = get_template_directory_uri();
?>

<?php if (have_posts()) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="p_singleTelework">
            <header data-role="header" class="p_singleTelework__header">
                <?php if(has_post_thumbnail()): ?>
                    <?php
                    $thumbnail_id = get_post_thumbnail_id($post->ID);
                    $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'original_4-3__lrg' );
                    echo '<div class="p_singleTelework__Eyecatch" style="background-image: url(' . esc_url( $eye_img[0] ) . ');">';
                    ?>
                <?php endif; ?>

                <div class="p_singleTelework__headInnr">
                    <div class="p_singleTelework__head">
                        <span class="gf_robotoslab fw700 lt2 fz_13 p_singleArticle__mainterm">telework</span>
                        <h1 class="fz_36 fw700 p_singleTelework__ttl"><div class="an_block__reveal noremain_inline"><span>
                            <?php
                            $title = get_the_title($post->ID);
                            $title = str_replace("  ", "</span></div><div class='an_block__reveal noremain_inline'><span>", $title);
                            echo $title;
                            ?>
                        </span></div></h1>
                    </div>
                    <h3 class="ac_tele__headLogo single"><a href="<?php echo home_url(); ?>/telework/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telework_logo.svg" width="200" alt="紀南のテレワーク"></a></h3>
                </div>
            </header>

            <div class="p_singleTelework__row">

                <div class="p_singleTelework__info">
                    <time datetime="<?php the_time('c');?> " class="fz_16 fw700 p_singleTelework__date"><?php echo get_post_time('M j, Y'); ?></time>
                    <?php
                    $articletags = get_the_terms($post->ID, 'articletag');
                    if(!empty($articletags)){
                        if(!is_wp_error( $articletags )){
                            echo '<ul class="fz_13 p_singleTelework__tag">';
                            foreach($articletags as $articletag){
                                echo '<li>'.$articletag->name.'</li>';
                                // echo '<li><a href="'.get_term_link($articletag->slug, $articletag->taxonomy).'">'.$articletag->name.'</a></li>';
                            }
                            echo '</ul>';
                        }
                    }
                    ?>
                </div>
                <div class="fz_16 postEntry p_singleTelework__postEntry">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

        <aside class="p_singleArticle__footer">
            <div class="sns_section post">
                <div class="sns_wrap">
                    <span id="score-facebook" class="snsbtn count_mode">
                        <div class="fb-like" data-href="<?php echo the_permalink(); ?>" data-send="false" data-layout="box_count" data-show-faces="false" data-share="false"></div>
                    </span>
                    <span id="score-facebook" class="snsbtn icon_mode facebook">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(the_permalink()); ?>" class="btn" target="_blank">
                            <i class="icn fab fa-facebook-f"></i><span class="txt">シェア</span>
                        </a>
                    </span>
                    <span id="score-twitter" class="snsbtn icon_mode twitter">
                        <a href="//twitter.com/share?url=<?php echo urlencode(the_permalink()); ?>&amp;text=<?php echo urlencode(bloginfo('name')); ?><?php echo urlencode(the_title()); ?>" class="btn" target="_blank">
                            <i class="icn fab fa-twitter"></i><span class="txt">シェア</span>
                        </a>
                    </span>
                    <span id="score-google" class="snsbtn icon_mode google">
                        <a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" class="btn" target="_blank">
                            <i class="icn fab fa-google-plus-g"></i><span class="txt">シェア</span>
                        </a>
                    </span>
                    <span id="score-line" class="snsbtn icon_mode line">
                        <a href="http://line.me/R/msg/text/?<?php echo urlencode(bloginfo('name')); ?><?php echo urlencode(the_title()); ?><?php echo urlencode(the_permalink()); ?>" class="btn" target="_blank">
                            <i class="icn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/line_wh.svg" width="30" alt="line"></i><span class="txt">シェア</span>
                        </a>
                    </span>
                </div>
            </div>
        </aside>


        <nav class="fz_15 ac_tele__nav single">
            <ul>
                <li><a href="<?php echo home_url(); ?>/articlecat/telework/">テレワーク</a></li>
                <li><a href="<?php echo home_url(); ?>/articlecat/work-at-home/">在宅ワーク</a></li>
                <li><a href="<?php echo home_url(); ?>/articlecat/remotework/">リモートワーク</a></li>
                <li><a href="<?php echo home_url(); ?>/articlecat/parallel-work/">副業・パラレルワーク</a></li>
                <li><a href="<?php echo home_url(); ?>/articlecat/itskill/">ITスキル</a></li>
                <li><a href="<?php echo home_url(); ?>/articlecat/work-style/">働き方</a></li>
            </ul>
        </nav>

        <?php
        $args = array(
            'post_type'=> 'article',
            'post_status'=> 'publish',
            'ignore_sticky_posts'=> 1,
            'posts_per_page'=> 6,
            'tax_query' => array(
                array(
                    'taxonomy'=>'articlecat',
                    'terms'=>'telework',
                    'field'=>'slug',
                    'operator'=>'IN'
                ),
                'relation' => 'AND'
            ),
        );
        $telework = get_posts( $args );
        ?>

        <?php if($telework):?>
            <section class="ac_tele__article s_telework">
                <div class="l_row">
                    <div class="md_article__wrap">
                        <?php foreach($telework as $post) : setup_postdata( $post );?>
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
                        <?php endforeach; wp_reset_postdata();?>
                    </div>
                    <div class="md_article__more">
                        <a href="<?php echo home_url(); ?>/articlecat/telework/" class="md_article__moreBtn"><span class="bd">もっと見る</span><span class="arrow"></span></a>
                    </div>
                </div>
            </section>
        <?php endif; ?>


    <?php endwhile; ?>
<?php endif; ?>





<?php get_footer(); ?>

