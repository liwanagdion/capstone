
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">

    <title>Update Prof</title>

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
        <form action = "ADMIN_UpdateProfQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Edit prof details:</b></legend>

        <label class = "custom-field one">

            <input type = "number" name = "profNo" value = "<?php echo $_POST['profNo'] ?>" required oninvalid="this.setCustomValidity('Please Enter prof No.')" oninput="this.setCustomValidity('')" readonly> 
	        <span class = "placeholder"> prof No. </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "profFName" value = "<?php echo $_POST['profFName'] ?>" required oninvalid="this.setCustomValidity('Please Enter First Name')" oninput="this.setCustomValidity('')"> 
	        <span class = "placeholder"> First Name </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "profLName" value = "<?php echo $_POST['profLName'] ?>" required oninvalid="this.setCustomValidity('Please Enter Last Name')" oninput="this.setCustomValidity('')"> 
	        <span class = "placeholder"> Last Name </span>
	        <br>
        </label>

        <select name="DepID" id="DepID">
            <option value="<?php echo $_POST['DepID'];?>"><?php echo $_POST['DepName'];?></option>
            <?php
            $resultSet = $mysqli->query("SELECT DepID, DepName FROM dep_id");
            $color1 = "#f3f3f3";
            $color2 = "#ffffff";
            $color = $color1;

            while ($row = $resultSet->fetch_assoc())
            {
                $color == $color1 ? $color = $color2 : $color = $color1;

                $DepID = $row['DepID'];
                $DepName = $row['DepName'];
                echo "<option value = '$DepID' style = 'background: $color;'>$DepName</option>";
            }
            ?>
            </select>
            <br>
            <br>
            <button type = "submit" name = "submit"> Update Professor </button>
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_ProfInfo.php" class = "btn-home"> BACK </button>
       
</div>
    </body>
 
</html>