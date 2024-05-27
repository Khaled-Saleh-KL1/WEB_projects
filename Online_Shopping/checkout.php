<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
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
            font-size: 40px;
            background-position: center center;
            align-items: center;
            justify-content: center;
            font-weight: bolder;
        }
    </style>
</head>

<body>

    <?php
    $con = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($con, "customer");
    extract($_POST);
    $q = "SELECT `credit_balance` FROM `login_password` WHERE `login` = '$login';";
    $result = mysqli_query($con, $q);

    $row = mysqli_fetch_row($result);
    $currency = $row[0];
 
    $priceSum = 0;
    $priceSum = $priceSum + $forno_chips * 0.5;
    $priceSum = $priceSum + $lipton * 2;
    $priceSum = $priceSum + $bbq_sauce * 2.75;
    $priceSum = $priceSum + $milk * 1.5;
    $priceSum = $priceSum + $tuna * 0.75;
    $priceSum = $priceSum + $zenger * 3;
    mysqli_close($con);

    print ("<p>The Total Price is: $priceSum </p>");
    print ("<p>You Have: $currency </p>");
    ?>
    <form method="POST" action="confirmpayment.php">
        <?php
        print ("<input type = 'hidden' value = '$login' name = 'login'>");
        print ("<input type = 'hidden' value = '$currency' name = 'currency'>");
        print ("<input type = 'hidden' value = '$priceSum' name = 'priceSum'>");
        ?>
        <input type="submit" value="Confirm" style="font-size:30px">
    </form>
</body>

</html>