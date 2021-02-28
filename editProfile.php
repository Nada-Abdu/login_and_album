
<!DOCTYPE html>
<html lang="en">
<head>



    <title>Edit the Profile</title>
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
$EmailUser=$_SESSION['Email'];
  $information= mysqli_query($connect,"SELECT * FROM `nada_users` WHERE `email`='$EmailUser' ");
  $user= mysqli_fetch_assoc($information);
  $imageuser=$user['image'];

// Update

    if(isset($_POST['edituser']))   {
$modifyusername=$_POST['usernameedit'];
$modifypassword=$_POST['passwordedit'];
$modifycpassword=$_POST['cpasswordedit'];
$oldpassword=$_POST['OldPassword'];
echo $modifyusername; echo $modifypassword; echo "kkkkkkkk";
$img_name = $_FILES['imglink']['name'];
$img_size =$_FILES['imglink']['size'];
$img_tmp =$_FILES['imglink']['tmp_name'];
$directory = 'uploads/';
$target_file = $directory.$img_name;

$checkpassword= mysqli_query($connect,"SELECT * FROM `nada_users` WHERE `email`='$EmailUser' ");
$checkpasswordd= mysqli_fetch_assoc($checkpassword);
  if($checkpasswordd['password'] != $oldpassword)  {
    echo '<script type="text/javascript"> alert("The old password is worng !! try again") </script>';
  echo "<script>location.href='editProfile.php'</script>";
}
    else
if($modifypassword == $modifycpassword){
move_uploaded_file($img_tmp,$target_file);
$Update= mysqli_query($connect,"UPDATE  `nada_users` SET `username`='$modifyusername' ,`password`='$modifypassword',`image`='$target_file' WHERE `email`='$EmailUser' ");
 echo '<script type="text/javascript"> alert("Done") </script>';
 echo "<script>location.href='userinfo.php'</script>";
}
else {
 echo '<script type="text/javascript"> alert("The two passwords you entered are not the same \n" +
            "Please re-enter both now") </script>';
echo "<script>location.href='editProfile.php'</script>";

}
}
           ?>
          <div>

              <div class="container text-center" >
              <!--   <h2 class="section-title" style="color:#1F595B; font-size:25px;">personal information</h2> -->
                  <div class="members-wrapper row" >
                      <div class="item col-md-12 col-12" >

                        <div  style="width:800px;  margin-left:460px;    margin-top:-160px;">
                            <div class="row" >
                              <div class="item col-md-3 col-12" >
                            <?php echo  "<img  id='uploadPreview' width=180; height=180; src='".$imageuser."'  />"; ?>
                              </div>
                            </div>
                            </div>

               <!-- class="white"   -->
                        <div  id="white" style="color:#000; background-color:#F5F7F9; margin-top:-100px;  padding: 120px 20px 20px 20px;">
                             <hr>  </br>

                            <form action="editProfile.php"  method="POST" name="n"  enctype="multipart/form-data" style="margin-left:270px;">

                            <div class="row" >

                              <div class="item col-md-6 col-12" style="padding-top:6px;" >
                                <div>Username: </div>
                              </div>

                              <div class="item col-md-6 col-12" >
                                  <input type="text"  name="usernameedit" />
                              </div>

                            </div>


                            <div class="row" style="padding-top:5px;">

                              <div class="item col-md-6 col-12" style="padding-top:6px;">
                                <div>Old Password: </div>
                              </div>

                              <div class="item col-md-6 col-12" >
                                  <input type="password"  name="OldPassword" />
                              </div>
                            </div>


                            <div class="row" style="padding-top:5px;">

                              <div class="item col-md-6 col-12" style="padding-top:6px;">
                                <div>New password: </div>
                              </div>

                              <div class="item col-md-6 col-12" >
                                  <input type="password"  name="passwordedit" />
                              </div>
                            </div>

                            <div class="row" style="padding-top:5px;">

                              <div class="item col-md-6 col-12" style="padding-top:6px;">
                                <div>Confirm new password: </div>
                              </div>

                              <div class="item col-md-6 col-12" >
                                  <input type="password"  name="cpasswordedit" />
                              </div>
                            </div>

                            <div class="row" >
                            <div class="item col-md-6 col-12" style="padding-top:6px;">
                              <div>Select image: </div>
                            </div>
                            <div class="item col-md-6 col-12">
                              <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage()" />
                            </div>
                           </div>

                            </br>
                            <div style="margin-right:10px; padding-top:5px;">
                            <button type="submit" name ="edituser" style="padding:5px;" >Save </button>
                          </div>
                        </form>
                        </div>



                          </div><!--//item-inner-->
                      </div><!--//item-->
                  </div><!--//members-wrapper-->

          </div><!--//team-section-->


        </div>



  		</div><!--//carousel-->


    </br> </br> </br> </br> </br> </br> </br> </br></br> </br>
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
