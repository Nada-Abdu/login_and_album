

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
include "config.php";
session_start();
  ?>


    <title>Smart</title>
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




<body>
  <!-- ******HEADER****** -->
  <header id="header" class="header">
      <div class="container">
          <h1 class="logo" style="margin-right:3000px;">

                  <span ><img style="width:200px;" src="assets/images/smart.png" alt="icon"></span>

          </h1><!--//logo-->
          <nav class="main-nav navbar-expand-md float-right navbar-inverse" role="navigation">



              <div id="navbar-collapse" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav" style="margin-right:-100px;">
                    <li  class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">About</a></li>
                    <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Testimonials</a></li>
                    <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Features</a></li>
                    <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Team</a></li>
                    <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Pricing</a></li>
                    <li class="nav-item"><a class="active nav-link " href="#" style="border-bottom:none; padding-top:20px;">Contact</a></li>
                  </ul><!--//nav-->
              </div><!--//navabr-collapse-->
          </nav><!--//main-nav-->
      </div><!--//container-->
  </header><!--//header-->


    <div  class="hero-section">

        <div id="hero-carousel" class="hero-carousel carousel carousel-fade slide" data-ride="carousel" data-interval="10000">

            <div class="figure-holder-wrapper">
        		<div class="container">
            		<div class="row justify-content-end">
                		<div class="figure-holder">

                        </div><!--//figure-holder-->
            		</div><!--//row-->
        		</div><!--//container-->
    		</div><!--//figure-holder-wrapper-->

			<!-- Indicators -->


			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="carousel-item item-1 active" style="height:735px;">
					<div class="item-content container">
    					<div class="title">

<p> WELCOME TO SMART </p>

    					</div>
</br>
<table style="margin-left:470px;">
  <tr >
     <th><a style="color:#fff; font-size:20px; " href="#login"> Log in </a> </th>
     <th></th>
     <th style=" font-size:20px;">&nbsp;|&nbsp;</th>
     <th></th>
     <th></th>
     <th> <a style="color:#fff; font-size:20px;" href="#regester">  Sign up  </a></th>
   </tr>
</table>

					</div><!--//item-content-->
				</div><!--//item-->



			</div><!--//carousel-inner-->

		</div><!--//carousel-->
    </br> </br> </br>  </br> </br></br></br></br>
    </div><!--//hero-->



    <div  class="features-section" >
        <div class="container text-center">

<!--sing up form-->
<div  id="regester"> </div> </br> </br> </br> </br>

<!-- processing -->
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function signUP(){
include "config.php";

$fname=test_input($_POST['fname']);
$lname=test_input($_POST['lname']);
$Gender=test_input($_POST['Gender']);
$Email=test_input($_POST['Email']);
$Phone=test_input($_POST['Phone']);
$Username=test_input($_POST['Username']);
$Password=test_input($_POST['Password']);
$CPassword=test_input($_POST['Cpassword']);
$Iam=$_POST['select0'];
$typ="";
if($Iam == "Student"){
  $typ=$_POST['select1'];
}

else if($Iam == "Employee"){
  $typ=$_POST['select2'];
}






// image
$img_name = $_FILES['imglink']['name'];
if($img_name == "") $img_name='man.png';
$img_tmp =$_FILES['imglink']['tmp_name'];
$directory = 'uploads/';
$target_file = $directory.$img_name;


$allowed = array('jpeg', 'png', 'jpg');
$ext = pathinfo($img_name, PATHINFO_EXTENSION);




$_SESSION['Email']=$Email;
$_SESSION['Fname']=$fname;
$_SESSION['Gender']=$Gender;
$_SESSION['Phone']=$Phone;
$_SESSION['image']=$target_file;
$_SESSION['lname']=$lname;
$_SESSION['Username']=$Username;



$checkEmail= mysqli_query($connect,"SELECT * FROM `nada_users` WHERE `email`='$Email' ");
if(mysqli_num_rows($checkEmail) != '0') {  echo '<script type="text/javascript"> alert(" This Email is already registered") </script>'; }



  else{
    if( $fname == "" & $lname == "" & $Email == "" & $Phone == 0 & $Username == "" & $Password == "" )
    echo '<div style="color:red;" > *missing information </div>';
    else if($Password != $CPassword)
    echo '<div style="color:red;" > *The two passwords not the same </div>';
    else if (!(is_numeric($Phone) & (strlen($Phone) == 10) & (substr($Phone, 0, 2) == "05")))
    echo  '<div style="color:red;" > *The phone must be a number and starts with "05" and its length is 10  </div>';
    else if(in_array($ext, $allowed) != true)
    echo '<div style="color:red;" > *Photo only allows file types of  PNG, JPG, JPEG. </div>';
    else if(filter_var($Email, FILTER_VALIDATE_EMAIL) != true)
    echo '<div style="color:red;" > *You have entered an invalid email address!" </div>';
    else if (strlen($Password) <= 8 &  preg_match("#[0-9]+#",$Password) != true & preg_match("#[A-Z]+#",$Password) != true & preg_match("#[a-z]+#",$Password) != true)
    echo '<div style="color:red;" > *The password must contain at least one number and one uppercase and lowercase letter and at least 8 up to 20 characters." </div>';
    else{
      move_uploaded_file($img_tmp,$target_file);

      if($Iam == "Student" || $Iam == "Employee" ){
      $insert= mysqli_query($connect,"INSERT INTO  `nada_users` (`fname`,`lname`,`gender`,`email`,`phone`,`username`,`password`,`image`,`position`, `type`) values ('$fname' , '$lname','$Gender','$Email','$Phone','$Username','$Password','$target_file' , '$Iam' , '$typ')");
      }
      else {
        $insert= mysqli_query($connect,"INSERT INTO  `nada_users` (`fname`,`lname`,`gender`,`email`,`phone`,`username`,`password`,`image`,`position`) values ('$fname' , '$lname','$Gender','$Email','$Phone','$Username','$Password','$target_file' , '$Iam')");
      }

  $_SESSION['Email']=$Email;
 echo "<script>location.href='userDashboard.php'</script>";
} }


}

//echo "<pre>"; print_r($_POST); exit;
if(isset($_POST['submit']))
{
   signUP();
}
?>
<!-- processing -->
<?php


?>
<div  class="testbox" >

  <form  id="myForm1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" name="n" onsubmit="return validateForm()" enctype="multipart/form-data">
    <div class="banner">
      <h1 >Sign Up </h1>
    </div>
    </br>



    <img id="uploadPreview" width="130" height="130" src="assets/images/man.png"  />
    </br> </br>   </br>
    <p class="pragraph"> Select your profile image</p>
      <div class="item"  >


      <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage()" />
  </div>

    <div class="item">
      <p class="pragraph">Name</p>
      <div class="name-item">
        <input type="text" id="fname" name="fname" placeholder="First" value="<?php if(isset($_POST['submit'])) echo $_SESSION['Fname']; ?>" required/>
        <input type="text" id="lname" name="lname" placeholder="Last" value="<?php if(isset($_POST['submit'])) echo $_SESSION['lname']; ?>" required/>
      </div>
    </div>

    <div class="item">
      <p class="pragraph">Gender</p>
        <select name="Gender" >
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
  </div>

  <div class=" item text-left mb-4 mt-3 Iam"  >
  <p class="pragraph">I am </p>
  <select required name="select0">
    <option value="Student">Student</option>
    <option value="Employee">Employee</option>
    <option value="Other" selected>other</option>
  </select>
  </div>


  <div class=" item text-left mb-4 mt-3 option"   id="select1" >
  <p class="pragraph">Educational level </p>
  <select required name="select1">
    <option value="High school">High school</option>
    <option value="College">College</option>
  </select>
  </div>

  <div class=" item text-left mb-4 mt-3 option" id="select2">
  <p class="pragraph">Type of the job </p>
  <select required  name="select2">
    <option value="Full-Time">Full-Time</option>
    <option value="Part-Time">Part-Time</option>
  </select>
  </div>

    <div class="item">
      <p class="pragraph">Email</p>
      <input type="text" id="email" name="Email" value="<?php if(isset($_POST['submit'])) echo $_SESSION['Email']; ?>" required/>
    </div>
    <div class="item">
      <p class="pragraph">Phone</p>
      <input type="text" id="phone" name="Phone"  value="<?php if(isset($_POST['submit'])) echo $_SESSION['Phone']; ?>" required/>
    </div>
    <div class="item">
      <p class="pragraph">Username</p>
      <input type="text" id="username" name="Username" value="<?php if(isset($_POST['submit'])) echo $_SESSION['Username']; ?>" required/>
    </div>


<div class="item">
  <p class="pragraph">Password</p>
  <div class="name-item"> <!--   -->
    <input type="password" id="password" placeholder="password" required name="Password"
   pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$"  title="Must contain at least one number and one uppercase and lowercase letter , and at least 8 or more characters " />
    <input type="password" id="cpassword" placeholder="confirm password" required name="Cpassword"/>
  </div>
</div>

<!--<div class="item">
  <p class="pragraph"> Select your profile image</p>
 <input type="file" accept="image/png, image/jpeg"  name="image" id="Image" />


</div> -->


</br>
    <div class="btn-block">
        <button type="submit" name ="submit" > Sign Up </button>
    </div>
  </form>
</div>

</br> </br>

<!--sing up form-->


<!--sing in form-->

</br> </br> </br>
<div  id="login"> </div> </br> </br> </br> </br>


<!-- processing -->


<?php
function signIN(){
include "config.php";
$EmailIN=test_input($_POST['EmailIN']);
$PasswordIN=test_input($_POST['PasswordIN']);

$_SESSION['Email']=$EmailIN;
$checkEmailsingIN="";
//if (filter_var($EmailIN, FILTER_VALIDATE_EMAIL) == true & strlen($PasswordIN) <= 8 &  preg_match("#[0-9]+#",$PasswordIN)== true
//& preg_match("#[A-Z]+#",$PasswordIN) == true & preg_match("#[a-z]+#",$PasswordIN) == true)
$checkEmailsingIN= mysqli_query($connect,"SELECT * FROM `nada_users` WHERE `email`='$EmailIN' ");

//else
if(mysqli_num_rows($checkEmailsingIN) == 0 ) {   echo '<script type="text/javascript"> alert("the email not found ! , please sign up. ") </script>'; ?>
<?php
}
  else{
    $checkEmailsingINN= mysqli_fetch_assoc($checkEmailsingIN);
    $PasswordINRight=$checkEmailsingINN['password'];
if( strcmp($PasswordINRight,$PasswordIN) == 0 ){
  $_SESSION['Email']=$checkEmailsingINN['email'];

 echo "<script>location.href='userDashboard.php'</script>";
//redirect
}

  else {
     echo '<script type="text/javascript"> alert("the Password is wrong ! , please try again. ") </script>';
    ?>
<?php
  }
 }
//}
}
//echo "<pre>"; print_r($_POST); exit;
if(isset($_POST['LogIn']))
{
   signIN();
}


?>




<!-- processing -->



<div class="testbox" >
  <form  action="Smart.php"  method="POST" onsubmit="return singinForm();">
    <div class="banner">
      <h1  >Log In</h1>
    </div>
    </br>

    <div class="item">
      <p class="pragraph">Email</p>

      <input type="text" id="emailIN" name="EmailIN"  required  value="<?php if(isset($_POST['LogIn'])) echo $_SESSION['Email']; ?>"/>

      </div>

<div class="item">
  <p class="pragraph">Password</p>

    <input type="password" id="passwordIN" required  name="PasswordIN" />


</div>


</br>
    <div class="btn-block">
      <button type="submit" name ="LogIn" > Log In </button>
    </div>
  </form>
</div>

<!--sing in form-->

        </div><!--//container-->
    </div><!--//features-->




    <footer class="footer text-center">
      <div class="contact-section" style="margin-top:-14px; height:10px;  max-width:1400px;">


            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->

            <div class="row">
                           <div class="col-sm-12 col-xs-12 ml-5">
                               <a> <i><img src="assets/images/twitter.png" width="30px;"/></i></a>
                               <a><i class="ml-4"><img src="assets/images/instagram.png" width="30px;"/></i></a>
                              <a><i class="ml-4"><img src="assets/images/snapchat.png" width="30px;"/></i></a>
                               <a><i class="ml-4"><img src="assets/images/gmail.png" width="30px;"/></i></i></a>
                           </div>
                       </div>

        </div><!--//container-->
    </footer>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/form.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>


</body>
</html>
