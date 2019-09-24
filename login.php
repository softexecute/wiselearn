<?php
function my_custom_login()
{
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/custom_login_style.css" />';
}
add_action('login_head', 'my_custom_login');
function custom_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
return 'Default Site Title';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );
function custom_login_error_message()
{
return 'Please enter valid login credentials.';
}
add_filter('login_errors', 'custom_login_error_message');
function custom_login_head() {
remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'custom_login_head');
function custom_login_redirect( $redirect_to, $request, $user )
{
global $user;
if( isset( $user->roles ) && is_array( $user->roles ) ) {
if( in_array( "administrator", $user->roles ) ) {
return $redirect_to;
} else {
return home_url();
}
}
else
{
return $redirect_to;
}
}
add_filter("login_redirect", "custom_login_redirect", 10, 3);
add_filter( 'login_footer', 'default_rememberme_checked' );
}
add_action( 'init', 'default_checked_remember_me' );
function default_rememberme_checked() {
echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
