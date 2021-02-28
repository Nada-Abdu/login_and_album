<!DOCTYPE html>
<html lang="en">
<head>
	<?php
include "config.php";
$name="";
$email="";
session_start();
if (isset($_SESSION['Email'])){ $email=$_SESSION['Email']; }
else{

   echo '<script type="text/javascript"> alert("not found !! ") </script>';
    echo "<script>location.href='Smart.php'</script>";
}

  ?>

	<meta charset="UTF-8">
	<title>User Dashboard</title>
	<link rel="stylesheet" href="assets/css/stylesDashboard.css">
	<link rel="stylesheet" href="assets/css/My‏‏stylesDashboard.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".hamburger .hamburger__inner").click(function(){
			  $(".wrapper").toggleClass("active")
			})

			$(".top_navbar .fas").click(function(){
			   $(".profile_dd").toggleClass("active");
			});
		})
	</script>

	<script>
		$(document).ready(function(){
			$("#Albums").click(function(){
			  $("#content-Albums").show(300);
					$("#contentcreatAlbums").hide(300);
						$("#addimagecontent").hide(300);
				  	$("#iamge-Album").hide(300);

			});
		})
	</script>

	<script>
		$(document).ready(function(){
			$("#Homepage").click(function(){
			  $("#content-Albums").hide(300);
					$("#contentcreatAlbums").hide(300);
					$("#content-Albums").hide(300);
					 $("#iamge-Album").hide(300);

			});
		})
	</script>

	<script>
		$(document).ready(function(){
			$("#buttoncreatalbum").click(function(){
			  $("#content-Albums").hide(300);
					$("#iamge-Album").hide(300);
					$("#addimagecontent").hide(300);
				$("#contentcreatAlbums").show(300);

			});
		})
	</script>

<script>
	$(document).ready(function(){
		$("#sea").click(function(){
			$("#content-Albums").hide(300);
			$("#contentcreatAlbums").hide(300);
				$("#addimagecontent").hide(300);
				$("#iamge-Album").show(300);
				$("#iamge-Album").css("display":"inline");



		});
	})
</script>

<script>
	$(document).ready(function(){
		$("#addNewImage").click(function(){
			$("#content-Albums").hide(300);
			$("#contentcreatAlbums").hide(300);
				$("#iamge-Album").hide(300);
				$("#addimagecontent").show(300);

		});
	})
</script>


</head>
<body class="backgroundcontainer" >

<div class="wrapper">
  <div class="top_navbar" style="z-index:1000;">
    <div class="hamburger">
       <div class="hamburger__inner">
         <div class="one"></div>
         <div class="two"></div>
         <div class="three"></div>
       </div>
    </div>
    <div class="menu" >
      <div class="logo" style="margin-left:150px;">
        <img src="assets/images/smart.png" height="40px" width="140px"/>
      </div>
			<div class="right_menu" style="padding-top:12px;">
        <ul>
          <li><i class="fas "><img src="assets/images/settings.png" height="25px" width="25px"/></i>
            <div class="profile_dd">

               <div class="dd_item">Language</div>
               <div class="dd_item">Help</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="main_container">
      <div class="sidebar" >
          <div class="sidebar__inner">
            <div class="profile" style="border-bottom:0.1px solid #000; padding-top:35px; padding-left:1px;">
              <div class="img">
                <img src="assets/images/profile-2.png" alt="profile_pic"/>
              </div>
              <div class="profile_info" >

                 <p style="color:#fff; font-size:19px;"> Nada</p>
              </div>
            </div>

            <ul>

              <li>
                <a href="#" id="Homepage">
                  <span class="icon"><i class="fas"><img src="assets/images/home.png " width=25px; height=25px;/></i></span>
                  <span class="title">Homepage</span>
                </a>
              </li>
              <li>
                <a href="profile.php">
                  <span class="icon" >  <i class="fas "><img src="assets/images/user.png " width=25px; height=25px;/></i> </span>
                  <span class="title">profile</span>
                </a>
              </li>
              <li>
                <a href="#" id="Albums">
                  <span class="icon"> <i class="fas "><img src="assets/images/album.png " width=25px; height=25px;/></i></span>
                  <span class="title">Albums</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas"><img src="assets/images/Logout.png " width=25px; height=25px;/></i></span>
                  <span class="title">Logout</span>
                </a>
              </li>

            </ul>
          </div>
      </div>
			<div class="backgroundcontainer">
      <div class="container">

        <div class="item itme-padding" id="content-Albums" style="display:none;"  > <!-- content -->


<!-- frist row -->
<div class="row " >
	<div class="col col-md-3 main-header" ><strong>&nbsp;Albums</strong></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3 right" ><button id="buttoncreatalbum"type="submit" class="button1">Add new album</button></div>
</div>
<hr> </br> </br>
<!-- frist row -->


					<div class="row padding-row">

          <?php
					$user= mysqli_query($connect,"SELECT * FROM `albumm` WHERE `email`='$email' ");
					if(mysqli_num_rows($user) != 0 ){
          while($albumm = mysqli_fetch_assoc($user)) {
					 ?>

						<div class="col col-md-3 ">
        <div class="img-border center imgs " id="sea">
				<a href="userDashboard.php?name=<?php echo $albumm['name'];?>" style="text-decoration:none;" >
				<?php 	echo "<img src='".$albumm['cover']."' width=273.3 height=200/>"; ?>
					<div style="text-align:center; color: #c55451; font-size:15px; padding:20px; font-weight:bold;"><?php echo $albumm['name']?></div> </a>
				</div>
			</div>
<?php }}?>
				  </div>

			  </div> <!-- end content -->


<!--creat album -->

<div class="item itme-padding"  id="contentcreatAlbums" style="display:none;" > <!-- content -->

<!-- scond row -->
<div class="row " >
	<div class="col col-md-3 main-header" ><strong>&nbsp;Creat new album</strong></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3 right" ></div>
</div>
<hr> </br> </br>

<!-- frist row -->
<!-- proccesing creat album -->
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$directory = 'uploads/';
$allowed = array('jpeg', 'png', 'jpg');
if(isset($_POST['creat'])){
$Albumname=test_input($_POST["Albumname"]);
if($Albumname == "") {echo '<div style="color:#f00; margin-left:140px; display:inline;">*must choose album name </div>';}
$AN= mysqli_query($connect,"SELECT * FROM `albumm` WHERE `email`='$email' ");
	if(mysqli_num_rows($AN) != 0 ){
  while($an = mysqli_fetch_assoc($AN)) {
if( $an['name'] == $Albumname ) {
	echo '<div style="color:#f00; margin-left:140px; display:inline;">*You have already this album. </div>';
  // break;

}
}
	}
// album cover
$Albumcover=$_FILES['Albumcover']['name'];
if($Albumcover == "") {echo '<div style="color:#f00; margin-left:210px; display:inline;">*must choose album cover  </div>';}
$Albumcover_tmp =$_FILES['Albumcover']['tmp_name'];
$target_Albumcover = $directory.$Albumcover;
$ext_Albumcover= pathinfo($Albumcover, PATHINFO_EXTENSION);
if($Albumcover != "" || in_array($ext_Albumcover, $allowed) == true){
$insert= mysqli_query($connect,"INSERT INTO  `albumm` (`name`,`cover`,`email`) values ('$Albumname' , '$target_Albumcover','$email')");
move_uploaded_file($Albumcover_tmp, $target_Albumcover);
}

// images
$countselectedimage = count($_FILES['Cimages']['name']);
for($ii=0; $ii<$countselectedimage ; $ii++){
$imagename = $_FILES['Cimages']['name'][$ii];
$imagename_tmp =$_FILES['Cimages']['tmp_name'][$ii];
$target_imagename=$directory.$imagename ;
$ext_imagename= pathinfo($imagename, PATHINFO_EXTENSION);
if(in_array($ext_imagename, $allowed) == true){
$insert= mysqli_query($connect,"INSERT INTO  `images` (`name`,`cover`,`email` ) values ('$target_imagename' , '$Albumname', '$email')");
move_uploaded_file($imagename_tmp, $target_imagename);
}}
echo "<script>location.href='userDashboard.php?name=".$_GET['name']."'</script>";

}
?>

<form  method="post" name="creatalbumform" enctype="multipart/form-data" >
					<div class="row padding-row">

						<div class="col col-md-4 ">
               <label class="lable-form" >Album name : </label> <input type="text" name="Albumname" required id="Albumname"/>
							 <div  class="message" id="errornamecover"></div>
			      </div>

						<div class="col col-md-4 ">
               <label class="lable-form" >Album cover : </label>
			   <input type="file" name="Albumcover" id="Albumcover" required/>
				 <div class="message" id="errorAlbumcover" style="text-align:right;">* Only allows file types of  PNG, JPG, JPEG.</div>

			      </div>

						<div class="col col-md-4 ">
							 <label class="lable-form" >Album images : </label> <input type="file" id="creatalbumimage" name="Cimages[]"  multiple accept=".jpg,.jpeg,.png"/>
							 <div id="message" class="message" style="text-align:right;">*choose  at maximum 5 images</div>
							 <div id="eroormessagExtensiona" class="message" style="text-align:right;">* Only allows file types of  PNG, JPG, JPEG. </div>
						</div>
				  </div>



           <div class="sub-title"> Selected image : </div>
					<div class="line"></div>






					<!-- image from database -->
					<div class="row padding-row " id="creatalbumimagecontainer" >

           </div>
					<!-- image from database -->

<!-- button -->
<div class="row padding-row">
	<div class="col col-md-3"></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3 right" ><button type="submit" class="button1" name="creat">Creat</button></div>
</div>







</form>
 </div> <!-- end content -->

<!-- display image Albume   "-->

<div class="item itme-padding"  id="iamge-Album"   > <!-- content -->

	<?php
//	echo "<pre>";
//	print_r($_POST);
	if(isset($_GET['name'])){
		$name=$_GET['name'];?>

<!-- frist row -->
<div class="row " >
<div class="col col-md-3 main-header" ><strong>&nbsp;<?php echo $name?> Album</strong> </div>
<div class="col col-md-3"></div>
<div class="col col-md-3"></div>
<div class="col col-md-3 right" ><button id="addNewImage"type="submit" class="button1" >Add new image</button></div>
</div>
<hr> </br> </br>
<!-- frist row -->

<!-- image from database-->
	<div class="row padding-row">
	jjjjjj
<?php

 $albums= mysqli_query($connect,"SELECT * FROM `images` WHERE `email`='$email' and `cover`='$name' ");
while($album = mysqli_fetch_assoc($albums)) {
 ?>

		<div class="col col-md-3 ">
    <div class="img-border center imgs ">
    <a href="#" style="text-decoration:none;">	<img src="<?php echo $album['name'] ?>" width="273.3" height="200"/>
    </div>
    </div>
<?php }}?>
	</div>

</div> <!-- end content -->


<!--add image -->

<div class="item itme-padding"  id="addimagecontent"  style="display:none;" > <!-- content -->

<!-- scond row -->
<div class="row " >
	<div class="col col-md-4 main-header" ><strong>&nbsp;Add new image to album </strong></div>
	<div class="col col-md-4"></div>
	<div class="col col-md-4"></div>

</div>
<hr> </br> </br>
<!-- processing add image -->
<?php
$directory = 'uploads/';
$allowed = array('jpeg', 'png', 'jpg');
if(isset($_POST['add'])){
$name=$_GET['name'];
//var_dump($name);

// images
$countselectedimageadd= count($_FILES['addimage']['name']);
for($i=0;$i<$countselectedimageadd;$i++){
$addimagename = $_FILES['addimage']['name'][$i];
$addimagename_tmp =$_FILES['addimage']['tmp_name'][$i];
$target_addimagename=$directory.$addimagename;
$ext_imagenameadd= pathinfo($addimagename, PATHINFO_EXTENSION);
if(in_array($ext_imagenameadd, $allowed) == true){
	//if(isset($_GET['name'])){

$insert= mysqli_query($connect,"INSERT INTO  `images` (`name`,`cover`,`email` ) values ('$target_addimagename' , '$name', '$email')");
move_uploaded_file($addimagename_tmp,$target_addimagename);
}}
//header("location:userDashboard.php?name=".$_GET['name']);
  echo "<script>location.href='userDashboard.php?name=".$_GET['name']."'</script>";
}
//}
?>


<!-- frist row -->

<form  method="post" name="addimageform" enctype="multipart/form-data">
					<div class="row padding-row">
						<div class="col col-md-4 ">
							 <label class="lable-form" >Add images : </label> <input type="file" name="addimage[]" id="addimage" multiple accept=".jpg,.jpeg,.png" />
								 <div id="eroormessageMPRE" class="message" style="padding-left:120px;">*Choose  at maximum 5 images</div>
								 	 <div id="eroormessagExtension" class="message" style="padding-left:120px;">* Only allows file types of  PNG, JPG, JPEG. </div>
						</div>
				  </div>




           <div class="sub-title"> Selected image : </div>
					<div class="line"></div>

						<!--add image -->

						<div class="row padding-row" id="addimagecontentt" >

					  </div>



					<!-- image from database -->

<!-- button -->
<div class="row padding-row">
	<div class="col col-md-3"></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3"></div>
	<div class="col col-md-3 right" ><button type="submit" class="button1" name="add">Add to album</button></div>
</div>

</form>
 </div> <!-- end content -->



<!-- oppsss -->
			</div>
		</div>
  </div>

</div>

<script type="text/javascript" src="assets/js/uploadImage.js"></script>


</body>
</html>
