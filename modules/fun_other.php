<?php

//   ---------------------------------------
//    その他の設定
//  ----------------------------------------


    //投稿ページ 独自css
add_editor_style(get_template_directory_uri(). '/assets/css/editor-style.css' );


    //偶数番目の記事に○○○する
function is_even_post(){
    global $wp_query;
    return ((($wp_query->current_post+1) % 2) === 0);
}


//スマートフォンを判別
function is_mobile(){
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

/*------------
 editor-style.cssのキャッシュクリア
------------*/
function extend_tiny_mce_before_init( $mce_init ) {

    $mce_init['cache_suffix'] = 'v='.time();

    return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );

//TinyMCE追加用のスタイルを初期化
//http://com4tis.net/tinymce-advanced-post-custom/
if ( !function_exists( 'initialize_tinymce_styles' ) ):
function initialize_tinymce_styles($init_array) {
  //追加するスタイルの配列を作成
  $style_formats = array(
    array(
      'title' => '大見出し',
      'block' => 'h2',
      'classes' => 'postentry_h2'
    ),
    array(
      'title' => '中見出し',
      'block' => 'h3',
      'classes' => 'postentry_h3'
    ),
    array(
      'title' => '小見出し',
      'block' => 'h4',
      'classes' => 'postentry_h4'
    ),
    array(
      'title' => '区切りスペース',
      'block' => 'div',
      'classes' => 'postentry_blank'
    ),
    array(
      'title' => '区切り線',
      'block' => 'div',
      'classes' => 'postentry_line'
    ),
    array(
      'title' => '目次',
      'block' => 'nav',
      'classes' => 'postentry_toc',
      'wrapper' => true
    ),
  );
  //JSONに変換
  $init_array['style_formats'] = json_encode($style_formats);
  return $init_array;
}
endif;
add_filter('tiny_mce_before_init', 'initialize_tinymce_styles', 10000);

//TinyMCEにスタイルセレクトボックスを追加
//https://codex.wordpress.org/Plugin_API/Filter_Reference/mce_buttons,_mce_buttons_2,_mce_buttons_3,_mce_buttons_4
if ( !function_exists( 'add_styles_to_tinymce_buttons' ) ):
function add_styles_to_tinymce_buttons($buttons) {
  //見出しなどが入っているセレクトボックスを取り出す
  $temp = array_shift($buttons);
  //先頭にスタイルセレクトボックスを追加
  array_unshift($buttons, 'styleselect');
  //先頭に見出しのセレクトボックスを追加
  array_unshift($buttons, $temp);
  return $buttons;
}
endif;
add_filter('mce_buttons_2','add_styles_to_tinymce_buttons');




?>
