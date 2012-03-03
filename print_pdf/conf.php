<?php

    if(Params::getParam('plugin_action')=='done') {
        osc_set_preference('upload_path', Params::getParam('upload_path'), 'printpdf', 'STRING');
        echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The plugin is now configured', 'printpdf') . '.</p></div>' ;
        osc_reset_preferences();
    }
?>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend><?php _e('Print PDF Settings', 'printpdf'); ?></legend>
                <form name="printpdf_form" id="printpdf_form" action="<?php echo osc_admin_base_url(true); ?>" method="POST" enctype="multipart/form-data" >
                    <div style="float: left; width: 100%;">
                    <input type="hidden" name="page" value="plugins" />
                    <input type="hidden" name="action" value="renderplugin" />
                    <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>conf.php" />
                    <input type="hidden" name="plugin_action" value="done" />
                        <label for="upload_path"><?php _e('Upload path', 'printpdf'); ?></label>
                        <br/>
                        <input type="text" name="upload_path" id="upload_path" value="<?php echo osc_get_preference('upload_path', 'printpdf'); ?>"/>
                        <br/>
                        <span style="float:right;"><button type="submit" style="float: right;"><?php _e('Update', 'printpdf');?></button></span>
                    </div>
                    <br/>
                    <div style="clear:both;"></div>
                </form>
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
