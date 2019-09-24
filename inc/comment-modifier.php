<?php 
/*=====================================================
-------------Don't Change Here anything---------------
=====================================================*/

/*=====================================================
---------Comment Default Value Filtering-----------
====================================================*/


/*=====================================================
----------Developed By: Mohammad Ismail----------------
----------www.facebook.com/coxismail.bd----------------
--------------coxismail.bd@gmail.com------------------
=====================================================*/
// Modify comments header text in comments
add_filter( 'genesis_title_comments', 'child_title_comments');
function child_title_comments() {
    return __(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'genesis');
}
 
// Unset URL from comment form
function crunchify_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' ); 
 
// Add placeholder for Name and Email
function modify_comment_form_fields($fields){
    $fields['author'] = '<div class="row form-fields"><p class="comment-author col-md-4">' . '<input id="author" placeholder="Name" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true">'.
                '</p>';


    $fields['email'] = '<p class="author-email col-md-4">' . '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30" aria-required="true">' .  '</p>';


    $fields['url'] = '<p class="author-website col-md-4">' .
             '<input id="url" name="url" placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
                '</p></div>';

     // $fields['comment_field'] = '<p class="comment-form">' .
     //            '<textarea id="comment" name="comment" placeholder="Write Your Comment" cols="20" rows="5" aria-required="true"> </textarea>' .
     //    '</p>';
    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');


add_filter('comment_form_defaults', 'set_my_comment_title', 20);
function set_my_comment_title( $defaults ){
 $defaults['title_reply'] = __('Post A Comment', 'customizr-child');
 return $defaults;
}

?>