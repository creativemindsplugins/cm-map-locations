<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$global_settings = wp_get_global_settings();
$wide_size = $global_settings['layout']['wideSize'] ?? '';
$content_size = $global_settings['layout']['contentSize'] ?? '';
echo '<style>';
if($wide_size != '') {
echo 'div.wp-site-blocks { max-width:'.$wide_size.'; margin:auto; }';
}
if($content_size != '') {
echo 'div.wp-site-blocks main.wp-block-group > h3 { max-width:'.$content_size.'; margin:auto; }';
echo 'div.wp-site-blocks main.wp-block-group > div { max-width:'.$content_size.'; margin:auto; }';
}
echo 'footer.wp-block-template-part { clear:both; }';
echo '</style>';
?>
<div class="wp-site-blocks">      
	<header class="wp-block-template-part">
		<?php block_template_part('header'); ?>
	</header>
    <main class="wp-block-group">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) : the_post(); ?>
				<h3><?php the_title(); ?></h3>
				<?php
				the_content();
			endwhile;
		}
		?>
    </main>
	<footer class="wp-block-template-part">
		<?php block_template_part('footer'); ?>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>