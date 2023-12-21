<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="prof_login_query.php" method="post">

<?php echo "Scan the ID"?>
<input type="text" name="id" autofocus><br>

<?php echo "ProfNO:"?>
<input type="text" name="profNo"><br>
<?php echo "ProfPassword:"?>
<input type="text" name="profPass"><br>
<button type = "submit" name = "submit">Login</button>
</form>

</body>
</html>
