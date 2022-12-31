<?php include("header.php") ;

if(!isset($_SESSION['admin_logged_in'])){
    header("location:admin_login.php");
}
?>
  
    <div class="row">
       <?php include("sidemenu.php") ?>
        <div class="col-md-10 bg-light">
            <h3>Admin</h3>
            <hr>
            <h3 class="">Section Title</h3>

            <table class="table mt-4 table-striped">
                <tr class="bg-primary">
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                </tr>
                <tr class=" ">
                    <td>1</td>
                    <td>Hello</td>
                    <td>hai</td>
                    <td>Aswin</td>
                    <td>Alvin</td>
                </tr>
                <tr class=" ">
                    <td>1</td>
                    <td>Hello</td>
                    <td>hai</td>
                    <td>Aswin</td>
                    <td>Alvin</td>
                </tr>
                <tr class=" ">
                    <td>1</td>
                    <td>Hello</td>
                    <td>hai</td>
                    <td>Aswin</td>
                    <td>Alvin</td>
                </tr>
                <tr class=" ">
                    <td>1</td>
                    <td>Hello</td>
                    <td>hai</td>
                    <td>Aswin</td>
                    <td>Alvin</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>