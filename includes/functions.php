<?php

/**
 * gets the current post type in the WordPress Admin
 */
function ml_adverts_get_current_post_type() {
  global $post, $typenow, $current_screen;
	
  //we have a post so we can just get the post type from that
  if ( $post && $post->post_type )
    return $post->post_type;
    
  //check the global $typenow - set in admin.php
  elseif( $typenow )
    return $typenow;
    
  //check the global $current_screen object - set in screen.php
  elseif( $current_screen && $current_screen->post_type )
    return $current_screen->post_type;
  
  //lastly check the post_type querystring
  elseif( isset( $_REQUEST['post_type'] ) )
    return sanitize_key( $_REQUEST['post_type'] );
	
  //we do not know the post type!
  return null;
}