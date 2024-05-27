<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>account creation</title>
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
    extract($_POST);
    
    if($newPassword != $retypePassword){
        print("<p  style='font-size:40px; color:red; text-align:center;font-weight:bolder'>Incorrect password, <a href='create.html'>Try Again</a></p>");
        die(); // return
    }

    $con = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($con, "customer");
    $q = "INSERT INTO login_password(`login`, `password`, `Credit_Card`) VALUE ('$newLogin', '$newPassword', '$Credit_Card');";
    mysqli_query($con, $q);
    mysqli_close($con);
    print("<p style='font-size:40px; font-weight: bolder;color:green; text-align:center;'>Account Created, go to <a href='index.html'>login page</a></p>");
    
    ?>
</body>
</html>