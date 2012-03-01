<?php
/*
Plugin Name: Dating attributes
Plugin URI: http://www.opensourceclassifieds.org/
Description: This plugin extends a category of items to store dating attributes such as gender you're looking for and the type of relation.
Version: 2.1.2
Author: OpenSourceClassifieds
Author URI: http://www.opensourceclassifieds.org/
Short Name: dating_plugin
Plugin update URI: http://www.opensourceclassifieds.org/files/plugins/dating_attributes/update.php
*/

// Adds some plugin-specific search conditions
function dating_search_conditions($params) {
    // we need conditions and search tables (only if we're using our custom tables)
        $has_conditions = false;
        foreach($params as $key => $value) {
            // We may want to  have param-specific searches
            switch($key) {
                case 'genderFrom':
                    ClassLoader::getInstance()->getClassInstance( 'Model_Search' )->addConditions(sprintf("%st_item_dating_attr.e_gender_to = '%s'", DB_TABLE_PREFIX, $value));
                    $has_conditions = true;
                    break;
                case 'genderTo':
                    ClassLoader::getInstance()->getClassInstance( 'Model_Search' )->addConditions(sprintf("%st_item_dating_attr.e_gender_from = '%s'", DB_TABLE_PREFIX, $value));
                    $has_conditions = true;
                    break;
                case 'relation':
                    ClassLoader::getInstance()->getClassInstance( 'Model_Search' )->addConditions(sprintf("%st_item_dating_attr.e_relation = '%s'", DB_TABLE_PREFIX, $value));
                    $has_conditions = true;
                    break;
                default:
                    break;
            }
        }
        
        // Only if we have some values at the params we add our table and link with the ID of the item.
        if($has_conditions) {
            ClassLoader::getInstance()->getClassInstance( 'Model_Search' )->addConditions(sprintf("%st_item.pk_i_id = %st_item_dating_attr.fk_i_item_id ", DB_TABLE_PREFIX, DB_TABLE_PREFIX));
            ClassLoader::getInstance()->getClassInstance( 'Model_Search' )->addTable(sprintf("%st_item_dating_attr", DB_TABLE_PREFIX));
        }
    
}

function dating_call_after_install() {
    // Insert here the code you want to execute after the plugin's install
    // for example you might want to create a table or modify some values

    // In this case we'll create a table to store the Example attributes
    $conn = getConnection();

    $conn->autocommit(false);
    try {
        $path = osc_plugin_resource('dating_attributes/struct.sql');
        $sql = file_get_contents($path);
        $conn->osc_dbImportSQL($sql);
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
    $conn->autocommit(true);
}

function dating_call_after_uninstall() {
    // Insert here the code you want to execute after the plugin's uninstall
    // for example you might want to drop/remove a table or modify some values
	
    // In this case we'll remove the table we created to store Example attributes
    $conn = getConnection();
    $conn->autocommit(false);
    try {
        $conn->osc_dbExec("DELETE FROM %st_plugin_category WHERE s_plugin_name = 'dating_plugin'", DB_TABLE_PREFIX);
        $conn->osc_dbExec('DROP TABLE %st_item_dating_attr', DB_TABLE_PREFIX);
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
    $conn->autocommit(true);
}

function dating_form($catId = '') {
    // We received the categoryID
    if($catId!="") {
        // We check if the category is the same as our plugin
        if(osc_is_this_category('dating_plugin', $catId)) {
            require_once 'item_edit.php';
        }
    }
}

function dating_search_form($catId = null) {
    // We received the categoryID
    if($catId!=null) {
        // We check if the category is the same as our plugin
        foreach($catId as $id) {
    		if(osc_is_this_category('dating_plugin', $id)) {
	    		include_once 'search_form.php';
	    		break;
	    	}
        }
    }
}

function dating_form_post($catId = null, $item_id = null) {
    // We received the categoryID and the Item ID
    if($catId!=null) {
        // We check if the category is the same as our plugin
        if(osc_is_this_category('dating_plugin', $catId) && $item_id!=null) {
                // Insert the data in our plugin's table
                $conn = getConnection();
                $conn->osc_dbExec("INSERT INTO %st_item_dating_attr (fk_i_item_id, e_gender_from, e_gender_to, e_relation) VALUES (%d, '%s', '%s', '%s')", DB_TABLE_PREFIX, $item_id, Params::getParam('genderFrom'), Params::getParam('genderTo'), Params::getParam('relation'));
        }
    }
}

// Self-explanatory
function dating_item_detail() {
    if(osc_is_this_category('dating_plugin', osc_item_category_id())) {
        $conn = getConnection();
        $detail = $conn->osc_dbFetchResult("SELECT * FROM %st_item_dating_attr WHERE fk_i_item_id = %d", DB_TABLE_PREFIX, osc_item_id());
        require_once 'item_detail.php';
    }
}

// Self-explanatory
function dating_item_edit($catId = null, $item_id = null) {
    if(osc_is_this_category('dating_plugin', $catId)) {
        $conn = getConnection();
        $detail = $conn->osc_dbFetchResult("SELECT * FROM %st_item_dating_attr WHERE fk_i_item_id = %d", DB_TABLE_PREFIX, $itemId);

        if( isset($detail['fk_i_item_id']) ) {
            include_once 'item_edit.php';
        }
    }
}

function dating_item_edit_post($catId = null, $item_id = null) {
    // We received the categoryID and the Item ID
    if($catId!=null) {
        // We check if the category is the same as our plugin
        if(osc_is_this_category('dating_plugin', $catId) && $item_id!=null) {
            $conn = getConnection();
            $conn->osc_dbExec("REPLACE INTO %st_item_dating_attr (fk_i_item_id, e_gender_from, e_gender_to, e_relation) VALUES(%d, '%s', '%s', '%s')", DB_TABLE_PREFIX, $item_id, Params::getParam('genderFrom'), Params::getParam('genderTo'), Params::getParam('relation') );
        }
    }
}

function dating_delete_item($item) {
    $conn = getConnection();
    $conn->osc_dbExec("DELETE FROM %st_item_dating_attr WHERE fk_i_item_id = '" . $item . "'", DB_TABLE_PREFIX);
}


function dating_admin_configuration() {
    // Standard configuration page for plugin which extend item's attributes
    osc_plugin_configure_view(osc_plugin_path(__FILE__));
}

function datting_pre_item_post() {

    Session::newInstance()->_setForm('pd_genderFrom' , Params::getParam('genderFrom'));
    Session::newInstance()->_setForm('pd_genderTo'   , Params::getParam('genderTo'));
    Session::newInstance()->_setForm('pd_relation'   , Params::getParam('relation'));
    // keep values on session
    Session::newInstance()->_keepForm('pd_genderFrom');
    Session::newInstance()->_keepForm('pd_genderTo');
    Session::newInstance()->_keepForm('pd_relation');
}

// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'dating_call_after_install');
// This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'dating_admin_configuration');
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'dating_call_after_uninstall');

// When publishing an item we show an extra form with more attributes
osc_add_hook('item_form', 'dating_form');
// To add that new information to our custom table
osc_add_hook('item_form_post', 'dating_form_post');

// When searching, display an extra form with our plugin's fields
osc_add_hook('search_form', 'dating_search_form');
// When searching, add some conditions
osc_add_hook('search_conditions', 'dating_search_conditions');

// Show an item special attributes
osc_add_hook('item_detail', 'dating_item_detail');

// Edit an item special attributes
osc_add_hook('item_edit', 'dating_item_edit');
// Edit an item special attributes POST
osc_add_hook('item_edit_post', 'dating_item_edit_post');

//Delete item
osc_add_hook('delete_item', 'dating_delete_item');

// previous to insert item
osc_add_hook('pre_item_post', 'datting_pre_item_post') ;

?>
