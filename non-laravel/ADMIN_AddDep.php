<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
</head>
<body>
    
<form action = "ADMIN_AddDepQuery.php" method = "POST" style="font-family: 'Quicksand', sans-serif; font-size: 20px; margin-left: 80px;" enctype="multipart/form-data">
                
            <legend><b>Add Department:</b></legend>

            <label class = "custom-field one">

                <input type = "text" name = "DepID" required oninvalid="this.setCustomValidity('Please enter Dep ID')" oninput="this.setCustomValidity('')" maxlength="5"> 
                <span class = "placeholder"> Dep ID </span>
                <br>
            </label>
        
        <label class = "custom-field one">

            <input type = "text" name = "DepName" required oninvalid="this.setCustomValidity('Please Enter Dep Name')" oninput="this.setCustomValidity('')" maxlength="40"> 
	        <span class = "placeholder"> Dep Name </span>
	        <br>
        </label>

            <button type = "submit" name = "submit"> Add Department </button>
            
        </form>
        
        
            <br><br><br>
        <a href="ADMIN_DepInfo.php" class = "btn-home"> BACK </button>

</body>
</html>