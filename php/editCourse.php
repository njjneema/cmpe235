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
    <div data-role="page" class="" data-add-back-btn="false" data-theme="c" >
	    <div data-role="header" class="" data-theme="b">
             <a class="ui-btn-left" data-role="button" data-icon="back" data-theme="a" data-rel="back" data-transition="flip">Back</a>
		    <a href="#menu" id='menu' class="ui-btn-right" data-theme="a" data-role="button" >Menu</a>
		    <h1>Prof. Edit Course</h1>
        </div>
		</header>
            <div data-role="content"> 
               <?php
            $course_ID=$_GET['c_id'];
            $conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }
            $conn_db= mysql_select_db("appgrade_db",$conn);
            $get_course_det=mysql_query("SELECT oc_dept_code, oc_course_name, oc_desc, oc_status, oc_sem_code, pc_gp_amin, pc_gp_bmin, pc_gp_cmin, pc_gp_dmin, pc_gp_fmin, pc_gw_homework, pc_gw_labs, pc_gw_midterm, pc_gw_final, pc_gw_project, pc_gw_prz,  pc_gs_homework, pc_gs_labs,  pc_gs_midterm, pc_gs_final, pc_gs_project,pc_gs_prz FROM offered_course_tbl O JOIN prof_courses_tbl P ON O.oc_id = P.pc_oc_id WHERE O.oc_id=".$course_ID); 

            $num=mysql_num_rows($get_course_det);
        while ($row = mysql_fetch_array($get_course_det)){?> 
                
        <form name="form1" method="post" action="profHome.php">
            <br>
            <input type='hidden' name='co_id' id='co_id' value='<?php echo $course_ID;?>' hidden/>
            <label>
                Course Number
                <input type="text" name="txt_CourseNo" id="txt_CourseNo" value="<? echo $row[oc_dept_code];?>" disabled>
            </label>
            <br><br>
            <label>Course Name 
                <input type="text" name="txt_CourseName" id="txt_CourseName" value="<? echo $row[oc_course_name];?>"> 
            </label>
            <br><br>
            <label>Semester Code 
                <input type="text" name="txt_Sem_Code" id="txt_Sem_Code" value="<? echo $row[oc_sem_code];?>">
            </label>
             <br><br>
            <label>Description
               <textarea id="txt_Desc" name="txt_Desc" rows="4" cols="50" value="<? echo $row[oc_desc];?>">
                </textarea>
            </label>
            <br><br>
            <label>Status
                <input type="text" name="txt_Status" id="txt_Status" value="<? echo $row[oc_status];?>">
            </label>
            <br><br>
            <label>Class Size 
                <input type="text" name="txt_ClassSize" id="txt_ClassSize" value="60">
            </label>
            <br><br>
            
            <label><h2>Grade Weightage</h2><br>
						<div data-role="fieldcontain">
						<label for="range_HW">Homeworks</label>
						<?php echo "<input type='range' name='range_HW' id='range_HW' value='".$row[pc_gw_homework]."' min='0' max='1500' data-highlight='true' data-track-theme='c'/>";?>
						    </div>

						<div data-role="fieldcontain">
						<label for="range_Labs">Labs</label>
						<?php echo "<input type='range' name='range_Labs' id='range_Labs' value='".$row[pc_gw_labs]."' min='0' max='1500' data-highlight='true' data-track-theme='c'/>";?>
						    </div>

						<div data-role="fieldcontain">
						<label for="range_Midterm">Midterm</label>
						<?php echo "<input type='range' name='range_Midterm' id='range_Midterm' value='".$row[pc_gw_midterm]."' min='0' max='1500' data-highlight='true' data-track-theme='c'/>";?>
						    </div>

						<div data-role="fieldcontain">
						<label for="range_Final">Final</label>
						<?php echo "<input type='range' name='range_Final' id='range_Final' value='".$row[pc_gw_final]."' min='0' max='1500' data-highlight='true' data-track-theme='c'/>";?>
						    </div>

						<div data-role="fieldcontain">
						<label for="range_Proj">Project</label>
						<?php echo "<input type='range' name='range_Proj' id='range_Proj' value='".$row[pc_gw_project]."' min='0' max='1500' data-highlight='true' data-track-theme='c'/>";?>
						    </div>

						<div data-role="fieldcontain">
						<label for="range_Prz">Presentation</label>
						<?php echo "<input type='range' name='range_Prz' id='range_Prz' value='".$row[pc_gw_prz]."' min='0' max='1500' data-highlight='true' data-track-theme='c'/>";?>
						    </div>
            </label>
            <br><br>
            
            <label><h2>Grade Policy</h2><br>
                <div data-role="rangeslider" data-mini="true">
        <label for="range_A_l">A</label>
        <?php echo "<input type='range' name='range_A_l' id='range_A_l' min='0' max='100' value='".$row[pc_gp_amin]."'>";?>
        <label for="range_A_h">Rangeslider:</label>
        <?php echo "<input type='range' name='range_A_h' id='range_A_h' min='0' max='100' value='100'>";?>
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_B_l">B</label>
        <?php echo "<input type='range' name='range_B_l' id='range_B_l' min='0' max='100' value='".$row[pc_gp_bmin]."'>";?>
        <label for="range_B_h">Rangeslider:</label>
        <?php echo "<input type='range' name='range_B_h' id='range_B_h' min='0' max='100' value='".($row[pc_gp_amin]-1)."'>";?>
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_C_l">C</label>
        <?php echo "<input type='range' name='range_C_l' id='range_C_l' min='0' max='100' value='".$row[pc_gp_cmin]."'>";?>
        <label for="range_C_h">Rangeslider:</label>
        <?php echo "<input type='range' name='range_C_h' id='range_C_h' min='0' max='100' value='".($row[pc_gp_bmin]-1)."'>";?>
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_D_l">D</label>
        <?php echo "<input type='range' name='range_D_l' id='range_D_l' min='0' max='100' value='".$row[pc_gp_dmin]."'>";?>
        <label for="range_D_h">Rangeslider:</label>
        <?php echo "<input type='range' name='range_D_h' id='range_D_h' min='0' max='100' value='".($row[pc_gp_cmin]-1)."'>";?>
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_F_l">F</label>
        <?php echo "<input type='range' name='range_F_l' id='range_F_l' min='0' max='100' value='".$row[pc_gp_fmin]."'>";?>
        <label for="range_F_h">Rangeslider:</label>
        <?php echo "<input type='range' name='range_F_h' id='range_F_h' min='0' max='100' value='".($row[pc_gp_dmin]-1)."'>";?>
    </div>
            <a class="ui-btn-left" data-role="button" data-theme="a" onclick="validateGradeRange()">Check Grade Policy</a>
            </label>
            <br><br>

<script>
    function validateGradeRange(){
        var Range_A_Low = Number(document.getElementById("range_A_l").value);
        var Range_B_Low = Number(document.getElementById("range_B_l").value);
        var Range_C_Low = Number(document.getElementById("range_C_l").value);
        var Range_D_Low = Number(document.getElementById("range_D_l").value);
        var Range_F_Low = Number(document.getElementById("range_F_l").value);
        var Range_A_High = Number(document.getElementById("range_A_h").value);
        var Range_B_High = Number(document.getElementById("range_B_h").value);
        var Range_C_High = Number(document.getElementById("range_C_h").value);
        var Range_D_High = Number(document.getElementById("range_D_h").value);
        var Range_F_High = Number(document.getElementById("range_F_h").value);
        
        if (Range_B_High >= Range_A_Low){
            alert("B can't overlap A");
       }
        else if (Range_C_High >= Range_B_Low){
            alert("C can't overlap B");
       }
        else if (Range_D_High >= Range_C_Low){
            alert("D can't overlap C");
       }
        else if (Range_F_High >= Range_D_Low){
            alert("F can't overlap D");
       }
    }
</script> 

            
             <label><h2>Grade Scaling</h2><br>
                <label>Homework
                <?php echo "<input type='range' name='scale_HW' id='scale_HW' value='".$row[pc_gs_homework]."' min='0' max='100' data-highlight='true' data-track-theme='c'/>";?>
                </label>
               <br><br>
                <label>Labs
                <?php echo "<input type='range' name='scale_Labs' id='scale_Labs' value='".$row[pc_gs_labs]."' min='0' max='100' data-highlight='true' data-track-theme='c''/>";?>
                </label>
                   <br><br>
               <label>Midterm
                <?php echo "<input type='range' name='scale_Midterm' id='scale_Midterm' value='".$row[pc_gs_midterm]."' min='0' max='100' data-highlight='true' data-track-theme='c'/>";?>
                </label>
                    <br><br>
               <label>Finals
                <?php echo "<input type='range' name='scale_Final' id='scale_Final' value='".$row[pc_gs_final]."' min='0' max='100' data-highlight='true' data-track-theme='c'/>";?>
                </label>
                    <br><br>
               <label>Project
                   <?php echo "<input type='range' name='scale_Proj' id='scale_Proj' value='".$row[pc_gs_project]."' min='0' max='100' data-highlight='true' data-track-theme='c'/>";?>
                </label>
                 <br><br>
                 <label>Presentation
                 <?php echo "<input type='range' name='scale_Prz' id='scale_Prz' value='".$row[pc_gs_prz]."' min='0' max='100' data-highlight='true' data-track-theme='c'/>";?>
                </label>
                 <a class="ui-btn-left" data-role="button" data-theme="a" onclick="validatePercentage()">Check Grade Scaling</a><br><br>
                 <span id="total_percentage"></span><br>
                 <label>Total Percentage: <span id="percentage_view"></span>%</label>
                   </label>

<script>
    function validatePercentage(){
        var HomeworksPercent = Number(document.getElementById("scale_HW").value);
        var LabsPercent = Number(document.getElementById("scale_Labs").value);
        var ProjectPercent = Number(document.getElementById("scale_Midterm").value);
        var PresentationPercent = Number(document.getElementById("scale_Final").value);
        var MidtermPercent = Number(document.getElementById("scale_Proj").value);
        var FinalPercent = Number(document.getElementById("scale_Prz").value);
        var TotalPercent = HomeworksPercent+LabsPercent+ProjectPercent+PresentationPercent+MidtermPercent+FinalPercent;
        if (TotalPercent != 100){
            alert("Percentage should total to 100%");
       }
        if (TotalPercent < 100){
            document.getElementById("total_percentage").innerHTML = 'Total should be at least 100%';
       }
        else if (TotalPercent > 100){
            document.getElementById("total_percentage").innerHTML = 'Total should be less than 100%';
       }
        else{
            document.getElementById("total_percentage").innerHTML = '';
       }
        document.getElementById("percentage_view").innerHTML = TotalPercent.toString();
        }
</script> 
            
            <br><br>
            <input type="submit" name="submit" value="Submit">
            
                   </form>
              <?php } ?>  
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
