<?php
use com\cminds\maplocations\view\SettingsView;
use com\cminds\maplocations\model\Labels;

$settingsView = new SettingsView();
$labelsByCategories = Labels::getLabelsByCategories();
/*
foreach ($labelsByCategories as $category => $labels):
	?><table><caption><?php echo (empty($category) ? 'Other' : $category); ?></caption><?php
	foreach ($labels as $key):
		if ($default = Labels::getDefaultLabel($key)) :
			?>
			<tr valign="top">
		        <th scope="row" valign="middle" align="left" ><?php echo esc_html($key) ?></th>
		        <td ><input type="text" size="60" name="label_<?php echo esc_attr($key); ?>"
		        	value="<?php echo esc_attr(Labels::getLabel($key)); ?>"
		        	placeholder="<?php echo esc_attr($default) ?>"/></td>
		        <td><?php echo Labels::getDescription($key); ?></td>
		    </tr>
	    <?php endif; ?>
	<?php endforeach; ?>
	</table>
<?php endforeach; ?>
<?php
*/
echo '<br><p class="onlyinpro" style="font-size:16px; ">Available in Pro version and above. <a href="'.get_site_url().'/wp-admin/admin.php?page=cmloc_pro">UPGRADE NOW&nbsp;➤</a></p>';
echo $settingsView->renderSubcategory('labels', 'other');
?>