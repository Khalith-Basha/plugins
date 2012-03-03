
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 0 20px 20px;">
        <div>
            <fieldset>
                <legend>
                    <h1><?php _e('Breadcrumbs Help', 'breadcrumbs'); ?></h1>
                </legend>
                <h2>
                    <?php _e('What is Breadcrumbs Plugin?', 'breadcrumbs'); ?>
                </h2>
                <p>
                    <?php _e('Breadcrumbs plugin allows you to show a breadcrumbs-style navigation bar on any part of your site you want, something like <blockquote>OpenSourceClassifieds / Category / Subcategory / Item title</blockquote>', 'breadcrumbs'); ?>
                </p>
                <h2>
                    <?php _e('How does Breadcrumbs plugin work?', 'breadcrumbs'); ?>
                </h2>
                <p>
                    <?php _e('In order to use Breadcrumbs plugin, you should edit your theme files and add the following line anywhere in the code you want the breadcrumb-style navigation bar to appear', 'breadcrumbs'); ?>:
                </p>
                <pre>
                    &lt;?php breadcrumbs(); ?&gt;
                </pre>
                <h2>
                <?php _e('Could I cutomize the style of Breadcrumbs plugin?', 'breadcrumbs'); ?>
                </h2>
                <p>
                    <?php _e("Of course you can. The main crumb has a style class of 'bc_root'. The last crumb of 'bc_last'. The middle crumbs have classes as 'bc_level_X' where X is the number of depth. For example 'OpenSourceClassifieds / category / subcategory / item_title' has style classes as 'bc_root / bc_level_1 / bc_level_2 / bc_last'. You should modify your theme's .css file to change the style", 'breadcrumbs'); ?>. 
                </p>
                <p>
                    <?php _e("You could also specify the separator you want. The default one is '/', but you could feel more comfortable with '&raquo;', ':', etc. For example:", 'breadcrumbs'); ?>
                </p>
                <pre>
                    &lt;?php breadcrumbs('&raquo;'); ?&gt;
                </pre>
            </fieldset>
        </div>
    </div>
</div>
