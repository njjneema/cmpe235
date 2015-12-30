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
        
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
var sliders = $("#sliders .slider");
var availableTotal = 100;

sliders.each(function() {
    var init_value = parseInt($(this).text());

    $(this).siblings('.value').text(init_value);

    $(this).empty().slider({
        value: init_value,
        min: 0,
        max: availableTotal,
        range: "max",
        step: 2,
        animate: 0,
        slide: function(event, ui) {
            
            // Update display to current value
            $(this).siblings('.value').text(ui.value);

            // Get current total
            var total = 0;

            sliders.not(this).each(function() {
                total += $(this).slider("option", "value");
            });

            // Need to do this because apparently jQ UI
            // does not update value until this event completes
            total += ui.value;

            var delta = availableTotal - total;
            
            // Update each slider
            sliders.not(this).each(function() {
                var t = $(this),
                    value = t.slider("option", "value");

                var new_value = value + (delta/2);
                
                if (new_value < 0 || ui.value == 100) 
                    new_value = 0;
                if (new_value > 100) 
                    new_value = 100;

                t.siblings('.value').text(new_value);
                t.slider('value', new_value);
            });
        }
    });
});
});//]]>  

</script>
</head>
<body>
  <div data-role="page" class="" data-add-back-btn="false" data-theme="c" >
	    <div data-role="header" class="" data-theme="b">
            <a class="ui-btn-left" data-role="button" data-icon="back" data-theme="a" data-rel="back" data-transition="flip">Back</a>
		    <a href="#menu" id='menu' class="ui-btn-right" data-theme="a" data-role="button" >Menu</a>
		   <h1>Student's Marks</h1>
        </div>
		</header>
	    <div data-role="content">
		    <form method="post" action="gradeCalculate.php">
		    	<ul data-role="listview" data-inset="true" >  
<?php
$student_ID=$_GET['id'];
$course_ID=$_GET['c_id'];

$conn = mysql_connect('neemajjcom.ipagemysql.com', 'mariadb', 'password');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
$conn_db= mysql_select_db("appgrade_db",$conn);
$get_stud_marks=mysql_query("SELECT  S.sc_homework, S.sc_labs , S.sc_midterm, S.sc_final , S.sc_project, S.sc_prz, S.sc_grade_ltr, P.pc_gw_homework,P.pc_gw_labs,P.pc_gw_midterm,P.pc_gw_final,P.pc_gw_project,P.pc_gw_prz FROM  student_course_tbl S JOIN prof_courses_tbl P ON S.sc_oc_id =P.pc_oc_id WHERE sc_oc_id =".$course_ID." AND sc_ui_id = ".$student_ID); 

$num=mysql_num_rows($get_stud_marks);
while ($row = mysql_fetch_array($get_stud_marks)) {

//echo  $row[sc_homework]." ".$row[sc_labs]." ".$row[sc_final]." ".$row[sc_midterm]." ".$row[sc_project]." ".$row[sc_prz];

?>
                   <?php echo "<input type='hidden' name='id' id='id' value='".$student_ID."' hidden/>";?>
                   <?php echo "<input type='hidden' name='c_id' id='c_id' value='".$course_ID."' hidden/>";?>
                    <li>
						<div data-role="fieldcontain">
						<label for="HomeworksMax">Homeworks (<?php echo $row["pc_gw_homework"];?>)</label>
						<?php echo "<input type='range' name='HomeworksMax' id='HomeworksMax' value='".$row["sc_homework"]."' min='0' max='".$row["pc_gw_homework"]."' data-highlight='true' data-track-theme='c'/>";?>
						    </div>
					</li>
                    <li>
						<div data-role="fieldcontain">
						<label for="LabsMax">Labs (<?php echo $row["pc_gw_labs"];?>)</label>
						<?php echo "<input type='range' name='LabsMax' id='LabsMax' value='".$row["sc_labs"]."' min='0' max='".$row["pc_gw_labs"]."' data-highlight='true' data-track-theme='c'/>";?>
						    </div>
					</li>
                    <li>
						<div data-role="fieldcontain">
						<label for="MidtermMax">Midterm (<?php echo $row["pc_gw_midterm"];?>)</label>
						<?php echo "<input type='range' name='MidtermMax' id='MidtermMax' value='".$row["sc_midterm"]."' min='0' max='".$row["pc_gw_midterm"]."' data-highlight='true' data-track-theme='c'/>";?>
						    </div>
					</li>
                    <li>
						<div data-role="fieldcontain">
						<label for="ProjectMax">Project (<?php echo $row["pc_gw_project"];?>)</label>
						<?php echo "<input type='range' name='ProjectMax' id='ProjectMax' value='".$row["sc_project"]."' min='0' max='".$row["pc_gw_project"]."' data-highlight='true' data-track-theme='c'/>";?>
						    </div>
					</li>
                    <li>
						<div data-role="fieldcontain">
						<label for="PresentationMax">Presentation (<?php echo $row["pc_gw_prz" ];?>)</label>
						<?php echo "<input type='range' name='PresentationMax' id='PresentationMax' value='".$row["sc_prz"]."' min='0' max='".$row["pc_gw_prz" ]."' data-highlight='true' data-track-theme='c'/>";?>
						    </div>
					</li>
                    <li>
						<div data-role="fieldcontain">
						<label for="FinalsMax">Finals (<?php echo $row["pc_gw_final"];?>)</label>
						<?php echo "<input type='range' name='FinalsMax' id='FinalsMax' value='".$row["sc_final"]."' min='0' max='".$row["pc_gw_final"]."' data-highlight='true' data-track-theme='c'/>";}?>
						    </div>
					</li>
			    </ul>

                        <p style="text-align: center;">
					    <button class="ui-btn ui-shadow ui-corner-all" data-transition="fade" id="marksSubmit" value"Submit" />Save</button>
				    </p>
		    </form>
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
   
