<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend><?php _e('Print PDF Help', 'printpdf'); ?></legend>
                <h3><?php _e('What does Print PDF plugin do?', 'printpdf');?></h3>
                <p><?php _e('It display a button to view/download a printable PDF with the information of the ad. Useful to quick share items with other people, print it and place anywhere.', 'printpdf');?></p>
                <br/>
                <h3><?php _e('IMPORTANT', 'printpdf');?></h3>
                <p><?php _e('In order to work, you will need to place the following lines whereever you want to display the button.', 'printpdf');?></p>
                <pre>&lt;?php show_printpdf(); ?&gt;</pre>
                <br />
                <p><?php _e('It will also display a QR Code in the PDF if the QR Code plugin is installed.', 'printpdf');?></p>
                <br />
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
