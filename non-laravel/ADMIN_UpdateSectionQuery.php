<?php
//include_once 'db.php';
$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nfc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//$Image = $_POST['Image'];
$SectionID = $_POST['SectionID'];
$FullSection= $_POST['FullSection'];
$DepID= $_POST['DepID'];

$sql = "UPDATE section_id SET FullSection - '$FullSection', DepID = '$DepID' WHERE SectionID = '$SectionID';";

mysqli_query($conn, $sql);


echo '<script>
	alert("(Section ID: '.$SectionID.') UPDATED!");
	window.location.href="ADMIN_SectionInfo.php";
	</script>';
   

