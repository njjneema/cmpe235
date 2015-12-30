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

       <div data-role="page" class="" data-theme="c">
        <header data-role="header">
            <a class="ui-btn-left" data-role="button" data-icon="back" data-theme="a" data-rel="back" data-transition="flip">Back</a>
			<a href="#studmenu" id='studmenu' class="ui-btn-right" data-theme="a" data-role="button">Menu</a>
			<h1>My Grades</h1>
		</header>
            <div data-role="content"> 

       
        <br>
       <?php

//connection to the database

$conn = mysql_connect('hkpowerzcom.ipagemysql.com', 'mariadb', 'password');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$conn_db= mysql_select_db("appgrade_db",$conn);

$get_my_grades=mysql_query("SELECT O.oc_id, O.oc_dept_code, O.oc_course_name,sc_homework, sc_labs , sc_midterm, sc_final , sc_project,sc_prz,  sc_grade_ltr
FROM offered_course_tbl O INNER JOIN student_course_tbl S ON O.oc_id = S.sc_oc_id
WHERE sc_ui_id =".$ui_id); 

$num=mysql_num_rows($get_my_grades);
?>

<?php
 echo "<table align='center' style='width:75%'><tr> <th align='center'>DEPT ID</th><th align='center'>COURSE NAME</th><th  align='center'>Homework</th><th  align='center'>Lab</th><th  align='center'>Midterm</th><th  align='center'>Project</th><th  align='center'>Presentation</th> <th  align='center'>Final</th> <th  align='center'>Grade</th> </tr> ";
while ($row = mysql_fetch_array($get_my_grades)) 
{

   echo "<tr>
<td align='center'>".$row["oc_dept_code"]."</td>
<td align='center'>".$row["oc_course_name"]."</td>
<td align='center'>".$row["sc_homework"]."</td>
<td align='center'>".$row["sc_labs" ]."</td>
<td align='center'>".$row["sc_midterm"]."</td>
<td align='center'>".$row["sc_project"]."</td>
<td align='center'>".$row["sc_prz"]."</td>
<td align='center'>".$row["sc_final"]."</td>
<td align='center'>".$row["sc_grade_ltr"]."</td>
</tr>"; 
}

echo "</table>";// Closing of list box

mysql_close();

?> 
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
				<a href="http://www.hkpowerz.com/cmpe235/php/logout.php" id='logout' class="ui-btn-center" data-theme="a" data-role="button" >Logout</a>
				    </div>
                 <br><br>  
                 <a data-rel="close" class="ui-btn-left ui-shadow ui-corner-all" data-theme="a" data-role="button">Close</a>
	    </div>
</div>
        
</body>
</html>
