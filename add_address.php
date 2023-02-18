<?php 
include("server/connect.php");
include("layout/header.php");
if(!isset($_GET['user_id'])){
  header("Account.php");
}else{
    $user_id=$_GET['user_id'];
}
?>

<div class="container">
    <h2 class="text-center m-4">Add Address</h2>

    <form action="save_address.php" method="post" class="m-auto form-group w-50">
        <label for="" class="form-group">Name:</label>
        <input type="text" placeholder="Enter Name" name="name" class="form-control">
        <label for="" class="form-group">Email:</label>
        <input type="text" placeholder="Enter Email" name="email" class="form-control">
        <label for="" class="form-group">Phone No:</label><br>
        <input type="text" placeholder=" Phone Number" name="phone" class="form-control">
        <label for="" class="form-group">City</label><br>
        <input type="text" placeholder="City" name="city"  class="form-control">
        <label for="" class="form-group"> Address:</label><br>
        <input type="text" placeholder="Enter Address" name="address"  class="form-control">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <div class=" text-center">
        <input type="submit" value="Save Address" name="address_btn" class="btn btn-success mt-2 ">
        </div>
        
    </form>
</div>





<?php 
include("layout/footer.php")
?>