
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div>
            <fieldset>
                <legend>
                    <h1><?php _e("Ads for OpenSourceClassifieds Help", 'ads4osc'); ?></h1>
                </legend>
                <h2><?php _e("What is Ads for OpenSourceClassifieds Plugin?", 'ads4osc'); ?></h2>
                <p>
                    <?php _e("Ads for OpenSourceClassifieds -also known as Ads4OpenSourceClassifieds- plugin allows you to manage and show ads block from several adsvertishing networks", 'ads4osc'); ?>
                </p>
                <h2><?php _e("How does Ads4OpenSourceClassifieds plugin work?"); ?></h2>
                <p>
                    <?php _e("You need to import the HTML code from your ad using the admin-menu. Some advertishing network are supported and will offer you more options of customization", 'ads4osc'); ?>.
                </p>
                <h2><?php _e("How could I show some ads on my website"); ?></h2>
                <p>
                    <?php _e("First, create some ad in the admin-menu. then, you should edit your theme files and add the following line anywhere in the code you want an ad to appear", 'ads4osc'); ?>:
                </p>
                <pre>
                &lt;?php show_ads('title_of_the_ad'); ?&gt;
                </pre>
                <p>
                    <?php _e("Where 'title_of_the_ad' is the name of the ad(s) you want to show there. If you have several ads with the same title, they will rotate depending on their weight", 'ads4osc'); ?>.
                </p>
            </fieldset>
        </div>
    </div>
</div>
