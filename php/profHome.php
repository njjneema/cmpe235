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
		    <a href="#menu" id='menu' class="ui-btn-right" data-theme="a" data-role="button" >Menu</a>
		   <h1><?php echo $ui_fname;?> Home Page</h1>
        </div>
		</header>
            <div data-role="content"> 

       
        <br>
       
 <a href="/cmpe235/php/addCourse.php" class="ui-btn-right" data-role="button" data-theme="a" data-transition="flip">Add New Course</a>
 <br><br>    
               
   <?php

if( isset($_POST['txt_CourseNo']) && $_POST['txt_CourseNo'] != NULL )
{
     $COURSE_ID= $_POST['txt_CourseNo'];
}
if( isset($_POST['txt_CourseName']) && $_POST['txt_CourseName'] != NULL )
{
     $COURSE_NAME= $_POST['txt_CourseName'];
}
if( isset($_POST['txt_Desc']) && $_POST['txt_Desc'] != NULL )
{
     $DESC= $_POST['txt_Desc'];
}
if( isset($_POST['txt_Status']) && $_POST['txt_Status'] != NULL )
{
     $STATUS= $_POST['txt_Status'];
}
if( isset($_POST['txt_Sem_Code']) && $_POST['txt_Sem_Code'] != NULL )
{
     $SEM_CODE= $_POST['txt_Sem_Code'];
}

if (isset($_POST['range_A_l'])) {
	$GRADE_A=$_POST['range_A_l'];
}
if (isset($_POST['range_B_l'])) {
$GRADE_B=$_POST['range_B_l'];
}
if (isset($_POST['range_C_l'])) {
$GRADE_C=$_POST['range_C_l'];
}
if (isset($_POST['range_D_l'])) {
$GRADE_D=$_POST['range_D_l'];
}
if (isset($_POST['range_F_l'])) {
$GRADE_F=$_POST['range_F_l'];
}

if (isset($_POST['range_HW'])) {
$WTA_HW=$_POST['range_HW'];
}
if (isset($_POST['range_Labs'])) {
$WTA_LABS=$_POST['range_Labs'];
}
if (isset($_POST['range_Midterm'])) {
$WTA_MIDT=$_POST['range_Midterm'];
}
if (isset($_POST['range_Final'])) {
$WTA_FINAL=$_POST['range_Final'];
}
if (isset($_POST['range_Proj'])) {
$WTA_PROJ=$_POST['range_Proj'];
}
if (isset($_POST['range_Prz'])) {
$WTA_PRZ=$_POST['range_Prz'];
}

if (isset($_POST['scale_HW'])) {
$SC_HW=$_POST['scale_HW'];
}
if (isset($_POST['scale_Labs'])) {
$SC_LABS=$_POST['scale_Labs'];
}
if (isset($_POST['scale_Midterm'])) {
$SC_MIDT=$_POST['scale_Midterm'];
}
if (isset($_POST['scale_Final'])) {
$SC_FINAL=$_POST['scale_Final'];
}
if (isset($_POST['scale_Proj'])) {
$SC_PROJ=$_POST['scale_Proj'];
}
if (isset($_POST['scale_Prz'])) {
$SC_PRZ=$_POST['scale_Prz'];
}


//connection to the database

$conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$conn_db= mysql_select_db("appgrade_db",$conn);
//-------List of Prof. Course------
$get_prof_course=mysql_query("SELECT O.oc_id,O.oc_dept_code, O.oc_course_name, O.oc_sem_code 
FROM prof_courses_tbl P
INNER JOIN offered_course_tbl O ON O.oc_id = P.pc_oc_id 
WHERE pc_ui_id =".$ui_id." AND oc_status =  'V'"); 

$num=mysql_num_rows($get_prof_course);
?>
<div data-role="fieldcontain">
<?php
 echo "<table align='center' style='width:75%'><tr> <th align='center'>DEPT ID</th><th align='center'>COURSE NAME</th><th  align='center'>SEM CODE</th> </tr> ";
while ($row = mysql_fetch_array($get_prof_course)) {

   echo "<tr><td align='center'><a href='/cmpe235/php/profStudList.php?oc_id=".$row["oc_id"]."''class='ui-btn ui-shadow ui-corner-all' data-role='button' data-theme='a' data-transition='flip'>".$row["oc_dept_code"]."</a></td><td align='center'>".$row["oc_course_name"]."</td><td align='center'>".$row["oc_sem_code"]."</td></tr>"; 
}

echo "</table>";// Closing of list box
?>
</div>
<?php

if( isset($_POST['txt_CourseNo']))
{
    if( isset($_POST['co_id']) && $_POST['co_id'] != NULL )
    {
         $ID= $_POST['co_id'];//update
        mysql_query("UPDATE offered_course_tbl SET oc_dept_code ='".$COURSE_ID."', oc_desc = '".$DESC."', oc_sem_code = '".$SEM_CODE."', oc_course_name = '".$COURSE_NAME."' WHERE oc_id =".$ID);
        mysql_query("UPDATE prof_courses_tbl SET pc_gp_amin ='".$GRADE_A."', pc_gp_bmin = '".$GRADE_B."', pc_gp_cmin = '".$GRADE_C."',  pc_gp_dmin= '".$GRADE_D."', pc_gp_fmin = '".$GRADE_F."', pc_gw_homework = '".$WTA_HW."', pc_gw_labs = '".$WTA_LABS."', pc_gw_midterm= '".$WTA_MIDT."', pc_gw_final = '".$WTA_FINAL."', pc_gw_project = '".$WTA_PROJ."', pc_gw_prz = '".$WTA_PRZ."', pc_gs_homework ='".$SC_HW."' , pc_gs_labs = '".$SC_LABS."' , pc_gs_midterm ='".$SC_MIDT."' , pc_gs_final = '".$SC_FINAL."' , pc_gs_project ='".$SC_PROJ."' ,
pc_gs_prz = '".$SC_PRZ."' WHERE pc_ui_id =".$ui_id." AND pc_oc_id =".$ID);

    }else
    {
        mysql_query("INSERT INTO offered_course_tbl
        (oc_dept_code,oc_desc,oc_status,oc_sem_code,oc_course_name) VALUES('$COURSE_ID','$DESC', '$STATUS','$SEM_CODE','$COURSE_NAME' )");
        
        $get_Latest_Id= mysql_query("SELECT MAX(oc_id) as oc_id from offered_course_tbl") ;

        $row = mysql_fetch_array($get_Latest_Id);
         $OFF_ID=$row["oc_id"];
        mysql_query("INSERT INTO prof_courses_tbl        (pc_ui_id,pc_oc_id,pc_gp_amin,pc_gp_bmin,pc_gp_cmin,pc_gp_dmin,pc_gp_fmin,pc_gw_homework,pc_gw_labs,pc_gw_midterm,pc_gw_final,pc_gw_project,pc_gw_prz,pc_gs_homework,pc_gs_labs,pc_gs_midterm,pc_gs_final,pc_gs_project,pc_gs_prz) 
        VALUES('$ui_id','$OFF_ID', '$GRADE_A', '$GRADE_B', '$GRADE_C',  '$GRADE_D','$GRADE_F', '$WTA_HW', '$WTA_LABS', '$WTA_MIDT', '$WTA_FINAL', '$WTA_PROJ', '$WTA_PRZ', '$SC_HW', '$SC_LABS','$SC_MIDT','$SC_FINAL','$SC_PROJ','$SC_PRZ' )");
    }
}
mysql_close();

?> 
</div> <!-- End Main Content -->
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
