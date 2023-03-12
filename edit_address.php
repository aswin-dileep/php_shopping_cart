<?php
 include("./server/connect.php");
 include("./layout/header.php"); 

if(isset($_POST['edit_address'])){

    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $address_id = $_POST['address_id'];
    $save_address=mysqli_query($con,"UPDATE user_address SET name='$name',phone='$phone',email='$email',city='$city',address='$address'
    WHERE address_id='$address_id' ");
     if(!$save_address){
      echo '<script>alert("Something went wrong address not updated")</script>';
     }else{
        echo '<script>alert(" Address Updated Successfully..")</script>';
        header("Refresh:0; url=address.php?user_id=$user_id");
     }
   
}else if(isset($_GET['address_id'])){
    $address_id = $_GET['address_id'];
    $edit_address_qry ="SELECT * FROM user_address WHERE address_id='$address_id'";
    $address_result = mysqli_query($con,$edit_address_qry);

}{
    header("Account.php");
}
?>





<!-- checkout section -->
<div class="container">
    <div class="row ">
        <h3 class="text-center mt-5">Edit Address</h3>
        <form action="" class="form-group" method="post">
            <div class="col-md-6 m-auto">
            <?php while($address=mysqli_fetch_array($address_result)){?>
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $address['name']; ?>">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $address['phone']; ?>">
                <input type="hidden" name="address_id" value="<?php echo $address_id ?>">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $address['email']; ?>">
                <label for="">City</label>
                <input type="text" class="form-control" name="city" value="<?php echo $address['city']; ?>">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $address['address']; ?>">
                <div class="text-center">
                <input type="submit" value="Save" name="edit_address" class="btn btn-success mt-3 ">
                </div>
                
                <?php } ?>
            </div>

        </form>
    </div>
</div>



</body>


</div>


<?php include("./layout/footer.php"); ?>