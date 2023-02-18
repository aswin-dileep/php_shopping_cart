<?php 
include("./server/connect.php");
include('layout/header.php');

if (!isset($_SESSION['logged_in'])) {
    header("location:login.php");
    exit;
}

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $address_qry = "SELECT * FROM user_address WHERE user_id='$user_id'";
    $address_result = mysqli_query($con,$address_qry);
    $i=0;
}else{
    header("Account.php");
}
?>

<div class="text-center">
<h2 class="mt-4"> Address</h2>
</div>
<div class="container">


<table class="table mt-5   m-auto text-center table-striped" >
        <tr class="bg-primary">
            <th>Sl_No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
      
        while ($address = mysqli_fetch_array($address_result)) { ?>
            <?php $i++; ?>
            <tr class=" ">
                <td>
                    <h6><?php echo $i ?></h6>
                </td>
                <td>
                    <h6><?php echo $address['name']; ?></h6>
                </td>
                <td>
                    <h6><?php echo $address['email']; ?></h6>
                </td>
                <td>
                    <h6><?php echo $address['phone']; ?></h6>
                </td>

                <td>
                    <h6><?php echo $address['city']; ?></h6>
                </td>
                <td>
                    <h6><?php echo $address['address']; ?></h6>
                </td>
                <td>
                   <a href="" class="btn btn-success">Edit</a>
                </td>
                <td>
                   <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
           
        <?php } ?>
       
    </table>
    <a href="add_address.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary mt-5">Add Address</a>
    </div>



















<?php include('layout/footer.php'); ?>