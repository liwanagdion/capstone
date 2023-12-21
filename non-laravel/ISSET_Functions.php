<?php
$user = 'root';
$password = '';
 
// Database name is student
$database = 'nfc';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
$conn = mysqli_connect($servername, $user, $password, $database);
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

//ADMIN REMOVE STUDENT
if(isset($_POST['removeStudent'])){
    $studNo = mysqli_real_escape_string($mysqli, $_POST['removeStudent']);
    //$adminNo = mysqli_real_escape_string($mysqli, $_POST['adminNo']);

    $query="DELETE FROM stud_info WHERE studNo = '$studNo';";
    $query1="DELETE FROM stud_id WHERE studNo = '$studNo';";
    $query2="DELETE FROM stud_enrolled_subj WHERE studNo = '$studNo';";

    $query_run = mysqli_query($mysqli,$query);
    $query_run1 = mysqli_query($mysqli,$query1);
    $query_run2 = mysqli_query($mysqli,$query2);

    if($query_run && $query_run1)
    {
        header("Location: ADMIN_StudentInfo.php");
        exit(0);
    }
}

//ADMIN REMOVE PROF
if(isset($_POST['removeProf'])){
    $profNo = mysqli_real_escape_string($mysqli, $_POST['removeProf']);
    //$adminNo = mysqli_real_escape_string($mysqli, $_POST['adminNo']);

    $query="DELETE FROM prof_info WHERE profNo = '$profNo';";
    $query1="DELETE FROM prof_id WHERE profNo = '$profNo';";

    $query_run = mysqli_query($mysqli,$query);
    $query_run1 = mysqli_query($mysqli,$query1);

    if($query_run && $query_run1)
    {
        header("Location: ADMIN_ProfInfo.php");
        exit(0);
    }
}

//ADMIN REMOVE COURSE
if(isset($_POST['removeCourse'])){
    $CourseID = mysqli_real_escape_string($mysqli, $_POST['removeCourse']);
    $sql = "select * from stud_info;";
    $result = mysqli_query($conn, $sql);
    $trial = 'no';
    while($rows=mysqli_fetch_assoc($result)){
        $course = $rows['CourseID'];
        if ($CourseID == $course){
            $trial = 'yes';
            echo '<script>
            alert("Student/s are still enrolled in that course!");
            window.location.href="ADMIN_CourseInfo.php";
            </script>';
        }
    }
    if($trial == 'no'){
    $query="DELETE FROM course_id WHERE CourseID = '$CourseID';";
    $query_run = mysqli_query($mysqli,$query);
        
    if($query_run){
        header("Location: ADMIN_CourseInfo.php");
    }
}
}


//ADMIN REMOVE DEP
if(isset($_POST['removeDep'])){
    $DepID = mysqli_real_escape_string($mysqli, $_POST['removeDep']);
    $sql = "select * from stud_info;";
    $result = mysqli_query($conn, $sql);
    $trial = 'no';
    while($rows=mysqli_fetch_assoc($result)){
        $dep = $rows['DepID'];
        if ($DepID == $dep){
            $trial = 'yes';
            echo '<script>
            alert("Student/s are still enrolled in that dep!");
            window.location.href="ADMIN_DepInfo.php";
            </script>';
        }
    }
    if($trial == 'no'){
    $query="DELETE FROM dep_id WHERE DepID = '$DepID';";
    $query_run = mysqli_query($mysqli,$query);
        
    if($query_run){
        header("Location: ADMIN_DepInfo.php");
    }
}
}

//ADMIN REMOVE sec
if(isset($_POST['removeSection'])){
    $SectionID = mysqli_real_escape_string($mysqli, $_POST['removeSection']);
    $sql = "select * from stud_info;";
    $result = mysqli_query($conn, $sql);
    $trial = 'no';
    while($rows=mysqli_fetch_assoc($result)){
        $sec = $rows['SectionID'];
        if ($SectionID == $sec){
            $trial = 'yes';
            echo '<script>
            alert("Student/s are still enrolled in that section!");
            window.location.href="ADMIN_SectionInfo.php";
            </script>';
        }
    }
    if($trial == 'no'){
    $query="DELETE FROM section_id WHERE SectionID = '$SectionID';";
    $query_run = mysqli_query($mysqli,$query);
        
    if($query_run){
        header("Location: ADMIN_SectionInfo.php");
    }
}
}

?>