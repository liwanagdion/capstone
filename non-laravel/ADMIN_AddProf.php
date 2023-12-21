<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Professor</title>
</head>
<body>
    
<form action = "ADMIN_AddProfQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Add Professor:</b></legend>

            <label class = "custom-field one">

                <input type = "number" name = "profID" required oninvalid="this.setCustomValidity('Please Scan NFC Card for prof ID')" oninput="this.setCustomValidity('')"> 
                <span class = "placeholder"> Scan NFC Card for prof ID </span>
                <br>
            </label>
        
        <label class = "custom-field one">

            <input type = "number" name = "profNo" required oninvalid="this.setCustomValidity('Please Enter prof No.')" oninput="this.setCustomValidity('')"> 
	        <span class = "placeholder"> prof No. </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "profFName" required oninvalid="this.setCustomValidity('Please Enter First Name')" oninput="this.setCustomValidity('')"> 
	        <span class = "placeholder"> First Name </span>
	        <br>
        </label>

        <label class = "custom-field one">

            <input type = "text" name = "profLName" required oninvalid="this.setCustomValidity('Please Enter Last Name')" oninput="this.setCustomValidity('')"> 
	        <span class = "placeholder"> Last Name </span>
	        <br>
        </label>

        <select name="DepID" id="DepID">
            <?php
            $dbServername = "localhost:3306";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "nfc";
            
            $mysqli = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

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
            <button type = "submit" name = "submit"> Add Prof </button>
        </form>
        
            <br><br><br>
        <a href="ADMIN_ProfInfo.php" class = "btn-home"> BACK </button>

</body>
</html>