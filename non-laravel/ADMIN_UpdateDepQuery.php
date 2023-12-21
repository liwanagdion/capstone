<?php
//include_once 'db.php';
$dbServername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nfc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//$Image = $_POST['Image'];
$DepID = $_POST['DepID'];
$DepName= $_POST['DepName'];

$sql = "UPDATE dep_id SET DepName = '$DepName' WHERE DepID = '$DepID';";

mysqli_query($conn, $sql);


echo '<script>
	alert("(Dep ID: '.$DepID.') UPDATED!");
	window.location.href="ADMIN_DepInfo.php";
	</script>';
   

