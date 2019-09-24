<?php
/*=====================================================
-------------Don't Change Here anything---------------
=====================================================*/

/*=================================================================
-It will work for showing Comment Template with custom design-
================================================================*/


/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
if(!function_exists( 'better_comments' ) ):
function better_comments($comment, $args, $depth) {
    ?>
 
     <div class="single-commenter" <?php comment_class()?> id="comment-<?php comment_ID() ?>">
                  <div class="media">
                     <div class="media-left">
                      <div class="commenter-img">
            <?php echo get_avatar($comment, $size='100',$default='' ); ?>
       <!--      http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g -->
                     </div>
                  </div>
                         <div class="media-body">
                            <div class="commenter-info">
                                <?php if ($comment->comment_approved == '0') : ?>
                                <em><?php esc_html_e('Your comment is awaiting moderation.','wiselearn') ?></em>
                                <br />
                                <?php endif; ?>
                                    <h4><?php echo get_comment_author() ?></h4>
                                     <span class="commenter-designation">Author</span>
                                        <span class="float-right">
                                        <span> <a href="#"><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
                                        </span>
            
                                              <?php comment_text() ?>
                                            <span class="date float-right"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'wiselearn'), get_comment_date(),  get_comment_time()) ?></span>
                                        </div>
                              </div>
                        </div>
                      </div>
                  

<?php    }
endif;



                               
                                               