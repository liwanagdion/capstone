<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Section</title>
</head>
<body>
    
<form action = "ADMIN_AddSectionQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Add Section:</b></legend>

            <label class = "custom-field one">

                <input type = "text" name = "SectionID" required oninvalid="this.setCustomValidity('Please enter Section ID')" oninput="this.setCustomValidity('')" maxlength="5"> 
                <span class = "placeholder"> Section ID </span>
                <br>
            </label>
        
        <label class = "custom-field one">

            <input type = "text" name = "FullSection" required oninvalid="this.setCustomValidity('Please Enter Section Name')" oninput="this.setCustomValidity('')" maxlength="25"> 
	        <span class = "placeholder"> Section Name </span>
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

            <button type = "submit" name = "submit"> Add Section </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_SectionInfo.php" class = "btn-home"> BACK </button>

</body>
</html>