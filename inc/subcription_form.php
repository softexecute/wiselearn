<?php 
/*=====================================================
-------Email Subcription Form-----------
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/

add_action( 'init', 'ismail_register_shortcode_for_newsletter');

function ismail_register_shortcode_for_newsletter(){
	
	add_shortcode('Email_Subcriptions', 'Email_Subcription_function' );
}

class ismail_Subscription_widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 
			'classname' => 'Email_Subcription',
			'description' => 'A Simple Email Subscription Widget to get subscribers info',
		);
		parent::__construct( 'my_widget', 'Email Subscriptions', $widget_ops );
	}

	public function widget( $args, $instance ) {
		echo '<aside>'; 
		do_action('Email_Subcription');
		echo '</aside>';
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'ismail_Subscription_widget' );
});
	

if(!function_exists('Email_Subcription_function')) {
	add_action('Email_Subcription' , 'Email_Subcription_function' );

	function Email_Subcription_function() {

		if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['ismail_submit_subscription'])) {

			if( filter_var($_POST['subscriber_email'], FILTER_VALIDATE_EMAIL) ){
				
				 $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
				 
				 $subject = sprintf(__('New Subscription on %s','wiselearn'), $blogname);
				 
				 $to = get_option('admin_email'); 
				 
				 $headers = 'From: '. sprintf(__('%s Admin', 'wiselearn'), $blogname) .' <No-repy@'.$_SERVER['SERVER_NAME'] .'>' . PHP_EOL;
				 
				$message  = sprintf(__('Hi ,', 'wiselearn')) . PHP_EOL . PHP_EOL;
				$message .= sprintf(__('You have a new subscription on your %s website.', 'wiselearn'), $blogname) . PHP_EOL . PHP_EOL;
				$message .= __('Email Details', 'wiselearn') . PHP_EOL;
				$message .= __('-----------------') . PHP_EOL;
				$message .= __('User E-mail: ', 'wiselearn') . stripslashes($_POST['subscriber_email']) . PHP_EOL;
				$message .= __('Regards,', 'wiselearn') . PHP_EOL . PHP_EOL;
				$message .= sprintf(__('Your %s Team', 'wiselearn'), $blogname) . PHP_EOL;
				$message .= trailingslashit(get_option('home')) . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;
			
				if (wp_mail($to, $subject, $message, $headers)){
				
					echo 'Your e-mail (' . $_POST['subscriber_email'] . ') has been added to our mailing list!';
				}	else	{
				   echo 'There was a problem with your e-mail (' . $_POST['subscriber_email'] . ')';   
				}
			}else{
			   echo 'There was a problem with your e-mail (' . $_POST['subscriber_email'] . ')';   
			}
		}?>

		<div class="animate-onscroll">					
			<form id="newsletter-footer" action="" method="POST">					
				<h5><strong>Sign up</strong> for email updates</h5>
				<div class="newsletter-form">				
					<div class="newsletter-email" style="margin-bottom:10px; " >
						<input type="email" name="subscriber_email" placeholder="Email address">
					</div>
					<div class="newsletter-submit">
		<input type="hidden" name="ismail_submit_subscription" value="Submit"><input type="submit" name="submit_form" value="Submit">			
					</div>
				</div>
			</form>
		</div>							
	<?php }

} ?>