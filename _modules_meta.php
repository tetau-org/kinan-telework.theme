<?php $title_default = '紀南のテレワーク | 紀南Good' ; ?>
<?php
if(!empty($post->post_content)){
    if(has_excerpt()){
        $desc = $post->post_excerpt;
    } else{
        $desc = $post->post_content;
    }
}else{
    $desc = get_bloginfo('description');
}
$desc = stripslashes($desc);
$desc = strip_tags($desc);
$desc = str_replace(array("\r\n","\r","\n"," ","　"," "), '', $desc );
$desc = trim($desc);
?>
<?php if (is_home() || is_front_page()) : ?>
    <meta name="description" content="自分らしくはたらく、はたらける。本州最南端の紀南のテレワーク | 紀南Good。紀南の「地域の良いモノ・ヒト・コト・バ」を発信というテーマで多世代・他業種の方々を繋ぐハブとなるメディア" />
    <title><?php echo $title_default ; ?></title>
    <?php elseif( is_singular( 'article' )):?>
        <meta name="description" content="<?php the_title();?> <?php echo mb_substr($desc, 0, 160); ?>" />
        <title><?php the_title();?> | <?php bloginfo('name'); ?></title>
    <?php elseif(is_post_type_archive( 'article' ) | is_tax( 'articlecat')): ?>
        <meta name="description" content="" />
        <title>紀南のテレワークのアーカイブページです。 | <?php bloginfo('name'); ?></title>
    <?php else: ?>
        <meta name="description" content="<?php bloginfo('name'); ?>の<?php the_title(); ?>ページです。<?php echo mb_substr($desc, 0, 160); ?>" />
        <title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
<?php endif; ?>
