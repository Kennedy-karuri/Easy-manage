<?php
/*-------------------------------------------------------------------------*/
/*                        REGISTER CUSTOM NAVIGATION WALKER                */
/*-------------------------------------------------------------------------*/

if ( ! file_exists( get_template_directory() . '/class-bootstrap-5-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-bootstrap-5-navwalker-missing', __( 'It appears the class-bootstrap-5-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-bootstrap-5-navwalker.php';
}



/*-------------------------------------------------------------------------*/
/*                        ENQUEUE ALL THE THINGS                           */
/*-------------------------------------------------------------------------*/

function wp_custom_styles(){
    wp_register_style('bootstrap5', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('bootstrap5');
    wp_register_style('custom', get_template_directory_uri().'/assets/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom');
    wp_register_style('dashboard', get_template_directory_uri().'/assets/css/dash.css', array(), '1.0.0', 'all');
    wp_register_style('theme', get_template_directory_uri().'/assets/css/theme.css', array(), '5.3.0', 'all');
    wp_enqueue_style('theme');
   


}
add_action('wp_enqueue_scripts', 'wp_custom_styles');

function wp_custom_scripts(){
    wp_register_script('bootstrap-js', get_template_directory_uri(). 'assets/js/bootstrap.min.js', array(), '5.3.0', true);
    wp_enqueue_script('bootstrap-js');
    wp_register_script('custom-js', get_template_directory_uri(). 'assets/js/custom.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-js');
}
  
add_action('wp_enqueue_scripts', 'wp_custom_scripts');

/*-------------------------------------------------------------------------*/
/*                        REGISTER WIDGETS AND MENUS                       */
/*-------------------------------------------------------------------------*/

function wp_custom_menus(){
    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => 'Main Menu',
        'secondary' => 'Footer Menu'
    ));
}
add_action('init', 'wp_custom_menus');

function wp_register_sidebar(){
    add_theme_support('widgets');

    register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action('widgets_init', 'wp_register_sidebar');


/*-------------------------------------------------------------------------*/
/*                        ADD THEME SUPPORT                                */
/*-------------------------------------------------------------------------*/
function custom_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list' ) );
	
	add_theme_support('post-thumbnails');

	add_theme_support( 'title-tag' );

	add_theme_support('custom-header');

	add_theme_support('custom-background');

	add_theme_support('post-formats', array('aside', 'image', 'video'));
}
add_action( 'after_setup_theme', 'custom_theme_setup' );


function register_rest_api_routes(){
    register_rest_route('projects/v1', 'api(/(?P<id>\d+))?',array('callback' => 'get_projects'));
}


function get_projects($data){
    $id = $data['id'];
    
    $args = array(
        'post_type' => 'project',
        'post_per_page' => 5,
        'status' => 'publish',
    );

    if (isset($id)) {
        $args['p'] = $id; // Set the post ID to search for
    }

    $new_query = new WP_Query($args);
    $projects = $new_query->posts;

    $projects_with_meta = array();
    foreach ($projects as $project) {
        $project_id = $project->ID;
        $project_start = get_post_meta($project_id, 'project_start', true);
        $project_end = get_post_meta($project_id, 'project_end', true);
        $project_status = get_post_meta($project_id, 'project_status_select', true);
        $project_user_id = get_post_meta($project_id, 'project_user', true);

        // Create an array with the project data and meta
        $project_with_meta = array(
            'ID' => $project_id,
            'post_title' => $project->post_title,
            'post_content' => $project->post_content,
            'post_date' => $project->post_date,
            'project_start' => $project_start,
            'project_end' => $project_end,
            'project_status' => $project_status,
            'project_user_id' => $project_user_id,
        );

        // Add the project to the array
        $projects_with_meta[] = $project_with_meta;
    }

    return $projects_with_meta;
}




add_action('rest_api_init','register_rest_api_routes');





/*-------------------------------------------------------------------------*/
/*             SHOW DIFFERENT DASHBOARD DEPENDING ON USER                  */
/*-------------------------------------------------------------------------*/
function dashboard_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'dashboard') { // modify only if the current page is 'dashboard'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'dashboard-pm.php' ) );
        }
        elseif(in_array('developer', $user->roles)){
            $new_template = locate_template( array( 'dashboard-d.php' ) );
        }else{
            $new_template = locate_template( array( 'landing-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'dashboard_page_template' );


function developers_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'developer') { 
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-employees.php' ) );
        }
        elseif(in_array('developer', $user->roles)){
            $new_template = locate_template( array( 'page-other-employees.php' ) );
        }else{
            $new_template = locate_template( array( 'landing-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'developers_page_template' );


function projects_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'projects') { 
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-projects.php' ) );
        }
        elseif(in_array('developer', $user->roles)){
            $new_template = locate_template( array( 'page-project-users.php' ) );
        }else{
            $new_template = locate_template( array( 'landing-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'projects_page_template' );

function profile_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'user-profile') { 
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'view-profile.php' ) );
        }
        elseif(in_array('developer', $user->roles)){
            $new_template = locate_template( array( 'profile-user.php' ) );
        }else{
            $new_template = locate_template( array( 'landing-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'profile_page_template' );

function wpb_recently_registered_users() { 
 
    global $wpdb;
     
    $wp_users = '<ul class="recently-user">';
     
    $usernames = $wpdb->get_results("SELECT user_nicename, user_url, user_email FROM $wpdb->users WHERE user_login != 'admin' ORDER BY ID DESC LIMIT 5");
     
    foreach ($usernames as $username) {
     
    if (!$username->user_url) :
     
    $wp_users .= '<li>' .get_avatar($username->user_email, 45) .$username->user_nicename."</a></li>";
     
    else :
     
    $wp_users .= '<li>' .get_avatar($username->user_email, 45).'<a href="'.$username->user_url.'">'.$username->user_nicename."</a></li>";
     
    endif;
    }
    $wp_users .= '</ul>';
     
    return $wp_users;
}

add_filter( 'deprecated_constructor_trigger_error', '__return_false' );
add_filter( 'deprecated_function_trigger_error', '__return_false' );
add_filter( 'deprecated_file_trigger_error', '__return_false' );
add_filter( 'deprecated_argument_trigger_error', '__return_false' );
add_filter( 'deprecated_hook_trigger_error', '__return_false' );

function my_custom_authenticate_user( WP_User $user  ) {
    if ( get_user_meta( $user->ID, 'registration_status', true ) === 'pending' ) {
        remove_action( 'wp_authenticate_user', 'wp_authenticate_username_password', 20 );
        add_filter( 'wp_authenticate_user', 'my_custom_login_error_message', 20, 3 );
    }

    return $user;
}
add_filter( 'wp_authenticate_user', 'my_custom_authenticate_user', 10, 1 );

function my_custom_login_error_message( $username, $password ) {
    $error = new WP_Error();
    $error->add( 'pending', __( 'Your account is pending approval. Please try again later.' ) );
    return $error;
}

/*-------------------------------------------------------------------------*/
/*                        LIMIT LOGIN ATTEMPTS                             */
/*-------------------------------------------------------------------------*/
function check_attempted_login( $user, $username, $password ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );

        if ( $datas['tried'] >= 3 ) {
            $until = get_option( '_transient_timeout_' . 'attempted_login' );
            $time = time_to_go( $until );

            return new WP_Error( 'too_many_tried',  sprintf( __( '<strong>ERROR</strong>: You have reached authentication limit, you will be able to try again in %1$s.' ) , $time ) );
        }
    }

    return $user;
}

add_filter( 'authenticate', 'check_attempted_login', 30, 3 ); 

function login_failed( $username ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );
        $datas['tried']++;

        if ( $datas['tried'] <= 3 )
            set_transient( 'attempted_login', $datas , 300 );
    } else {
        $datas = array(
            'tried'     => 1
        );
        set_transient( 'attempted_login', $datas , 300 );
    }
}

add_action( 'wp_login_failed', 'login_failed', 10, 1 ); 

function time_to_go($timestamp){

    // converting the mysql timestamp to php time
    $periods = array(
        "second",
        "minute",
        "hour",
        "day",
        "week",
        "month",
        "year"
    );
    $lengths = array(
        "60",
        "60",
        "24",
        "7",
        "4.35",
        "12"
    );
    $current_timestamp = time();
    $difference = abs($current_timestamp - $timestamp);
    for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i ++) {
        $difference /= $lengths[$i];
    }
    $difference = round($difference);
    if (isset($difference)) {
        if ($difference != 1)
            $periods[$i] .= "s";
            $output = "$difference $periods[$i]";
            return $output;
    }
}