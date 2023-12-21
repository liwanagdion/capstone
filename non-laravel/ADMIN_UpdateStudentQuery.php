<?php
//include_once 'db.php';
$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nfc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//$Image = $_POST['Image'];
$studNo = $_POST['studNo'];
$studFName = $_POST['studFName'];
$studLName = $_POST['studLName'];
$DepID = $_POST['DepID'];
$CourseID = $_POST['CourseID'];
$SectionID = $_POST['SectionID'];
$stud_yr_level = $_POST['stud_yr_level'];
$LectureID = $_POST['LectureID'];


$sql = "UPDATE stud_info SET studFName = '$studFName', studLName = '$studLName', DepID = '$DepID', CourseID = '$CourseID', SectionID = '$SectionID', stud_yr_level = '$stud_yr_level' WHERE studNo = '$studNo';";
$sql2 = "UPDATE stud_enrolled_subj SET LectureID = '$LectureID' WHERE studNo = '$studNo';";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);

echo '<script>
	alert("(Student No.: '.$studNo.') UPDATED!");
	window.location.href="ADMIN_StudentInfo.php";
	</script>';
   

