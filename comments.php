<?php

if ( post_password_required() ) {
	return;
}
?>

<div class="commenter-sec">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
			<?php	wp_list_comments( array(
						'style'      => '',
						'short_ping' => true,
								'callback' => 'better_comments'
					) );
			?>


		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wiselearn' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

<!-- #comments -->
<!-- End News Content Located in Content.php-->
</div>