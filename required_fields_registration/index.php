<?php

function getPluginInfo_required_fields_registration()
{
	return array(
		'name' => 'Required registration fields',
	);
}

    function requiredreg_form() {
        include_once 'form.php';
    }

    function requiredreg_save($userId) {
        $userActions = new UserActions(false);
        $input = $userActions->prepareData(false) ;
        User::newInstance()->update($input, array('pk_i_id' => $userId)) ;
    }


    /**
     * ADD HOOKS
     */
    osc_register_plugin(osc_plugin_path(__FILE__), '');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", '');

    // run at registration form
    osc_add_hook('user_register_form', 'requiredreg_form');
    
    // run ONCE the user is registered
    osc_add_hook('user_register_completed', 'requiredreg_save');
    
