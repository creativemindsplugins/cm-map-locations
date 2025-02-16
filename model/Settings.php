<?php
namespace com\cminds\maplocations\model;

use com\cminds\maplocations\shortcode\LocationSnippetShortcode;
use com\cminds\maplocations\App;

class Settings extends SettingsAbstract {

	public static $categories = array(		
		'setup' => 'Setup',
		'usertracking' => 'User Tracking',
		'general' => 'General',
		'index' => 'Index Page',
		'location' => 'Location Page',
		'dashboard' => 'Dashboard',
		'moderation' => 'Moderation',
		'access' => 'Access Control',
		'locationform' => 'Location Form',
		'labels' => 'Labels',
		'taxonomies' => 'Taxonomies',
		'cm-gdpr' => 'GDPR Settings',
	);

	public static $subcategories = array(
		'setup' => array(		
			'general' => 'General',
			'api' => 'API Keys',
			'rest' => 'Location REST API',
			'navigation' => 'Navigation',
		),
		'usertracking' => array(
			'usertrack' => 'User Tracking',
			'templocation' => 'Temporary Locations',
			'temppolygon' => 'Temporary Polygons',
			'temppolygonps' => 'Project Site Polygons',
		),
		'general' => array(		
			'template' => 'Template',
			'appearance' => 'Appearance',
			'map' => 'Map',
			'units' => 'Units',
			'icons' => 'Icons',		
			'css' => 'Custom CSS',
			'geolocation' => 'Geolocation',
			'share' => 'Link Sharing',
			'other' => 'Other',
		),
		'index' => array(		
			'layout' => 'Layout',
			'pagination' => 'Pagination, order, search',
			'map' => 'Map',
			'appearance' => 'Appearance',
			'zip' => 'ZIP code neighborhood filter',
			'infowindow' => 'Info window',
		),
		'location' => array(
			'appearance' => 'Appearance',
			'map' => 'Map',
		),
		'dashboard' => array(		
			'editor' => 'Editor',
			'map' => 'Map default position',
			'appearance' => 'Appearance',
			'shape' => 'Shape',
		),
		'moderation' => array(
			'moderation' => 'Moderation',
			'notifications' => 'Notifications',
		),
		'access' => array(
			'access' => '',
		),
		'locationform' => array(
			'locationform' => 'Form Settings',
		),
		'labels' => array(
			'other' => 'Other',
		),
		'taxonomies' => array(
			'taxonomies' => 'Custom Taxonomies',
		),
		'cm-gdpr' => array(
			'section' => 'General Settings',
		),
	);

	const OPTION_PERMALINK_PREFIX = 'cmloc_permalink_prefix';
	const OPTION_PAGE_TEMPLATE = 'cmloc_page_template';
	const OPTION_PAGE_TEMPLATE_OTHER = 'cmloc_page_template_other';
	const OPTION_TEMPLATE_OVERRIDE_DIR = 'cmloc_template_override_dir';
	const OPTION_PAGINATION_LIMIT = 'cmloc_pagination_limit';
	const OPTION_INDEX_ORDERBY = 'cmloc_index_orderby';
	const OPTION_INDEX_ORDER = 'cmloc_index_order';
	const OPTION_INDEX_TEXT_TOP = 'cmloc_index_text_top';
	const OPTION_UNIT_LENGTH = 'cmloc_unit_length';
	const OPTION_UNIT_TEMPERATURE = 'cmloc_unit_temperature';
	const OPTION_INDEX_ROUTE_PARAMS = 'cmloc_index_route_params';
	const OPTION_INDEX_MAP_MARKER_CLUSTERING_ENABLE = 'cmloc_index_map_marker_clustering_enable';
	const OPTION_INDEX_MAP_LABEL_TYPE = 'cmloc_index_map_label_type';
	const OPTION_MAP_SHOW_PLACES = 'cmloc_map_show_google_places';
	const OPTION_SINGLE_ROUTE_PARAMS = 'cmloc_single_route_params';
	const OPTION_SINGLE_ROUTE_RATING_SHOW = 'cmloc_single_route_rating_show';
	const OPTION_SINGLE_ROUTE_EMBED_ENABLE = 'cmloc_single_route_embed_enable';
	const OPTION_GOOGLE_MAPS_APP_KEY = 'cmloc_google_maps_app_key';
	const OPTION_GOOGLE_ELEVATION_API_KEY = 'cmloc_google_elevation_api_key';
	const OPTION_DONT_EMBED_GOOGLE_MAPS_JS_API = 'cmloc_dont_embed_google_maps_js_api';
	const OPTION_OPENWEATHERMAP_API_KEY = 'cmloc_openweathermap_api_key';
	const OPTION_ACCESS_MAP_CREATE_CAP = 'cmloc_access_map_create_cap';
	const OPTION_ACCESS_MAP_CREATE = 'cmloc_access_map_create';
	const OPTION_ACCESS_MAP_EDIT_CAP = 'cmloc_access_map_edit_cap';
	const OPTION_ACCESS_MAP_EDIT = 'cmloc_access_map_edit';
	const OPTION_ACCESS_MAP_INDEX_CAP = 'cmloc_access_map_index_cap';
	const OPTION_ACCESS_MAP_INDEX = 'cmloc_access_map_index';
	const OPTION_ACCESS_MAP_VIEW_CAP = 'cmloc_access_map_view_cap';
	const OPTION_ACCESS_MAP_VIEW = 'cmloc_access_map_view';
	const OPTION_ROUTE_DEFAULT_IMAGE = 'cmloc_route_default_image';
	const OPTION_INDEX_RATING_SHOW = 'cmloc_index_rating_show';
	const OPTION_MAP_DEFAULT_ZOOM = 'cmloc_map_default_zoom';
	const OPTION_MAP_WHEEL_SCROLL_ZOOM = 'cmloc_map_wheel_scroll_zoom';
	const OPTION_INDEX_MAP_MARKER_CLICK = 'cmloc_index_map_marker_click';
	const OPTION_INDEX_ZIP_RADIUS_FILTER_ENABLE = 'cmloc_index_zip_radius_filter_enable';
	const OPTION_INDEX_ZIP_RADIUS_COUNTRY = 'cmloc_index_zip_radius_country';
	const OPTION_INDEX_ZIP_RADIUS_MIN = 'cmloc_index_zip_radius_min';
	const OPTION_INDEX_ZIP_RADIUS_MAX = 'cmloc_index_zip_radius_max';
	const OPTION_INDEX_ZIP_RADIUS_STEP = 'cmloc_index_zip_radius_step';
	const OPTION_INDEX_ZIP_RADIUS_DEFAULT = 'cmloc_index_zip_radius_default';
	const OPTION_INDEX_ZIP_RADIUS_GEOLOCATION = 'cmloc_index_zip_radius_geolocation';
	const OPTION_INDEX_LIST_ITEM_CLICK = 'cmloc_index_list_item_click';
	const OPTION_MAP_DEFAULT_ICON_URL = 'cmloc_map_default_icon_url';
	const OPTION_TOOLTIP_DESCRIPTION_CHARS = 'cmloc_tooltip_description_chars';
	const OPTION_ROUTE_MAP_MARKER_LABEL_SHOW = 'cmloc_route_map_marker_label_show';
	const OPTION_ROUTE_INDEX_FEATURED_IMAGE = '_cmloc_route_index_featured_image';
	const OPTION_INDEX_LOCATIONS_LIST_LAYOUT = '_cmloc_index_locations_list_layout';
	const OPTION_EDITOR_DEFAULT_LAT = 'cmloc_editor_default_lat';
	const OPTION_EDITOR_DEFAULT_LONG = 'cmloc_editor_default_long';
	const OPTION_EDITOR_DEFAULT_ZOOM = 'cmloc_editor_default_zoom';
	const OPTION_EDITOR_RICH_TEXT_ENABLE = 'cmloc_editor_rich_text_enable';
	const OPTION_CUSTOM_CSS = 'cmloc_custom_css';
	const OPTION_ROUTE_BACKEND_EDIT_ALLOW = 'cmloc_route_backend_edit_allow';
	const OPTION_MAP_SEARCH_BOX_ENABLED = 'cmloc_map_search_box_enabled';
	const OPTION_MAP_TYPE_DEFAULT = 'cmloc_map_type_default';
	const OPTION_ACCESS_MEDIA_LIBRARY_ROLES = 'cmloc_access_media_library_roles';

	const OPTION_ROUTE_MODERATION_ENABLE = 'cmloc_route_moderation_enable';
	const OPTION_ROUTE_MODERATION_EMAILS = 'cmloc_route_moderation_emails';
	const OPTION_MODERATOR_EMAIL_SUBJECT = 'cmloc_moderator_email_subject';
	const OPTION_MODERATOR_EMAIL_CONTENT = 'cmloc_moderator_email_content';
	const OPTION_ROUTE_ACCEPTED_USER_EMAIL_SUBJECT = 'cmloc_route_accepted_user_email_subject';
	const OPTION_ROUTE_ACCEPTED_USER_EMAIL_CONTENT = 'cmloc_route_accepted_user_email_content';

    const OPTION_SHOW_SHORTCODES_ROUTE_EDIT_FRONTEND = 'cmloc_show_shortcodes_route_edit_frontend';
	
	const OPTION_INDEX_SEARCH_ENABLE = 'cmloc_index_search_enable';
	const OPTION_INDEX_SEARCH_MODE = 'cmloc_index_search_mode';
	const OPTION_INDEX_SEARCH_NEAREST_RADIUS = 'cmloc_index_search_nearest_radius';
	
	const OPTION_LOCATION_FORM_DESCRIPTION = 'cmloc_location_form_description';
    const OPTION_LOCATION_FORM_STATUS = 'cmloc_location_form_status';
    const OPTION_LOCATION_FORM_IMAGES = 'cmloc_location_form_images';
	const OPTION_LOCATION_FORM_VIDEOS = 'cmloc_location_form_videos';
    const OPTION_LOCATION_FORM_LATITUDE = 'cmloc_location_form_latitude';
    //const OPTION_LOCATION_FORM_LONGITUDE = 'cmloc_location_form_longitude';
    const OPTION_LOCATION_FORM_ADDRESS = 'cmloc_location_form_address';
    const OPTION_LOCATION_FORM_POSTALCODE = 'cmloc_location_form_postalcode';

    const ACCESS_GUEST = 'cmloc_guest';
	const ACCESS_USER = 'cmloc_user';
	const ACCESS_CAPABILITY = 'cmloc_capability';

	const ACTION_CLICK_REDIRECT = 'redirect';
	const ACTION_CLICK_TOOLTIP = 'tooltip';

	const INDEX_LIST_BOTTOM = 'bottom';
	const INDEX_LIST_BOTTOM_CONDENSED = 'bottom-condensed';
	const INDEX_LIST_LEFT = 'left';
	const INDEX_LIST_RIGHT = 'right';

	const ORDERBY_TITLE = 'post_title';
	const ORDERBY_CREATED = 'post_date';
	const ORDERBY_VIEWS = 'views';
	const ORDERBY_RATING = 'rating';
	const ORDERBY_PROXIMITY = 'proximity';

	const ORDER_ASC = 'asc';
	const ORDER_DESC = 'desc';

	const UNIT_METERS = 'meters';
	const UNIT_FEET = 'feet';
	const UNIT_TEMP_F = 'temp_f';
	const UNIT_TEMP_C = 'temp_c';
	const FEET_TO_METER = 0.3048;
	const FEET_IN_MILE = 5280;

	const DEFAULT_INDEX_MAP_MARKER_CLICK = self::ACTION_CLICK_REDIRECT;
	const DEFAULT_INDEX_LIST_ITEM_CLICK = self::ACTION_CLICK_REDIRECT;
	const DEFAULT_INDEX_ORDERBY = self::ORDERBY_CREATED;
	const DEFAULT_INDEX_ORDER = self::ORDER_DESC;
	const DEFAULT_TOOLTIP_DESCRIPTION_CHARS = 0;

	const MAP_TYPE_ROADMAP = 'roadmap';
	const MAP_TYPE_SATELLITE = 'satellite';
	const MAP_TYPE_TERRAIN = 'terrain';
	const MAP_TYPE_HYBRID = 'hybrid';

	const LABEL_TYPE_SHOW_BELOW = 'below';
	const LABEL_TYPE_TOOLTIP = 'tooltip';
	const LABEL_TYPE_NONE = 'none';

	const WHEEL_SCROLL_ZOOM_DISABLE = 'disable';
	const WHEEL_SCROLL_ZOOM_ENABLE = 'enable';
	const WHEEL_SCROLL_ZOOM_AFTER_CLICK = 'after_click';
	
	public static function getOptionsConfig() {

		return apply_filters('cmloc_options_config', array(
			
			// Setup
			'cmloc_AddWizardMenu' => array(
				'type' => self::TYPE_BOOL,
				'default' => 1,
				'category' => 'setup',
				'subcategory' => 'general',
				'title' => 'Display "Setup Wizard" in plugin menu',
				'desc' => 'Uncheck this to remove Setup Wizard from plugin menu.',
			),
			self::OPTION_GOOGLE_MAPS_APP_KEY => array(
				'type' => self::TYPE_STRING,
				'category' => 'setup',
				'subcategory' => 'api',
				'title' => 'Google Maps App Key',
				'desc' => 'Enter the Google Maps server app key.<br /><a target="_blank" '
					. 'href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend&keyType=CLIENT_SIDE&reusekey=true">Get the API key from here</a>.'
					. '<br><br><a href="#" class="button cminds-google-maps-api-check-btn" data-api-key-field-selector="input[name=cmloc_google_maps_app_key]">Test Configuration</a>',
			),
			'_onlyinpro_se1' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'api',
				'title' => 'Google Maps Language',
				'desc' => 'Here you able to set Language of google map. Default Language is "English".',
			),
			'_onlyinpro_se2' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'api',
				'title' => 'Embedding Google Maps JS API',
				'desc' => 'This option can solve some conflicts with other plugins or themes that also includes the Google Maps API on each page, eg. Geodirectory.',
			),
			'_onlyinpro_se3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'api',
				'title' => 'Embedding on the selected URLs',
				'desc' => 'Separate URL by new lines on which you want to embed Google Maps JS API. Note: It will work when above setting set "Selected". <br>Example:<br><code>'.site_url().'/map-locations/</code>',
			),
			'_onlyinpro_se4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'api',
				'title' => 'OpenWeatherMap.org API Key',
				'desc' => 'Enter the OpenWeatherMap.org API key.<br /><a target="_blank" '. 'href="https://openweathermap.org/appid">Get the API key from here</a>.',
			),
			'_onlyinpro_se5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'api',
				'title' => 'Google Search Engine ID',
				'desc' => 'Enter the Google Search Engine ID. This is required for load google images feature.',
			),
			'_onlyinpro_se6' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'rest',
				'title' => 'Enable REST API',
				'desc' => 'Enable to add locations from external services via API <br>
				<a target="_blank" href="https://creativeminds.helpscoutdocs.com/article/2559-cm-map-locations-cmml-adding-locations-from-external-services-rest-api">Learn more about using REST API with Locations</a>',
			),
			'_onlyinpro_se7' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'rest',
				'title' => 'API key for adding location via REST API',
				'desc' => 'Enter the API key or generate it. You should add this key in the settings of the external service used to manage locations<br />
				<button class="button button-primary" disabled type="button">Generate Key</button>',
			),
			'_onlyinpro_se8' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'rest',
				'title' => 'Enter the IP from which you can connect',
				'desc' => 'Enter the IP from which you can connect to the API. Add multiples by separating them with comas (e.g. 145.0.0.5,145.0.0.6).
				Leave this field empty to allow connections from any IP',
			),
			'_onlyinpro_se9' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'rest',
				'title' => 'Create category if it doesn\'t exist',
				'desc' => 'Choose how to handle a category that is specified in the URL but doesn\'t exist. If enabled, the category will be created. If disabled, it will be disregarded.',
			),
			'_onlyinpro_se10' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'rest',
				'title' => 'Don\'t add locations with the same name',
				'desc' => 'Enable to not create locations with the same name. Disable to allow locations with the same name',
			),
			self::OPTION_PERMALINK_PREFIX => array(
				'type' => self::TYPE_STRING,
				'default' => 'map-locations',
				'category' => 'setup',
				'subcategory' => 'navigation',
				'title' => 'Permalink prefix',
				'desc' => 'Enter the prefix of the index and locations\' permalinks, eg. <kbd>map-locations</kbd> '
							. 'will give permalinks such as: <kbd>/<strong>map-locations</strong>/paris-trip</kbd>.',
				'afterSave' => 'com\cminds\maplocations\model\Settings::setTriggerFlushRewrite',
			),
			'_onlyinpro_se11' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'navigation',
				'title' => 'Respect permalink structure (enable with_front)',
				'desc' => 'Enable this option in order to respect the <a href="'. esc_attr(admin_url('options-permalink.php'))
						. '">Custom permalink structure</a> from the Wordpress settings. It will enable with_front=true option for the registered post type '
						. 'e.g. having permalink structure <kbd><strong>/blog/</strong>%postname%/</kbd> will generate links like: '
						. '<kbd><strong>/blog/</strong>map-locations/single-location/</kbd>.'
						. '<br>Disable this option if you want to make the loations permalinks more general (without using the WP permalink structure) '
						. 'like: <kbd>/map-locations/</kbd>.',
			),
			self::OPTION_ROUTE_BACKEND_EDIT_ALLOW => array(
				'type' => self::TYPE_BOOL,
				'default' => 0,
				'category' => 'setup',
				'subcategory' => 'navigation',
				'title' => 'Enable wp-admin edit page for locations',
				'desc' => 'If disabled, when you click the Edit link in the wp-admin you will be redirected to the front-end location edit page.<br />'
							. 'If enabled, the backend edit page will be available for locations.',
			),
			'_onlyinpro_se12' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'setup',
				'subcategory' => 'navigation',
				'title' => 'Enable right to left language',
				'desc' => 'If enabled, then plugin will add new css class "cmloc-rtl" in body tag.',
			),
								
			// General
			self::OPTION_PAGE_TEMPLATE => array(
				'type' => self::TYPE_SELECT,
				'options' => array(__CLASS__, 'getPageTemplatesOptions'),
				'default' => 'page.php',
				'category' => 'general',
				'subcategory' => 'template',
				'title' => 'Page template',
				'desc' => 'Choose the page template of the current theme or set default.',
			),
			self::OPTION_PAGE_TEMPLATE_OTHER => array(
				'type' => self::TYPE_STRING,
				'category' => 'general',
				'subcategory' => 'template',
				'title' => 'Other page template file',
				'desc' => 'Enter the other name of the page template if your template is not on the list above. '
				. 'This option have priority over the selected page template. Leave blank to reset.',
			),
			'_onlyinpro_ge1' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'template',
				'title' => 'Override templates with files from a directory',
				'desc' => 'Enter the directory path relative to the wp-content directory to override the plugin\'s view templates.',
			),
			'_onlyinpro_ge2' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'template',
				'title' => 'Enable default location index page',
				'desc' => 'If enabled, then will work default location index page',
			),
			'_onlyinpro_ge3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'template',
				'title' => 'Enable default user dashboard page',
				'desc' => 'If enabled, then will work default user dashboard page',
			),
			'_onlyinpro_ge4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'template',
				'title' => 'Enable default location\'s page',
				'desc' => 'If enabled, then will work default location\'s page',
			),
			self::OPTION_MAP_TYPE_DEFAULT => array(
				'type' => self::TYPE_RADIO,
				'options' => array(
					self::MAP_TYPE_ROADMAP => 'Roadmap',					
					self::MAP_TYPE_SATELLITE => 'Pure Satellite Without Labels',
					self::MAP_TYPE_HYBRID => 'Hybrid Satellite With Labels',
					self::MAP_TYPE_TERRAIN => 'Terrain',
				),
				'default' => self::MAP_TYPE_ROADMAP,
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Default map view',
			),
			'_onlyinpro_ge5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Enable OSM tiles button',
				'desc' => 'If enabled, then OSM tiles button will be shown on the map and user able to on/off from front end.',
			),
			'_onlyinpro_ge6' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Insert OSM tiles',
				'desc' => 'Enter the Label and URL of a tiles. You can add up to 6 tiles. <a href="https://creativeminds.helpscoutdocs.com/article/2572-cm-map-locations-cmml-how-to-add-tiles-layers-to-maps" target="_blank">Learn more in the documentation</a><br><br>e.g. of tiles URL<br><a href="https://israelhiking.osm.org.il/English/Tiles/" target="_blank">https://israelhiking.osm.org.il/English/Tiles/</a><br><a href="https://israelhiking.osm.org.il/English/mtbTiles/" target="_blank">https://israelhiking.osm.org.il/English/mtbTiles/</a><br><br><strong>Note:</strong> "Set as Default OSM Tile" use for "Default OSM tile" default map view.',
			),
			'_onlyinpro_ge7' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Map theme',
			),
			self::OPTION_MAP_DEFAULT_ZOOM => array(
				'type' => self::TYPE_INT,
				'default' => 0,
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Default Map Zoom',
				'desc' => 'Default value for map zoom. If setuped to 0, then zoom will be selected automatically',
			),	
			self::OPTION_MAP_WHEEL_SCROLL_ZOOM => array(
				'type' => self::TYPE_RADIO,
				'options' => array(
					static::WHEEL_SCROLL_ZOOM_DISABLE => 'disable',
					static::WHEEL_SCROLL_ZOOM_ENABLE => 'enable',
					static::WHEEL_SCROLL_ZOOM_AFTER_CLICK => 'after clicked the map',
				),
				'default' => static::WHEEL_SCROLL_ZOOM_ENABLE,
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Zoom map when using mouse wheel',
				'desc' => 'If enabled then scrolling by mouse when on the map will zoom out or zoom in.',
			),	
			'_onlyinpro_ge8' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'map',
				'title' => 'Show Google Places on the map',
				'desc' => 'If enabled, the places from Google Places API (such as restaurants, gas stations) will be shown on the map.',
			),
			'_onlyinpro_ge9' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'units',
				'title' => 'Length units',
				'desc' => 'Used to display the trail\'s length or the location\'s altitude.',
			),
			'_onlyinpro_ge10' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'units',
				'title' => 'Temperature units',
				'desc' => 'Used to display the weather.',
			),	
			'_onlyinpro_ge11' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'icons',
				'title' => 'Disappear default google maps icons',
				'desc' => 'If enabled then default google maps icon will disappear.',
			),
			'_onlyinpro_ge12' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'icons',
				'title' => 'Custom icons',
				'desc' => 'Enter the icon\'s URL addresses separated by new lines that will be available for a location\'s marker icon.',
			),
			self::OPTION_CUSTOM_CSS => array(
				'type' => self::TYPE_TEXTAREA,
				'category' => 'general',
				'subcategory' => 'css',
				'title' => 'Custom CSS',
				'desc' => 'You can enter a custom CSS which will be embeded on every page that contains a CM Map Locations interface.',
			),
			'_onlyinpro_ge13' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'geolocation',
				'title' => 'Enable find user location button on map',
				'desc' => 'If enabled then find user location button will show on the embed map.',
			),
			'_onlyinpro_ge14' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'geolocation',
				'title' => 'User current position\'s icon URL',
				'desc' => '',
			),
			'_onlyinpro_ge15' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'geolocation',
				'title' => 'Icon width',
				'desc' => '',
			),
			'_onlyinpro_ge16' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'geolocation',
				'title' => 'Icon height',
				'desc' => '',
			),
			'_onlyinpro_ge17' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'geolocation',
				'title' => 'Enable auto submit form on button click',
				'desc' => 'If enabled then filters form will be auto submit on button click.',
			),
			'_onlyinpro_ge18' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'share',
				'title' => 'Enable share link box',
				'desc' => 'If enabled then location and category share link box will show on the location page.',
			),
			'_onlyinpro_ge19' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'share',
				'title' => 'Share page',
				'desc' => 'Set the share page and it will use in category share link. This page should <code>[cmloc-locations-map showonlybyparams="1"]</code> shortcode.',
			),
			'_onlyinpro_ge20' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'other',
				'title' => 'Enable "BuddyBoss" integration',
				'desc' => 'If enabled then Ballparks tab will show.',
			),
			'_onlyinpro_ge21' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'general',
				'subcategory' => 'other',
				'title' => 'Enable "The Events Calendar" integration',
				'desc' => '',
			),
			
			// Index Page
			'_onlyinpro_ge22' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'layout',
				'title' => 'Where to show locations list',
				'desc' => 'Choose where to display the locations list on the index page.',
			),
			'cmloc_index_menu_enable' => array(
				'type' => self::TYPE_BOOL,
				'default' => false,
				'category' => 'index',
				'subcategory' => 'layout',
				'title' => 'Enable menu',
				'desc' => 'If enabled, then location menu will show above map.'
			),
			'_onlyinpro_ge24' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'layout',
				'title' => 'Show share link in toolbar above map',
				'desc' => ''
			),
			self::OPTION_PAGINATION_LIMIT => array(
				'type' => self::TYPE_INT,
				'default' => 10,
				'category' => 'index',
				'subcategory' => 'pagination',
				'title' => 'Locations per page',
				'desc' => 'Limit the locations visible on each page.',
			),
			'_onlyinpro_ge25' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'pagination',
				'title' => 'Order locations by',
				'desc' => 'Notice: user location proximity uses web browser\'s geolocation API which requires using SSL (https).',
			),
			'_onlyinpro_ge26' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'pagination',
				'title' => 'Sorting order',
			),
			Settings::OPTION_INDEX_SEARCH_ENABLE => array(
				'type' => Settings::TYPE_BOOL,
				'default' => true,
				'category' => 'index',
				'subcategory' => 'pagination',
				'title' => 'Enable search',
				'desc' => ''
			),
			Settings::OPTION_INDEX_SEARCH_MODE => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'match' => 'Exact Match',
					'nearest' => 'Nearest',
				),
				'default' => 'match',
				'category' => 'index',
				'subcategory' => 'pagination',
				'title' => 'Search mode',
			),
			Settings::OPTION_INDEX_SEARCH_NEAREST_RADIUS => array(
				'type' => Settings::TYPE_INT,
				'default' => '50',
				'category' => 'index',
				'subcategory' => 'pagination',
				'title' => 'Nearest radius value',
				'desc' => 'Notice: radius will work with search mode nearest only.'
			),
			'_onlyinpro_ge30' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'map',
				'title' => 'Enable map',
				'desc' => 'If enabled, then map will show on index page.'
			),
			'_onlyinpro_ge31' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'map',
				'title' => 'Enable marker clustering',
				'desc' => 'If enabled, the specific locations\' markers that are overlaping on the map will be clustered in a single icon with a number of locations. '
				. 'The single marker will be showed up after clicking on the cluster icon or zooming in the area.'
			),
			'_onlyinpro_ge32' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'map',
				'title' => 'Enable info window on marker clustering',
				'desc' => 'If enabled, the info window will open on click the marker cluster.'
			),
			'_onlyinpro_ge33' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'map',
				'title' => 'Marker label type',
				'desc' => 'Choose the label type with the marker\'s name on the location\'s map.<br>Note: If you will choose "Show only label as a numbers" option then below option will not work.',
			),			
			'_onlyinpro_ge34' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'map',
				'title' => 'Clicking on the map marker will',
			),
			'_onlyinpro_ge35' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'map',
				'title' => 'Default location\'s icon URL',
				'desc' => 'If there\'s not location\'s icon this will be used instead.',
			),
			self::OPTION_INDEX_TEXT_TOP => array(
				'type' => self::TYPE_RICH_TEXT,
				'category' => 'index',
				'subcategory' => 'appearance',
				'title' => 'Text on top',
				'desc' => 'You can enter text which will be displayed on the top of the index page, below the page title.',
			),
			self::OPTION_INDEX_ROUTE_PARAMS => array(
				'type' => self::TYPE_MULTICHECKBOX,
				'options' => self::getRouteParamsNames(),
				'default' => array_keys(self::getRouteParamsNames()),
				'category' => 'index',
				'subcategory' => 'appearance',
				'title' => 'Information visible on the index page',
				'desc' => 'Check which route parameters will be displayed on the index page on the route\'s snippet.',
			),
			self::OPTION_ROUTE_INDEX_FEATURED_IMAGE => array(
				'type' => self::TYPE_RADIO,
				'default' => LocationSnippetShortcode::FEATURED_IMAGE,
				'options' => array(
					LocationSnippetShortcode::FEATURED_IMAGE => 'First gallery image',
					//LocationSnippetShortcode::FEATURED_ICON => 'Icon',
					LocationSnippetShortcode::FEATURED_NONE => 'None',
				),
				'category' => 'index',
				'subcategory' => 'appearance',
				'title' => 'Location\'s featured image',
				'desc' => 'Choose what kind of featured image to display on the index page.',
			),
			self::OPTION_ROUTE_DEFAULT_IMAGE => array(
				'type' => self::TYPE_STRING,
				'default' => App::url('asset/img/world-map-small.png'),
				'category' => 'index',
				'subcategory' => 'appearance',
				'title' => 'Location\'s default image',
				'desc' => 'Enter the URL of the default featured image of the location map.',
			),
			'_onlyinpro_ge36' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'appearance',
				'title' => 'Clicking on the location\'s list item will',
			),
			'_onlyinpro_ge37' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'appearance',
				'title' => 'Show rating on the index page',
			),		
			'_onlyinpro_ge38' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Enable ZIP code neighborhood filter',
				'desc' => 'If enabled the ZIP code neighborhood filter will be added to the index page next to the search box.',
			),
			'_onlyinpro_ge39' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Radius drop-down position (before ZIP code)',
				'desc' => 'If enabled then radius drop-down will be show before ZIP code input field otherwise next to ZIP code input field.',
			),
			'_onlyinpro_ge40' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Position (after category filter)',
				'desc' => 'If enabled then filter will be added next to the category filter otherwise next to search box.',
			),
			'_onlyinpro_ge41' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Country code for the ZIP code searching',
				'desc' => 'Enter country code here such as CH,DE,AT,US,... ',
			),
			'_onlyinpro_ge42' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Minimum radius value',
				'desc' => 'Set the minimum radius value that user will be able to select from the drop-box field placed next to the zip code filter.',
			),
			'_onlyinpro_ge43' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Maximum radius value',
				'desc' => 'Set the maximum radius value that user will be able to select from the drop-box field placed next to the zip code filter.',
			),
			'_onlyinpro_ge44' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Radius value step',
				'desc' => 'Set the radius step that will be used to generated radius values from minimum to maximum.',
			),
			'_onlyinpro_ge45' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Radius default value',
				'desc' => 'Set the default radius value that will be selected in the drop-box field placed next to the zip code filter.',
			),
			'_onlyinpro_ge46' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Radius custom value',
				'desc' => 'Set the custom radius value with comma such as 60,150,... If empty then radius values will show as per above options.',
			),
			'_onlyinpro_ge47' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Enable geolocation',
				'desc' => 'If enabled the user\'s ZIP code will be recognized using browser\'s geolocation API.'
						.'<br />Notice that the geolocation API works only if you\'re using https.',
			),
			'_onlyinpro_ge48' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'zip',
				'title' => 'Draw a circle with a radius on a map',
				'desc' => 'If enabled then markers will show inside of radius (circle) on maps.',
			),
			'_onlyinpro_ge49' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Template for the location\'s marker info window content',
				'desc' => 'You can use HTML and the following shortcodes: [coordinates] [UTMcoordinates] [title] [description] [address] [city] [latitude] [longitude] [postalcode] [phone] [website] [email] [url] [permalink] [imagesrc] [image] [createddate] [updatedate] [editlink] [deletelink] [closelink] [wazedirections] [googledirections]<br><br>[coordinates] and [UTMcoordinates] will work if shape created with location.<br><br>[editlink] and [deletelink] will work only for admin privilege user and return output with anchor tag.',
			),
			'_onlyinpro_ge50' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Template for the location\'s area (shape) info window content',
				'desc' => 'You can use HTML and the following shortcodes: [coordinates] [UTMcoordinates] [title] [description] [address] [city] [latitude] [longitude] [postalcode] [phone] [website] [email] [url] [permalink] [imagesrc] [image] [createddate] [updatedate] [editlink] [deletelink] [closelink]<br><br>[coordinates] and [UTMcoordinates] will work if shape created with location.<br><br>[editlink] and [deletelink] will work only for admin privilege user and return output with anchor tag.',
			),
			'_onlyinpro_ge51' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Max width for the info window content',
			),
			'_onlyinpro_ge52' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Max height for the info window content',
			),
			'_onlyinpro_ge53' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Max width for images inside the info window',
				'desc' => 'Set the max width of the images inserted into the info window content.',
			),			
			'_onlyinpro_ge54' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Number of characters from the location\'s description to display on the tooltip',
			),
			'_onlyinpro_ge55' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'index',
				'subcategory' => 'infowindow',
				'title' => 'Close a tooltip when another is clicked?',
				'desc' => '',
			),			
							
			// Location Page
			'_onlyinpro_lp1' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'location',
				'subcategory' => 'appearance',
				'title' => 'Show title on the location\'s page',
			),
			self::OPTION_SINGLE_ROUTE_PARAMS => array(
				'type' => self::TYPE_MULTICHECKBOX,
				'options' => self::getRouteParamsNames(),
				'default' => array_keys(self::getRouteParamsNames()),
				'category' => 'location',
				'subcategory' => 'appearance',
				'title' => 'Information visible on the location\'s page',
				'desc' => 'Check which location parameters will be displayed on the single location\'s page.',
			),
			'_onlyinpro_lp2' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'location',
				'subcategory' => 'appearance',
				'title' => 'Show shape on the location\'s page',
			),
			'_onlyinpro_lp3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'location',
				'subcategory' => 'appearance',
				'title' => 'Show tooltip on shape',
				'desc' => 'If enabled, then show tooltip on shape when user will click on shape.',
			),
			'_onlyinpro_lp4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'location',
				'subcategory' => 'appearance',
				'title' => 'Show rating on the location\'s page',
			),
			'_onlyinpro_lp5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'location',
				'subcategory' => 'appearance',
				'title' => 'Show "Embed" feature',
				'desc' => 'If enabled, the "Embed" button will be display next to the location\'s map and users will be able to copy the iframe HTML code '
				. 'in order to embed the map on an external website.'
			),
			'_onlyinpro_lp6' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'location',
				'subcategory' => 'map',
				'title' => 'Enable map',
				'desc' => 'If enabled, then map will show on location page',
			),
			self::OPTION_ROUTE_MAP_MARKER_LABEL_SHOW => array(
				'type' => self::TYPE_BOOL,
				'default' => true,
				'category' => 'location',
				'subcategory' => 'map',
				'title' => 'Show label below marker',
				'desc' => 'Show text labels with location name below the location marker on the route page map.',
			),
				
			// Dashboard
			self::OPTION_SHOW_SHORTCODES_ROUTE_EDIT_FRONTEND => array(
                'type' => self::TYPE_BOOL,
                'default' => false,
                'category' => 'dashboard',
                'subcategory' => 'appearance',
                'title' => 'Show available shortcodes on the edit page',
                'desc' => 'If enabled, available shortcodes will be shown on the location edit page.'
            ),
			self::OPTION_EDITOR_DEFAULT_LAT => array(
				'type' => self::TYPE_STRING,
				'default' => '51',
				'category' => 'dashboard',
				'subcategory' => 'map',
				'title' => 'Editor default location\'s latitude',
				'desc' => 'Enter the latitude of the default location shown in the editor.',
			),
			self::OPTION_EDITOR_DEFAULT_LONG => array(
				'type' => self::TYPE_STRING,
				'default' => 0,
				'category' => 'dashboard',
				'subcategory' => 'map',
				'title' => 'Editor default location\'s longitude',
				'desc' => 'Enter the longitude of the default location shown in the editor.',
			),
			self::OPTION_EDITOR_DEFAULT_ZOOM => array(
				'type' => self::TYPE_SELECT,
				'options' => array_combine(range(0, 18), range(0, 18)),
				'default' => 5,
				'category' => 'dashboard',
				'subcategory' => 'map',
				'title' => 'Editor default zoom',
				'desc' => 'Greater zoom number = closer'
			),
			self::OPTION_EDITOR_RICH_TEXT_ENABLE => array(
				'type' => self::TYPE_BOOL,
				'default' => false,
				'category' => 'dashboard',
				'subcategory' => 'editor',
				'title' => 'Enable rich text editor',
				'desc' => 'Allow users to use WYSIWYG editor when creating the location description. If disabled then simple textarea will be displayed.',
			),
			'_onlyinpro_da1' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'dashboard',
				'subcategory' => 'shape',
				'title' => 'Fill color',
				'desc' => ''
			),
			'_onlyinpro_da2' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'dashboard',
				'subcategory' => 'shape',
				'title' => 'Fill opacity',
				'desc' => ''
			),
			'_onlyinpro_da3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'dashboard',
				'subcategory' => 'shape',
				'title' => 'Stroke color',
				'desc' => ''
			),
			'_onlyinpro_da4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'dashboard',
				'subcategory' => 'shape',
				'title' => 'Stroke opacity',
				'desc' => ''
			),
			'_onlyinpro_da5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'dashboard',
				'subcategory' => 'shape',
				'title' => 'Stroke weight',
				'desc' => ''
			),
			'_onlyinpro_da6' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category' => 'dashboard',
                'subcategory' => 'shape',
                'title' => 'Override appearance with each location',
                'desc' => 'If enabled, then you able to override above option with each location.'
            ),
				
			// Access Control
			'_onlyinpro_l1' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'access',
				'subcategory' => 'access',
				'title' => 'List locations',
				'desc' => 'Select who can access the locations index and also search or filter locations.',
			),
			'_onlyinpro_l2' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'access',
				'subcategory' => 'access',
				'title' => 'View location',
				'desc' => 'Select who can display the location\'s page.',
			),
			'_onlyinpro_l3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'access',
				'subcategory' => 'access',
				'title' => 'Create location',
				'desc' => 'Select who can create locations.',
			),
			'_onlyinpro_l4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'access',
				'subcategory' => 'access',
				'title' => 'Update own location',
				'desc' => 'Select who can update own locations.',
			),
			'_onlyinpro_l5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'access',
				'subcategory' => 'access',
				'title' => 'Roles allowed to use Media Library',
				'desc' => 'If a subscriber has the upload_files capability he can see the Wordpress\'s Media Library tab when uploading the image for a location. '
						. 'If you want to prevent for users browsing your website\'s Media Library revoke access for the specific roles.',
			),
			
			// User Tracking
			'_onlyinpro_ut1' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Enbale User Tracking',
				'desc' => '',
			),
			'_onlyinpro_ut2' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Track N users',
				'desc' => 'Here, You able to set how many devices can connect to the API and If set 0 means then no limit',
			),
			'_onlyinpro_ut3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'User position\'s icon URL',
				'desc' => '',
			),
			'_onlyinpro_ut4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display tooltip on marker',
				'desc' => 'If enabled, then tooltip will show on marker when user will click on it.',
			),
			'_onlyinpro_ut5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Template for the user track position info window content',
				'desc' => 'You can use HTML and the following shortcodes: [identifier] [name] [description] [coordinates] [UTMcoordinates] [updatedate] [timezone] [downloadlink] [bgcolor] [bgcolorlabel] [deletelink] [timediff].<br><br>[deletelink] will work only for admin privilege user and return output with anchor tag.',
			),
			'_onlyinpro_ut6' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'User path line type',
				'desc' => 'If \'No Line\' is selected then just the points will show on map without line.',
			),
			'_onlyinpro_ut7' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Line color',
				'desc' => 'This color will be used on user track if you will be select "Solid" or "Dashed" line in above setting'
			),
			'_onlyinpro_ut8' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display numbering with marker',
				'desc' => 'If enabled, then numbering will show with user current location marker.',
			),
			'_onlyinpro_ut9' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display time with marker',
				'desc' => 'If enabled, then time will show with user current location marker.',
			),
			'_onlyinpro_ut10' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Only show last position',
				'desc' => 'If enabled, then only show user last position otherwise show all.',
			),
			'_onlyinpro_ut11' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Time of last reported tracks',
				'desc' => 'Here, You able to set time of last X hours:minutes e.g. 01:00 (1 hour), 5:15 (5 hours and 15 minutes), 7:30 (7 hours and 30 minutes), 9 (9 hours) and If set 0 means show always. Note this will work if above setting is disabled.',
			),
			'_onlyinpro_ut12' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Timezone',
				'desc' => '',
			),
			'_onlyinpro_ut13' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Time Format',
				'desc' => '',
			),
			'_onlyinpro_ut14' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display user track position on index page map',
				'desc' => 'If enabled, then user track position will show on locations index page map.',
			),
			'_onlyinpro_ut15' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display filter by name on index page',
				'desc' => 'If enabled, then user able to filter by name/identifier on index page.',
			),
			'_onlyinpro_ut16' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display filter by type on index page',
				'desc' => 'If enabled, then user able to filter by type on index page.',
			),
			'_onlyinpro_ut17' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Default filter by type',
				'desc' => '',
			),
			'_onlyinpro_ut18' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Display time filter on index page',
				'desc' => 'If enabled, then user able to filter by date and time on index page.',
			),
			'_onlyinpro_ut19' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'usertrack',
				'title' => 'Time for download GPX',
				'desc' => 'Here, You able to set time of last X hours e.g. 1 (1 hour), 5 (5 hours), 10 (10 hours) and If set 0 means download only current location (single point). This option will use with download gpx link.',
			),
			'_onlyinpro_ut20' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'usertracking',
                'subcategory' => 'usertrack',
                'title'       => 'Reset user tracking table',
                'desc'        => 'Delete all user tracking entries from table',
            ),
			'_onlyinpro_ut21' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'templocation',
				'title' => 'Display temporary locations on index page map',
				'desc' => 'If enabled, then user posted temporary locations will show on locations index page map.',
			),
			'_onlyinpro_ut22' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'templocation',
				'title' => 'Location\'s icon',
				'desc' => 'Enter the Number, Label and URL of a icons.',
			),
			'_onlyinpro_ut23' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'templocation',
				'title' => 'Display icon label as the name of the point',
				'desc' => 'If enabled, then icon label will show as the name of the point below marker.',
			),
			'_onlyinpro_ut24' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'templocation',
				'title' => 'Display tooltip on marker',
				'desc' => 'If enabled, then tooltip will show on marker when user will click on it.',
			),
			'_onlyinpro_ut25' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'templocation',
				'title' => 'Template for the temporary location info window content',
				'desc' => 'You can use HTML and the following shortcodes: [name] [description] [coordinates] [UTMcoordinates] [updatedate] [deletelink] [timediff] [iconlabel].<br><br>[deletelink] will work only for admin privilege user and return output with anchor tag.',
			),
			'_onlyinpro_ut26' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'templocation',
				'title' => 'Location\'s expire time',
				'desc' => '',
			),
			'_onlyinpro_ut27' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'usertracking',
                'subcategory' => 'templocation',
                'title'       => 'Reset temporary location table',
                'desc'        => 'Delete all temporary location entries from table',
            ),
			'_onlyinpro_ut28' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygon',
				'title' => 'Display temporary polygons on index page map',
				'desc' => 'If enabled, then user posted temporary polygons will show on locations index page map.',
			),
			'_onlyinpro_ut29' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygon',
				'title' => 'Display tooltip on polygon',
				'desc' => 'If enabled, then tooltip will show on polygon when user will click on it.',
			),
			'_onlyinpro_ut30' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygon',
				'title' => 'Template for the temporary polygon info window content',
				'desc' => 'You can use HTML and the following shortcodes: [name] [description] [coordinates] [UTMcoordinates] [polygoncoordinates] [updatedate] [deletelink] [timediff] [iconlabel].<br><br>[deletelink] will work only for admin privilege user and return output with anchor tag.',
			),
			'_onlyinpro_ut31' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygon',
				'title' => 'Polygon\'s expire time',
				'desc' => '',
			),
			'_onlyinpro_ut32' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'usertracking',
                'subcategory' => 'temppolygon',
                'title'       => 'Reset temporary polygon table',
                'desc'        => 'Delete all temporary polygon entries from table',
            ),
			'_onlyinpro_ut33' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygonps',
				'title' => 'Display project site polygons on index page map',
				'desc' => 'If enabled, then user posted project site polygons will show on locations index page map.',
			),
			'_onlyinpro_ut34' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygonps',
				'title' => 'Display tooltip on polygon',
				'desc' => 'If enabled, then tooltip will show on polygon when user will click on it.',
			),
			'_onlyinpro_ut35' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'usertracking',
				'subcategory' => 'temppolygonps',
				'title' => 'Template for the project site polygon info window content',
				'desc' => 'You can use HTML and the following shortcodes: [name] [description] [coordinates] [UTMcoordinates] [polygoncoordinates] [updatedate] [deletelink] [timediff] [iconlabel].<br><br>[deletelink] will work only for admin privilege user and return output with anchor tag.',
			),
			'_onlyinpro_ut36' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'usertracking',
                'subcategory' => 'temppolygonps',
                'title'       => 'Reset project site polygon table',
                'desc'        => 'Delete all project site polygon entries from table',
            ),
						
			// Location Form
			Settings::OPTION_LOCATION_FORM_DESCRIPTION => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Optional',
					'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Description',
				'desc' => '',
			),
			Settings::OPTION_LOCATION_FORM_STATUS => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Visible',
					//'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Status',
				'desc' => '',
			),
			'_onlyinpro_lf3' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Category',
				'desc' => '',
			),
			'_onlyinpro_lf4' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Create Category',
				'desc' => 'If enabled, then user able to create new categories from frontend form.
				<br>Notice: This option will show if above category field set visible.',
			),
			'_onlyinpro_lf5' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Marker icon',
				'desc' => '',
			),
			'_onlyinpro_lf6' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Upload marker icon',
				'desc' => '',
			),
			'_onlyinpro_lf7' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Tags',
				'desc' => '',
			),
			Settings::OPTION_LOCATION_FORM_IMAGES => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Visible',
					//'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Images',
				'desc' => '',
			),
			'_onlyinpro_lf9' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Google Images',
				'desc' => '',
			),
			Settings::OPTION_LOCATION_FORM_VIDEOS => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Visible',
					//'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Videos',
				'desc' => '',
			),
			'_onlyinpro_lf11' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Shape Tool',
				'desc' => 'If enabled, then shape tool enable on map',
			),
			'_onlyinpro_lf12' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'OSM Tiles',
				'desc' => 'If enabled, then user able to add up to 6 tiles',
			),
			Settings::OPTION_LOCATION_FORM_LATITUDE => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Visible',
					//'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Latitude/Longitude',
				'desc' => '',
			),
			/*
			Settings::OPTION_LOCATION_FORM_LONGITUDE => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Visible',
					//'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Longitude',
				'desc' => '',
			),
			*/
			'_onlyinpro_lf15' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Marker Alt',
				'desc' => '',
			),
			Settings::OPTION_LOCATION_FORM_ADDRESS => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Optional',
					'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Address',
				'desc' => '',
			),
			'_onlyinpro_lf17' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'City',
				'desc' => '',
			),
			Settings::OPTION_LOCATION_FORM_POSTALCODE => array(
				'type' => Settings::TYPE_RADIO,
				'options' => array(
					'none' => 'None',
					'optional' => 'Optional',
					'required' => 'Required',
				),
				'default' => 'optional',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Postal code',
				'desc' => '',
			),
			'_onlyinpro_lf19' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Phone Number',
				'desc' => '',
			),
			'_onlyinpro_lf20' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Website',
				'desc' => '',
			),
			'_onlyinpro_lf21' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Email address',
				'desc' => '',
			),
			'_onlyinpro_lf22' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'URL',
				'desc' => '',
			),
			'_onlyinpro_lf23' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Terms & Conditions',
				'desc' => 'If visible, then terms & conditions checkbox will be show in add location form and without accepting user can not be submit',
			),
			'_onlyinpro_lf24' => array(
				'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
				'category' => 'locationform',
				'subcategory' => 'locationform',
				'title' => 'Link Sharing',
				'desc' => '',
			),
					
			// Taxonomies
			'_onlyinpro_t1' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'taxonomies',
                'subcategory' => 'taxonomies',
                'title'       => 'Custom Taxonomies',
                'desc'        => '',
            ),
				
			// GDPR
			'_onlyinpro_g1' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'cm-gdpr',
                'subcategory' => 'section',
                'title'       => 'Show disclaimer for first time users?',
                'desc'        => 'If enabled, users that don\'t agree with the terms won\'t be able to post.',
            ),
			'_onlyinpro_g2' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'cm-gdpr',
                'subcategory' => 'section',
                'title'       => 'Disclaimer text',
                'desc'        => 'This message will be shown for first time users. You can add HTML tags here to add rich formatting and links.',
            ),
			'_onlyinpro_g3' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'cm-gdpr',
                'subcategory' => 'section',
                'title'       => 'Accept button text',
                'desc'        => '',
            ),
			'_onlyinpro_g4' => array(
                'type' => self::TYPE_CUSTOM,
				'content' => 'Available in Pro version and above.<br><a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a>',
                'category'    => 'cm-gdpr',
                'subcategory' => 'section',
                'title'       => 'Reject button text',
                'desc'        => '',
            )

		));

	}

	static function getRouteParamsNames() {
		return array(
			'address' => 'Address',
			'postal_code' => 'Postal code',
			'created' => 'Created date',
		);
	}

	static function getAccessOptionsWithoutGuest() {
		return static::getAccessOptions(false);
	}

	static function getAccessOptions($guests = true) {
		if ($guests) {
			$result = array(self::ACCESS_GUEST => 'Everyone including guests');
		} else {
			$result = array();
		}
		return array_merge($result, array(
			self::ACCESS_USER => 'Only logged in users',
		),
		self::getRolesOptions(),
		array(
			self::ACCESS_CAPABILITY => 'Custom capability...',
		));
	}

	public static function getPageTemplate() {
		if ($template = Settings::getOption(Settings::OPTION_PAGE_TEMPLATE_OTHER)) {
			return $template;
		} else {
			$template = Settings::getOption(Settings::OPTION_PAGE_TEMPLATE);
			$available = Settings::getPageTemplatesOptions();
			if (!empty($template) AND isset($available[$template])) {
				return $template;
			} else {
				return 'page.php';
			}
		}
	}

	public static function getIndexMapMarkerClick() {
		$val = Settings::getOption(Settings::OPTION_INDEX_MAP_MARKER_CLICK);
		if (empty($val)) $val = self::DEFAULT_INDEX_MAP_MARKER_CLICK;
		return $val;
	}

	public static function getIndexListItemClick() {
		$val = Settings::getOption(Settings::OPTION_INDEX_LIST_ITEM_CLICK);
		if (empty($val)) $val = self::DEFAULT_INDEX_LIST_ITEM_CLICK;
		return $val;
	}

	public static function getIndexOrderBy() {
		$val = Settings::getOption(Settings::OPTION_INDEX_ORDERBY);
		if (empty($val)) $val = self::DEFAULT_INDEX_ORDERBY;
		return $val;
	}

	public static function getIndexOrder() {
		$val = Settings::getOption(Settings::OPTION_INDEX_ORDER);
		if (empty($val)) $val = self::DEFAULT_INDEX_ORDER;
		return $val;
	}

	public static function getTooltipDescriptionCharsNumber() {
		$val = Settings::getOption(Settings::OPTION_TOOLTIP_DESCRIPTION_CHARS);
		if (empty($val)) $val = self::DEFAULT_TOOLTIP_DESCRIPTION_CHARS;
		return $val;
	}

	public static function setTriggerFlushRewrite() {
		update_option(App::prefix(App::OPTION_TRIGGER_FLUSH_REWRITE), 1);
	}

}