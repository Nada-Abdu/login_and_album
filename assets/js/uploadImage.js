

// cerat album
$(function() {
  $("#creatalbumimage").change(function() {
    creatalbum=document.getElementById("creatalbumimage");
    lengthc=creatalbum.files.length;

    if(lengthc <= 5){
      $('#message').hide();
    if (creatalbum.files && creatalbum.files[0]) {
      for (var i = 0; i < lengthc; i++) {
      var filea=creatalbum.files[i].name;
      var extensiona=filea.substring(filea.lastIndexOf('.') + 1).toLowerCase();
        if ( extensiona == "png"  ||  extensiona == "jpeg" || extensiona == "jpg"){
          $('#eroormessagExtensiona').hide();
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(creatalbum.files[i]);

         }
else{
     $('#eroormessagExtensiona').show();
     $('#creatalbumimage').val(""); break;
      }
      }
      }
}
    else    { $('#message').show();
              $('#creatalbumimage').val("");
   }
  });
});

function imageIsLoaded(e) {
var imgTmpl = '<div class="col col-md-3 "><img src='+e.target.result+' class="imgs" width="273.3" height="200"/></div>';
    $('#creatalbumimagecontainer').append(imgTmpl);
};

// add images
$(function() {
  $("#addimage").change(function() {
addimages=document.getElementById("addimage");
lengthi=addimages.files.length;
  if(lengthi <= 5){
    $('#eroormessageMPRE').hide();
  if (addimages.files && addimages.files[0]) {
    for (var i = 0; i < lengthi; i++) {
    var file=addimages.files[i].name;
    var extension=file.substring(file.lastIndexOf('.') + 1).toLowerCase();
     console.log(extension);
     if ( extension == "png"  || extension =="jpeg"|| extension == "jpg"){
      $('#eroormessagExtension').hide();
      console.log(addimages.files[i].name);
      var reader = new FileReader();
      reader.onload = imageIsLoadedadd;
      reader.readAsDataURL(addimages.files[i]);
     }
     else{
        $('#eroormessagExtension').show();
          $('#addimage').val(""); break;
       }
    }
    }

} else    { $('#eroormessageMPRE').show();
            $('#addimage').val("");
 }

});
});

function imageIsLoadedadd(ea) {
var imgTmpla = '<div class="col col-md-3"><img src='+ea.target.result+' class="imgs" width="273.3" height="200"/></div>';
    $('#addimagecontentt').append(imgTmpla);
};



$(function() {
  $("#Albumname").change(function() {
namecover=document.getElementById("Albumname");
if(namecover == "")
    $('#errornamecover').append("must select name to the cover. \n");
else
    $('#errornamecover').append("");


  });  });

  $(function() {
    $("#Albumcover").change(function() {
    albumcover=document.getElementById("Albumcover").value;
    var exten=albumcover.substring(albumcover.lastIndexOf('.') + 1).toLowerCase();
 if (exten == "png" || exten == "jpeg" || exten == "jpg" ){ $('#errorAlbumcover').hide(); }
else {
$('#errorAlbumcover').show();   $('#Albumcover').val("");
}

    }); });
