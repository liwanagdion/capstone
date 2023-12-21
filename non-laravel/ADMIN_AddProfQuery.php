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
$profID = $_POST['profID'];
$profNo = $_POST['profNo'];
$profFName = $_POST['profFName'];
$profLName = $_POST['profLName'];
$DepID = $_POST['DepID'];

$sql3 = "select * from prof_id;";
$result3 = $conn->query($sql3);
// LOOP TILL END OF DATA
$trial = 'no';
while($rows=mysqli_fetch_assoc($result3)){
    $profNoNEW = $rows['profNo'];
    $profIDNEW = $rows['profID'];
    
    if($profNoNEW == $profNo){
        $trial = 'yes';
        echo '<script>
		alert("profNo alraedy exists!");
		window.location.href="ADMIN_AddProf.php";
		</script>';
    }
    elseif($profIDNEW == $profID){
        $trial = 'yes';
        echo '<script>
		alert("profID alraedy exists!");
		window.location.href="ADMIN_AddProf.php";
		</script>';
    }
}
if($trial == 'no'){
    $sql = "INSERT INTO prof_info (profNo, profFName, profLName, DepID) VALUES ('$profNo', '$profFName', '$profLName', '$DepID');";
    $sql2 = "INSERT INTO prof_id (profID, profNo) VALUES ('$profID', '$profNo');";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2); 
    
    echo '<script>
        alert("(Prof ID.: '.$profID.') ADDED!");
        window.location.href="ADMIN_ProfInfo.php";
        </script>'; 
}

