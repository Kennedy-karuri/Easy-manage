<?php
/**
 * @package easy-manage
 */
namespace Inc\Base;

 class Functions{

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

 public function register(){
	if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2/init.php';
	}

	add_action( 'cmb2_admin_init', array($this, 'project_register_metabox') );

	add_action( 'cmb2_admin_init', array($this, 'yourprefix_register_user_profile_metabox') );


 }




/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function project_register_metabox() {
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => 'project_metabox',
		'title'         => esc_html__( 'Project Metabox', 'cmb2' ),
		'object_types'  => array( 'project' ), // Post type
		'context'    	=> 'normal',
		'priority'   	=> 'default',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Project Start', 'cmb2' ),
		'desc'       => esc_html__( 'Project Start Date', 'cmb2' ),
		'id'         => 'project_start',
		'type'       => 'text_date',
		'date_format'=> 'F j, Y',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Project Deadline', 'cmb2' ),
		'desc'       => esc_html__( 'Project Submission Date', 'cmb2' ),
		'id'         => 'project_end',
		'type'       => 'text_date',
		'date_format'=> 'F j, Y',
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Status Select', 'taskbook' ),
		'desc'             => esc_html__( 'Current Project Status', 'taskbook' ),
		'id'               => 'project_status_select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'Pending' 		=> esc_html__( 'Pending', 'taskbook' ),
			'In Progress'   => esc_html__( 'In Progress', 'taskbook' ),
			'Completed'     => esc_html__( 'Completed', 'taskbook' ),
		),
	) );

	// Get all users with the "User" role
	$users = get_users( array(
		'role'    => 'developer',
		'orderby' => 'user_nicename',
	) );

	// Create an array of user names and IDs to use as options in the select field
	$user_options = array();
	foreach ( $users as $user ) {
		$user_options[ $user->ID ] = $user->display_name;
	}

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Assign User', 'taskbook' ),
		'desc'             => esc_html__( 'Select the user to assign to this project', 'taskbook' ),
		'id'               => 'project_user',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => $user_options,
		//'save_callback'    => 'save_project_user',	
	) );

}



/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => 'yourprefix_user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'cmb2' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'cmb2' ),
		'desc'     => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'       => 'yourprefix_user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => esc_html__( 'Avatar', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => 'yourprefix_user_avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Facebook URL', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'yourprefix_user_facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Twitter URL', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'yourprefix_user_twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Google+ URL', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'yourprefix_user_googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Linkedin URL', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'yourprefix_user_linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'User Field', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'yourprefix_user_user_text_field',
		'type' => 'text',
	) );

}

}
