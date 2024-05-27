<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <style>
        body{
            background: url("login_background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            color: black;
        }
        table.center {
            margin:auto;
            align-items: center;
            justify-content: center;
            background-color:white;
            font-size: 20px;
        }
        h2{
            color:white;
            text-align: center;
        }
        .inputclr{
            color: red;
            text-align: center;
            font-weight: bolder;
            margin: auto;
            display: flex;
        }
        #login{
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
    <!-- customer_id       login     password    credit_balance -->
    <?php
    $con = mysqli_connect("localhost", "root", ""); // connect to the server
    $db = mysqli_select_db($con, "customer"); // connect to the database
    extract($_POST);

    $q = "SELECT * FROM `login_password` WHERE `login` = '$login' AND `password` = '$password';";

    $result = mysqli_query($con, $q); 

    if (mysqli_num_rows($result) == 0) {
        print ("<div id='login'><p>Incorrect Information, Please <a href='index.html'>Try Again</a></p></div>");
        die(); //return
    }
    
    mysqli_close($con);
    ?>
    <div>
        <h2>Product Selection</h2>
        <form action="checkout.php" method="POST">
            <?php
                print ("<input type = 'hidden' value = '$login' name = 'login'>");
            ?>
            <table border="1px" class="center">
                <thead>
                    <tr>
                        <th colspan="3">Welcome to Barakat shopping center
                            Please choose the products you want and press buy
                        </th>
                    </tr>
                </thead>
                <tr>
                    <td><img src="forno_chips.jpg" width="150px" height="150px"><br>&nbsp;0.5JD<br>
                    Number of items<input type='number' value=0 min="0" name="forno_chips"></td>

                    <td><img src="lipton.jpg" width="150px" height="150px"><br>&nbsp;2JD<br>
                    Number of items<input type='number' value=0 min="0" name="lipton"></td>

                    <td><img src="bbq_sauce.jpg" width="150px" height="150px"><br>&nbsp;2.75JD<br>
                    Number of items<input type='number' value=0 min="0" name="bbq_sauce"></td>
                </tr>
                <tr>
                    <td><img src="milk.jpg" width="150px" height="150px"><br>&nbsp;1.5JD<br>
                    Number of items<input type='number' value=0 min="0" name="milk"></td>

                    <td><img src="tuna.jpg" width="150px" height="150px"><br>&nbsp;0.75JD<br>
                    Number of items<input type='number' value=0 min="0" name="tuna"></td>

                    <td><img src="zenger.jpg" width="150px" height="150px"><br>&nbsp;<del>4JD</del>&nbsp;3JD<br>
                    Number of items<input type='number' value=0 min="0" name="zenger"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" value="Press to buy" style="font-size:20px"></td>
                </tr>
            </table>
        </form>
        <form action="deleteaccount.php" method="POST">
            <?php
                print ("<input type = 'hidden' value = '$login' name = 'login'>");
                print ("<input type = 'hidden' value = '$password' name = 'password'>");
            ?>
                <input type="submit" value="Do You Want To Delete Your Account?" class='inputclr'>
        </form>
    </div>

</body>

</html>