
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">

    <title>Update Student</title>

</head>
<body>

  <!-- PHP code to establish connection with the localserver -->
<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name is student
$database = 'nfc';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
?>

 
<br>
<div class="main">



<div class="row">
        <div class="column">
<br>
<br><br>

        </div>
        </div>

        <div class="column">

    <!--ADD RECORD-->
<br>
<br><br><br>
        <form action = "ADMIN_UpdateStudentQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Edit student details:</b></legend>

        <label class = "custom-field one">

            <input type = "number" name = "studNo" value = "<?php echo $_POST['studNo'] ?>" required oninvalid="this.setCustomValidity('Please Enter Student No.')" oninput="this.setCustomValidity('')" readonly> 
	        <span class = "placeholder"> Stud No. </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "studFName" value = "<?php echo $_POST['studFName'] ?>" required oninvalid="this.setCustomValidity('Please Enter First Name')" oninput="this.setCustomValidity('')" maxlength="15"> 
	        <span class = "placeholder"> First Name </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "studLName" value = "<?php echo $_POST['studLName'] ?>" required oninvalid="this.setCustomValidity('Please Enter Last Name')" oninput="this.setCustomValidity('')" maxlength="25"> 
	        <span class = "placeholder"> Last Name </span>
	        <br>
        </label>

            <!--course ID-->
            <select name="CourseID" id="CourseID">
            <option value="<?php echo $_POST['CourseID'];?>"><?php echo $_POST['CourseName'];?></option>
            <?php
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

        <!--DEP ID-->
        <select name="DepID" id="DepID">
            <option value="<?php echo $_POST['DepID'];?>"><?php echo $_POST['DepName'];?></option>
            <?php
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


            <!-- section ID -->
            <select name="SectionID" id="SectionID">
            <option value="<?php echo $_POST['SectionID'];?>"><?php echo $_POST['SectionID'];?></option>
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
        <input type = "number" name = "stud_yr_level" value = "<?php echo $_POST['stud_yr_level'] ?>" required oninvalid="this.setCustomValidity('Please Enter year level')" oninput="this.setCustomValidity('')" maxlength="1"> 
        <span class = "placeholder"> Year Level </span>
	    <br>
        </label>
        
    
        <label class = "custom-field one">
            <input type = "number" name = "LectureID" value = "<?php echo $_POST['LectureID'] ?>" required oninvalid="this.setCustomValidity('Please Enter Lecture ID')" oninput="this.setCustomValidity('')" maxlength="2"> 
	        <span class = "placeholder"> Lecture ID </span>
	    <br>
        </label>
        
            <button type = "submit" name = "submit"> Update Student </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_StudentInfo.php" class = "btn-home"> BACK </button>
       
</div>
    </body>
 
</html>