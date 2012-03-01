<?php
/*
Plugin Name: Time elapsed
Plugin URI: http://www.opensourceclassifieds.org/
Description: This plugin shows the times takes to render each page.
Version: 1.0
Author: OpenSourceClassifieds
Author URI: http://www.opensourceclassifieds.org/
Plugin update URI: http://www.opensourceclassifieds.org/files/plugins/time_elapsed/update.php
*/

function time_elapsed_info() {
	return array(
		'name' => 'Time elapsed',
		'description' => 'This plugin shows the times takes to render each page.',
		'version' => 2.1,
		'author_name' => 'OpenSourceClassifieds',
		'author_url' => 'http://www.opensourceclassifieds.org/',
		'hooks' => array('header', 'footer')
	);
}

$timer = null;

function time_elapsed_header() {
	global $timer;
	$timer = microtime();
}

function time_elapsed_footer() {
	global $timer;
	echo '<!-- time to load: ', microtime() - $timer , ' -->', PHP_EOL;
}

osc_register_plugin(osc_plugin_path(__FILE__), '');
osc_add_hook('footer', 'time_elapsed_footer');
osc_add_hook('header', 'time_elapsed_header');


function _info()
{
	return array(
		'name' => '',
		'description' => '',
		'main_url' => 'http://www.opensourceclassifieds.org',
		'update_url' => 'http://update.opensourceclassifieds.org/plugins/',
		'version' => '',
		'author_name' => 'OpenSourceClassifieds',
		'author_url' => 'http://www.opensourceclassifieds.org'
	);
}


