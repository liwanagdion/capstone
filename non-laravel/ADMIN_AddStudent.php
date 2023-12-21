<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    
<form action = "ADMIN_AddStudentQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Add Student:</b></legend>

            <label class = "custom-field one">

                <input type = "number" name = "studID" required oninvalid="this.setCustomValidity('Please Scan NFC Card for Student ID')" oninput="this.setCustomValidity('')" maxlength="10"> 
                <span class = "placeholder"> Scan NFC Card for Student ID </span>
                <br>
            </label>
        
        <label class = "custom-field one">

            <input type = "number" name = "studNo" required oninvalid="this.setCustomValidity('Please Enter Student No.')" oninput="this.setCustomValidity('')" maxlength="10"> 
	        <span class = "placeholder"> Stud No. </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "studFName" required oninvalid="this.setCustomValidity('Please Enter First Name')" oninput="this.setCustomValidity('')" maxlength="15"> 
	        <span class = "placeholder"> First Name </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "studLName" required oninvalid="this.setCustomValidity('Please Enter Last Name')" oninput="this.setCustomValidity('')" maxlength="25"> 
	        <span class = "placeholder"> Last Name </span>
	        <br>
        </label>

        <!-- DEP ID -->
        <select name="DepID" id="DepID">
            <?php
             $dbServername = "localhost:3306";
             $dbUsername = "root";
             $dbPassword = "";
             $dbName = "nfc";
             
             $mysqli = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
            $resultSet = $mysqli->query("SELECT DepID, DepName FROM dep_id");
            $color1 = "#f3f3f3";
            $color2 = "#ffffff";
            $color = $color1;

            while ($row = $resultSet->fetch_assoc())
            {
                $color == $color1 ? $color = $color2 : $color = $color1;

                $DepID = $row['DepID'];
                $DepName = $row['DepName'];
                echo "<option value = '$DepID' style = 'background: $color;'>$DepName</option>";
            }
            ?>
            </select>
            <br>

        <select name="CourseID" id="CourseID">
            <?php
            $dbServername = "localhost:3306";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "nfc";
            
            $mysqli = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

            $resultSet = $mysqli->query("SELECT CourseID, CourseName FROM course_id");
            $color1 = "#f3f3f3";
            $color2 = "#ffffff";
            $color = $color1;

            while ($row = $resultSet->fetch_assoc())
            {
                $color == $color1 ? $color = $color2 : $color = $color1;

                $CourseID = $row['CourseID'];
                $CourseName = $row['CourseName'];
                echo "<option value = '$CourseID' style = 'background: $color;'>$CourseName</option>";
            }
            ?>
            </select>
            <br>

            <!-- section ID -->
            <select name="SectionID" id="SectionID">
            <?php
            $resultSet = $mysqli->query("SELECT SectionID FROM section_id");
            $color1 = "#f3f3f3";
            $color2 = "#ffffff";
            $color = $color1;

            while ($row = $resultSet->fetch_assoc())
            {
                $color == $color1 ? $color = $color2 : $color = $color1;

                $SectionID = $row['SectionID'];
                echo "<option value = '$SectionID' style = 'background: $color;'>$SectionID</option>";
            }
            ?>
            </select>
            <br>

        <label class = "custom-field one">
        <input type = "number" name = "stud_yr_level" required oninvalid="this.setCustomValidity('Please Enter year level')" oninput="this.setCustomValidity('')"> 
        <span class = "placeholder"> Year Level </span>
	    <br>
        </label>
        
    
        <label class = "custom-field one">
            <input type = "number" name = "LectureID" required oninvalid="this.setCustomValidity('Please Enter Lecture ID')" oninput="this.setCustomValidity('')"> 
	        <span class = "placeholder"> Lecture ID </span>
	    <br>
        </label>

        
            <button type = "submit" name = "submit"> Add Student </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_StudentInfo.php" class = "btn-home"> BACK </button>

</body>
</html>