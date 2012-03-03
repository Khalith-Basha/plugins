<?php

    if(Params::getParam('plugin_action')=='done') {
        osc_set_preference('moderate_all', Params::getParam("moderate_all"), 'moreedit', 'BOOLEAN');
        osc_set_preference('moderate_edit', Params::getParam("moderate_edit"), 'moreedit', 'BOOLEAN');
        osc_set_preference('disable_edit', Params::getParam("disable_edit"), 'moreedit', 'BOOLEAN');
        osc_set_preference('max_ads_week', Params::getParam("max_ads_week"), 'moreedit', 'INTEGER');
        osc_set_preference('max_ads_month', Params::getParam("max_ads_month"), 'moreedit', 'INTEGER');
        osc_set_preference('notify_edit', Params::getParam("notify_edit"), 'moreedit', 'BOOLEAN');
        echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The plugin is now configured', 'moreedit') . '.</p></div>' ;
        osc_reset_preferences();
    }
?>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend><?php _e('More Edit Options', 'moreedit'); ?></legend>
                <form name="moreedit_form" id="moreedit_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
                    <div style="float: left; width: 50%;">
                    <input type="hidden" name="page" value="plugins" />
                    <input type="hidden" name="action" value="renderplugin" />
                    <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>conf.php" />
                    <input type="hidden" name="plugin_action" value="done" />
                        <input style="height: 20px; padding-left: 4px;padding-top: 4px;" type="checkbox" <?php echo (osc_get_preference('moderate_all', 'moreedit') ? 'checked="true"' : ''); ?> name="moderate_all" id="moderate_all" value="1" />
                        <label for="moderate_all"><?php _e('Moderate all ads (admins have to moderate them)', 'moreedit'); ?></label>
                        <br/>
                        <input style="height: 20px; padding-left: 4px;padding-top: 4px;" type="checkbox" <?php echo (osc_get_preference('moderate_edit', 'moreedit') ? 'checked="true"' : ''); ?> name="moderate_edit" id="moderate_edit" value="1" />
                        <label for="moderate_edit"><?php _e('Moderate edit (admins have to approve them, ads previouslyapproved will not be visible until new approved)', 'moreedit'); ?></label>
                        <br/>
                        <input style="height: 20px; padding-left: 4px;padding-top: 4px;" type="checkbox" <?php echo (osc_get_preference('disable_edit', 'moreedit') ? 'checked="true"' : ''); ?> name="disable_edit" id="disable_edit" value="1" />
                        <label for="disable_edit"><?php _e('Disable edit (users will not be able to edit their ads)', 'moreedit'); ?></label>
                        <br/>
                        <input style="height: 20px; padding-left: 4px;padding-top: 4px;" type="checkbox" <?php echo (osc_get_preference('notify_edit', 'moreedit') ? 'checked="true"' : ''); ?> name="notify_edit" id="notify_edit" value="1" />
                        <label for="disable_edit"><?php _e('Notify admin in case of ad editing (useful for moderation, but it could be a problem if there are many edits)', 'moreedit'); ?></label>
                        <br/>
                    </div>
                    <div style="float: left; width: 50%;">
                        <label><?php _e('Max ads published per week (0 for no limit)', 'moreedit'); ?></label><input type="text" name="max_ads_week" id="max_ads_week" value="<?php echo osc_get_preference('max_ads_week', 'moreedit'); ?>" />
                        <br/>
                        <label><?php _e('Max ads published per month (0 for no limit)', 'moreedit'); ?></label><input type="text" name="max_ads_month" id="max_ads_month" value="<?php echo osc_get_preference('max_ads_month', 'moreedit'); ?>" />
                        <br/>
                        <?php _e("Note that max ads per month should be a greater value than max ads per week.",'moreedit'); ?>
                        <br/>
                        <span style="float:right;"><button type="submit" style="float: right;"><?php _e('Update', 'moreedit');?></button></span>
                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
