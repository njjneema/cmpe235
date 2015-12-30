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
		    <h1>Prof. Add Course</h1>
        </div>
		</header>
            <div data-role="content"> 
        <form name="form1" method="post" action="profHome.php">
            <br>
            <label>
                Course Number
                <input type="text" name="txt_CourseNo" id="txt_CourseNo">
            </label>
            <br><br>
            <label>Course Name 
                <input type="text" name="txt_CourseName" id="txt_CourseName">
            </label>
            <br><br>
            <label>Semester Code 
                <input type="text" name="txt_Sem_Code" id="txt_Sem_Code">
            </label>
             <br><br>
            <label>Description
               <textarea id="txt_Desc" name="txt_Desc" rows="4" cols="50">
                </textarea>
            </label>
            <br><br>
            <label>Status
                <input type="text" name="txt_Status" id="txt_Status">
            </label>
            <br><br>
            <label>Class Size 
                <input type="text" name="txt_ClassSize" id="txt_ClassSize">
            </label>
            <br><br>
            
            <label><h2>Grade Weightage</h2><br>
                <label>HW
               <input type="range" name="range_HW" id="range_HW" value="500" min="0" max="1500">
                </label>
               <br><br>
                 <label>Labs
               <input type="range" name="range_Labs" id="range_Labs" value="500" min="0" max="1500">
                </label>
                   <br><br>
                 <label>Midterm
               <input type="range" name="range_Midterm" id="range_Midterm" value="100" min="0" max="1500">
                </label>
                <br><br>
                      <label>Finals
               <input type="range" name="range_Final" id="range_Final" value="100" min="0" max="1500">
                 </label>
                <br><br>
                           <label>Project
               <input type="range" name="range_Proj" id="range_Proj" value="200" min="0" max="1500">
                 </label>
                <br><br>
                   <label> Presentation            
               <input type="range" name="range_Prz" id="range_Prz" value="100" min="0" max="1500">
             </label>
            </label>
            <br><br>
            
            <label><h2>Grade Policy</h2><br>
                <div data-role="rangeslider" data-mini="true">
        <label for="range_A_l">A</label>
        <input type="range" name="range_A_l" id="range_A_l" min="0" max="100" value="90">
        <label for="range_A_h">Rangeslider:</label>
        <input type="range" name="range_A_h" id="range_A_h" min="0" max="100" value="100">
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_B_l">B</label>
        <input type="range" name="range_B_l" id="range_B_l" min="0" max="100" value="80">
        <label for="range_B_h">Rangeslider:</label>
        <input type="range" name="range_B_h" id="range_B_h" min="0" max="100" value="89">
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_C_l">C</label>
        <input type="range" name="range_C_l" id="range_C_l" min="0" max="100" value="70">
        <label for="range_C_h">Rangeslider:</label>
        <input type="range" name="range_C_h" id="range_C_h" min="0" max="100" value="79">
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_D_l">D</label>
        <input type="range" name="range_D_l" id="range_D_l" min="0" max="100" value="60">
        <label for="range_D_h">Rangeslider:</label>
        <input type="range" name="range_D_h" id="range_D_h" min="0" max="100" value="69">
    </div>
                   <div data-role="rangeslider" data-mini="true">
        <label for="range_F_l">F</label>
        <input type="range" name="range_F_l" id="range_F_l" min="0" max="100" value="0">
        <label for="range_F_h">Rangeslider:</label>
        <input type="range" name="range_F_h" id="range_F_h" min="0" max="100" value="59">
    </div>
                <a class="ui-btn-left" data-role="button" data-theme="a" onclick="validateGradeRange()">Check Grade Policy</a>
                   </label>
            
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
            
            <br><br>
             <label><h2>Grade Scaling</h2><br>
                <label>Homework
               <input type="range" name="scale_HW" id="scale_HW" value="10" min="0" max="100">
                </label>
               <br><br>
                <label>Labs
               <input type="range" name="scale_Labs" id="scale_Labs" value="40" min="0" max="100">
                </label>
                   <br><br>
               <label>Midterm
                   <input type="range" name="scale_Midterm" id="scale_Midterm" value="10" min="0" max="100">
                </label>
                    <br><br>
               <label>Finals
                   <input type="range" name="scale_Final" id="scale_Final" value="10" min="0" max="100">
                </label>
                    <br><br>
               <label>Project
                   <input type="range" name="scale_Proj" id="scale_Proj" value="20" min="0" max="100">
                </label>
                 <br><br>
                 <label>Presentation
                   <input type="range" name="scale_Prz" id="scale_Prz" value="10" min="0" max="100">
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
				<a href="http://www.neemajj.com/cmpe235/php/logout.php" id='logout' class="ui-btn-center" data-theme="a" data-role="button" >Logout</a>
				    </div>
                    <br><br>  
                 <a data-rel="close" class="ui-btn-left ui-shadow ui-corner-all" data-theme="a" data-role="button">Close</a>
	    </div>
    </div> <!-- End Page -->
    </body>
</html>
