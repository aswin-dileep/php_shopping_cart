<?php
include("./server/connect.php");
session_start();


if (isset($_SESSION['logged_in'])) {
    header("location:Account.php");
    exit;
}
if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpassword = $_POST['confirm_password'];

    if ($password !== $Cpassword) {

        header('location:register.php?error="password do not match "');
    } elseif (strlen($password) < 6) {

        header('location:register.php?error="password is too small need 6 character  at least"');

        // if no error 
    } else {
        // if the email already exist 
        $email_qry = "SELECT * FROM users where user_email='$email'";
        $email_result = mysqli_query($con, $email_qry);

        if (mysqli_num_rows($email_result) !== 0) {

            header('location:register.php?error="user with this email already exist"');
        } else {
            // if account was created successfully
            $password = md5($password);
            $register_qry = "INSERT INTO users (user_name,user_email,user_password) VALUES('$name','$email','$password')";

            if (mysqli_query($con, $register_qry)) {
                $user_id = mysqli_insert_id($con);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header("location:Account.php?register='you register successfully'");
            } else {
                //account could not be created
                header('location:register.php?error="could not create an account at the moment "');
            }
        }
    }
    // if user has already registered 
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
        <h2 class="mt-4"> Create Account</h2>


        <form action="#" method="POST">
            <p class="text-danger"><?php if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    } ?></p>
            <div class="container">
                <input type="text" name="name" class="form-control mt-4" required placeholder="Name">
                <input type="text" name="email" class="form-control mt-4" required placeholder="Email">
                <input type="password" name="password" class="form-control mt-3 " required placeholder="Password" id="">
                <input type="password" name="confirm_password" class="form-control mt-3" required placeholder="Confirm-Password" id="password">


            </div>


            <label id="showpd">Show Password</label> <input type="checkbox" class="form-check-input" onclick="showPassword()"> <br>
            <input type="submit" class="btn   btn-success mt-2 mb-2" name="register" value="Register">
            <!-- <button type="submit" id="login-btn" class="btn   btn-success mt-2 mb-2" name="register">Register</button> <br> -->
            <div class="p-2">
                <a href="login.php" style=" text-decoration: none;" class="login-btn text-info ">Already have an account?Login</a>
            </div>
        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>