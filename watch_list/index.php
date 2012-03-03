<?php

function getPluginInfo_watch_list()
{
	return array(
		'name' => 'Watch list',
		'description' => 'Lets user to watch favourite items',
		'main_url' => 'http://www.opensourceclassifieds.org',
		'update_url' => 'http://update.opensourceclassifieds.org/plugins/',
		'author_name' => 'Richard Martin (keny)',
		'author_url' => 'http://www.proodi.com'
	);
}


    define('WATCHLIST_VERSION', '1.0.3') ;

    function watchlist() {
        echo '<a href="javascript://" class="watchlist" id="' . osc_item_id() . '">' ;
        echo '<span>' . __('Add to watchlist', 'watchlist') . '</span>' ;
        echo '</a>' ;
    }

    function watchlist_user_menu() {
        echo '<li class="" ><a href="' . osc_render_file_url(osc_plugin_folder(__FILE__) . 'watchlist.php') . '" >' . __('Watchlist', 'watchlist') . '</a></li>' ;
    }

    function watchlist_call_after_install() {
        $conn = getConnection() ;
        $path = osc_plugin_resource('watchlist/struct.sql') ;
        $sql  = file_get_contents($path) ;
        $conn->osc_dbImportSQL($sql) ;
    }

    function watchlist_call_after_uninstall() {
        $conn = getConnection() ;
        $conn->osc_dbExec('DROP TABLE %st_item_watchlist', DB_TABLE_PREFIX) ;
    }

    function watchlist_header() {
        echo '<!-- Watchlist js -->' ;
        echo '<script type="text/javascript">' ;
        echo 'var watchlist_url = "' . osc_ajax_plugin_url('watchlist/ajax_watchlist.php') . '" ;' ;
        echo '</script>' ;
        echo '<script type="text/javascript" src="' . osc_plugin_url('watchlist/js/watchlist.js') . 'watchlist.js"></script>' ;
        echo '<!-- Watchlist js end -->' ;
    }

    function watchlist_delete_item($item) {
        $conn = getConnection() ;
        $conn->osc_dbExec("DELETE FROM %st_item_watchlist WHERE fk_i_item_id = '$item'", DB_TABLE_PREFIX) ;
    }

    function watchlist_help() {
        osc_admin_render_plugin(osc_plugin_path(dirname(__FILE__)) . '/help.php') ;
    }

    // This is needed in order to be able to activate the plugin
    osc_register_plugin(osc_plugin_path(__FILE__), 'watchlist_call_after_install') ;

    // This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', 'watchlist_call_after_uninstall') ;

    // This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__) . '_configure', 'watchlist_help') ;

    // Add link in user menu page
    osc_add_hook('user_menu', 'watchlist_user_menu') ;

    // add javascript
    osc_add_hook('header', 'watchlist_header') ;

    //Delete item
    osc_add_hook('delete_item', 'watchlist_delete_item') ;

