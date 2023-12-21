
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">

    <title>Update Department</title>

</head>
<body>

  <!-- PHP code to establish connection with the localserver -->
<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name is student
$database = 'nfc';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
?>

 
<br>
<div class="main">



<div class="row">
        <div class="column">
<br>
<br><br>

        </div>
        </div>

        <div class="column">

    <!--ADD RECORD-->
<br>
<br><br><br>
        <form action = "ADMIN_UpdateDepQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Edit dep details:</b></legend>

        <label class = "custom-field one">

            <input type = "text" name = "DepID" value = "<?php echo $_POST['DepID'] ?>" required oninvalid="this.setCustomValidity('Please Enter Dep ID')" oninput="this.setCustomValidity('')" readonly> 
	        <span class = "placeholder"> Dep ID </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "DepName" value = "<?php echo $_POST['DepName'] ?>" required oninvalid="this.setCustomValidity('Please Enter Dep Name')" oninput="this.setCustomValidity('')" maxlength="40"> 
	        <span class = "placeholder"> Dep Name </span>
	        <br>
        </label>

        
        
            <button type = "submit" name = "submit"> Update Department </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_DepInfo.php" class = "btn-home"> BACK </button>
       
</div>
    </body>
 
</html>