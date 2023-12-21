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
$studID = $_POST['studID'];
$studNo = $_POST['studNo'];
$studFName = $_POST['studFName'];
$studLName = $_POST['studLName'];
$DepID = $_POST['DepID'];
$CourseID = $_POST['CourseID'];
$SectionID = $_POST['SectionID'];
$stud_yr_level = $_POST['stud_yr_level'];
$LectureID = $_POST['LectureID'];

$sql3 = "select * from stud_id;";
$result3 = $conn->query($sql3);
// LOOP TILL END OF DATA
$stud = 'clear';
while($rows=mysqli_fetch_assoc($result3)){
    $studNoNEW = $rows['studNo'];
    $studIDNEW = $rows['studID'];
    
    if($studNoNEW == $studNo){
        $stud = 'exists';
        echo '<script>
		alert("StudentNo alraedy exists!");
		window.location.href="ADMIN_AddStudent.php";
		</script>';
    }
    elseif($studIDNEW == $studID){
        $stud = 'exists';
        echo '<script>
		alert("StudentID alraedy exists!");
		window.location.href="ADMIN_AddStudent.php";
		</script>';
    }
}
// Add info
if($stud == 'clear'){
    $sql = "INSERT INTO stud_info (studNo, studFName, studLName, DepID, CourseID, SectionID, stud_yr_level) VALUES ('$studNo', '$studFName', '$studLName', '$DepID', '$CourseID', '$SectionID', '$stud_yr_level');";
    $sql2 = "INSERT INTO stud_id (studID, studNo) VALUES ('$studID', '$studNo');";
    $sql3 = "INSERT INTO stud_enrolled_subj (studNo, LectureID) VALUES ('$studNo', '$LectureID');";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2); 
    mysqli_query($conn, $sql3); 
    
    echo '<script>
        alert("(Student ID.: '.$studID.') ADDED!");
        window.location.href="ADMIN_StudentInfo.php";
        </script>'; 
}

