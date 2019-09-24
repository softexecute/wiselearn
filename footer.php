

<?php
if(function_exists('cs_get_option')){
	$column = cs_get_option('columns');
	$copyright = cs_get_option('copyright');
	$bgcolor = cs_get_option('bgcolor');
	$facebook= cs_get_option('facebook');
	$twitter= cs_get_option('twitter');
	$linkedin= cs_get_option('linkedin');
	$skype= cs_get_option('skype');
	$address= cs_get_option('address');
	$cityandcountry= cs_get_option('cityandcountry');
	$description= cs_get_option('description');


}
else{
	$column = 4;
	$copyright ='Developed by: Mohammad Ismail';
	$bgcolor ='#0a0a0a';
	$facebook= '#';
	$twitter= '#';
	$linkedin= '#';
	$skype= '#';
	$address= 'Universal 234, Triumph Street, Los';
	$cityandcountry= 'Angeles, United states.' ;
}

?>




<!-- Footer Section Start -->
	<footer class="footer">	
		<!-- Footer Top Start -->
		<div class="footer-sec" style="background-color: <?php echo esc_attr($bgcolor)?>">	
			<div class="container">
				<div class="row">
			

				<?php
				if($column == 3){
					$mwidth = 3;
					}
				elseif ($column==2) {
					$mwidth = 4;
				}
				elseif ($column==1) {
					$mwidth = 6;
				}
					?>

<!-- Single Footer Widget Start -->
					<div class="col-md-<?php echo esc_attr($mwidth);?> col-sm-6 footer-widget">
						<div class="footer-wedget-one">
							<h4><?php  bloginfo('name');?></h4>
							<p><?php  echo esc_html($description);?></p>		
							<div class="footer-wedget-contact">
								<div class="footer-social-profile">
									<ul>
										<li><a href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php echo esc_url($twitter);?>"><i class="fa fa-twitter"></i></a></li>
										<li><a href="<?php echo esc_url($linkedin);?>"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="skype:<?php echo esc_url($skype);?>?call"><i class="fa fa-skype"></i></a></li>
									</ul>							
								</div>						
								<div class="inner-box">
									<div class="media">
										<div class="inner-item">
											<div class="media-left">
												<span class="icon"><i class="fa fa-map" aria-hidden="true"></i></span>
											</div>				
											<div class="media-body">
												<span class="inner-text"><?php echo esc_html_e($address, 'wiselearn')?></span>
												<span class="inner-text"><?php echo esc_html_e($cityandcountry,'wiselearn')?></span>
											</div>											
										</div>					
									</div>																		
								</div>							
							</div>								
						</div>					
					</div>	









				<?php for($i=1; $i<=$column; $i++){ 

					?>

					<!-- Single Footer Widget Start -->
						<div class="col-md-<?php echo esc_attr($mwidth);?> col-sm-6 footer-widget">
						
							<?php dynamic_sidebar('footer-'.$i)?>
						</div>	
					<!-- Single Footer Widget End -->


<?php
}
?>


				</div>
			</div>
		</div>
		<!-- Footer Top End -->
		<!-- Footer Bottom Start -->
		<div class="footer-bottom-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="copy-right">

							<p><?php echo esc_html($copyright);

					echo '- Developed By:';
					echo '<a href="https://www.facebook.com/coxismail.bd">Mohammad Ismail</a>';
							?>
								
							</p>
							
						</div>
					</div>				
				</div>
			</div>
		</div>
		<!-- Footer Bottom End -->
	</footer>
	<!-- Footer Section End -->
 <script type="text/javascript">
	jQuery('.wpb_wrapper').masonry({
  // options
  itemSelector: '.grid-item',
  //columnWidth: 150
});
</script>

	<!-- Scripts Js End -->	
<?php wp_footer(); ?>
</body>
</html>