There are a few steps involved in creating a WordPress function to display a Google Map with markers based on user access location:

Obtain an API key from Google Maps Platform.
Include the Google Maps API in your WordPress site by adding the following code to your functions.php file:


 <?php
function add_google_maps_api() {
    wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'add_google_maps_api' );

?> 


Replace YOUR_API_KEY with your actual API key obtained from Google Maps Platform.

Write a function that gets the user's IP address and uses it to get their approximate location using a geolocation API. One such API is ipapi.com, which provides a free plan for up to 10,000 requests per month. Here is an example function:



<?php
function get_user_location() {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $location_data = json_decode( file_get_contents( "https://ipapi.co/{$ip_address}/json/" ) );
    $location = array(
        'lat' => $location_data->latitude,
        'lng' => $location_data->longitude,
    );
    return $location;
}

?>
Use the user's location to create a Google Map with a marker at their location. Here is an example function that adds a map to the WordPress admin dashboard:
<?php
function add_user_location_map() {
    $location = get_user_location();
    ?>
    <div id="user-location-map" style="height: 400px;"></div>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('user-location-map'), {
                center: {lat: <?php echo $location['lat']; ?>, lng: <?php echo $location['lng']; ?>},
                zoom: 12
            });
            var marker = new google.maps.Marker({
                position: {lat: <?php echo $location['lat']; ?>, lng: <?php echo $location['lng']; ?>},
                map: map
            });
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <?php
}
add_action( 'admin_footer', 'add_user_location_map' );

?> 



This function adds a map to the WordPress admin footer with a marker at the user's location. You can customize the map options as desired. Note that this function assumes that the user is accessing the WordPress site from the same location as their current IP address, which may not always be accurate.