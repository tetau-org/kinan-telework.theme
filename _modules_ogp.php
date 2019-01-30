<?php
	if(!empty($post->post_content)){
		if(has_excerpt()){
			$desc = $post->post_excerpt;
		} else{
			$desc = strip_tags(apply_filters('the_content', $post->post_content));
		}
	}else{
		$desc = get_bloginfo('description');
	}
	$desc = str_replace(array("&nbsp;","\r\n","\r","\n"," ","　","	"), '', $desc );
	$current_url = esc_url( home_url() . $_SERVER['REQUEST_URI'] );
?>
<?php if( is_home()):?>
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp1200x630.jpg" />
<meta property="og:url" content="<?php echo $current_url  ?>" />
<?php elseif(is_singular( 'post' )) : ?>
	<?php
	$postid = get_the_id();
	$post_thumbnail_id = get_post_thumbnail_id(get_the_id());
	$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$attachments = get_children("post_parent=$postid&post_type=attachment&post_mime_type=image&numberposts=4&order=asc");
	$template_uri = get_template_directory_uri();
		if ($attachments){
			if (has_post_thumbnail()){
				$post_thumbnail_id = get_post_thumbnail_id();
				$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
				echo '<meta property="og:image" content="' . esc_attr($image[0]) . '">'."\n";
			} else {
				if (is_array($attachments) ){
					$i = 0;
					$count = 4;
					foreach($attachments as $attachment) :
						if($i >= $count){
							break;
						} else {
						$thumbM = wp_get_attachment_image_src($attachment->ID , 'full');
						echo '<meta property="og:image" content="' . $thumbM[0] . '" />'."\n";
						$i++;
						}
					endforeach;
				}
			}
		} else {
			echo '<meta property="og:image" content="' . esc_html($template_uri) . '/assets/images/ogp1200x630.jpg" />'."\n";
		}
	?>
<meta property="og:url" content="<?php echo $current_url  ?>" />
<?php else: ?>
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $current_url  ?>" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/ogp1200x630.jpg" />
<?php endif; ?>

<?php if( is_home()):?>
<meta property="og:title" content="紀南のテレワーク | 紀南Good" />
<meta property="og:description" content="自分らしくはたらく、はたらける。本州最南端の紀南のテレワーク | 紀南Good。紀南の「地域の良いモノ・ヒト・コト・バ」を発信というテーマで多世代・他業種の方々を繋ぐハブとなるメディア"/>
<?php elseif( is_singular( 'article' )):?>
<meta property="og:title" content="<?php the_title();?>" />
<meta property="og:description" content="<?php echo mb_substr($desc, 0, 160); ?>"/>
<?php else: ?>
<meta property="og:title" content="<?php bloginfo('name'); ?> <?php the_title(); ?>" />
<meta property="og:description" content="<?php bloginfo('name'); ?>の<?php the_title(); ?>ページです。<?php echo mb_substr($desc, 0, 160); ?>"/>
<?php endif; ?>
<meta property="og:site_name" content="紀南のテレワーク" />

