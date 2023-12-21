

<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Student Info</title>   


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
"SELECT * FROM stud_info left join stud_id on stud_info.studNo = stud_id.studNo
left join course_id on course_id.CourseID = stud_info.CourseID 
left join stud_enrolled_subj on stud_enrolled_subj.studNo = stud_id.studNo
left join section_id on section_id.SectionID = stud_info.SectionID 
left join dep_id on dep_id.DepID = stud_info.DepID
ORDER BY stud_id.studNo;";
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
<h3>TOTAL STUDENT ACCOUNTS: <?php echo $total['total']; ?></h3>

<?php }?>
</div>

<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Student ID</th>
            <th>Student No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Deparment ID</th>
            <th>Course ID</th>
            <th>Section ID</th>
            <th>Year Level</th>
            <th>Lecture ID</th>
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
                <td><?php echo $rows['studID']; $studID = $rows['studID'];?></td>
                <td><?php echo $rows['studNo']; $studNo = $rows['studNo'];?></td>
                <td><?php echo $rows['studFName']; $studFName = $rows['studFName'];?></td>

                <td><?php echo $rows['studLName']; $studLName = $rows['studLName']; $studLName = $rows['studLName'];?></td>
                <td><?php echo $rows['DepID']; $DepID = $rows['DepID']; $DepName = $rows['DepName'];?></td>
                <td><?php echo $rows['CourseID']; $CourseID = $rows['CourseID']; $CourseName = $rows['CourseName'];?></td>
                
                <td><?php echo $rows['SectionID']; $SectionID = $rows['SectionID']; $FullSection = $rows['FullSection'];?></td>
                <td><?php echo $rows['stud_yr_level']; $stud_yr_level = $rows['stud_yr_level'];?></td>
                <td><?php echo $rows['LectureID']; $LectureID = $rows['LectureID'];?></td>
                <td>
                        <form action="ADMIN_UpdateStudent.php" method="POST" class = "d-inline">
                        
                                 <input type = "hidden" name = "studID" value = "<?php echo $studID ?>">
                                 <input type = "hidden" name = "studNo" value = "<?php echo $studNo ?>">
                                 <input type = "hidden" name = "studFName" value = "<?php echo $studFName ?>">

                                 <input type = "hidden" name = "studLName" value = "<?php echo $studLName ?>">
                                 <input type = "hidden" name = "CourseID" value = "<?php echo $CourseID ?>">
                                 <input type = "hidden" name = "DepID" value = "<?php echo $DepID ?>">

                                 <input type = "hidden" name = "DepName" value = "<?php echo $DepName ?>">
                                 <input type = "hidden" name = "CourseName" value = "<?php echo $CourseName ?>">
                                 <input type = "hidden" name = "SectionID" value = "<?php echo $SectionID ?>">

                                 <input type = "hidden" name = "FullSection" value = "<?php echo $FullSection ?>">
                                 <input type = "hidden" name = "stud_yr_level" value = "<?php echo $stud_yr_level ?>">
                                 <input type = "hidden" name = "LectureID" value = "<?php echo $LectureID ?>">
                                 
                                 <button type="submit" name ="editStudent" value = "<?php echo $studNo?>"class ="btn btn-primary btn-sm">Edit</button>
                                 
                            </form>
                        </td>
                        <td>
                        <form action="ISSET_Functions.php" method="POST" class = "d-inline">
                                <input type = "hidden" name = "studNo" value = "<?php echo $studNo ?>">

                                 <button type="submit" name ="removeStudent" value = "<?php echo $studNo?>"class ="btn btn-danger btn-sm">Remove</button>
                                 
                            </form>
                        </td>
            </tr>
            <?php
                }
            ?>
        </tbody>  
      </table>
      <form action="ADMIN_AddStudent.php" method="POST" class = "d-inline">
      <button type="submit">Add Student</button>
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