<?php
use com\cminds\maplocations\model\Route;
use com\cminds\maplocations\model\Labels;
use com\cminds\maplocations\model\Settings;
use com\cminds\maplocations\controller\RouteController;
use com\cminds\maplocations\controller\DashboardController;
use com\cminds\maplocations\controller\FrontendController;

$printScript = function() use ($routes) {
	?><script type="text/javascript">
	jQuery(function($) {
		if (typeof window.cmlocMaps == 'undefined') window.cmlocMaps = [];
		if (document.getElementById('cmloc-location-index-map-canvas')) {
			window.cmlocMaps.push(new CMLOC_Index_Map('cmloc-location-index-map-canvas', <?php echo json_encode($routes); ?>));
		}
	});
	</script><?php
};
$index_menu_enable = get_option('cmloc_index_menu_enable', 0);
if ($index_menu_enable == '1') {
    ?>
    <div class="cmloc-index-menu">
        <ul>
            <li class="menu_all_locations">
                <a href="<?php echo esc_attr(FrontendController::getUrl()); ?>">
                    <?php echo Labels::getLocalized('menu_all_locations'); ?>
                </a>
            </li>
            <?php if (Route::canCreate()): ?>
                <li class="menu_my_locations">
                    <a href="<?php echo esc_attr(RouteController::getDashboardUrl('index')); ?>">
                        <?php echo Labels::getLocalized('menu_my_locations'); ?>
                    </a>
                </li>
                <li class="menu_add_location">
                    <a href="<?php echo esc_attr(RouteController::getDashboardUrl('add')); ?>">
                        <?php echo Labels::getLocalized('menu_add_location'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php } ?>
<div class="cmloc-location-index-map" style="<?php
		if (!empty($atts['mapwidth'])) echo 'width:' . $atts['mapwidth'] .'px;';
		if (!empty($atts['mapheight'])) echo 'height:' . $atts['mapheight'] .'px;';
	?>">
	<div id="cmloc-location-index-map-canvas" style="<?php
		if (!empty($atts['mapwidth'])) echo 'width:' . $atts['mapwidth'] .'px;';
		if (!empty($atts['mapheight'])) echo 'height:' . $atts['mapheight'] .'px;';
	?>"></div>
	<?php
	if (defined('DOING_AJAX') && DOING_AJAX) {
		$printScript();
	} else {
		add_action('wp_footer', $printScript, PHP_INT_MAX);
	} ?>
</div>