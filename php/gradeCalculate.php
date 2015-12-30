<html>
<head>
</head>
<body>

<?php


$stud_ID=$_POST['id'];
$course_ID=$_POST['c_id'];
$s_max_homework=$_POST['HomeworksMax'];
$s_max_lab=$_POST['LabsMax'];
$s_max_midterm=$_POST['MidtermMax'];
$s_max_final=$_POST['FinalsMax'];
$s_max_project=$_POST['ProjectMax'];
$s_max_presentation=$_POST['PresentationMax'];

$conn = mysql_connect('hkpowerzcom.ipagemysql.com', 'mariadb', 'password');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
$conn_db= mysql_select_db("appgrade_db",$conn);
mysql_query("UPDATE student_course_tbl 
SET 
sc_homework=".$s_max_homework.",sc_labs=".$s_max_lab.",sc_midterm=".$s_max_midterm.",sc_final=".$s_max_final.",
sc_project=".$s_max_project.",
sc_prz=".$s_max_presentation."
WHERE sc_oc_id=".$course_ID." AND  sc_ui_id=".$stud_ID);

$get_prof_grades=mysql_query("SELECT pc_gw_homework, pc_gw_labs, pc_gw_midterm, pc_gw_final, pc_gw_project, pc_gw_prz, pc_gs_homework, pc_gs_labs, pc_gs_midterm, pc_gs_final, pc_gs_project, pc_gs_prz, pc_gp_amin, pc_gp_bmin, pc_gp_cmin, pc_gp_dmin, pc_gp_fmin
FROM prof_courses_tbl
WHERE pc_oc_id =".$course_ID ); 

$num=mysql_num_rows($get_prof_grades);

while ($row = mysql_fetch_array($get_prof_grades)) {
    $s_total_homework=$row[pc_gw_homework];
    $s_total_lab=$row[pc_gw_labs];
    $s_total_midterm=$row[pc_gw_midterm];
    $s_total_final=$row[pc_gw_final];
    $s_total_project=$row[pc_gw_project];
    $s_total_presentation=$row[pc_gw_prz];
    
    $gs_homework=$row[pc_gs_homework];
    $gs_lab=$row[pc_gs_labs];
    $gs_midterm=$row[pc_gs_midterm];
    $gs_final=$row[pc_gs_final];
    $gs_project=$row[pc_gs_project];
    $gs_presentation=$row[pc_gs_prz];
    
    $A_grade_range=$row[pc_gp_amin];
    $B_grade_range=$row[pc_gp_bmin];
    $C_grade_range=$row[pc_gp_cmin];
    $D_grade_range=$row[pc_gp_dmin];
    $F_grade_range=$row[pc_gp_fmin];
}

$totalPoints = ($s_max_homework*($gs_homework/100))+($s_max_lab*($gs_lab/100))+($s_max_midterm*($gs_midterm/100))+($s_max_final*($gs_final/100))+($s_max_project*($gs_project/100))+($s_max_presentation*($gs_presentation/100));
$maxPoints = ($s_total_homework*($gs_homework/100))+($s_total_lab*($gs_lab/100))+($s_total_midterm*($gs_midterm/100))+($s_total_final*($gs_final/100))+($s_total_project*($gs_project/100))+($s_total_presentation*($gs_presentation/100));
$currentPercentage = ($totalPoints/$maxPoints)*100;

$currentGrade = "N";
 
    if ($currentPercentage >= $A_grade_range)
    {
        $currentGrade = "A";
    }else if ($currentPercentage >= $B_grade_range){
        $currentGrade = "B";
    }else if ($currentPercentage >= $C_grade_range){
        $currentGrade = "C";
    }else if ($currentPercentage >= $D_grade_range){
        $currentGrade = "D";
    }else{
        $currentGrade = "F";
    }

mysql_query("UPDATE student_course_tbl 
SET 
sc_grade_ltr='".$currentGrade."'
WHERE sc_oc_id= ".$course_ID." AND  sc_ui_id=".$stud_ID);

mysql_close();
?>

<META http-equiv="refresh" content="0;URL=http://www.hkpowerz.com/cmpe235/php/profHome.php">
</body>
</html>