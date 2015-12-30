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
    <body>
        
        <div data-role="page" class="" id="signup" data-theme="c">
        <header data-role="header">
            <a class="ui-btn-left" data-role="button" data-icon="back" data-theme="a" data-rel="back" data-transition="flip">Back</a>
			<a href="#menu" id='menu' class="ui-btn-right" data-theme="a" data-role="button" >Menu</a>
            <h1>Prof. List of Students</h1>
		</header>
             <div data-role="content"> 
       <?php $offeredCourse_ID=$_GET['oc_id'];?>
      
<?php echo "<a href='editCourse.php?c_id=".$offeredCourse_ID."''class='ui-btn ui-shadow ui-corner-all' data-role='button' data-theme='a' data-transition='flip'>Edit</a>";?>
<br><br>
<?php
$conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
$conn_db= mysql_select_db("appgrade_db",$conn);
$get_stud_name=mysql_query("SELECT U.ui_id, U.ui_fname, U.ui_lname, S.sc_grade_ltr FROM prof_courses_tbl P INNER JOIN student_course_tbl S  ON P.pc_oc_id = S.sc_oc_id JOIN user_info_tbl U  ON S.sc_ui_id = U.ui_id 
WHERE P.pc_oc_id =".$offeredCourse_ID); 

$num=mysql_num_rows($get_stud_name);
?>
<?php
 echo "<table align='center' style='width:75%'><tr> <th align='center'>NAME</th><th align='center'>GRADE</th> </tr> ";
while ($row = mysql_fetch_array($get_stud_name)) {

echo "<tr><td align='center'><a href='enterGrade.php?id=".$row["ui_id"]."&c_id=".$offeredCourse_ID."''class='ui-btn ui-shadow ui-corner-all' data-role='button' data-theme='a' data-transition='flip'>".$row["ui_fname"]." ".$row["ui_lname"]."</a></td><td align='center'>".$row["sc_grade_ltr" ]."</td></tr>"; 
}


echo "</table>";// Closing of list box
?>
<?php
/*
echo "<select name='stud_id_name' ><option value=''>Select one</option>"; // list box select command
while ($row = mysql_fetch_array($get_stud_name)) {

   echo '<option value="'.$row[ui_id]. '" >'.$row[ui_id]."_".$row[ui_fname].'</option>'; 
}
echo "</select>";   */
?>


<br><br>

 
            </div>
            <div data-role="panel" id="menu" data-display="overlay" data-position="right" data-theme="a" >
	            <div data-role="fieldcontain">
				<a href="/cmpe235/php/profHome.php" id='home' class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >Home</a>
                     <br><br>  
				    </div>
	                        
				<div data-role="fieldcontain">
				<a href="/cmpe235/php/profHome.php" id='courses' class="ui-btn-center ui-shadow ui-corner-all" data-theme="a" data-role="button" >Courses</a>
                    <br><br>  
				    </div>
			    
			    <div data-role="fieldcontain">
				<a href="http://www.hkpowerz.com/cmpe235/php/logout.php" id='logout' class="ui-btn-center" data-theme="a" data-role="button" >Logout</a>
				    </div>
                 <br><br>  
                 <a data-rel="close" class="ui-btn-left ui-shadow ui-corner-all" data-theme="a" data-role="button">Close</a>
	    </div>
    </div> <!-- End Page -->
    </body>
</html>
