<?php

//   ---------------------------------------
//    管理画面関係
//  ----------------------------------------


//   管理画面サイドメニュー
//  ----------------------------------------
    //【管理画面】左メニューadmin以外表示しない
    function remove_menu() {
        if (!current_user_can('administrator')) {
            //remove_menu_page('index.php'); // ダッシュボード
            remove_menu_page('edit.php'); // 投稿
            //remove_menu_page('edit.php?post_type=news'); // ポストタイプ
            remove_menu_page('upload.php'); // メディア
            //remove_menu_page('link-manager.php'); // リンク
            //remove_menu_page('edit.php?post_type=page'); // 固定ページ
            remove_menu_page('edit-comments.php'); // コメント
            //remove_menu_page('themes.php'); // 概観
            //remove_menu_page('plugins.php'); // プラグイン
            //remove_menu_page('users.php'); // ユーザー
            remove_menu_page('tools.php'); // ツール
            //remove_menu_page('options-general.php'); // 設定
            remove_menu_page('wpcf7');   //Contact Form 7
            remove_menu_page('profile.php');   //プロフィール
            //remove_submenu_page('edit.php?post_type=salon','post-new.php?post_type=salon');
        } else {
            remove_menu_page('edit.php'); // 投稿
            remove_menu_page('edit-comments.php'); // コメント
        }
    }
    add_action('admin_menu', 'remove_menu');



//   メニューの「ダッシュボード」項目を非表示にする
//  ----------------------------------------
function hide_welcome_panel() {
    $user_id = get_current_user_id();
    if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) ) {
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
}
add_action( 'load-index.php', 'hide_welcome_panel');




//   メニューの「ダッシュボード」項目を非表示にする
//  ----------------------------------------

function example_remove_dashboard_widgets() {
    global $wp_meta_boxes;
        //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
    }
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');





//   管理画面　各表示関係
//  ---------------------------------------
//【管理画面】フッター表示しない
    function custom_admin_footer() {}
        add_filter('admin_footer_text', 'custom_admin_footer');
//【管理画面】admin_bar項目別に表示しない
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('updates');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_node('wp-logo');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
//【管理画面】右サイドのヘルプ非表示
    function disable_help_link() {
        echo '<style type="text/css">#contextual-help-link-wrap {display: none !important;}</style>';
    }
    add_action('admin_head', 'disable_help_link');
//管理画面のフォントをメイリオにします。
    function meiryo_admin_css() {
        if(wp_style_is('wpmp-admin-custom')){
            wp_register_style('meiryo-admin-css', get_template_directory_uri(__FILE__) . '/css/admin.css', array('wpmp-admin-custom'), false);
            wp_enqueue_style('meiryo-admin-css');
        }
    }
    add_action('admin_enqueue_scripts', 'meiryo_admin_css', 100);
    add_action('customize_controls_enqueue_scripts', 'meiryo_admin_css', 100);
//WordPressの更新通知表示と、バージョンチェックを無効
    if( !current_user_can( 'administrator' ) ) {
        add_filter( 'pre_site_transient_update_core', '__return_zero' );
        remove_action( 'wp_version_check', 'wp_version_check' );
        remove_action( 'admin_init', '_maybe_update_core' );
    }
//【ログインロゴ】
    function custom_login_logo() {
        echo '<style type="text/css">h1 a { background: url('. get_template_directory_uri() .'/images/login-logo.png) no-repeat center center !important; }</style>';
    }
    add_action('login_head', 'custom_login_logo');




//   エディタ・投稿関係
//  ---------------------------------------


//固定ページではビジュアルエディタを利用できないようにする
    function disable_visual_editor_in_page(){
        global $typenow;
        if( $typenow == 'page' ){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
        }
    }
    function disable_visual_editor_filter(){
        return false;
    }
    add_action( 'load-post.php', 'disable_visual_editor_in_page' );
    add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );

//【管理画面】wpsbc非表示
    function disable_wpsbc_link() {
        echo '<style type="text/css">#add_wpsbc {display: none !important;}</style>';
    }
    add_action('admin_head', 'disable_wpsbc_link');


?>
