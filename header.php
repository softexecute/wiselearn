<?php
if(function_exists('cs_get_option')){
	$phone = cs_get_option('phone');
	$email = cs_get_option('email');
	$headmenubgcolor = cs_get_option('headmenubgcolor');
	$menubgcolor = cs_get_option('menubgcolor');
}
else{
	$phone = '+880 1933653535';
	$email ='company@gmail.com';
}


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- Meta Tags -->	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<?php 
function create_meta_desc() {
    global $post;
	if (!is_singular()) {
	echo "<meta name='description' content='"; 
	echo bloginfo('name'); echo " - "; 
	echo bloginfo('description');
	echo "'/>";
	}
	elseif(!empty( $post->post_excerpt)) {
		echo "<meta name='description' content='$post->post_excerpt' />";
	}
	else{
		$meta = apply_filters('the_content', $post->post_content);
		$meta = strip_tags($meta);
		$meta = strip_shortcodes($meta );
		$meta = str_replace( array("\n", "\r", "\t", "<!-- wp:paragraph -->", "<p>", "<!--nextpage-->"), ' ', $meta );
		$meta = substr($meta, 0, 400);
	echo "<meta name='description' content='$meta' />";
	echo '<meta property="og:image" content="'. get_the_post_thumbnail_url(get_the_ID(),'full')   .'" />';
	}
}
add_action('wp_head', 'create_meta_desc');
	?>

	<meta name="keywords" content="<?php the_tags();?>">
	<meta name="author" content="<?php bloginfo('name');?>">

	<!-- Title -->
	<?php wp_head();
	 ?>	
</head>
<body class="home-v1" <?php body_class(); ?>>
	<!-- Preloader Start -->
	<div id="preloader">
		<div id="preloader-status"></div>
	</div>
	<!-- Preloader End -->
	<!-- Header Start -->
	<header>
		<!-- Header Topbar Start -->
<div class="header-top"  style="background-color: <?php echo esc_attr($headmenubgcolor)?>">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="header-menu">
							<ul>
								<?php
								wp_nav_menu( array(
									'theme_location' => 'header_menu',
									'menu_id'        => 'header_menu',
								) );
								?>

							</ul>							
						</div>
					</div>
					<div class="col-md-9 col-sm-9 text-right">
						<div class="header-info">
							<ul>
								
								<li><a class="phone_number" href="tel:<?php echo esc_html($phone)?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html__($phone, 'wiselearn')?></a></li>													
								<li><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html($email)?></li>												
							</ul>
								
						</div>
						<div class="translate-language">	
	<!-- 			<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="ftwtranslation_button"><i class="fa fa-globe" aria-hidden="true" ></i> <span class="fa fa-caret-down"></span></a> -->
					
					 <?php echo do_shortcode('[google-translator]'); ?>				
						</div>						
					</div>				
				</div>
			</div>
		</div>
		<!-- Header Topbar End -->
		<!-- Main Bar Start -->
		<div class="hd-sec" style="background-color: <?php echo esc_attr($menubgcolor)?>">
			<div class="container">
				<div class="row">
					<!-- Logo Start -->
					<div class="col-md-3 col-sm-3 col-xs-8">
						<div class="logo">
<?php							
if ( has_custom_logo() ){
	?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
	<?php the_custom_logo();?></a>
	
	<?php
	}
	else{
	?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' );?></a>
	<?php
}
	?>
		</div>
					</div>	
					<!-- Logo End -->
					<!-- Main Menu Start -->
					<div class="mobile-nav-menu"></div>						
					<div class="col-md-9 col-sm-9 nav-menu">
						<div class="menu">
							<nav id="main-menu" class="main-menu">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'Primary-Menu',
								) );
								?>
								
							</nav>
						</div>					
					</div>	
					<!-- Main Menu End -->
				</div>
			</div>
		</div>
		<!-- Main Bar End -->
	</header>
	<!-- Header End -->	

