<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Your Account</title>
    <style>
        body {
            background: url("login_background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <?php
        $con = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($con, "customer");
        extract($_POST);
        
        $q = "DELETE FROM `login_password` WHERE `login`= '$login' AND `password` = '$password'"; 
        mysqli_query($con, $q);
        print("<p style='display: flex;font-size:40px; color:green; text-align:center;justify-content: center;'>Account delete Successfully, <a href = 'index.html'>Go back to Login Page</a></p>");
    ?>
</body>
</html>