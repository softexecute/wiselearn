<?php
/**
 * The template for displaying search results pages
 
 */

get_header();
?>

			<div class="container">
			<div class="row">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<p class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Showing Results for: %s ', 'wiselearn' ), '<span><b>' . get_search_query() . '</b></span>' );
					?>
				</p>
			</header><!-- .page-header -->
				<div class="col-md-8">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			?>
				<ul class="pagination custom-pagination">
							<li>
							<?php the_posts_pagination(array(
							'screen_reader_text'=>' ',
							'prev_text'=>'<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
							'next_text'=>'<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
							));?>
					
							</li>
					</ul>
<?php
		else :
			?>
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'wiselearn' ); ?></h1>
			</header><!-- .page-header -->
		<div class="col-md-8">
			<?php		get_template_part( 'template-parts/content', 'none' );

		endif;
?>
		</div>
<?php	
get_sidebar();
	?>
</div>
</div>



<?php

get_footer();
