<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta charset="utf-8">
		<title>AppGrader</title>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/cmpe235/css/jquery.mobile-1.3.1.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
    </head>

<body onload="initialize()">

<script>
$(document).ready(function()
{
	$("#signupSubmit").click(function()
	{
		$("#signupF").submit(function()
		{
		 alert('Form is submitting');
		 return true;
		});		
		
		$("#signupF").submit();
	});
});

</script>
    
    
    
<!-- Begin Signup Page -->

        <div data-role="page" class="" id="signup" data-theme="c">
		<header data-role="header">
            <script>
            function pageReload(){
    console.log("page reload");
    location.reload();
}
            </script>
            <a class="ui-btn-left" data-role="button" data-icon="back" data-theme="a" data-rel="back" data-transition="flip">Back</a>
            <a class="ui-btn-right" data-role="button" data-theme="a" data-transition="fade" onclick="pageReload()">Refresh</a>
			<h1>Sign Up!</h1>
		</header>
        <form name="signupForm" id="signupF" method="POST" action="processRegistration.php">
            
            <div data-role="content"> 
                
            <div data-role="fieldcontain">
             <label for="txt_username">ID Number / Username: </label>
             <input type="text" name="txt_username" id="txt_username" value=""  />
            </div>
            
            <div data-role="fieldcontain">
             <label for="txt_firstname">First Name: </label>
             <input type="text" name="txt_firstname" id="txt_firstname" value=""  />
            </div>
            
             <div data-role="fieldcontain">
             <label for="txt_lastname">Last Name: </label>
             <input type="text" name="txt_lastname" id="txt_lastname" value=""  />
        </div>
                
            <div  data-role="fieldcontain">
              <label for="gender">Gender: </label>
    <select name="gender" id="gender" data-role="slider">
      <option value="M">M</option>
      <option value="F">F</option>
    </select> 
                </div>
                
             <div data-role="fieldcontain">
             <label for="txt_email">Email: </label>
             <input type="text" name="txt_email" id="txt_email" value=""  />
        </div>
                 <span id="check_email"></span>
            
             <div data-role="fieldcontain">
             <label for="txt_phone">Phone Number: </label>
             <input type="text" name="txt_phone" id="txt_phone" value=""  />
        </div>
            
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript">
  var   geocoder;
  var my_location;
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng);
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();
}

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results);
        if (results[1]) {
         //formatted address
         //alert(results[0].formatted_address);
         my_location = results[0].formatted_address;
            console.log(my_location);
            document.getElementById("txt_address").innerHTML = my_location;
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        //alert(city.short_name + " " + city.long_name)


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
    
</script>
                
                <div data-role="fieldcontain">
             <label for="txt_address">Address: </label>
                <span id="txt_address"></span>
        </div>
                
             <div data-role="fieldcontain">
             <label for="txt_password">Password</label>
             <input type="password" name="txt_password" placeholder="Password" id="txt_password" value=""  />
        </div>
                <span id="pass_strength"></span>
           
             <div data-role="fieldcontain">
             <label for="txt_confirm_password">Confirm Password: </label>
             <input type="password" name="txt_confirm_password" placeholder="Confirm Password" id="txt_confirm_password" value=""  />
                  <span id="pass_match"></span>
        </div>
            
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p><button class="ui-btn ui-shadow ui-corner-all" data-transition="fade" id="signupSubmit" value"Submit" />Submit</button></p>
            </div>
            </form>
            <script>
                
//Password Match

        var password = document.getElementById("txt_password"), confirm_password = document.getElementById("txt_confirm_password"), on_submit = document.getElementById("signupSubmit"), on_email = document.getElementById("txt_email");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
            document.getElementById("pass_match").innerHTML = "Passwords Don't Match";
//            window.alert("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
            document.getElementById("pass_match").innerHTML = "";
        }
        }
                
        confirm_password.onkeyup = validatePassword;

//Password Strength
       
        function passwordStrength()
                {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (enoughRegex.test(password.value)) {
             document.getElementById("pass_strength").innerHTML = 'Medium!';
     } else if (strongRegex.test(password.value)) {
            document.getElementById("pass_strength").innerHTML = 'ok';
     } else if (mediumRegex.test(password.value)) {
             document.getElementById("pass_strength").innerHTML = 'Medium!';
     } else {
             document.getElementById("pass_strength").innerHTML = 'Weak!';
     }
                }
                
        password.onkeyup = passwordStrength;

//Check Email

        function checkEmail() 
{
    var atpos = on_email.value.indexOf("@");
    var dotpos = on_email.value.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=on_email.value.length) 
	{
        document.getElementById("check_email").innerHTML = 'Please enter correct email address!';
    }
    else{
        document.getElementById("check_email").innerHTML = '';
    }
}
             on_email.onkeyup = checkEmail;
                
        </script>
            </div>

<!-- End Signup Page -->
    </body>
</html>