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
$DepID = $_POST['DepID'];
$DepName = $_POST['DepName'];


$sql3 = "select * from dep_id;";
$result3 = $conn->query($sql3);
// LOOP TILL END OF DATA
$dep = 'clear';
while($rows=mysqli_fetch_assoc($result3)){
    $DepIDNEW = $rows['DepID'];
    $DepNameNEW = $rows['DepName'];
    
    if($DepIDNEW == $DepID){
        $dep = 'exists';
        echo '<script>
		alert("Dep ID alraedy exists!");
		window.location.href="ADMIN_AddDep.php";
		</script>';
    }
    elseif($DepNameNEW == $DepName){
        $dep = 'exists';
        echo '<script>
		alert("Dep Name alraedy exists!");
		window.location.href="ADMIN_AddDep.php";
		</script>';
    }
}
// Add info
if($dep == 'clear'){
    $sql = "INSERT INTO dep_id (DepID, DepName) VALUES ('$DepID', '$DepName');";
    
    mysqli_query($conn, $sql);
   
    
    echo '<script>
        alert("(Dep ID.: '.$DepID.') ADDED!");
        window.location.href="ADMIN_DepInfo.php";
        </script>'; 
}

