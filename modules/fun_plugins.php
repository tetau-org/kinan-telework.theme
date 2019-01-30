<?php

//   ---------------------------------------
//    プラグイン関係
//  ----------------------------------------

		//JS,CSS出力関係
		add_action('wp_print_styles','lm_dequeue_header_styles');
		function lm_dequeue_header_styles(){
			//wp_dequeue_style('yarppWidgetCss');//YARPP CSS出力させない
			//wp_dequeue_style('wordpress-popular-posts');//WPP CSS出力させない
			//wp_dequeue_script('wordpress-popular-posts-admin-script');
		}
		remove_action( 'wp_head', 'print_ajax' );


		// add_action('get_footer','lm_dequeue_footer_styles');
		// function lm_dequeue_footer_styles(){
		// 	wp_dequeue_style('yarppRelatedCss');
		// }

		//Contactform head 出力
			add_filter( 'wpcf7_load_js', '__return_false' );
			add_filter( 'wpcf7_load_css', '__return_false' );


?>
