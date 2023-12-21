

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Lecture Info</title>   


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
"SELECT * FROM lec_id";
$result3 = $mysqli->query($sql3);

$sql4 = "SELECT COUNT(studNo) AS total FROM stud_info;";
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
<h3>TOTAL LECTURES: <?php echo $total['total']; ?></h3>

<?php }?>
</div>

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Lecture ID</th>
            <th>Lecture Name</th>
            <th>Lecture Start Time</th>
            <th>Lecture Day</th>
            <th>Lecture End Time</th>
            <th>Room ID</th>
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
                <td><?php echo $rows['LectureID']; $LectureID = $rows['LectureID'];?></td>
                <td><?php echo $rows['LecName']; $LecName = $rows['LecName'];?></td>
                <td><?php echo $rows['LecStartTime']; $LecStartTime = $rows['LecStartTime'];?></td>

                <td><?php echo $rows['LecDay']; $LecDay = $rows['LecDay'];?></td>
                <td><?php echo $rows['LecEndTime']; $LecEndTime = $rows['LecEndTime'];?></td>
                <td><?php echo $rows['RoomID']; $RoomID = $rows['RoomID'];?></td>
                
                <td>
                        <form action="ADMIN_UpdateLec.php" method="POST" class = "d-inline">
                        
                                 <input type = "hidden" name = "LectureID" value = "<?php echo $LectureID ?>">
                                 <input type = "hidden" name = "LecName" value = "<?php echo $LecName ?>">
                                 <input type = "hidden" name = "LecStartTime" value = "<?php echo $LecStartTime ?>">

                                 <input type = "hidden" name = "LecDay" value = "<?php echo $LecDay ?>">
                                 <input type = "hidden" name = "LecEndTime" value = "<?php echo $LecEndTime ?>">
                                 <input type = "hidden" name = "RoomID" value = "<?php echo $RoomID ?>">
                                 
                                 <button type="submit" name ="editLec" value = "<?php echo $LectureID?>"class ="btn btn-primary btn-sm">Edit</button>
                                 
                            </form>
                        </td>
                        <td>
                        <form action="ISSET_Functions.php" method="POST" class = "d-inline">
                                <input type = "hidden" name = "LectureID" value = "<?php echo $LectureID ?>">

                                 <button type="submit" name ="removeLec" value = "<?php echo $LectureID?>"class ="btn btn-danger btn-sm">Remove</button>
                                 
                            </form>
                        </td>
            </tr>
            <?php
                }
            ?>
        </tbody>  
      </table>
      <form action="ADMIN_AddLec.php" method="POST" class = "d-inline">
      <button type="submit">Add Lecture</button>
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