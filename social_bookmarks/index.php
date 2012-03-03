<?php

function getPluginInfo_social_bookmarks()
{
	return array(
		'name' => 'Social bookmarks',
		'description' => 'Adds social bookmarks links',
		'main_url' => 'http://www.opensourceclassifieds.org',
		'update_url' => 'http://update.opensourceclassifieds.org/plugins/',
		'author_name' => 'OpenSourceClassifieds',
		'author_url' => 'http://www.opensourceclassifieds.org'
	);
}

    function social_bookmarks($content) {
        $content .= '<div class="social-bookmarks">' ;
        $content .= '<ul>' ;
        // twitter
        $content .= '<li class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>' ;
        // facebook
        $content .= '<li class="facebook"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="" send="false" layout="button_count" show_faces="false" font=""></fb:like></li>' ;
        // google plus
        $content .= '<li class="google-plus"><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="medium"></g:plusone></li>' ;
        $content .= '</ul>' ;
        // clear
        $content .= '<div class="clear"></div>' ;
        $content .= '</div>';
        return $content ;
    }
    
    function social_bookmarks_header( ) {
        $location   = ClassLoader::getInstance()->getClassInstance( 'Rewrite' )->get_location() ;
        $section    = ClassLoader::getInstance()->getClassInstance( 'Rewrite' )->get_section() ;
        
        if($location == 'item' && $section == '') {
            echo '
            <style type="text/css">
                .social-bookmarks ul { margin: 10px 0; }
                .social-bookmarks ul li { float: left; }
                .social-bookmarks .clear { clear:both; }
            </style>';
        }
    }

    /**
     *  HOOKS
     */
    osc_register_plugin(osc_plugin_path(__FILE__), '');
    osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', '');

    osc_add_filter('item_description', 'social_bookmarks');
    osc_add_hook('header', 'social_bookmarks_header');

