function validateForm() {
  var fname =document.getElementById("fname");
  var lname =document.getElementById("lname");
  var email =document.getElementById("email");
  var phone =document.getElementById("phone");
  var username =document.getElementById("username");
  var password =document.getElementById("password");
  var cpassword =document.getElementById("cpassword");

var check="" ;

  if (fname.value == "" || lname.value == "" || email.value == "" || phone.value == "" || password.value == "" || username.value == "" || cpassword.value == "") {
    check=check+"there is missed information must be filled out.\n"; }
   if (isNaN(phone.value) || phone.value.length !== 10 ) {   check=check+"the phone must be a number and lenght 10.\n"; }

 if (password.value != cpassword.value) {   check=check+"The two passwords you entered are not the same.\n";
  $("#password").css({'border-color': "#c33"});
  $("#cpassword").css({'border-color': "#c33"});}


var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
if (!(password.value.match(passw)) )
{ check=check+"The password must contain at least one number and one uppercase and lowercase letter and at least 8 up to 20 characters.\n";}

if(password.value.match(/[^\w]/))  check=check+"special characters not allowed";

if (!(isNaN(fname.value))){
  check=check+"the first name must be a text not a number.\n";
 $("#fname").css({'border-color': "#c33"}); }
if (!(isNaN(lname.value))){ check=check+"the last name must be a text not a number.\n";
 $("#lname").css({'border-color': "#c33"}); }
 if (!(isNaN(username.value))){ check=check+"the username must be a text not a number.\n";
 $("#username").css({'border-color': "#c33"}); }



 var res =phone.value.substr(0,2);
 if(res != 05 ){ check=check+"the first two digits of the phone must be '05' !!.\n" ;
    $("#phone").css({'border-color': "#c33"});
 }


 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 if(!(email.value.match(mailformat))) {check=check+"You have entered an invalid email address!";   $("#email").css({'border-color': "#c33"});}

 if(check.length >  0){  alert(check); return false; }
 else{ return true; }


}




function singinForm(){
  var emailIN =document.getElementById("emailIN");
  var passwordIN =document.getElementById("passwordIN");
    var checki="" ;
  if (emailIN.value == "" || passwordIN .value == ""){
    checki=checki+"email or password  must be filled out" ;
      $("#emailIN").css({'border-color': "#c33"});
      $("#passwordIN").css({'border-color': "#c33"});
}

var mailformati = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(!(emailIN.value.match(mailformati))) {checki=checki+"You have entered an invalid email address!";   $("#emailIN").css({'border-color': "#c33"});}

if(passwordIN.value.match(/[^\w]/))  check=check+"special characters not allowed";

if(checki.length >  0){  alert(checki); return false; }
else{ return true; }

}


function PreviewImage() {
          var fuData = document.getElementById('imglink');
          var FileUploadPath = fuData.value;

          if (FileUploadPath == '') {
              alert("Please upload an image");

          } else {
              var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

  //The file uploaded is an image

  if ( Extension == "png" || Extension == "jpeg" || Extension == "jpg") {

                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
                        oFReader.onload = function (oFREvent) {
                            document.getElementById("uploadPreview").src = oFREvent.target.result;
                        };


              }

  else {
      alert("Photo only allows file types of  PNG, JPG, JPEG. ");
             document.getElementById("imglink").value ='';


              }
          }


}


$(document).ready(function(){
  $(".Iam select").change(function(){
      var selected = $(this).children("option:selected").val();
      if(selected == "Student"){
        $("#select1").show();
        $("#select2").hide();
    }
    else if(selected == "Employee"){
      $("#select2").show();
      $("#select1").hide();
  }
    else{
      $("#select1").hide();
      $("#select2").hide();
    }
    });
  });

