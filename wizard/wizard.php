<?php
use com\cminds\maplocations\App;

use com\cminds\maplocations\controller\FrontendController;
use com\cminds\maplocations\controller\RouteController;

class CMLOCF_SetupWizard {

    /* 1. Rename this class
     * 2. Update the "Welcome.." step in /view/wizard.php file
     * 3. Update wizard steps in the setSteps()
     * 4. In the CSS and JS files you can add any custom code for the specific plugin if needed
     * 5. Update the add_submenu_page() to add wizard page correctly, and saveOptions() to update options correctly
     * 6. You can add custom functions to this class if needed
     * 7. Include this file with include_once or require_once
     */

    public static $steps;
    public static $wizard_url;
    public static $wizard_path;
    public static $options_slug = 'cmloc_'; //change for your plugin needs
    public static $wizard_screen = 'cm-map-locations_page_cmloc_setup_wizard'; //change for your plugin needs
    public static $setting_page_slug = 'cmloc-settings'; //change for your plugin needs
    public static $plugin_basename;

    public static function init() {
        self::$wizard_url = plugin_dir_url(__FILE__);
        self::$wizard_path = plugin_dir_path(__FILE__);
        self::$plugin_basename = plugin_basename(App::SLUG); //change for your plugin needs
		add_action('wp_loaded', array(__CLASS__, 'wp_loaded'));
        add_action('admin_menu', array(__CLASS__, 'add_submenu_page'),30);
        add_action('wp_ajax_cmlocf_save_wizard_options',[__CLASS__,'saveOptions']);
        add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueueAdminScripts' ] );
    }
	
	public static function wp_loaded() {
		self::setSteps();
	}
	
    public static function setSteps() {
		
		$step1_content = "";
		$step1_content .= "<p>To use CM Map Locations, setting up a Google Maps API Key is <strong>mandatory</strong>. Without it, the plugin cannot function, and you won’t be able to proceed.</p>";
		$step1_content .= "<h3>Steps to Set Up Your Google Maps API Key:</h3>";
		$step1_content .= "<p>";
		$step1_content .= "1. Visit the <strong><a href='https://console.developers.google.com/flows/enableapi?apiid=maps_backend&keyType=CLIENT_SIDE&reusekey=true' target='_blank'>Google Cloud Console</a></strong>.<br>";
		$step1_content .= "2. Create or select a project.<br>";
		$step1_content .= "3. Enable the following APIs for your project:<br>";
		$step1_content .= "&nbsp; &nbsp; &nbsp; - Maps JavaScript API<br>";
		$step1_content .= "&nbsp; &nbsp; &nbsp; - Geolocation API (requires HTTPS)<br>";
		$step1_content .= "&nbsp; &nbsp; &nbsp; - Geocoding API<br>";
		$step1_content .= "&nbsp; &nbsp; &nbsp; - Places API<br>";
		$step1_content .= "4. Generate an API key and restrict it to your domain for enhanced security.";
		$step1_content .= "</p>";
		$step1_content .= "<p>Learn more about setting up an API key in this <a href='https://creativeminds.helpscoutdocs.com/article/573-cm-map-locations-cmml-adding-api-keys' target='_blank'>User Guide</a>.</p>";
		$step1_content .= "<p>Once your API key is ready, enter it in the field below and click <strong>\"Test Configuration\"</strong> to verify your setup.</p>";
		$step1_content .= "<form>";
		$step1_content .= wp_nonce_field('wizard-form', '_wpnonce', true, false);
		$step1_content .= "<p>Enter API Key: <input type='text' name='cmloc_google_maps_app_key' id='cmloc_google_maps_app_key' value='".get_option('cmloc_google_maps_app_key', '')."' style='width:500px' /></p>";
		$step1_content .= "<p><a class='button cminds-google-maps-api-check-btn' data-api-key-field-selector='input[name=cmloc_google_maps_app_key]'>Test Configuration</a></p>";
		$step1_content .= "</form>";
		
		$step5_content = "";
		if (!current_theme_supports('widgets')) {
			$step5_content .= "<p>The theme you are currently using is not widget-aware, meaning that it has no sidebars that you are able to change.<br>For information on making your theme widget-aware, please <a href='https://developer.wordpress.org/themes/functionality/widgets/' target='_blank'>follow these instructions</a>.</p>";
		} else {
			$step5_content .= "<p>To facilitate essential navigation for your map locations, the plugin offers a dedicated widget that includes:</p>";
			$step5_content .= "<p>";
				$step5_content .= "&nbsp; &nbsp; &nbsp; • A link to the <em>All Locations</em> index page.<br>";
				$step5_content .= "&nbsp; &nbsp; &nbsp; • A link to the <em>My Locations</em> dashboard page.<br>";
				$step5_content .= "&nbsp; &nbsp; &nbsp; • A link to the <em>Add Location</em> form.";
			$step5_content .= "</p>";
			$step5_content .= "<h3>How to Add the Widget:</h3>";
			$step5_content .= "<p>";
				$step5_content .= "&nbsp; &nbsp; &nbsp; 1. Navigate to the <strong><a href='".admin_url('widgets.php')."' target='_blank'>Widgets</a></strong> page in your WordPress dashboard.<br>";
				$step5_content .= "&nbsp; &nbsp; &nbsp; 2.	Choose the desired widget area (e.g., Sidebar, Footer, or other block areas) and add the <strong>CM Map Locations Menu</strong> widget.<br>";
				$step5_content .= "&nbsp; &nbsp; &nbsp; 3.	Click <strong>Save</strong> to apply the changes.";
			$step5_content .= "</p>";
		}
			
        self::$steps = [
            1 => ['title' => 'Google API Key',
                'content' => $step1_content,
            ],
            2 => ['title' =>'Location Page Settings',
                'options' => [
                    0 => [
                        'name' => 'cmloc_single_route_params',
                        'type' => 'multicheckbox',
						'title' => 'Information visible on the location\'s page',
						'hint' => 'Choose which information about the location will be displayed on the location\'s page.',
                        'options' => [
                            0 => [
                                'title' => 'Address',
                                'value' => 'address'
                            ],
							1 => [
                                'title' => 'Postal code',
                                'value' => 'postal_code'
                            ],
							2 => [
                                'title' => 'Created date',
                                'value' => 'created'
                            ]
                        ],
						'value' => array('address', 'postal_code', 'created'),
                    ],
					1 => [
                        'name' => 'cmloc_route_map_marker_label_show',
						'type' => 'bool',                
						'title' => 'Show label below marker',
                        'hint' => 'Enable this option to display a label below the marker on the map.',
						'value' => '1',
                    ],
                    2 => [
                        'name' => 'cmloc_map_type_default',
                        'type' => 'radio',
						'title' => 'Default map view',
						'hint' => 'Select the default map view that will be applied across the site, including the location page, index page, and when creating new locations.',
                        'options' => [
                            0 => [
                                'title' => 'Roadmap',
                                'value' => 'roadmap'
                            ],
                            1 => [
                                'title' => 'Pure Satellite Without Labels',
                                'value' => 'satellite'
                            ],
                            2 => [
                                'title' => 'Hybrid Satellite With Labels',
                                'value' => 'hybrid'
                            ],
                            3 => [
                                'title' => 'Terrain',
                                'value' => 'terrain'
                            ]
                        ],
						'value' => 'roadmap',
                    ],
                ],
            ],
            3 => ['title' =>'Index Page Settings',
                'options' => [
                    0 => [
                        'name' => 'cmloc_index_route_params',
                        'type' => 'multicheckbox',
						'title' => 'Information visible on the index page',
						'hint' => 'Choose which information will be displayed for each location on the index page.',
                        'options' => [
                            0 => [
                                'title' => 'Address',
                                'value' => 'address'
                            ],
							1 => [
                                'title' => 'Postal code',
                                'value' => 'postal_code'
                            ],
							2 => [
                                'title' => 'Created date',
                                'value' => 'created'
                            ]
                        ],
						'value' => array('address', 'postal_code', 'created'),
                    ],
					1 => [
                        'name' => 'cmloc_pagination_limit',
						'type' => 'int',                
						'title' => 'Locations per page',
                        'hint' => 'Set the number of locations that will be shown on a single page of the index.',
						'value' => '10',
                    ],
					2 => [
                        'name' => 'cmloc_index_search_enable',
						'type' => 'bool',                
						'title' => 'Enable search',
                        'hint' => 'Turn on this option to allow users to search for specific locations on the index page.',
						'value' => '1',
                    ],
					3 => [
                        'name' => 'cmloc_index_menu_enable',
						'type' => 'bool',                
						'title' => 'Enable menu',
                        'hint' => 'If enabled, then location menu will show above map.',
						'value' => '0',
                    ],
                ]
            ],
			4 => ['title' =>'Add Location Form',
				'content' => '<p>Select the fields to include in the form for creating and editing locations.</p>',
                'options' => [
                    0 => [
                        'name' => 'cmloc_location_form_description',
                        'type' => 'radio',
						'title' => 'Description',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Optional',
                                'value' => 'optional'
                            ],
							2 => [
                                'title' => 'Required',
                                'value' => 'required'
                            ],
                        ],
						'value' => 'optional',
                    ],
					1 => [
                        'name' => 'cmloc_location_form_images',
                        'type' => 'radio',
						'title' => 'Images',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Visible',
                                'value' => 'optional'
                            ],
                        ],
						'value' => 'optional',
                    ],
					2 => [
                        'name' => 'cmloc_location_form_videos',
                        'type' => 'radio',
						'title' => 'Videos',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Visible',
                                'value' => 'optional'
                            ],
                        ],
						'value' => 'optional',
                    ],
					3 => [
                        'name' => 'cmloc_location_form_latitude',
                        'type' => 'radio',
						'title' => 'Latitude/Longitude',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Visible',
                                'value' => 'optional'
                            ],
                        ],
						'value' => 'optional',
                    ],
					/*
					4 => [
                        'name' => 'cmloc_location_form_longitude',
                        'type' => 'radio',
						'title' => 'Longitude',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Visible',
                                'value' => 'optional'
                            ],
                        ],
						'value' => 'optional',
                    ],
					*/
					5 => [
                        'name' => 'cmloc_location_form_address',
                        'type' => 'radio',
						'title' => 'Address',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Optional',
                                'value' => 'optional'
                            ],
							2 => [
                                'title' => 'Required',
                                'value' => 'required'
                            ],
                        ],
						'value' => 'optional',
                    ],
					6 => [
                        'name' => 'cmloc_location_form_postalcode',
                        'type' => 'radio',
						'title' => 'Postal Code',
						'hint' => '',
                        'options' => [
                            0 => [
                                'title' => 'None',
                                'value' => 'none'
                            ],
                            1 => [
                                'title' => 'Optional',
                                'value' => 'optional'
                            ],
								2 => [
                                'title' => 'Required',
                                'value' => 'required'
                            ],
                        ],
						'value' => 'optional',
                    ],
                ]
            ],
            5 => ['title' =>'Widget Settings',
                'content' => $step5_content,
			],
            6 => ['title' =>'Useful Links',
                'content' => "<p>The initial setup is complete!</p>
							  <p>In the main <strong><a href='".admin_url('admin.php?page=cmloc-settings')."' target='_blank'>Plugin settings</a></strong>, you’ll find links to the <strong><a href='".esc_attr(FrontendController::getUrl())."' target='_blank'>Index Page</a></strong> and <strong><a href='".esc_attr(RouteController::getDashboardUrl())."' target='_blank'>Dashboard</a></strong> at the top. Use these links for quick and easy navigation to your location management pages.</p>
							  <div class='cm_wizard_image_holder'>
								<a href='". self::$wizard_url . "assets/img/wizard_step_6_1.png' target='_blank'>
									<img src='". self::$wizard_url . "assets/img/wizard_step_6_1.png' width='750px' style='border:1px solid #444;' />
								</a>
							  </div>
							  <p>On the <strong><a href='".admin_url('edit.php?post_type=cmloc_object')."' target='_blank'>Locations</a></strong> page, you can view and manage all your locations. To add a new location, click the <strong><a href='".admin_url('post-new.php?post_type=cmloc_object')."' target='_blank'>Add New Location</a></strong> button to access the front-end form.</p>
							  <div class='cm_wizard_image_holder'>
								<a href='". self::$wizard_url . "assets/img/wizard_step_6_2.png' target='_blank'>
									<img src='". self::$wizard_url . "assets/img/wizard_step_6_2.png' width='750px' style='border:1px solid #444;' />
								</a>
							  </div>"
			],
        ];
        return;
    }

    public static function add_submenu_page() {
        if(get_option('cmloc_AddWizardMenu', 1)) {
            add_submenu_page( App::PREFIX, 'Setup Wizard', 'Setup Wizard', 'manage_options', self::$options_slug . 'setup_wizard', [__CLASS__,'renderWizard'], 20 );
        }
    }

    public static function enqueueAdminScripts() {
        $screen = get_current_screen();		
        if ($screen && $screen->id === self::$wizard_screen) {
            wp_enqueue_style('wizard-css', self::$wizard_url . 'assets/wizard.css');
            wp_enqueue_script('wizard-js', self::$wizard_url . 'assets/wizard.js', array('jquery', 'cmloc-google-api-check'));
            wp_localize_script('wizard-js', 'wizard_data', ['ajaxurl' => admin_url('admin-ajax.php')]);
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');
        }
    }
	
    public static function saveOptions() {
        if (isset($_POST['data'])) {
            // Parse the serialized data
            parse_str($_POST['data'], $formData);
            if(!wp_verify_nonce($formData['_wpnonce'],'wizard-form')){
                wp_send_json_error();
            }
            foreach($formData as $key => $value){
                if( !str_contains($key, self::$options_slug) ){
                    continue;
                }
                if(is_array($value)){
                    $sanitized_value = array_map('sanitize_text_field', $value);
					update_option($key, $sanitized_value);
                    continue;
                }
                $sanitized_value = sanitize_text_field($value);
				update_option($key, $sanitized_value);
            }
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }

    public static function renderWizard() {
        require 'view/wizard.php';
    }

    public static function renderSteps() {
        $output = '';
        $steps = self::$steps;
        foreach($steps as $num => $step) {
            $output .= "<div class='cm-wizard-step step-{$num}' style='display:none;'>";
            $output .= "<h1>" . self::getStepTitle($num) . "</h1>";
            $output .= "<div class='step-container'>
                            <div class='cm-wizard-menu-container'>" . self::renderWizardMenu($num)." </div>";
            $output .= "<div class='cm-wizard-content-container'>";
            if (isset($step['content'])) {
                $output .= $step['content'];
            }
			if(isset($step['options'])) {
                $output .= "<form>";
                $output .= wp_nonce_field('wizard-form');
                foreach($step['options'] as $option){
                    $output .=  self::renderOption($option);
                }
                $output .= "</form>";
            }
            $output .= '</div></div>';
            $output .= self::renderStepsNavigation($num);
            $output .= '</div>';
        }
        return $output;
    }

    public static function renderStepsNavigation($num) {
        $settings_url = admin_url( 'admin.php?page='. self::$setting_page_slug );
        $output = "<div class='step-navigation-container'><button class='prev-step' data-step='{$num}'>Previous</button>";
        if($num == count(self::$steps)){
            $output .= "<button class='finish' onclick='window.location.href = \"$settings_url\" '>Finish</button>";
        } else {
			$output .= "<button class='next-step' data-step='{$num}'>Next</button>";
        }
        $output .= "<p><a href='$settings_url'>Skip the setup wizard</a></p></div>";
        return $output;
    }

    public static function renderOption($option) {
        switch($option['type']) {
            case 'bool':
                return self::renderBool($option);
            case 'int':
                return self::renderInt($option);
            case 'string':
                return self::renderString($option);
            case 'radio':
                return self::renderRadioSelect($option);
            case 'select':
                return self::renderSelect($option);
            case 'color':
                return self::renderColor($option);
            case 'multicheckbox':
                return self::renderMulticheckbox($option);
        }
    }
	
	public static function renderBool($option) {
		$val = get_option($option['name'], $option['value']);
        $checked = checked(1, get_option($option['name'], $option['value']), false);
        $output = "<div class='form-group'>";
		$output .= "<label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
		$output .= "<input type='hidden' name='{$option['name']}' value='0'>";
        $output .= "<input type='checkbox' id='{$option['name']}' name='{$option['name']}' class='toggle-input' value='{$val}' {$checked}>";
		$output .= "<label for='{$option['name']}' class='toggle-switch'></label>";
		$output .= "</div>";
        return $output;
    }

    public static function renderInt($option) {
        $min = isset($option['min']) ? "min='{$option['min']}'" : '';
        $max = isset($option['max']) ? "max='{$option['max']}'" : '';
        $step = isset($option['step']) ? "step='{$option['step']}'" : '';
        $value = get_option( $option['name'], $option['value']);
        return "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <input type='number' id='{$option['name']}' name='{$option['name']}' value='{$value}' {$min} {$max} {$step}/>
            </div>";
    }

    public static function renderString($option) {
        $value = get_option( $option['name'], $option['value'] );
        return "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <input type='text' id='{$option['name']}' name='{$option['name']}' value='{$value}'/>
            </div>";
    }

    public static function renderRadioSelect($option) {
        $options = $option['options'];
        $output = "<div class='form-group'>";
		if($option['hint'] != '') {
			$output .= "<label class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
		} else {
			$output .= "<label class='label'>{$option['title']}</label>";
		}
        $output .= "<div>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
		foreach($options as $item) {
            $checked = checked($item['value'], get_option($option['name'], $option['value']), false);
            $output .= "<input type='radio' id='{$option['name']}_{$item['value']}' name='{$option['name']}' value='{$item['value']}' {$checked}/>
                <label for='{$option['name']}_{$item['value']}'>{$item['title']}</label><br>";
        }
        $output .= "</div>";
		$output .= "</div>";
        return $output;
    }

    public static function renderColor($option) {
        ob_start();
		?>
        <script>jQuery(function ($) { $('input[name="<?php echo esc_attr($option['name']); ?>"]').wpColorPicker(); });</script>
		<?php
        $output = ob_get_clean();
        $value = get_option( $option['name'], $option['value']);
        $output .= "<div class='form-group'><label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
        $output .= sprintf('<input type="text" name="%s" value="%s" />', esc_attr($option['name']), esc_attr($value));
        $output .= "</div>";
        return $output;
    }

    public static function renderSelect($option) {
        $options = $option['options'];
		$output = "<div class='form-group'>";
        $output .= "<label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
		$output .= "<select id='{$option['name']}' name='{$option['name']}'>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
        foreach($options as $item) {
			$selected = selected($item['value'],get_option( $option['name'] ),false);
			$output .= "<option value='{$item['value']}' {$selected}>{$item['title']}</option>";
		}
		$output .= "</select></div>";
		return $output;
	}
	
    public static function renderMulticheckbox($option) {
        $options = $option['options'];
        $output = "<div class='form-group'>";
        $output .= "<label class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
		$output .= "<div>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
		foreach($options as $item) {
            $checked = in_array($item['value'], get_option( $option['name'], $option['value'] )) ? 'checked' : '';
            $output .= "<input type='checkbox' id='{$option['name']}_{$item['value']}' name='{$option['name']}[]' value='{$item['value']}' {$checked}/>
                <label for='{$option['name']}_{$item['value']}'>{$item['title']}</label><br>";
        }
        $output .= "</div>";
        $output .= "</div>";
        return $output;
    }

    public static function renderWizardMenu($current_step) {
        $steps = self::$steps;
        $output = "<ul class='cm-wizard-menu'>";
        foreach ($steps as $key => $step) {
            $num = $key;
            $selected = $num == $current_step ? 'class="selected"' : '';
            $output .= "<li {$selected} data-step='$num'>Step $num: {$step['title']}</li>";
        }
        $output .= "</ul>";
        return $output;
    }

    public static function getStepTitle($current_step) {
        $steps = self::$steps;
        $title = "Step {$current_step}: ";
        $title .= $steps[$current_step]['title'];
        return $title;
    }

    //Custom functions
	
}

CMLOCF_SetupWizard::init();