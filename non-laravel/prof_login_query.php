<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php require 'dbcon.php';
    $id = $_POST['id'];
    if($id != ''){
        //look for Prof ID and profNumber
        
        $sql = "SELECT * FROM prof_id left join prof_info on prof_info.profNo = prof_id.profNo WHERE profID = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $profNo = $row["profNo"];
                $profLName = $row["profLName"];
            }
            echo $profNo.$profLName;
            echo "Login Success";
        } else {
            //invalid ID
            echo '<script>
            alert("Invalid ID!");
            window.location.href="prof_login.php";
            </script>';
        }
    }
    else{
        //Prof login with password
        $profNo = $_POST['profNo'];
        $profPass = $_POST['profPass'];
        $sql2 = "SELECT * FROM prof_id";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $profNoNew = $row["profNo"];
                $profPassNew = $row["profPass"];
                if($profNoNew == $profNo && $profPassNew == $profPass)
                {
                    echo '<script>
                    alert("Welcome!");
                    window.location.href="prof_login.php";
                    </script>';
                }
            }
        }
    }
    echo '<script>
                    alert("Error!");
                    window.location.href="prof_login.php";
                    </script>';
    ?>
</body>

</html>