<?php
session_start();
include("./server/connect.php");

if(isset($_SESSION['logged_in'])){
    header("location:Account.php");
    exit;
}

if (isset($_POST['login_btn'])) {

    $email = $_POST['user'];
    $password = md5($_POST['pass']);

    $login_qry = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
    $login_result = mysqli_query($con, $login_qry);

    if ($login_result) {
        if (mysqli_num_rows($login_result) == 1) {

            while ($row = mysqli_fetch_array($login_result)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['logged_in'] = true;

                header("location:Account.php?message=logedin successfully");
            }

        }else{
            header("location:login.php?error=could not verify your account");
        }
    }else{
        header("location:login.php?error=something went worng");
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- font awesome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="./assets/js/index.js"></script>
</head>

<body class="login-body">

    <!-- login section -->

    <div class="login ">
        <h2 class="mt-4"> Login page</h2>

        <p class="text-danger text-center"><?php if (isset($_GET['error'])) {
                                                echo $_GET['error'];
                                            } ?></p>

        <form action="login.php" method="POST">

            <div class="container">
                <input type="text" class="form-control mt-4" placeholder="Username" name="user">

                <input type="password" class="form-control mt-3" placeholder="Password" id="password" name="pass">


            </div>


            <label id="showpd">Show Password</label> <input type="checkbox" class="form-check-input" onclick="showPassword()"> <br>

            <input type="submit" name="login_btn" class="btn btn-primary mt-2 mb-3" value="Login">
            <br>
            <button class="btn btn-success mb-3" name="register"> <a href="register.php" style="color: white;
                text-decoration: none;" class="login-btn">Create Account</a> </button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>