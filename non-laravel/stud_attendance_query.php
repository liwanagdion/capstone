<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php require 'dbcon.php';
    //Get students ID from Card ID
    $id = $_POST['id'];
    $sql = "SELECT * FROM stud_id left join stud_info on stud_info.studNo = stud_id.studNo WHERE studid = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $studNo = $row["studNo"];
        }
        echo $studNo;
    } else {
        //no ID found
        echo '<script>
        alert("Unauthorized ID found");
        window.location.href="stud_attendance.php";
        </script>';
    }

    //get time
    date_default_timezone_set('Asia/Singapore');
    //Time
    $date = date('H:i:s', time());
    //Day
    $date2 = date('l', time());

    //Get today day 
    $sql = "SELECT * FROM day_tbl WHERE dayName = '$date2'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $lectureDay = $row["LecDay"];
        }
    }
    
    //Test Data
    //$LectureDay = '5';
    //$date = '15:00:01';
    
    //check if there is a lecture for today
    $lectureID = ' ';
    $sql2 = "SELECT * FROM lec_id WHERE LecStartTime < '$date' && '$date' < LecEndTime";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $LecDay = $row["LecDay"];
            $LecDayCut = str_split($LecDay);
            foreach ($LecDayCut as $day) {
                if ($day == $lectureDay) {
                    //look for lectureID and LecStart Time
                    $sql3 = "SELECT * FROM lec_id WHERE LecStartTime < '$date' && '$date' < LecEndTime && LecDay = '$LecDay'";
                    $result3 = mysqli_query($conn, $sql3);
                    if (mysqli_num_rows($result3) > 0) {
                        while ($row = mysqli_fetch_assoc($result3)) {
                            $lectureID = $row["LectureID"];
                            $LecStartTime = $row["LecStartTime"];
                        }
                    }

                    //statusID
                    //Current Time into Minutes
                    $CurrentTimeMinutes = str_split(strval($date));
                    $CurrentTimeMinutes = (($CurrentTimeMinutes[0] . $CurrentTimeMinutes[1]) * 60) +  ($CurrentTimeMinutes[3] . $CurrentTimeMinutes[4]);

                    //Lecture Time into Minutes
                    $LecTimeMinutes = str_split(strval($LecStartTime));
                    $LecTimeMinutes = (($LecTimeMinutes[0] . $LecTimeMinutes[1]) * 60) +  ($LecTimeMinutes[3] . $LecTimeMinutes[4]);

                    //Check if student is present, late, or abesnt
                    $TimeCheck = $CurrentTimeMinutes - $LecTimeMinutes;
                    //absent
                    if ($TimeCheck >= 30) {
                        $statusID = 2;
                    } 
                    //late
                    elseif ($TimeCheck < 30 && $TimeCheck >= 15) {
                        $statusID = 1;
                    }
                    //present 
                    else {
                        $statusID = 0;
                    }
                    break;
                }
            }
        }
    }
    //no lecture during this time
    if($lectureID == ' ')
    {
        echo '<script>
        alert("No Classes Currently");
        window.location.href="stud_attendance.php";
        </script>';
    }

    //id student has the subject
    $sql4 = "SELECT * FROM stud_info WHERE studNo = '$studNo'";
    $result4 = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($result4) > 0) {
        while ($row = mysqli_fetch_assoc($result4)) {
            $LectureID = $row["LectureID"];
            $LectureIDCut = str_split($LectureID);
            foreach ($LectureIDCut as $item) {
                if ($item == $day) {
                        //Add retrieved information from DB to attendance table
                        $sql5 = "INSERT INTO attendance (studNo,StatusID,LectureID,Date) 
                        VALUES ('$studNo', '$statusID', '$lectureID','$date');";
                        echo "yes";
                        mysqli_query($conn, $sql5);    

                        echo '<script>
                        alert("Student has been Listed for Attendance");
                        window.location.href="stud_attendance.php";
                        </script>';
                }
            }
            
        }
    }

    //student is not abpart of the subject
    echo '<script>
    alert("Student is not apart of this subject");
    window.location.href="stud_attendance.php";
    </script>';
    ?>

</body>

</html>