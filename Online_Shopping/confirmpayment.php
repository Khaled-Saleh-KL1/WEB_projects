<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirm Payment</title>
    <style>
        body {
            background: url("login_background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            color: red;
            text-align: center;
            display: flex;
            flex-direction: column;
            font-size: 50px;
            background-position: center center;
            align-items: center;
            justify-content: center;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <?php
    extract($_POST);
    $con = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($con, "customer");
    
    if($currency < $priceSum){
        print("<p style='font-size:40px; color:red; text-align:center;'>You don't have enough money, <a href='index.html'>return to login page</a></p>");
        mysqli_close($con);
        die(); // return, stop the website loading
    }
    $currency = $currency - $priceSum;
    $q = "UPDATE `login_password` SET `credit_balance` = '$currency' WHERE `login` = '$login'";
    mysqli_query($con, $q);
    mysqli_close($con);
    print("<p style='font-size:40px; color:green; text-align:center;'>Purchase confirmed, thank you! <a href='index.html'>Return to login page</a></p>");
    ?>
</body>

</html>