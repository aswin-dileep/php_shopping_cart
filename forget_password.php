<?php 
   include("./server/connect.php");
   session_start();

?>
<?php 
if(isset($_POST['reset_password'])){

    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $new_password = md5($_POST['new_password']);
    $re_new_password = md5($_POST['re_new_password']);
    $check_details_qry ="SELECT * FROM users WHERE user_email='$user_email' AND user_name='$user_name' ";
    $check_qry_result =mysqli_query($con,$check_details_qry);
    if(mysqli_num_rows($check_qry_result)==1){

        if($re_new_password == $new_password){
            $change_password_qry="UPDATE users SET user_password='$new_password' WHERE user_email='$user_email'";
            $change_password = mysqli_query($con,$change_password_qry);
            if(!$change_password){
                echo"<script>alert('Error the password is not changed try again')</script>";
            }else{
                echo"<script>alert(' Password changed Successfully')</script>";
                header("refresh:0;url=login.php");
            }
        }else{
            echo"<script>alert('Error the password does not match try again')</script>";
        }

    }else{
        echo"<script>alert('invalid username or email try again')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- font awesome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
 
</head>
<body>
    <h2 class="text-center mt-5">Forget password</h2>

    <div class="w-50 m-auto">
        <form action="forget_password.php" class="form-group" method="post">
            <label for="">Enter your Email id</label>
            <input type="email" name="user_email" class="form-control" required>
            <label for="">Enter your Name</label>
            <input type="text" name="user_name" class="form-control" required>
            <label for="">Enter New Password</label>
            <input type="text" name="new_password" class="form-control" required minlength="6">
            <label for="">Re-Enter your new password</label>
            <input type="password" name="re_new_password" class="form-control" required minlength="6">

            <input type="submit" name="reset_password" value="Reset Password" class="btn btn-success mt-2 ">
        </form>
    </div>

</body>
</html>