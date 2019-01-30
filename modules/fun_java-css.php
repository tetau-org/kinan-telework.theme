<?php

	//jquery デフォルトの読み込みcdnに変更
	function include_jquery_cdn_loader() {
			if( !is_admin() ){
				//WP Default jQuery Load Deregister.
				wp_deregister_script('jquery');
				//jQuery CDN
				$jsCore = '//code.jquery.com/jquery-3.3.1.min.js';
				$jsMigrate = '//code.jquery.com/jquery-migrate-1.2.1.min.js';
				//jQuery CDN Check
				$core_url = @fopen('http:'.$jsCore, 'r');
				//jQuery CDN Server Down
				if( $core_url === false ){
							$jsCore = home_url( '/' ).'wp_dir/wp-includes/js/jquery/jquery.js';
				}
				wp_register_script( 'jquery', $jsCore, array(), null, false );
				wp_enqueue_script( 'jquery' );
				$migrate_url = @fopen('http:'.$jsMigrate, 'r');
				//jQuery Migrate CDN Server Down
				// if( $migrate_url === false ){
				// 			$jsMigrate = home_url( '/' ).'wp_dir/wp-includes/js/jquery/jquery-migrate.min.js';
				// }
				// wp_register_script( 'jquery_migrate', $jsMigrate, array(), null, false );
				// wp_enqueue_script( 'jquery_migrate' );
		}
	}
	add_action('wp_enqueue_scripts', 'include_jquery_cdn_loader');

?>
