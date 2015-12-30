
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
			<h1>Student Enroll Page</h1>
		</header>
            <div data-role="content"> 
        <br>
        <?php
            $conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }
            $conn_db= mysql_select_db("appgrade_db",$conn);
             $get_courses=mysql_query("SELECT C.oc_id,C.oc_dept_code, C.oc_course_name, C.oc_sem_code FROM offered_course_tbl C WHERE C.oc_id NOT IN ( SELECT O.oc_id
FROM offered_course_tbl O
INNER JOIN student_course_tbl S ON O.oc_id = S.sc_oc_id
WHERE sc_ui_id =".$ui_id.") AND  C.oc_status =  'V'"); 

            $num=mysql_num_rows($get_courses);
        ?>

<form name="input" action="enrollIn.php" method="post"> 
        <?php
            echo "<table style='width:50%'><tr><th>SELECT</th> <th align='left'>DEPT CODE</th><th>COURSE NAME</th><th>SEMESTER</th> </tr> ";
            while ($row = mysql_fetch_array($get_courses)) {
                echo "<tr><td align='center'> <input type='checkbox' value=' ".$row["oc_id"]."' name='compare[]'></td><td align='center'>".$row["oc_dept_code"]."</td><td align='center'><a href='courseDetStud.php?id=".$row["oc_id"]."'>".$row["oc_course_name"]."</a></td><td align='center'>".$row["oc_sem_code"]."</td></tr>"; 
            }
            echo "</table>";// Closing of list box
        ?>
<input type="submit" value="Enroll" name="enroll"> 
</form>
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
