<?php
namespace com\cminds\maplocations\shortcode;

use com\cminds\maplocations\controller;
use com\cminds\maplocations\model\Settings;

class SearchShortcode extends Shortcode {
	
	const SHORTCODE_NAME = 'cm-location-search';
	
	static function shortcode($atts) {
		$atts = static::getDefaultAtts($atts);
		controller\FrontendController::enqueueStyle();
		$content = controller\RouteController::loadFrontendView('index-filter', compact('atts'));
		return '<div class="cmmrm-route-search-shortcode">'. $content .'</div>';
	}
	
	static function getDefaultAtts($atts) {
		return shortcode_atts(array(
			'categories' => 0,
			'customtax' => 0,
			'searchinput' => Settings::getOption('cmloc_index_search_enable'),
			'searchformurl' => controller\FrontendController::getUrl(),
			'searchstring' => '',
			'zipcode' => 0,
		), $atts);
	}
	
}