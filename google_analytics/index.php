<?php

function getPluginInfo_google_analytics()
{
	return array(
		'name' => 'Google Analytics',
		'description' => 'Adds analytics tracking script at the footer of every page',
		'main_url' => 'http://www.opensourceclassifieds.org',
		'update_url' => 'http://update.opensourceclassifieds.org/plugins/',
		'author_name' => 'OpenSourceClassifieds',
		'author_url' => 'http://www.opensourceclassifieds.org',
	);
}

function google_analytics_call_after_install()
{
	$fields = array();
	$fields["s_section"] = 'plugin-google_analytics' ;
	$fields["s_name"] = 'google_analytics_id' ;
	$fields["e_type"] = 'STRING' ;

	$conn = getConnection(); 
	$conn->autocommit(true);
	ClassLoader::getInstance()->getClassInstance( 'Model_Preference' )->insert($fields) ;
}

function google_analytics_call_after_uninstall()
{
	$conn = getConnection(); 
	$conn->autocommit(true);
	ClassLoader::getInstance()->getClassInstance( 'Model_Preference' )->delete( array("s_section" => "plugin-google_analytics", "s_name" => "google_analytics_id") ) ;
}

function google_analytics_admin()
{
	osc_admin_render_plugin('google_analytics/admin.php') ;
}

function osc_google_analytics_id()
{
	return(osc_get_preference('google_analytics_id', 'plugin-google_analytics')) ;
}

/**
* This function is called every time the page footer is being rendered
*/
function google_analytics_footer()
{
	$id = osc_google_analytics_id();
	if( !empty( $id ) )
	{
		require osc_plugins_path() . '/google_analytics/footer.php' ;
	}
}

// This is needed in order to be able to activate the plugin
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_register_plugin(osc_plugin_path(__FILE__), 'google_analytics_call_after_install') ;
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'google_analytics_call_after_uninstall') ;
osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'google_analytics_admin') ;
osc_add_hook('footer', 'google_analytics_footer') ;

