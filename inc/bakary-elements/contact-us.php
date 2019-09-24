<?php
/*=====================================================
This short Code WIll work when visual composer is active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
function wiselearn_contact_form( $atts ) {

	$atts = shortcode_atts( array(
'description'=>'',
'contact_heading'=>''

	), $atts);

	extract($atts);
	ob_start();
?>

<?php
if(function_exists('cs_get_option')){
	$phone = cs_get_option('phone');
	$email = cs_get_option('email');
	$facebook= cs_get_option('facebook');
	$twitter= cs_get_option('twitter');
	$linkedin= cs_get_option('linkedin');
	$skype= cs_get_option('skype');
	$address= cs_get_option('address');
	$cityandcountry= cs_get_option('cityandcountry');
}
else{
	$phone = '+880 1933653535';
	$email ='company@gmail.com';
	$facebook= '#';
	$twitter=  '#';
	$linkedin=  '#';
	$skype=  '#';
	$address= 'address 01';
	$cityandcountry= 'City and Country';
}
?>



<div class="contact-page-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 pt-100">
					<div class="contact-form contact-page-form">	
						<div class="contact-field">	
							<div class="contact-form-title">
								<h3><?php esc_html_e($contact_heading, 'wiselearn')?></h3>
								<p> <?php esc_html_e($description, 'wiselearn')
								?>  </p>							
							</div>
							<div class="row">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">								
									<div class="col-md-6 col-sm-6 col-xs-12 pd-right-10">
										<div class="single-input-field">
											<input placeholder="Your Name *" type="text" name="name">
										</div>
									</div>							
									<div class="col-md-6 col-sm-6 col-xs-12 pd-left-10">
										<div class="single-input-field">
											<input placeholder="Email Address *" type="email" name="email">
										</div>
									</div>		
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="single-input-field">
											<textarea placeholder="Your Message" name="message"></textarea>
										</div>
									</div>															
									<div class="col-md-3 col-sm-12 col-xs-12">
										<div class="single-input-fieldsbtn">
											<input value="Submit" type="submit" name="csubmit">
										</div>	
									</div>																
								</form>
							</div>
						</div>															
					</div>
				</div>			
				<div class="col-md-4 col-sm-6 contact-form-sec">
					<div class="contact-info-inner">
						<div class="contact-info-text">
							<h3 class="contact-info-title"><?php echo esc_html__('Mail');?></h3>
							<div class="contact-info-icon">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="contact-info-desc">
								<span><?php echo esc_html_e($email,'wiselearn')?></span>
							</div>
						</div>				
						<div class="contact-info-text">
							<h3 class="contact-info-title"><?php echo esc_html__('Phone');?></h3>
							<div class="contact-info-icon">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="contact-info-desc">
								<span><?php echo esc_html_e($phone,'wiselearn')?></span>
							</div>
						</div>				
						<div class="contact-info-text">
						<h3 class="contact-info-title"><?php echo esc_html__('Address')?></h3>
							<div class="contact-info-icon">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="contact-info-desc">
								<span><?php echo esc_html_e($address,'wiselearn')?></span>
								<span><?php echo esc_html_e($cityandcountry,'wiselearn')?></span>
							
							</div>
						</div>				
					</div>
				</div>	
				<div class="col-md-2 col-sm-12 contact-social">
					<div class="contact-social-profile">
						<ul>
							<li><a href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo esc_url($twitter);?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo esc_url($linkedin);?>"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="skype:<?php echo esc_url($skype);?>?call"><i class="fa fa-skype"></i></a></a></li>
						</ul>						
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
return ob_get_clean();
}

add_shortcode('contact_form','wiselearn_contact_form');


// Wp bakary page builder code goes here
add_action( 'vc_before_init', 'contact_section' );
if (!function_exists('contact_section')) :
function contact_section() {
	if (function_exists('vc_map')) :
 vc_map( array(
  "name" => __( "Contact", "wiselearn" ),
  "base" => "contact_form",
  "class" => "",
  "category" => __( "Wiselearn", "wiselearn"),
  "icon" =>"fa fa-envelope-open",
  "params" => array(
				array(
				  "type" => "textfield",
				  "heading" => __( "Contact Form Heading", "wiselearn" ),
				  "param_name" => "contact_heading",
				  "description" => __( "Example: Get in Touch ", "wiselearn" ),
				 ),
				array(
				  "type" => "textfield",
				  "heading" => __( "Invite to Countact with you", "wiselearn" ),
				  "param_name" => "description",
				  "description" => __( "Example: Your message is most important to us ", "wiselearn" ),
				 )

  )
 ) );
endif;
}
endif;


// Php exution code goes here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['csubmit'])) {

	if(function_exists('cs_get_option')){
	$email = cs_get_option('email');
}
else{
	$email ='coxismail.bd@gmail.com';
}
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $email;
    $email_subject = "Contact-";
 
    function died($error) {
        // your error code can go here
        echo "<h3>We are very sorry, but there were error(s) found with the form you submitted. </h3>";
        echo "<h4>These errors appear below.</h4>";
        echo $error."<br/>";
        echo 'Please '.' <INPUT TYPE="button" VALUE="Go Back" onClick="history.go(-1);"> '.' and fix these errors.';
        echo '';

        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp, $email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 <script type="text/javascript">
 	alert('Thank you for contacting us. We will be in touch with you very soon');
 	window.location.href = 'http://' + window.location.hostname + '/index.php/'


 </script>
<?php
}
}
