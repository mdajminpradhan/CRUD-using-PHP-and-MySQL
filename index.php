<?php

//required files are linked here
include 'inc/header.php';
include 'config.php';
include 'Database.php';

//database connection is loaded
$database = new Database;

//fetched query is called here
$query = "select * from user";
$read = $database->select($query);

//success message is called here
if(isset($_GET['msg'])){
    echo "<div class='container mt-5 w-75'><div class='alert alert-success'>".$_GET['msg']."</div></div>";
}
?>

<!-- table is started here to show data form database -->

<div class="container mb-5 mt-2 w-75">
    <div class="card">
        <div class="card-heading bg-dark">
            <div class="row p-2">
                <div class="col-sm-6"><h6 class="text-white">User list</h6></div>
                <div class="col-sm-6"><h6 class="text-white text-right">Welcome!</h6>
                </div>
            </div>
        </div>
        <!-- card heading is ended here -->
        <div class="card-body">
            <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Skill</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

<!-- data is fetched here -->
<?php if($read){ ?>
<?php while($row = $read->fetch_assoc()){ ?>
                <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['skill']; ?></td>
                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Update</a></td>
                </tr>
<?php } ?>
<?php } ?>
            </tbody>
            </table>
            <!-- end of table -->
        </div>
    </div>    
</div>
<!-- end of container -->