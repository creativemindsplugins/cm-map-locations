<?php
use com\cminds\maplocations\model\Labels;
use com\cminds\maplocations\model\Settings;
?>
<div class="cmloc-location-index-top"><?php echo $text; ?></div>
<?php
if(Settings::getOption(Settings::OPTION_INDEX_SEARCH_ENABLE) == '1') {
	?>
	<div class="cmmrm-route-search-shortcode">
		<div class="cmloc-location-index-filter cmloc-filter">
			<form action="" class="cmloc-location-filter-form">
				<label class="cmloc-field-search">
					<?php
					if(Settings::getOption(Settings::OPTION_INDEX_SEARCH_MODE) == 'nearest') {
						?>
						<input type="text" name="zipcode" placeholder="Search..." class="cmloc-input-search" value="<?php echo (isset($_GET['zipcode']))?$_GET['zipcode']:''; ?>" style="margin-bottom:10px !important;" />
						<?php
					} else {
						?>
						<input type="text" name="s" value="<?php echo (isset($_GET['s']))?$_GET['s']:''; ?>" placeholder="Search..." class="cmloc-input-search" style="margin-bottom:10px !important;" />
						<?php
					}
					?>
					<button type="submit" class="cmloc-submit-btn" title="Search">
						<span class="dashicons dashicons-search"></span>
					</button>
				</label>
			</form>
		</div>
	</div>
	<?php
}
?>