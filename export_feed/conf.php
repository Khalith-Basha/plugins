<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend><?php _e('Help', 'extra_feeds'); ?></legend>
                <p>
                    <?php _e('Extra feeds plugin exports your ads in the feed format of several well-known search engines and ads agregator as Google Base, Indeed, Trovit...','extra_feeds'); ?>
                </p>
                <p>
                    <?php _e('It just works as the normal feed of your OpenSourceClassifieds site. Perform any search and add the param &sFeed={name_of_the_feed} at the end of the URL, for example http://www.example.com/index.php?page=search&sCategory=1&sFeed=indeed to export the ads of category 1 in indeed\'s format','extra_feeds'); ?>
                </p>
                <p>
                    <?php _e('Current list of supported feed:','extra_feeds'); ?>
                </p>
                <ul>
                    <li>indeed</li>
                    <li>google_cars</li>
                    <li>google_jobs</li>
                    <li>trovit_cars</li>
                    <li>trovit_houses</li>
                    <li>trovit_jobs</li>
                    <li>trovit_products</li>
                    <li>oodle_cars</li>
                    <li>oodle_jobs</li>
                    <li>oodle_realstate</li>
                </ul>
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
