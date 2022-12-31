<?php
session_start();
include("../server/connect.php");

if(isset($_SESSION['admin_logged_in'])){
    header("location:index.php");
    exit;
}

if (isset($_POST['admin_login_btn'])) {

    $admin_email = $_POST['user'];
    $admin_password = md5($_POST['pass']);

    $admin_login_qry = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_password='$admin_password'";
    $admin_login_result = mysqli_query($con, $admin_login_qry);

    if ($admin_login_result) {
        if (mysqli_num_rows($admin_login_result) == 1) {

            while ($row = mysqli_fetch_array($admin_login_result)) {
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['admin_email'] = $row['admin_email'];
                $_SESSION['admin_logged_in'] = true;

                header("location:index.php?message=logged in successfully");
            }

        }else{
            header("location:admin_login.php?error=could not verify your account");
        }
    }else{
        header("location:admin_login.php?error=something went worng");
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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/index.js"></script>
</head>

<body class="login-body">

    <!-- login section -->

    <div class="login ">
        <h2 class="mt-4">Admin Login </h2>

        <p class="text-danger text-center"><?php if (isset($_GET['error'])) {
                                                echo $_GET['error'];
                                            } ?></p>

        <form action="admin_login.php" method="POST">

            <div class="container">
                <input type="text" class="form-control mt-4" placeholder="Username" name="user">

                <input type="password" class="form-control mt-3" placeholder="Password" id="password" name="pass">


            </div>


            <label id="showpd">Show Password</label> <input type="checkbox" class="form-check-input" onclick="showPassword()"> <br>

            <input type="submit" name="admin_login_btn" class="btn btn-primary mt-2 mb-3" value="Login">
            <br>
           
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>