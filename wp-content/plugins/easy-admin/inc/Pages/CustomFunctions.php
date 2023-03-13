<?php
/**
 * @package easy-manage
 */

namespace Inc\Pages;

class CustomFunctions{

    public $template;

    public function register(){
        add_filter( 'login_redirect', array($this, 'my_login_redirect'), 10, 3);
       
    }

    
    /**
     * Redirect user after successful login.
     */
    
     function my_login_redirect( $redirect_to, $request, $user ) {
        //is there a user to check?
        if ( isset( $user->roles ) && is_array( $user->roles ) ) {
            //check for admins
            if ( in_array( 'administrator', $user->roles ) ) {
                // redirect them to the default place
                return $redirect_to;
            } else {
                return esc_url(home_url( '/dashboard'));
            }
        } else {
            return $redirect_to;
        }
    }


    


}