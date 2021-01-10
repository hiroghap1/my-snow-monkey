<?php
/**
 * Plugin name: My Snow Monkey
 * Description: このプラグインに、あなたの Snow Monkey 用カスタマイズコードを書いてください。
 * Version: 0.2.1
 *
 * @package my-snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

// スタイルとスクリプトの読み込み
add_action('wp_enqueue_scripts',
    function () {
        wp_enqueue_style('style', MY_SNOW_MONKEY_URL.'css/style.css',array(),date_i18n( 'YmdHis'));
        wp_enqueue_script('script', MY_SNOW_MONKEY_URL.'js/main.js', array(), false, true);
    },
    11, 2);

add_action('admin_enqueue_scripts',
    function () {
        wp_enqueue_style('admin_style', MY_SNOW_MONKEY_URL.'css/style.css');
    },
    10, 2);

// Google fonts 読み込み
//add_action('wp_head',
//    function () {
//        ?>
<!--        <link rel="preconnect" href="https://fonts.gstatic.com">-->
<!--        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=M+PLUS+Rounded+1c:wght@500;800&display=swap"-->
<!--              rel="stylesheet">-->
<!--        --><?php
//    });
