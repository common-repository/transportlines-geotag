<?php
/*
Plugin Name: Transportlines.com Free Fleet GPS Tracking - Geotag
Plugin URI: http://www.transportlines.com
Description: Instant GPS Tracking for your Wordpress site. (Extended version of GEOTAG plugin.)
Version: 1.2
Author: Transportlines.com
Author URI: http://www.transportlines.com
Minimum WordPress Version Required: 2.7.0
Tested up to: 2.7.1
*/
require_once "geotag.php";

/* ==================================================================== */
/* = Hooks, Filters, Globals etc.                                     = */
/* ==================================================================== */



//add_shortcode("gmap", array("TransportlinesGeotag", "parseShortcode2"));

register_activation_hook(__FILE__, array("Geotag", "registerPlugin"));
add_action("admin_menu", array("Geotag", "hookAdminMenu"));
add_action("admin_footer", array("Geotag", "hookAdminFooter"));
add_action("save_post", array("Geotag", "hookSavePost"));
add_action("wp_head", array("Geotag", "hookWPHeader"));
add_action("wp_footer", array("Geotag", "hookWPFooter"));
add_filter("the_content", array("Geotag", "filterTheContent"));
//add_filter("the_content", array("TransportlinesGeotag", "filterTheContent2"));
//add_filter("the_content", array("Geotag", "filterTheContent"));

add_shortcode("gmap", array("Geotag", "parseShortcode"));

if ($geotag_options["misc_wpgeocompatibility"]["SHORTCODE"] == "true") {add_shortcode("wp_geo_map", array("Geotag", "parseShortcode"));};
if ($geotag_options["misc"]["GEOTAG_FEEDS"] == "true") {
	add_action("rss2_ns", array("Geotag", "hookFeedNamespace"));
	add_action("atom_ns", array("Geotag", "hookFeedNamespace"));
	add_action("rdf_ns", array("Geotag", "hookFeedNamespace"));
	add_action("rss_item", array("Geotag", "hookFeedItem"));
	add_action("rss2_item", array("Geotag", "hookFeedItem"));
	add_action("atom_entry", array("Geotag", "hookFeedItem"));
	add_action("rdf_item", array("Geotag", "hookFeedItem"));
}


class TransportlinesGeotag extends Geotag {
    function registerPlugin() {
        parent::registerPlugin();
    }

    function parseShortcode2 ($atts, $content = null) {
        
        // Set transportlines kml file

        return parent::parseShortcode($atts, $content);
    }


}

?>
