<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wiselearn
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4">
	<div class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
</div>
