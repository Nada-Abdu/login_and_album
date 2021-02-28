

<!DOCTYPE html>
<html lang="en">
<head>



    <title>profile</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap 4 landing page template for developers and startups">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
<link id="theme-style" rel="stylesheet" href="assets/css/my style.css">
<link id="theme-style" rel="stylesheet" href="assets/css/style form.css">



</head>

<?php
include "config.php";
session_start();
if (isset($_SESSION['Email'])){ }
else{

   echo '<script type="text/javascript"> alert("not found !! ") </script>';
   echo "<script>location.href='Smart.php'</script>";
}

/*if(isset($_GET['logout'])){
session_destroy();
 echo "<script>location.href='Smart.php'</script>";
}*/
?>


<body>
  <!-- ******HEADER****** -->
      <header id="header" class="header">
          <div class="container">
              <h1 class="logo">

                      <span ><img style="width:200px;" src="assets/images/smart.png" alt="icon"></span>

              </h1><!--//logo-->
              <nav class="main-nav navbar-expand-md float-right navbar-inverse" role="navigation">



                  <div id="navbar-collapse" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav" style="margin-right:-40px;">
                          <li  class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px; ">About</a></li>
                          <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Testimonials</a></li>
                          <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Features</a></li>
                          <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Team</a></li>
                          <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Pricing</a></li>
                          <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Contact</a></li>
                            <li class="nav-item"><a class="active nav-link " href="logout.php" style="border-bottom:none; padding-top:20px;">Logout</a></li>
                      </ul><!--//nav-->
                  </div><!--//navabr-collapse-->
              </nav><!--//main-nav-->
          </div><!--//container-->
      </header><!--//header-->



          <div id="hero-carousel" class="hero-carousel carousel carousel-fade slide" data-ride="carousel" data-interval="10000">

  			<div class="carousel-inner">

  				 <div class="carousel-item-userINFO headUserInfo" style="height:300px;">


  					<div class="item-content">

  					</div><!--//item-content-->


  				</div><!--//item-->

  			</div><!--//carousel-inner-->




        <div > <!-- profile -->
          <?php
        // $EmailUser=$_SESSION['Email'];
        $EmailUser=$_SESSION['Email'];
          $information= mysqli_query($connect,"SELECT * FROM `nada_users` WHERE `email`='$EmailUser' ");
          $user= mysqli_fetch_assoc($information);
          $firstName=$user['fname'];
          $lastName=$user['lname'];
          $userName=$user['username'];
          $Genderuser=$user['gender'];
          $phoneuser=$user['phone'];
          $imageuser=$user['image'];
          //$Passuser=$user['password'];
          $_SESSION['Email']=$EmailUser;


           ?>
          <div>

              <div class="container text-center" >
              <!--   <h2 class="section-title" style="color:#1F595B; font-size:25px;">personal information</h2> -->
                  <div class="members-wrapper row" >
                      <div class="item col-md-12 col-12" >

                        <div  style="width:800px;  margin-left:460px;    margin-top:-160px;">
                            <div class="row" >
                              <div class="item col-md-3 col-12" >
                            <?php echo  "<img  width=180; height=180; src='".$imageuser."'  />"; ?>
                              </div>
                            </div>
                            </div>

               <!-- class="white" -->
                        <div  id="white" style="color:#000; background-color:#F5F7F9; margin-top:-100px;  padding: 120px 20px 20px 20px;">
                            <h2 class="section-title" style=" font-size:40px; color:#1F595B; margin-right:20px;">Welcome <?php echo   $userName; ?> </h2></br> <hr>


                            <div class="row">

                              <div class="item col-md-4 col-12" >
                                <div>First Name : <?php echo   $firstName; ?></div>
                              </div>

                              <div class="item col-md-4 col-12" >
                                  <div>Last Name: <?php echo   $lastName; ?> </div>
                              </div>

                              <div class="item col-md-4 col-12" >
                                  <div>Gender: <?php echo   $Genderuser; ?> </div>
                              </div>

                            </div>

                            <div class="row" style="padding-top:4px;">

                              <div class="item col-md-4 col-12" >
                                <div>Email : <?php echo   $EmailUser; ?> </div>
                              </div>

                              <div class="item col-md-4 col-12" >
                                  <div>Phone: <?php echo   $phoneuser; ?> </div>
                              </div>

                              <div class="item col-md-4 col-12" >
                                  <div> Username: <?php echo   $userName; ?> </div>
                              </div>

                            </div>
                            </br></br></br>
                            <div style="margin-right:10px; padding-top:5px;">
                            <button type="" name ="" style="padding:5px;" > <a href="editProfile.php" style="color:#fff;"> Edit </a> </button>
                          </div>
                        </div>



                          </div><!--//item-inner-->
                      </div><!--//item-->
                  </div><!--//members-wrapper-->

          </div><!--//team-section-->


        </div>



  		</div><!--//carousel-->


    </br>
    </div><!--//hero-->



    <div  class="features-section" >
        <div class="container text-center">






        </div><!--//container-->
    </div><!--//features-->


    <div id="contact" class="contact-section">

    </div><!--//contact-section-->

    <footer class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->



        </div><!--//container-->
    </footer>

    <!-- Javascript -->
    <script type="text/javascript" src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
      <script type="text/javascript" src="assets/js/form.js"></script>

</body>
</html>
