<?php
//include_once 'db.php';
$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nfc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//$Image = $_POST['Image'];
$CourseID = $_POST['CourseID'];
$CourseName= $_POST['CourseName'];

$sql = "UPDATE course_id SET CourseName = '$CourseName' WHERE CourseID = '$CourseID';";

mysqli_query($conn, $sql);


echo '<script>
	alert("(Course ID: '.$CourseID.') UPDATED!");
	window.location.href="ADMIN_CourseInfo.php";
	</script>';
   

