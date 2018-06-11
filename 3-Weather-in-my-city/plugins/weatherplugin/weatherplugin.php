<?php 
/*
Plugin Name: Weather Plugin
Plugin URI: http://www.bravi.com.br
Description: Plugin for displaying current conditions from http://openweathermap.org/.
Author: Anthero Vieira Neto
License: GPL3
Version: 1.00
Author URI: http://www.bravi.com.br
*/

add_action('init','WPLoadJavascript');

function WPLoadJavascript() {
	wp_deregister_script( 'jquery' ); //we require jQuery 2.1.0 or greater
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
	wp_enqueue_script('WPplugin-js',plugin_dir_url( __FILE__ ) . '/WPplugin.js');
	wp_enqueue_script('WPinit-js',plugin_dir_url( __FILE__ ) . '/WPinit.js');
}

function WPshowSearch() {
    $html = '<span class="pull-left">Search for a City</span><br>
            <span style="width:40%;" class="form-group pull-left">
                <input type="text" id="WP-city-search-term" class="form-control WP-city-search-term" value="">
            </span>
            <button type="submit" class="btn city-search-btn" OnClick="newSearch()">Search</button>&nbsp
            <input type="radio" name="searchUnits" value="metric" OnClick="citySearch()"><span class="WP-text">&deg;C&nbsp</span>
            <input type="radio" name="searchUnits" value="imperial" class="active" OnClick="citySearch()" checked><span class="WP-text">&deg;F</span>';
    echo $html;
}

function WPshowCurrentConditions() {
    $html = '<div class="WP-current-conditions WP-center">
              <h1 class="WP-city-name"></h1>
              <span class="WP-heading WP-country-name"></span><br>
              <h1 class="WP-lead"><span class="WP-LocalTempurature"></span><span class="WP-temp-units"></span></h1>
              <span class="WP-current-icon"></span><br>
              <span class="WP-current-desc"></span>
            </div>';
    echo $html;
}



function WPinitScript($atts) {
	@extract($atts);
	$usegeoip;
	$searchbox;
	
	if($usegeoip === 'false') {
		$usegeoip = 0;
	}
	elseif ($usegeoip === 'true') {
		$usegeoip = 1;
	}
	else {
		$usegeoip = 0;
	}
	
	if ($searchbox == '') {
		$searchbox = ".WP-city-search-term";
	}
	echo '<script>$(document).ready(WPinit('.$usegeoip.', "'.$searchbox.'"));</script>';
}


add_shortcode('WPshowSearch', 'WPshowSearch');
add_shortcode('WPshowCurrentConditions', 'WPshowCurrentConditions');
add_shortcode('WPinitScript', 'WPinitScript');
