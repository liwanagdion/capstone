<?php
//include_once 'db.php';
$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nfc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//$Image = $_POST['Image'];
$profNo = $_POST['profNo'];
$profFName = $_POST['profFName'];
$profLName = $_POST['profLName'];
$DepID = $_POST['DepID'];

$sql = "UPDATE prof_info SET profFName = '$profFName', profLName = '$profLName', DepID = '$DepID' WHERE profNo = '$profNo';";

mysqli_query($conn, $sql);

echo '<script>
	alert("(Professor No.: '.$profNo.') UPDATED!");
	window.location.href="ADMIN_ProfInfo.php";
	</script>';
   

