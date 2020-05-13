<?php

//require files are linked here
include 'inc/header.php';
include 'config.php';
include 'Database.php';

//databae connection is loaded here
$database = new Database;

$id = $_GET['id'];
$db = new Database();
$query = "select * from user where id = $id limit 1";
$getData = $database->select($query)->fetch_assoc();

//form validation is started form here
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $name  = mysqli_real_escape_string($database->link, $_POST['name']);
    $email = mysqli_real_escape_string($database->link, $_POST['email']);
    $skill = mysqli_real_escape_string($database->link, $_POST['skill']);

    if($name == "" || $email == "" || $skill == ""){
        $error = "Field must not be empty";
    }else{
        $query = "UPDATE `user` SET `name`='$name',`email`='$email',`skill`='$skill' WHERE `id`='$id'";
        $update = $database->update($query);
    }
}


//success messgage will be shown here
if(isset($_GET['msg'])){
    echo "<div class='container'><div class='alert alert-danger'>".$error."</div></div>";
}

//delete function is creaed here
if(isset($_POST['delete'])){
    $query = "DELETE FROM `user` WHERE `id`='$id'";
    $delteData = $database->deleteData($query);
}
?>

<div class="w-50 myform mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h6 class="text-white">Insert new data</h6>
        </div>
        <div class="card-body">

            <form action="?id=<?php echo $getData['id']; ?>" method="post">            
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" value="<?php echo $getData['name']; ?>" class="form-control" id="name"  >

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" value="<?php echo $getData['email']; ?>" class="form-control" id="email"  >

                </div>
                <div class="form-group">
                    <label for="skill">Skill</label>
                    <input type="skill" name="skill" value="<?php echo $getData['skill']; ?>" class="form-control" id="skill"  >
                </div>
                <button type="submit" name="update" class="btn btn-primary mr-2">Submit</button>
                <button type="submit" name="delete" class="btn btn-danger mr-2">Delete</button>
            </form>

        </div>
    </div>
</div>
<!-- end of container -->