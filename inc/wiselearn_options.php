<?php
	/*=====================================================
This short Code written for Code Star Framwork it will work when it active
=====================================================*/
/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
	defined( 'CS_ACTIVE_FRAMEWORK' )   or  define( 'CS_ACTIVE_FRAMEWORK',   true  );
    defined( 'CS_ACTIVE_METABOX'   )   or  define( 'CS_ACTIVE_METABOX',     false  );
    defined( 'CS_ACTIVE_TAXONOMY'   )  or  define( 'CS_ACTIVE_TAXONOMY',    false  );
    defined( 'CS_ACTIVE_SHORTCODE' )   or  define( 'CS_ACTIVE_SHORTCODE',   false  );
    defined( 'CS_ACTIVE_CUSTOMIZE' )   or  define( 'CS_ACTIVE_CUSTOMIZE',   false  );
    defined( 'CS_ACTIVE_LIGHT_THEME' ) or  define( 'CS_ACTIVE_LIGHT_THEME', true );

add_filter('cs_framework_settings','wiselearn_theme_option_setting');

function wiselearn_theme_option_setting($setting){
    $setting  = array(
        'menu_title' => 'Wiselearn Theme Option',
        'menu_slug' => 'wiselearn-Theme-option',
        'menu_type' => 'menu',
        'framework_title' =>'Weselearn Theme Option'
        );
    return  $setting ;

}

function wiselearn_basic_info_options($options){
		$options = array();
        $options[] = array( 
        'name'=> 'headerinro', 
        'title'=> 'Header Information', 
        'icon' => 'fa fa-info-circle', 
                    'fields' => array(
                     			array( 
                                'id' => 'email', 
                                'type' => 'text', 
                                'title' => 'E-Mail', 
                                'desc'  => 'Please write E-mail whice you want to show on your site.',
                                'help'  => 'E-mail is the most important to communicate on your site. Example: yourname@web.com',
                                    ),
                     			array( 
                                'id' => 'phone', 
                                'type' => 'text', 
                                'title' => esc_html__('Phone', 'wiselearn'), 
                                'desc'  => 'Please write Phone whice you want to show on your site.',
                                 'help'  => 'Phone is the most important to communicate directly. Example: 0192xxxxxxxx',
                                    
                                 'before' => '<p class="cs-text-muted">Please Provide Coreectly</p>',
                                    ),
                                array( 
                                'id' => 'headmenubgcolor', 
                                'type' => 'color_picker', 
                                'title' => 'Header Menu Background Color', 
                                 ),
                                array( 
                                'id' => 'menubgcolor', 
                                'type' => 'color_picker', 
                                'title' => 'Main Menu Background Color', 
                                 ),
								

                 
                ));
        $options[] = array( 
        'name'=> 'social_info', 
        'title'=> 'Social Network', 
        'icon' => 'fa fa-share-alt-square', 
                    'fields' => array(
                     			array( 
                                'id' => 'facebook', 
                                'type' => 'text', 
                                'title' => 'facebook Link', 
                                'desc'  => 'Please paste your FB Profile URL which you want to linked in your site.',
                                'help'  => 'Facebook url is the most important to branding your business. Example: https://www.facebook.com/username',
                                 'before' => '<p class="cs-text-muted"> May it is  page or profile </p>',
                                    ),
                     			array( 
                                'id' => 'twitter', 
                                'type' => 'text', 
                                'title' => 'Twitter Url', 
                                'desc'  => 'Please paste your twitter URL which you want to linked in your site.',
                                 'help'  => 'twitter url is the most important to branding your business. Example: https://www.twitter.com/username',
                                    
                                 'before' => '<p class="cs-text-muted"> May it is  page or profile </p>',
                                    ),
                     			array( 
                                'id' => 'linkedin', 
                                'type' => 'text', 
                                'title' => 'Linkedin Url', 
                                'desc'  => 'Please paste your Linkedin URL which you want to linked in your site.',
                                 'help'  => 'twitter url is the most important to branding your business. Example: https://www.linkedin.com/en/username',
                                    ),
                     			array( 
                                'id' => 'skype', 
                                'type' => 'text', 
                                'title' => 'Skype Username', 
                                'desc'  => 'Please paste your skype Username, visitor will use it to call you.',
                                 'help'  => 'skype url is the most important to communicate with you Example: yourname',
                               
                                    ),
								
                ));
       
       
          $options[] = array( 
        'name'=> 'footer', 
        'title'=> 'Footer Section', 
        'icon'=> 'fa fa-arrow-down',
                    'fields' => array( array(
					          'id'             => 'columns',
					          'type'           => 'select',
					          'title'          => 'How many Columns?',
					          'options'        => array(
										           '1'      => 'One',
										           '2'      => 'Two',
										           '3'      => 'Three',
										      		),
					          'desc'  => 'Divide the footer with the column number.',
					          'default_option' => 'Define Footer Column Number',
					          'info'           => 'Choose how many column do you want to show in footer',
        						),
                                 array( 
                                'id' => 'copyright', 
                                'type' => 'text', 
                                'title' => 'Copyright Text', 
                                'desc'  => 'Please write Copyright Text whice you want to show on your site.',
                                'before' => '<p class="cs-text-muted"> Example: Copyright &copy; 2016 </p>',
                                    ),
                                 array( 
                                'id' => 'bgcolor', 
                                'type' => 'color_picker', 
                                'title' => 'Background Color', 
                                 ),
                                 array( 
                                'id' => 'address', 
                                'type' => 'text', 
                                'title' => 'Contact Adress', 
                                'desc'  => 'Example: House, Road, Village/City etc.',
                                'help'  => 'Example: Universal 234, Triumph Street, Los',
                                'before' => '<p class="cs-text-muted">  </p>',
                                    ),
                                 array( 
                                'id' => 'cityandcountry', 
                                'type' => 'text', 
                                'title' => 'City & Country', 
                                'desc'  => 'Write your courrent City naem and Country name',
                                'help'  => 'Example: Chattogram, Bangladesh',
                                'before' => '<p class="cs-text-muted">  </p>',
                                    ),
                                array( 
                                'id' => 'description', 
                                'type' => 'textarea', 
                                'title' => 'Description', 
                                'desc'  => 'Please write about your site or Business',
                                 'help'  => ' ',
                                'before' => '<p class="cs-text-muted">Explain about this site </p>',
                                    ) 

                    ));

	















			return $options;
		}

add_filter('cs_framework_options','wiselearn_basic_info_options');

?>