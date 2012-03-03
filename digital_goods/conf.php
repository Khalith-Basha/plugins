<?php

    if(Params::getParam('plugin_action')=='done') {
        osc_set_preference('max_files', Params::getParam('max_files'), 'digitalgoods', 'INTEGER');
        osc_set_preference('allowed_ext', Params::getParam('allowed_ext'), 'digitalgoods', 'STRING');
        echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The plugin is now configured', 'digitalgoods') . '.</p></div>' ;
        osc_reset_preferences();
    }
?>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend><?php _e('Digital Goods Settings', 'digitalgoods'); ?></legend>
                <form name="digitalgoods_form" id="digitalgoods_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
                    <div style="float: left; width: 100%;">
                    <input type="hidden" name="page" value="plugins" />
                    <input type="hidden" name="action" value="renderplugin" />
                    <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>conf.php" />
                    <input type="hidden" name="plugin_action" value="done" />
                        <label for="max_files"><?php _e('Number of max files per ad (0 for unlimited)', 'digitalgoods'); ?></label>
                        <br/>
                        <input type="text" name="max_files" id="max_files" value="<?php echo osc_get_preference('max_files', 'digitalgoods'); ?>"/>
                        <br/>
                        <label for="allowed_ext"><?php _e('Allowed filetypes (separated by comma)', 'digitalgoods'); ?></label>
                        <br/>
                        <input type="text" name="allowed_ext" id="allowed_ext" value="<?php echo osc_get_preference('allowed_ext', 'digitalgoods'); ?>"/>
                        <br/>
                        <span style="float:right;"><button type="submit" style="float: right;"><?php _e('Update', 'digitalgoods');?></button></span>
                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
