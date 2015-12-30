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
</head>
<body>

<?php
            $conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }
            $conn_db= mysql_select_db("appgrade_db",$conn);
 
      
if(isset($_POST['enroll'])) 
    { 
        $compare = $_POST["compare"]; 
        foreach ($compare as $value)
 {
            mysql_query("INSERT INTO
            student_course_tbl
            (sc_ui_id, sc_oc_id, sc_homework, sc_labs, sc_midterm, sc_final, sc_project,sc_prz,sc_grade_ltr)
            VALUES ('$ui_id','$value', 0,0,0, 0,0,0,'N')");
            
        }
       
    } 
mysql_close();
?>
<META http-equiv="refresh" content="0;URL=http://www.hkpowerz.com/cmpe235/php/enroll.php">
</body>
</html>

