<?php
/*
Plugin Name: Piwik Web Analytics
Plugin URI: http://www.opensourceclassifieds.org/
Description: Enable Piwik Web Analytics
Version: 0.9
Author: OpenSourceClassifieds
Author URI: http://www.opensourceclassifieds.org/
Short Name: piwik
*/


    function piwik_install() {
        osc_set_preference('js_code', '', 'piwik', 'STRING');
    }

    function piwik_uninstall() {
        osc_delete_preference('js_code', 'piwik');
    }
    
    function piwik_footer() {
        echo osc_get_preference('js_code', 'piwik');
    }

    function piwik_admin_menu() {
        echo '<h3><a href="#">Piwik Analytics</a></h3>
        <ul> 
            <li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'conf.php') . '">&raquo; ' . __('Settings', 'piwik') . '</a></li>
        </ul>';
    }


    /**
     * ADD HOOKS
     */
    osc_register_plugin(osc_plugin_path(__FILE__), 'piwik_install');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'piwik_uninstall');

    osc_add_hook('admin_menu', 'piwik_admin_menu');
    osc_add_hook('footer', 'piwik_footer');
    
?>
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


