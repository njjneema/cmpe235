<!doctype html>
<?php
session_start();
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

foreach ($_SESSION as $key=>$value) {
	error_log("session : key =>   ". $key . " value =>   " . $value);
}

$ui_fname = $_SESSION["ui_fname"];
$ui_lname = $_SESSION["ui_lname"];
$ui_email = $_SESSION["ui_email"];
$ui_id = $_SESSION["ui_id"];
?>

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
    <body>
   <div data-role="page" class="" data-add-back-btn="false" data-theme="c" >
	    <div data-role="header" class="" data-theme="b">
		    <a href="#studmenu" id='studmenu' class="ui-btn-right" data-theme="a" data-role="button" >Menu</a>
		   <h1><?php echo $ui_fname;?> Home Page</h1>
        </div>
		</header>
            <div data-role="content"> 

<br><br>
                
<a href="/cmpe235/php/enroll.php" id="home" class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >Enroll</a>
<br><br>

<a href="/cmpe235/php/studMyCourses.php" id="home" class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >My Course</a>
<br><br>

<a href="/cmpe235/php/myGrades.php" id="home" class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >My Grades</a>
<br><br>

       </div>
        <div data-role="panel" id="studmenu" data-display="overlay" data-position="right" data-theme="a" >
	            <div data-role="fieldcontain">
				<a href="/cmpe235/php/studentHome.php" id='home' class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >Home</a>
                     <br><br>  
				    </div>
	                        
				<div data-role="fieldcontain">
				<a href="/cmpe235/php/studMyCourses.php" id='courses' class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >Courses</a>
                    <br><br>  
				    </div>
			    
			    <div data-role="fieldcontain">
				<a href="http://www.neemajj.com/cmpe235/php/logout.php" id='logout' class="ui-btn-center" data-theme="a" data-role="button" >Logout</a>
				    </div>
                 <br><br>  
                 <a data-rel="close" class="ui-btn-left ui-shadow ui-corner-all" data-theme="a" data-role="button">Close</a>
	    </div>
</div>
    </body>
</html>
