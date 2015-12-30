<!doctype html>
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
  <div data-role="page" class="" id="details" data-theme="c">
        <header data-role="header">
			<h1>Course Details for Students</h1>
		</header>
         <div data-role="content"> 
        <?php
            $course_ID=$_GET['id'];
            $conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }
            $conn_db= mysql_select_db("appgrade_db",$conn);
            $get_courses=mysql_query("SELECT U.ui_fname,U.ui_lname,oc_dept_code, oc_course_name, oc_desc, oc_status, oc_sem_code, pc_gp_amin, pc_gp_bmin, pc_gp_cmin, pc_gp_dmin, pc_gp_fmin, pc_gw_homework, pc_gw_labs, pc_gw_midterm, pc_gw_final, pc_gw_project, pc_gw_prz , pc_gs_homework, pc_gs_labs,  pc_gs_midterm, pc_gs_final, pc_gs_project,pc_gs_prz FROM offered_course_tbl O JOIN prof_courses_tbl P ON O.oc_id = P.pc_oc_id JOIN user_info_tbl U ON U.ui_id=P.pc_ui_id WHERE O.oc_id =".$course_ID); 

            $num=mysql_num_rows($get_courses);
        while ($row = mysql_fetch_array($get_courses)){?>
        <table border="2"  bgcolor="#72C6AE">
         <tr>
                <td>Professor</td>
                <td><? echo $row[ui_fname]." ". $row[ui_lname];?></td>
            </tr>
            <tr>
                <td>Course Number</td>
                <td><? echo $row[oc_dept_code];?></td>
            </tr>
              <tr>
                <td>Course Name</td>
                <td><? echo $row[oc_course_name];?></td>
            </tr>
         <tr>
                <td>Description </td>
                <td><? echo $row[oc_desc];?></td>
            </tr>
         <tr>
                <td>Semester Code</td>
                <td><? echo $row[oc_sem_code];?></td>
            </tr>
         <tr>
                <td>Status</td>
                <td><? echo $row[oc_status];?></td>
            </tr>
        </table>
                <br><br>
        <table border="2"  bgcolor="#72C6AE">
            <tr>
                <td>
                    Homework
                </td>
                <td>
                   <? echo $row[pc_gw_homework];?> 
                </td>
            </tr>
            <tr>
                <td>
                    Labs
                </td>
                <td>
                    <? echo $row[pc_gw_labs];?>
                </td>
            </tr>
            <tr>
                <td>
                    Midterm
                </td>
                <td>
                     <? echo $row[pc_gw_midterm];?>
                </td>
            </tr>
            <tr>
                <td>
                    Project
                </td>
                <td>
                    <? echo $row[pc_gw_project];?>
                </td>
            </tr>
            <tr>
                <td>Presentation

                </td>
                <td>
                    <? echo $row[pc_gw_prz];?>
                </td>
            </tr>
            <tr>
                <td>
                    Finals
                </td>
                <td>
                    <? echo $row[pc_gw_final];?>
                </td>
            </tr>

        </table>
                <br><br>
  <table border="2"  bgcolor="#72C6AE">
            <tr>
                <td>
                    Homework
                </td>
                <td>
                   <? echo $row[pc_gs_homework]."%";?> 
                </td>
            </tr>
            <tr>
                <td>
                    Labs
                </td>
                <td>
                    <? echo $row[pc_gs_labs]."%";?>
                </td>
            </tr>
            <tr>
                <td>
                    Midterm
                </td>
                <td>
                     <? echo $row[pc_gs_midterm]."%";?>
                </td>
            </tr>
            <tr>
                <td>
                    Project
                </td>
                <td>
                    <? echo $row[pc_gs_project]."%";?>
                </td>
            </tr>
            <tr>
                <td>Presentation

                </td>
                <td>
                    <? echo $row[pc_gs_prz]."%";?>
                </td>
            </tr>
            <tr>
                <td>
                    Finals
                </td>
                <td>
                    <? echo $row[pc_gs_final]."%";?>
                </td>
            </tr>

        </table>
                <br><br>
                <table border="2" bgcolor="#72C6AE">
            <tr>
                <td>
                     <? echo ">".$row[pc_gp_amin]."%";?> 
                </td>
                <td>
                  Grade A
                </td>
            </tr>
            <tr>
                <td>
                    <? echo $row[pc_gp_amin]."% - ".$row[pc_gp_bmin]."%";?>
                </td>
                <td>
                    Grade B
                </td>
            </tr>
            <tr>
                <td>
                    <? echo $row[pc_gp_bmin]."% - ".$row[pc_gp_cmin]."%";?>
                </td>
                <td>
                    Grade C
                </td>
            </tr>
            <tr>
                <td>
                   <? echo $row[pc_gp_cmin]."% - ".$row[pc_gp_dmin]."%";?>
                </td>
                <td>
                   Grade D
                </td>
            </tr>
            <tr>
                <td><? echo "<". $row[pc_gp_fmin]."%";?>

                </td>
                <td>
                    Grade F
                </td>
            </tr>

        </table>
        <?
        } ?>
</div>
</div>
    </body>
</html>
