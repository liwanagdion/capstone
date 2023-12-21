

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Prof Info</title>   


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
"SELECT * FROM prof_info left join prof_id on prof_info.profNo = prof_id.profNo
left join dep_id on dep_id.DepID = prof_info.DepID
ORDER BY prof_id.profNo;";
$result3 = $mysqli->query($sql3);

$sql4 = "SELECT COUNT(profNo) AS total FROM prof_info;";
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
<h3>TOTAL PROFESSOR ACCOUNTS: <?php echo $total['total']; ?></h3>

<?php }?>
</div>

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Professor ID</th>
            <th>Professor No.</th>
            <th>First Name</th>
            <th>Last Name</th>
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
                <td><?php echo $rows['profID']; $profID = $rows['profID'];?></td>
                <td><?php echo $rows['profNo']; $profNo = $rows['profNo'];?></td>
                <td><?php echo $rows['profFName']; $profFName = $rows['profFName'];?></td>
                <td><?php echo $rows['profLName']; $profLName = $rows['profLName'];?></td>
                <td><?php echo $rows['DepID']; $DepID = $rows['DepID']; $DepName = $rows['DepName'];?></td>
                <td>
                        <form action="ADMIN_UpdateProf.php" method="POST" class = "d-inline">
                        
                                 <input type = "hidden" name = "profID" value = "<?php echo $profID ?>">
                                 <input type = "hidden" name = "profNo" value = "<?php echo $profNo ?>">
                                 <input type = "hidden" name = "profFName" value = "<?php echo $profFName ?>">
                                 <input type = "hidden" name = "profLName" value = "<?php echo $profLName ?>">
                                 <input type = "hidden" name = "DepID" value = "<?php echo $DepID ?>">
                                 <input type = "hidden" name = "DepName" value = "<?php echo $DepName ?>">
                                 
                                 <button type="submit" name ="editProf" value = "<?php echo $profNo?>"class ="btn btn-primary btn-sm">Edit</button>
                                 
                            </form>
                        </td>
                        <td>
                        <form action="ISSET_Functions.php" method="POST" class = "d-inline">
                                <input type = "hidden" name = "profNo" value = "<?php echo $profNo ?>">

                                 <button type="submit" name ="removeProf" value = "<?php echo $profNo?>"class ="btn btn-danger btn-sm">Remove</button>
                                 
                            </form>
                        </td>
            </tr>
            <?php
                }
            ?>
        </tbody>  
      </table>
      <form action="ADMIN_AddProf.php" method="POST" class = "d-inline">
      <button type="submit">Add Prof</button>
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