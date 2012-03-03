<?php

function getPluginInfo_age_warning()
{
	return array(
		'name' => 'Age warning',
		'description' => 'Display a warning message about adult content',
		'main_url' => 'http://www.opensourceclassifieds.org',
		'update_url' => 'http://update.opensourceclassifieds.org/plugins/',
		'version' => '',
		'author_name' => 'OpenSourceClassifieds',
		'author_url' => 'http://www.opensourceclassifieds.org'
	);
}



    function agewarning_install() {
    }

    function agewarning_uninstall() {
    }

    function agewarning_splash() {
        if (ClassLoader::getInstance()->getClassInstance( 'Session' )->_get("agewarning_accepted") != '1' &&
        ClassLoader::getInstance()->getClassInstance( 'Cookie' )->get_value('agewarning_accepted') != '1'&&
        !osc_is_web_user_logged_in() &&
        Params::getParam('action')!='renderplugin') {
            if(Params::getParam('file')!=osc_plugin_folder(__FILE__) . 'warning.php' && Params::getParam('file')!=osc_plugin_folder(__FILE__) . 'confirm.php') {
                ClassLoader::getInstance()->getClassInstance( 'Session' )->_set('agew_backto', $_SERVER['REQUEST_URI']);
                // @TODO FIX header("Location: ".osc_render_file_url(osc_plugin_folder(__FILE__) . 'warning.php'));
                exit;
            } else if(Params::getParam('file')==osc_plugin_folder(__FILE__) . 'confirm.php') {
                $url = ClassLoader::getInstance()->getClassInstance( 'Session' )->_get('agew_backto');
                ClassLoader::getInstance()->getClassInstance( 'Session' )->_set("agewarning_accepted", "1");
                ClassLoader::getInstance()->getClassInstance( 'Cookie' )->push("agewarning_accepted", "1");
                ClassLoader::getInstance()->getClassInstance( 'Cookie' )->set();
                ClassLoader::getInstance()->getClassInstance( 'Session' )->_drop('agew_backto');
                header("Location: ".$url);
                exit;
            }
        }
    }


    /**
     * ADD HOOKS
     */
    osc_register_plugin(osc_plugin_path(__FILE__), 'agewarning_install');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'agewarning_uninstall');

    osc_add_hook('before_html', 'agewarning_splash');
    

