<?php
/**
 * @package easy-manage
 */

namespace Inc\Pages;

class CustomFunctions{

    public $template;

    public function register(){
        add_filter( 'login_redirect', array($this, 'my_login_redirect'), 10, 3);
        add_action('after_setup_theme', array($this, 'remove_admin_bar'));
        add_action('template_redirect', array($this, 'my_non_logged_redirect'));

     
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
                return esc_url(home_url( '/dashboard'));
            } else {
                return esc_url(home_url( '/dashboard'));
            }
        } else {
            return $redirect_to;
        }
    }

    //HIDE ADMIN BAR FOR ALL EXCEPT ADMINISTRATOR

    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    }

    // Save assigned user as post meta when a project is created or updated
    function save_project_user( $post_id, $post, $update ) {
        // Check if the current user is a project manager or administrator
        if ( !current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Check if the "project_user" field is set
        if ( isset( $_POST['project_user'] ) ) {
            // Sanitize the user ID
            $assigned_user = sanitize_text_field( $_POST['project_user'] );

            // Update the "assigned_user" post meta
            update_post_meta( $post_id, 'assigned_user', $assigned_user );
        }
    }

    function check_project_user_capability( $allcaps, $caps, $args, $user ) {
        global $post;
      
        // Make sure we have a post object
        if ( ! isset( $post ) ) {
          return $allcaps;
        }
      
        // Get the assigned user ID from the project meta
        $assigned_user_id = get_post_meta( $post->ID, 'project_user', true );
      
        // Get the current user
        $current_user = wp_get_current_user();
      
        // Check if the current user is the project manager or the assigned user
        if ( in_array( 'project_manager', $current_user->roles ) || $assigned_user_id == $current_user->ID ) {
          // Allow project manager and assigned user to view the project
          return $allcaps;
        }
      
        // Deny access to other users
        $allcaps['read_private_posts'] = false;
        return $allcaps;
      }

    /*
    *   Restrict non logged users to certain pages
    */

    
    function my_non_logged_redirect()
    {
        if ((is_page('dashboard') || is_page('projects1')|| is_page('employees') || is_page('view-profile') || is_page('project-users') || is_page('all-employees') || is_page('user-profile') || is_page('completed-projects') || is_page('create-projects')) && !is_user_logged_in() )
        {
            wp_redirect( home_url() );
            die();
        }
    } 

  

   
    

}