<?php
use com\cminds\maplocations\App;
ob_start();
include plugin_dir_path(__FILE__) . 'views/plugin_compare_table.php';
$plugin_compare_table = ob_get_contents();
ob_end_clean();
$activation_redirect_wizard = get_option('cmloc_AddWizardMenu', 1);
$cminds_plugin_config = array(
	'plugin-is-pro'				 => App::isPro(),
	'plugin-has-addons'      => TRUE,
	'plugin-addons'        => array(
		array(
			'title' => 'CM Map Routes Manager',
			'description' => 'Draw map routes and generate a catalog of routes and trails with points of interest using Google maps. ',
			'link' => 'https://www.cminds.com/wordpress-plugins-library/google-maps-routes-manager-plugin-for-wordpress-by-creativeminds/?utm_source=locationfree&utm_campaign=freeupgrade&upgrade=1',
			'link_buy' => 'https://www.cminds.com/checkout/?edd_action=add_to_cart&download_id=54033&edd_options[price_id]=1&utm_source=locationfree&utm_campaign=freeupgrade&upgrade=1'
		),
		array(
			'title' => 'CM Business Directory',
			'description' => 'Build online business directory. Let WordPress users post and manage listings. Includes payment support.',
			'link' => 'https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/?utm_source=locationfree&utm_campaign=freeupgrade&upgrade=1',
			'link_buy' => 'https://www.cminds.com/checkout/?edd_action=add_to_cart&download_id=33301&edd_options[price_id]=1&utm_source=locationfree&utm_campaign=freeupgrade&upgrade=1'
		),
	),
    'plugin-upgrade-text'           => 'Good Reasons to Upgrade to Pro',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Introduction to the locations manager', 'video_time' => '0:00' ),
        array( 'title' => 'Multiple templates for locations index', 'video_time' => 'More' ),
        array( 'title' => 'Support video and images', 'video_time' => 'More' ),
        array( 'title' => 'Choose custom location icon', 'video_time' => 'More' ),
        array( 'title' => 'Import locations from CSV', 'video_time' => '1:15' ),
        array( 'title' => 'Tags and categories support', 'video_time' => '1:27' ),
        array( 'title' => 'Zip search support', 'video_time' => '1:45' ),
        array( 'title' => 'Customize labels and messages', 'video_time' => '2:00' ),
    ),
    'plugin-upgrade-video-height'   => 240,
    'plugin-upgrade-videos'         => array(
        array( 'title' => 'Map Locations Premium Features', 'video_id' => '146739374' ),
    ),
	'plugin-version'					=> App::VERSION,
	'plugin-abbrev'						=> App::PREFIX,
	'plugin-parent-abbrev'				=> '',
	'plugin-affiliate'					=> '',
	'plugin-campign'					=> '?utm_source=locationfree&utm_campaign=freeupgrade',
	'plugin-redirect-after-install'		=> $activation_redirect_wizard ? admin_url( 'admin.php?page=cmloc_setup_wizard' ) : admin_url( 'admin.php?page=cmloc-settings' ),
	'plugin-show-guide'                 => TRUE,
	'plugin-guide-text'                 => '    <div style="display:block">
	<ol>
	<li>Go to the plugin <strong>"Setting"</strong></li>
	<li>Get a  <strong>Google Maps Server APP Key</strong> and add it to the plugin settings. </li>
	<li>From the plugin settings click on the <strong>user dashboard</strong> link</li>
	<li>Add your first location. You need to pin the location on the Google map and you can also add a description and images.</li>
	<li><strong>View</strong> the location</li>
	<li>In the <strong>Plugin Settings</strong> you can click on the link of all locations to view them all on one map.</li>
	<li><strong>Troubleshooting:</strong> Make sure that you are using Post name permalink structure in the WP Admin Settings -> Permalinks.</li>
	<li><strong>Troubleshooting:</strong> If post type archive does not show up or displays 404 then install Rewrite Rules Inspector plugin and use the Flush rules button.</li>
	<li><strong>Troubleshooting:</strong> Get the Google Maps Server APP Key. Plugin will not work without it.</li>
	</ol>
	</div>',
	'plugin-guide-video-height'         => 240,
	'plugin-guide-videos'               => array(
		array( 'title' => 'Installation tutorial', 'video_id' => '160220318' ),
	),
	'plugin-show-shortcodes'	 => TRUE,
	'plugin-shortcodes'			 => '<p>You can use the following available shortcodes.</p>',
	'plugin-shortcodes-action'	 => 'cmloc_display_supported_shortcodes',
	'plugin-settings-url' 		 => admin_url( 'admin.php?page=cmloc-settings' ),
	'plugin-file'				 => App::getPluginFile(),
	'plugin-dir-path'			 => plugin_dir_path( App::getPluginFile() ),
	'plugin-dir-url'			 => plugin_dir_url( App::getPluginFile() ),
	'plugin-basename'			 => plugin_basename( App::getPluginFile() ),
	'plugin-icon'				 => '',
	'plugin-name'				 => App::PLUGIN_NAME,
	'plugin-license-name'		 => App::PLUGIN_NAME,
	'plugin-slug'				 => App::PREFIX,
	'plugin-short-slug'			 => App::PREFIX,
	'plugin-parent-short-slug'	 => '',
	'plugin-menu-item'			 => App::PREFIX,
	'plugin-textdomain'			 => '',
	'plugin-userguide-key'		 => '2723-cm-map-locations-cmml-free-version-tutorial',
	'plugin-store-url'			 => 'https://www.cminds.com/wordpress-plugins-library/multiple-locations-google-maps/?utm_source=locationfree&utm_campaign=freeupgrade&upgrade=1',
	'plugin-support-url'		 => 'https://www.cminds.com/contact/',
	'plugin-review-url'			 => 'https://www.cminds.com/wordpress-plugins-library/multiple-locations-google-maps//#reviews',
	'plugin-changelog-url'		 => 'https://www.cminds.com/wordpress-plugins-library/multiple-locations-google-maps/',
	'plugin-video-tutorials-url' => 'https://www.videolessonsplugin.com/video-lesson/lesson/google-map-locations-plugin/',
	'plugin-licensing-aliases'	 => App::getLicenseAdditionalNames(),
	'plugin-compare-table'		 => $plugin_compare_table,
);