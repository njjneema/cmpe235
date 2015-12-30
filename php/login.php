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
		<script>

//        Login POST
		function loginAjax(uname, pwd) {
			console.log(uname);
			console.log(pwd);
			$.ajax({
				type: "POST",
				url: "loginVerify.php",
				// The key needs to match your method's input parameter (case-sensitive).
				data: {
					params: JSON.stringify({username: uname, password: pwd})
				},
				success: function(login_response, login_type) {
					var obj = JSON.parse(login_response, login_type);
                    console.log(obj.status);
                    console.log(obj.type);
                    console.log(login_response);
                    if(obj.status == 'Login Success' && obj.type == 'P'){
					window.location.replace("/cmpe235/php/profHome.php");
                    }
                    else if(obj.status == 'Login Success' && obj.type == 'S'){
					window.location.replace("/cmpe235/php/studentHome.php");
                    }
                    else{
                        window.location.replace("/cmpe235/php/login.php");
                    }
				}
			});
		}
		</script>
        </head>
    <body>

	<!-- Begin Signin Page -->
        <div data-role="page" class="" id="signin" data-theme="c">
		<header data-role="header">
            <script>
            function pageReload(){
    console.log("page reload");
    location.reload();
}
            </script>
            <a class="ui-btn-right" data-role="button" data-theme="a" data-transition="fade" onclick="pageReload()">Refresh</a>
			<h1>Sign In</h1>
		</header>
            <img src="/cmpe235/images/icon-96-xhdpi.png" alt="App Grader">
        <form role="loginForm">
		<article data-role="content">
            <label><br>
              <br>
              Username
              <input type="text" name="username" id="username" required>
              </label>
              <p>
                <label>Password
                <input type="password" name="password" id="password" required>
                </label>
              </p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p><button class="ui-btn ui-shadow ui-corner-all" data-transition="fade"
		onclick="loginAjax(document.getElementById('username').value,
				document.getElementById('password').value)"
	      >Submit</button></p>
            </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <a href="http://www.hkpowerz.com/cmpe235/php/signup.php" id='signup' class="ui-btn-right" data-role="button" data-theme="a" data-transition="flip">Sign Up!</a>
            </div>
        </body>
</html>
<!-- End Signin Page -->