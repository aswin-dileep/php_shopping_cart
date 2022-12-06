<?php
include("./server/connect.php");

session_start();


if (!isset($_SESSION['logged_in'])) {
    header("location:login.php");
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        header("location:login.php");
        exit;
    }
}

if (isset($_POST['change_password'])) {

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $current_password = md5($_POST['current_password']);
    $user_email = $_SESSION['user_email'];
    $check_pass_qry = "select * from users where user_email='$user_email'";

    $check_pass_result = mysqli_query($con,$check_pass_qry);

    while($row=mysqli_fetch_array($check_pass_result)){

        if($current_password==$row['user_password']){

            if ($new_password !== $confirm_password) {
                header("location:Account.php?error=password do not match");
            } elseif (strlen($new_password) < 6) {
                header("location:Account.php?error= password is too short 6 characters needed ");
            } else {
                $new_password = md5($new_password);
        
                
        
                $change_qry = "UPDATE users SET user_password='$new_password' WHERE user_email='$user_email'";
                $change_result = mysqli_query($con, $change_qry);
                if ($change_result) {
                    header("location:Account.php?change_message=password changed successfully");
                } else {
                    header("location:Account.php?error=somthing went wrong password not changed ");
                }
            }
        }else{
            header("location:Account.php?error=wrong password ");
        }
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

</head>

<body class="bg-light">
    <!-- main navbar section -->

    <nav class="navbar navbar-expand-lg navbar-light bg-primary py-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Shopping site</a>


            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.html">Products</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Travel</a></li>
                            <li><a class="dropdown-item" href="#">Casual</a></li>
                            <li><a class="dropdown-item" href="#">Laptop</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            Brands
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item">Nike</a></li>
                                <li><a href="" class="dropdown-item">Puma</a></li>
                                <li><a href="" class="dropdown-item">Addidas</a></li>
                            </ul>
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.html">Cart<i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Account.html">Account<i class="fa-solid fa-user"></i></a>
                </li>

            </ul>




        </div>

    </nav>

    <!-- Account section -->

    <div class="row">
        <div class="col-md-6 text-center">
            <p class="text-center mt-3 text-success"><?php if (isset($_GET['message'])) {
                                                            echo $_GET['message'];
                                                        } ?></p>
            <h3 class=" mt-2">Account Info</h3>
            <p class=" mt-3">Name : <?php if (isset($_SESSION['user_name'])) {
                                        echo $_SESSION['user_name'];
                                    } ?> </p>
            <p class=" mt-3">Email : <?php if (isset($_SESSION['user_email'])) {
                                            echo $_SESSION['user_email'];
                                        } ?> </p>
            <a href="#orders" class="btn text-info">Your Order</a><br>
            <a href="Account.php?logout=1" class="btn text-info">Logout</a>

        </div>

        <div class="col-md-6 ">
            <p class="text-center text-danger mt-4"><?php if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } ?></p>
            <p class="text-center text-success"><?php if (isset($_GET['change_message'])) {
                                                    echo $_GET['change_message'];
                                                } ?></p>
            <h3 class="mt-5 text-center">Change Password</h3>
            <form action="" method="post">
                <div class="form-group m-auto w-50 ">
                    <label for="" class="mt-2">Current Password</label>
                    <input type="text" class="form-control" placeholder="Enter Current Password" name="current_password">
                    <label for="" class="mt-2">New Password</label>
                    <input type="text" class="form-control" placeholder="Enter NewPassword" name="new_password">
                    <label for="" class="mt-2">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Re-type New Password" name="confirm_password">
                    <div class="text-center">
                        <input type="submit" value="Change password" name="change_password" class="btn btn-success mt-2">

                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- Order section -->
    <div id="orders" class="container">
        <h3 class="mt-5">Your Order</h3>

        <table class="table mt-5 text-center ">
            <tr class="bg-primary">
                <th>Product</th>
                <th>Date</th>
            </tr>

            <tr class="bg-secondary ">
                <td>
                    <div class="product-info">
                        <img src="../E-com/images/American Tourister 32 Ltrs.jpg" style="width:50%; height:100px; object-fit:contain;" alt="" srcset="">
                    </div>
                    <div>
                        <span>American Tourister</span>
                    </div>
                </td>

                <td>
                    <p>22-12-2022</p>
                </td>
            </tr>

        </table>




    </div>
    <footer class="mb-0">
        <div class=" bg-primary p-3 text-light ">
            <p class="text-center ">@copyright 2022</p>
        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>