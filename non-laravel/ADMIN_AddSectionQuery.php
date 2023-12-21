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
$SectionID = $_POST['SectionID'];
$FullSection = $_POST['FullSection'];
$DepID = $_POST['DepID'];


$sql3 = "select * from section_id;";
$result3 = $conn->query($sql3);
// LOOP TILL END OF DATA
$dep = 'clear';
while($rows=mysqli_fetch_assoc($result3)){
    $DepIDNEW = $rows['SectionID'];
    $DepNameNEW = $rows['FullSection'];
    
    if($DepIDNEW == $SectionID){
        $dep = 'exists';
        echo '<script>
		alert("Section ID alraedy exists!");
		window.location.href="ADMIN_AddSection.php";
		</script>';
    }
    elseif($DepNameNEW == $FullSection){
        $dep = 'exists';
        echo '<script>
		alert("Section Name alraedy exists!");
		window.location.href="ADMIN_AddSection.php";
		</script>';
    }
}
// Add info
if($dep == 'clear'){
    $sql = "INSERT INTO section_id (SectionID, FullSection, DepID) VALUES ('$SectionID', '$FullSection', '$DepID');";
    
    mysqli_query($conn, $sql);
   
    
    echo '<script>
        alert("(Section ID.: '.$SectionID.') ADDED!");
        window.location.href="ADMIN_SectionInfo.php";
        </script>'; 
}

