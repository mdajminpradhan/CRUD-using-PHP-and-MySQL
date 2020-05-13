<?php

//required files are linked up here

include 'inc/header.php';
include 'config.php';
include 'Database.php';

//object created to auto load database connection
$database = new Database;

//form validaton started form here
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['createaccount'])){
    $name  = mysqli_real_escape_string($database->link, $_POST['name']);
    $email = mysqli_real_escape_string($database->link, $_POST['email']);
    $skill = mysqli_real_escape_string($database->link, $_POST['skill']);

    if($name == "" || $email == "" || $skill == ""){
        $error = "Field must not be empty";
    }else{
        $query = "insert into user (name, email, skill) values ('$name','$email','$skill')";
        $create = $database->insert($query);
    }
}


//error messages will be shown here
if(isset($_GET['msg'])){
    echo "<div class='container'><div class='alert alert-danger'>".$error."</div></div>";
}
?>

<!-- html form started from here -->

<div class="w-50 myform mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h6 class="text-white">Insert new data</h6>
        </div>
        <div class="card-body">

            <form action="" method="post">            
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name"  >

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email"  >

                </div>
                <div class="form-group">
                    <label for="skill">Skill</label>
                    <input type="skill" name="skill" class="form-control" id="skill"  >
                </div>
                <button type="submit" name="createaccount" class="btn btn-primary mr-2">Submit</button>
            </form> <!--end of form -->

         </div> <!--end of card body -->
     </div> <!--end of card -->
</div> <!--endmyform -->