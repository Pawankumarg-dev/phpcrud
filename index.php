<?php
require_once __DIR__.'/connect.php';
$message='';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password =md5($password);
    $sql = "SELECT * FROM users where username='".$username."' and password='".$hash_password."'";
    $query=mysqli_query($conn,$sql);
     $numRow =mysqli_num_rows($query);
     if($numRow>0){
        $userData =mysqli_fetch_assoc($query);
        $_SESSION['id']=$userData['id'];
        $_SESSION['name']=$userData['name'];
        $_SESSION['email']=$userData['email'];
        $_SESSION['username']=$userData['username'];
        $_SESSION['language']=$userData['language'];
        header("location:dashboard.php");
     }else{
        $message = "Username or Password is invalid";
     }
}

if(isset($_SESSION['id']) && $_SESSION['id']!=''){
    header("location:dashboard.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registraction</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 ">
            <h3 class="text-center">Login Page</h3>
            <span class="text-danger"><?=$message ?></span>
        <form action="" class="card p-2" method="POST">
        <div class="mb-3">
        
        <label for="name" class="form-label">Username</label>
        <input type="username" name="username" class="form-control" />
        </div>
        <div class="mb-3">
        <label for="name" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" />
        </div>
        <div class="mb-3">
        
        <input type="submit" name="login" value="login" class="form-control btn btn-primary" />
        </div>
        </form>
        </div>
        <div class="col-lg-4"></div>
        </div>
    </div>

 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>