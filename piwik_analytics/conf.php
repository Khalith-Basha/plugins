<?php

    if(Params::getParam('plugin_action')=='done') {
        osc_set_preference('js_code', Params::getParam('js_code'), 'piwik', 'STRING');
        echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The plugin is now configured', 'piwik') . '.</p></div>' ;
        osc_reset_preferences();
    }
?>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend><?php _e('Piwik Settings', 'piwik'); ?></legend>
                <form name="piwik_form" id="piwik_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
                    <div style="float: left; width: 100%;">
                    <input type="hidden" name="page" value="plugins" />
                    <input type="hidden" name="action" value="renderplugin" />
                    <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>conf.php" />
                    <input type="hidden" name="plugin_action" value="done" />
                        <label for="js_code"><?php _e('Write here the JS code for Piwik Analytics', 'piwik'); ?></label>
                        <br/>
                        <textarea name="js_code" id="js_code" rows="10" style="width:600px"><?php echo osc_get_preference('js_code', 'piwik'); ?></textarea>
                        <br/>
                        <?php _e("To get the JS code, you should first install piwik on your server. More information on http://piwik.org/",'piwik'); ?>
                        <br/>
                        <span style="float:right;"><button type="submit" style="float: right;"><?php _e('Update', 'piwik');?></button></span>
                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
