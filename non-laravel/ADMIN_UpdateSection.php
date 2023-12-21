
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">

    <title>Update Section</title>

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
        <form action = "ADMIN_UpdateSectionQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Edit section details:</b></legend>

        <label class = "custom-field one">

            <input type = "text" name = "SectionID" value = "<?php echo $_POST['SectionID'] ?>" required oninvalid="this.setCustomValidity('Please Enter Section ID')" oninput="this.setCustomValidity('')" readonly> 
	        <span class = "placeholder"> Section ID </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "FullSection" value = "<?php echo $_POST['FullSection'] ?>" required oninvalid="this.setCustomValidity('Please Enter Section Name')" oninput="this.setCustomValidity('')" maxlength="25"> 
	        <span class = "placeholder"> Section Name </span>
	        <br>
        </label>


        <!--DEP ID-->
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


        
            <button type = "submit" name = "submit"> Update Section </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_SectionInfo.php" class = "btn-home"> BACK </button>
       
</div>
    </body>
 
</html>