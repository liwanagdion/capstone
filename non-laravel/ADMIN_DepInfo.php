

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Department Info</title>   


</head>  

<body>  

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

// SQL query to select data from database
//$sql2 = "SELECT AdminNo FROM tbl_adminlogin;";
//$result2 = $mysqli->query($sql2);

$sql3 = //"SELECT StudNo, concat(StudLastname,', ',StudFirstName) AS 'Student Name', CourseID, Section, City FROM tbl_studinfo;"
"SELECT * FROM dep_id;";
$result3 = $mysqli->query($sql3);

$sql4 = "SELECT COUNT(DepID) AS total FROM dep_id ;";
$result4 = $mysqli->query($sql4);
?>
            

</header>



<br>


<a href="ADMIN_StudentInfo.php">Student Information</a>
<a href="ADMIN_ProfInfo.php">Prof Information</a>
<a href="ADMIN_CourseInfo.php">Course Information</a>
<a href="ADMIN_DepInfo.php">Department Information</a>
<a href="ADMIN_SectionInfo.php">Section Information</a>
<a href="ADMIN_LecInfo.php">Lecture Information</a>

<div class ="column1">
<div class="container">
<div class="row header" style="text-align:center;color:green">

<?php while($total=mysqli_fetch_assoc($result4)) 
{ ?>
<h3>TOTAL DEPARTMENT: <?php echo $total['total']; ?></h3>

<?php }?>
</div>

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Department ID</th>
            <th>Department Name</th>
          </tr>  
        </thead>  
        <tbody>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=mysqli_fetch_assoc($result3))
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['DepID']; $DepID = $rows['DepID'];?></td>
                <td><?php echo $rows['DepName']; $DepName = $rows['DepName'];?></td>
                <td>
                        <form action="ADMIN_UpdateDep.php" method="POST" class = "d-inline">
                        
                                 <input type = "hidden" name = "DepID" value = "<?php echo $DepID ?>">
                                 <input type = "hidden" name = "DepName" value = "<?php echo $DepName ?>">
                                 
                                 <button type="submit" name ="editDep" value = "<?php echo $DepID?>"class ="btn btn-primary btn-sm">Edit</button>
                                 
                            </form>
                        </td>
                        <td>
                        <form action="ISSET_Functions.php" method="POST" class = "d-inline">
                                <input type = "hidden" name = "DepID" value = "<?php echo $DepID ?>">

                                 <button type="submit" name ="removeDep" value = "<?php echo $DepID?>"class ="btn btn-danger btn-sm">Remove</button>
                                 
                            </form>
                        </td>
            </tr>
            <?php
                }
            ?>
        </tbody>  
      </table>
      <form action="ADMIN_AddDep.php" method="POST" class = "d-inline">
      <button type="submit">Add Department</button>
    </form>
	  </div>
</div>
              </div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  