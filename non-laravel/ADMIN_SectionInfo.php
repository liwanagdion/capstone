

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Section Info</title>   


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
"SELECT * FROM section_id
LEFT JOIN dep_id on dep_id.DepID = section_id.DepID
ORDER BY SectionID;";
$result3 = $mysqli->query($sql3);

$sql4 = "SELECT COUNT(SectionID) AS total FROM section_id ;";
$result4 = $mysqli->query($sql4);
?>
            

</header>



<br>


<a href="ADMIN_StudentInfo.php">Student Information</a>
<a href="ADMIN_ProfInfo.php">Prof Information</a>
<a href="ADMIN_CourseInfo.php">Course Information</a>
<a href="ADMIN_DepInfo.php">Department Information</a>
<a href="ADMIN_SectionInfo.php">Department Information</a>
<a href="ADMIN_LecInfo.php">Lecture Information</a>

<div class ="column1">
<div class="container">
<div class="row header" style="text-align:center;color:green">

<?php while($total=mysqli_fetch_assoc($result4)) 
{ ?>
<h3>TOTAL SECTIONS: <?php echo $total['total']; ?></h3>

<?php }?>
</div>

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Section ID</th>
            <th>Section Name</th>
            <th>Department ID</th>
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
                <td><?php echo $rows['SectionID']; $SectionID = $rows['SectionID'];?></td>
                <td><?php echo $rows['FullSection']; $FullSection = $rows['FullSection'];?></td>
                <td><?php echo $rows['DepID']; $DepID = $rows['DepID']; $DepName = $rows['DepName'];?></td>
                <td>
                        <form action="ADMIN_UpdateSection.php" method="POST" class = "d-inline">
                        
                                 <input type = "hidden" name = "SectionID" value = "<?php echo $SectionID ?>">
                                 <input type = "hidden" name = "FullSection" value = "<?php echo $FullSection ?>">
                                 <input type = "hidden" name = "DepID" value = "<?php echo $DepID ?>">
                                 <input type = "hidden" name = "DepName" value = "<?php echo $DepName ?>">
                                 
                                 <button type="submit" name ="editSection" value = "<?php echo $SectionID?>"class ="btn btn-primary btn-sm">Edit</button>
                                 
                            </form>
                        </td>
                        <td>
                        <form action="ISSET_Functions.php" method="POST" class = "d-inline">
                                <input type = "hidden" name = "SectionID" value = "<?php echo $SectionID ?>">

                                 <button type="submit" name ="removeSection" value = "<?php echo $SectionID?>"class ="btn btn-danger btn-sm">Remove</button>
                                 
                            </form>
                        </td>
            </tr>
            <?php
                }
            ?>
        </tbody>  
      </table>
      <form action="ADMIN_AddSection.php" method="POST" class = "d-inline">
      <button type="submit">Add Section</button>
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