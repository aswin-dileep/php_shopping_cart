<?php include("header.php") ;
$all_users_qry ="SELECT * FROM users";
$users = mysqli_query($con,$all_users_qry);
?>
<div class="row">
    <?php include("sidemenu.php");?>

    <div class="col-md-10 bg-light">
        <h3>Admin panel</h3>
        <hr>
        <h4 class="text-center">All Users </h4>

        <table class="table bg-primary table-striped text-center m-auto">
            <tr>
            <th>User_id</th>
            <th>User_name</th>
            <th>User_Email</th> 
            </tr>

            <?php foreach($users as $user) {?>
                <tr class="bg-light">
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_email']; ?></td>
                </tr>
           <?php } ?>
        </table>
    </div>
</div>
<?php include("footer.php"); ?>