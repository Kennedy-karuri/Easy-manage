<?php 
/**
 * Template Name: Landing page
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="wp-content/themes/easy-manage/assets/css/custom.css">
    <title>Easy-manage</title>
</head>
<body>
   
<div class="homepage">
    <div class="homepage-heading">
        <div class="heading2">
            <div class="brand">
                <li class="list">EASY-MANAGE</li>
            </div>
            <div class="links">
                <li class="list"><a href="#">Home</a></li>
                <li class="list"><a href="#">About-Us</a></li>
                <li class="list"><a href="#">Services</a></li>
                <li class="list"><a href="#">Contact-Us</a></li>

            </div>
            
        </div>
        <div class="login">
        <a role="button" class="btn btn-outline-primary" href="<?php echo wp_login_url(get_permalink()); ?>">Log In</a>          
        </div>
    </div>

    <div class="homepage-content">
        <h1>ASSIGNING PROJECTS AND MANAGING TEAMS MADE EASIER</h1>
        <div class="button">
        <a role="button" class="btn btn-outline-primary" href="../manage/sign-up/">GET STARTED</a>          
           
        </div>
    </div>
</div>

<div class="second-page">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
     
        <h1 class="card-title" style="padding-top:30px">ABOUT-US</h1>
        <p class="card-text" style="padding-top:30px;">Easy-Manage is a management application that helps project managers keep track of all their members and assign projects to their members.</p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-6">
  <img src="wp-content/themes/easy-manage/assets/img/andrew-neel-cckf4TsHAuw-unsplash.jpg" class="" alt="" style="height: 400px;width: 800px;">
  </div>
</div>
</div>
<hr>
<div class="third-page">
        <div class="third-header">
            <h1>SERVICES</h1>
            <p>The following services are offered at Easy-Manage.</p>
        </div>
        <div class="card-group" style="padding-right: 50px; gap: 20px;">
 
 
        <div class="card" >
    <img src="wp-content/themes/easy-manage/assets/img/manage.png" class="card-img-top" alt="" style="height: 200px;width: 200px; ">
    <div class="card-body">
      <hr>
      <h5 class="card-title" style="font-weight:bold;">Project Management</h5>
      <p class="card-text">Easily manage your projects, save time and resources on our system.</p>
    </div>
  </div>
  <div class="card">
  <img src="wp-content/themes/easy-manage/assets/img/manage.png" class="card-img-top" alt="" style="height: 200px;width: 200px; ">
    <div class="card-body">
      <hr>
      <h5 class="card-title" style="font-weight:bold;">Manage Users</h5>
      <p class="card-text">Manage users of tour system.You can view the whole of your workforce from our application.</p>
    </div>
  </div>
  <div class="card">
  <img src="wp-content/themes/easy-manage/assets/img/manage.png" class="card-img-top" alt="" style="height: 200px;width: 200px; ">
    <div class="card-body">
      <hr>
      <h5 class="card-title" style="font-weight:bold;">Assign Projects</h5>
      <p class="card-text">Asssign projects to your different members.</p>
    </div>
  </div>
</div>

</div>

<hr>

    <div class="fourth-page">

    <div class="fourth-header">
            <h1>CONTACTS</h1>
            <p>Incase of any comment or enquiry reach out to us through easymanage@admin.com or fill out the form below.</p>

            <form method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form3Example1">First name</label>
        <input type="text" id="name" name="firstname" class="form-control"  placeholder="input your First Name..." />
        
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form3Example2">Last name</label>
        <input type="text" id="name" name="secondname" class="form-control"  placeholder="input your second Name..." />
        
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form3Example1">Email</label>
        <input type="text" id="useremail" name="email" class="form-control" placeholder="input your email..."/>
        
      </div>
    </div>

    <!--Telephone -->
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="form3Example2">Telephone Number</label>
        <input type="text" name="telephone" id="tel" class="form-control"  placeholder="input your telephone number..." />
       
      </div>
    </div>
  </div>


   <!-- Message input -->
   <div class="form-outline mb-4">
   <label class="form-label" for="form4Example3"  placeholder="input your message...">Message</label>
    <textarea class="form-control" name="message" id="message" rows="4"></textarea>
   
  </div>
  <!-- Submit button -->
  <button type="submit" name="submitbtn" class="btn btn-primary btn-block mb-4">Send</button>

 
</form>

        </div>

    </div>
    <hr>

     <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background:rgb(212, 199, 199);"
          >
          <br>
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4"
             style="background-color: rgba(0, 0, 0, 0.2)"
             >
      <!-- Left -->
      <div class="me-5">
        <span style="color:black;">Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-4">
          <img src="wp-content/themes/easy-manage/assets/img/linkedin.png" alt="linkedIn" style="height:50px;width:50px;">
        </a>
        <a href="" class="text-white me-4">
        <img src="wp-content/themes/easy-manage/assets/img/twitter.png" alt="twitter" style="height:50px;width:50px;">      
        </a>
        <a href="" class="text-white me-4">
        <img src="wp-content/themes/easy-manage/assets/img/facebook.png" alt="facebook" style="height:50px;width:50px;">      
        </a>
        <a href="" class="text-white me-4">
        <img src="wp-content/themes/easy-manage/assets/img/insta.png" alt="instagram" style="height:50px;width:50px;">       
       </a>
      

      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold" style="color:black;">EASY-MANAGE</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p style="color:black;">
             Assigning projects and Managing teams made Easier
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold" style="color:black;">Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!"  style="color:black;" >HOME</a>
            </p>
            <p>
              <a href="#!"  style="color:black;" >JOIN-US</a>
            </p>
            <p>
              <a href="#!"  style="color:black;" >CONTACTS-US</a>
            </p>
            <p>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold" style="color:black;">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px;height: 2px"
                />
            <p><img src="wp-content/themes/easy-manage/assets/img/phone.png" alt="" style="height:50px;width:50px;color:black;"> +254729429104</p>
            <p><img src="wp-content/themes/easy-manage/assets/img/mail.png" alt="" style="height:50px;width:50px;" style="color:black;"> easymanage@gmail.com</p>
            <p><img src="wp-content/themes/easy-manage/assets/img/location.png" alt="" style="height:50px;width:50px;" style="color:black;"> KDS,PLAZA NYERI</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         style="color:black;"
         >
      © 2023 Copyright:
      <a  href="https://kennedy-karuri.github.io/"
      style="color:black;" >KENNEDY KARURI</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


</body>
</html>



