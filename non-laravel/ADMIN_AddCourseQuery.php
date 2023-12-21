<?php
//include_once 'db.php';

use PhpParser\Node\Stmt\Else_;

use function Laravel\Prompts\error;

$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nfc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//$Image = $_POST['Image'];
$CourseID = $_POST['CourseID'];
$CourseName = $_POST['CourseName'];


$sql3 = "select * from course_id;";
$result3 = $conn->query($sql3);
// LOOP TILL END OF DATA
$course = 'clear';
while($rows=mysqli_fetch_assoc($result3)){
    $CourseIDNEW = $rows['CourseID'];
    $CourseNameNEW = $rows['CourseName'];
    
    if($CourseIDNEW == $CourseID){
        $course = 'exists';
        echo '<script>
		alert("Course ID alraedy exists!");
		window.location.href="ADMIN_AddCourse.php";
		</script>';
    }
    elseif($CourseNameNEW == $CourseName){
        $course = 'exists';
        echo '<script>
		alert("Course Name alraedy exists!");
		window.location.href="ADMIN_AddCourse.php";
		</script>';
    }
}
// Add info
if($course == 'clear'){
    $sql = "INSERT INTO course_id (CourseID, CourseName) VALUES ('$CourseID', '$CourseName');";
    
    mysqli_query($conn, $sql);
   
    
    echo '<script>
        alert("(Course ID.: '.$CourseID.') ADDED!");
        window.location.href="ADMIN_CourseInfo.php";
        </script>'; 
}

