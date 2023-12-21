<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>
    
<form action = "ADMIN_AddCourseQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Add Course:</b></legend>

            <label class = "custom-field one">

                <input type = "text" name = "CourseID" required oninvalid="this.setCustomValidity('Please enter CourseID')" oninput="this.setCustomValidity('')" maxlength="5"> 
                <span class = "placeholder"> Course ID </span>
                <br>
            </label>
        
        <label class = "custom-field one">

            <input type = "text" name = "CourseName" required oninvalid="this.setCustomValidity('Please Enter Course Name')" oninput="this.setCustomValidity('')" maxlength="25"> 
	        <span class = "placeholder"> Course Name </span>
	        <br>
        </label>

            <button type = "submit" name = "submit"> Add Course </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_CourseInfo.php" class = "btn-home"> BACK </button>

</body>
</html>