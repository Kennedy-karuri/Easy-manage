AIzaSyAhJh0awjUxMh9ljqFK9l0PW0k1NsidmuY <div class="container py-5 ">
    <div class="row d-flex justify-content-center align-items-center ">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-black"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
             
              <h1 style="font-weight:bolder"> <?php global $current_user; wp_get_current_user(); echo ($current_user->user_login) ;?></h1>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h2>USER INFO</h2>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h2>Email</h2>
                    <p class="text-muted" style="font-weight:bold;"><?php global $current_user; wp_get_current_user(); echo ($current_user->user_email) ;?></p>
                  </div>
                  
                </div>
                <h1>Location</h1>
                    <button class="btn btn-primary px-5" onclick="getlocation();"> Show Position</button> 
        <div id="demo" style="width: 600px; height: 400px; margin-left: 200px;"></div> 
       
        <script src="https://maps.google.com/maps/api/js?sensor=false"> </script> 
        
        <script type="text/javascript"> 
        function getlocation(){ 
            if(navigator.geolocation){ 
                navigator.geolocation.getCurrentPosition(showPos, showErr); 
            }
            else{
                alert("Sorry! your Browser does not support Geolocation API")
            }
        } 
        //Showing Current Poistion on Google Map
        function showPos(position){ 
            latt = position.coords.latitude; 
            long = position.coords.longitude; 
            var lattlong = new google.maps.LatLng(latt, long); 
            var myOptions = { 
                center: lattlong, 
                zoom: 15, 
                mapTypeControl: true, 
                navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL} 
            } 
            var maps = new google.maps.Map(document.getElementById("demo"), myOptions); 
            var markers = 
            new google.maps.Marker({position:lattlong, map:maps, title:"You are here!"}); 
        } 

        //Handling Error and Rejection
             function showErr(error) {
              switch(error.code){
              case error.PERMISSION_DENIED:
             alert("User denied the request for Geolocation API.");
              break;
             case error.POSITION_UNAVAILABLE:
             alert("USer location information is unavailable.");
            break;
            case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
           case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
           }
        }        </script>  
              
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

