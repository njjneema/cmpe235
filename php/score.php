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
                <h1>My Scores</h1>
                <a class="ui-btn-left" data-role="button" data-icon="back" data-theme="a" data-rel="back" data-transition="flip">Back</a>
			<a href="#studmenu" id='studmenu' class="ui-btn-right" data-theme="a" data-role="button">Menu</a>
            </header>
            <div data-role="content"> 
            <?php

            $course_ID=$_GET['id'];

            $conn_db = mysqli_connect('hkpowerzcom.ipagemysql.com',
			'mariadb', 'password', 'appgrade_db') or
			die('Could not connect: ' . mysqli_error());
            $get_stud_marks=mysqli_query($conn_db,
		    "SELECT  sc_homework, sc_labs , sc_midterm, sc_final,
		    sc_project,sc_prz,  sc_grade_ltr
		    FROM  student_course_tbl
		    WHERE sc_ui_id =1 AND sc_oc_id = ".$course_ID) or
		    die("Failed in mysql query" . mysqli_error($conn_db));

            while ($row = mysqli_fetch_array($get_stud_marks)) {
		    $HW=$row["sc_homework"];
		    $Labs=$row["sc_labs"];
		    $Midterm=$row["sc_midterm"];
		    $Presentation=$row["sc_prz"];
		    $Project=$row["sc_project"];
		    $Final=$row["sc_final"];
		    $Grade=$row["sc_grade_ltr"];
            }
            ?>
            <div data-role="fieldcontain">
                 <label for="marks_HW">Homework: </label>
                 <input type="text" name="marks_HW" id="marks_HW" value="<?php echo $HW; ?>" disabled />
            </div>
            <div data-role="fieldcontain">
                   <label for="marks_Labs">Labs: </label>
                   <input type="text" name="marks_Labs" id="marks_Labs" value="<?php echo $Labs; ?>" disabled />
            </div>
            <div data-role="fieldcontain">
                 <label for="marks_Midterm">Midterm: </label>
                 <input type="text" name="marks_Midterm" id="marks_Midterm" value="<?php echo $Midterm; ?>" disabled />
            </div>
            <div data-role="fieldcontain">
               <label for="marks_Prz">Presentation: </label>
               <input type="text" name="marks_Prz" id="marks_Prz" value="<?php echo $Presentation; ?>" disabled />
            </div>
            <div data-role="fieldcontain">
             <label for="marks_Proj">Project: </label>
             <input type="text" name="marks_Proj" id="marks_Proj" value="<?php echo $Project; ?>" disabled />
            </div>
            <div data-role="fieldcontain">
               <label for="marks_Final">Final: </label>
               <input type="text" name="marks_Final" id="marks_Final" value="<?php echo $Final; ?>" disabled />
            </div>
            <div data-role="fieldcontain">
               <label for="marks_Grade">Grade: </label>
               <input type="text" name="marks_Grade" id="marks_Grade" value="<?php echo $Grade; ?>" disabled />
            </div>
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
   
