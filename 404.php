<?php

get_header();
?>

<!-- Error Page Start -->
	<div class="event-page pt-100 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="error-desc">
						<h1 class="error-title">404</h1>
						<h1 class="error-sub-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wiselearn' ); ?></h1>
						<p>Start from our <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Homepage.</a></p>
					</div>								
				</div>			
			</div>			
		</div>
	</div>
	<!-- Error Page End -->


<?php
get_footer();
