<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkid =isset($_GET['id'])?$_GET['id']:'';
$sql ="SELECT * FROM categories where id='".$pkid."'";
$mysqlSet=mysqli_query($conn,$sql);

$subtn = @$_POST['submit'];
$nameError = '';
if (isset($subtn) && !empty($subtn)) {
    $name = @$_POST['name'];
    if ($name == '') {
        $nameError = "Name field is required";
    }
    if ($name != '') {
        $sql = "UPDATE categories set name='".$name."'  where id ='".$pkid."' ";
        if (mysqli_query($conn, $sql)) {
            header("location:categorieRecord.php");
            $_SESSION['message']="Data is update successfully";
            $_SESSION['status']="success";
        } else {
            echo "Data is not insert";
        }
    }
}
?>

<?php include('../static/header.php') ?>


<body>
    <div class="container">
        <div class="row mt-3 ">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 p-4 card">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
                   $row = mysqli_fetch_assoc($mysqlSet);
                    ?>
                    <h3 class="text-center text-danger">Update categories</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="<?=$row['name'];?>" class="form-control"/>
                       </br>
                        <span class=" text-danger"><?= $nameError; ?></span>
                    </div>
                       
                    <div class="mb-3">
                        <input type="submit" name="submit" value="Update" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php include('../static/footer.php') ?>