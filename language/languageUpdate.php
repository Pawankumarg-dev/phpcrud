<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkid =isset($_GET['id'])?$_GET['id']:'';
$sql ="SELECT * FROM language where id='".$pkid."'";
$mysqlSet=mysqli_query($conn,$sql);

$subtn = @$_POST['submit'];
$languageError = '';
if (isset($subtn) && !empty($subtn)) {
    $language = @$_POST['language'];
    if ($language == '') {
        $languageError = "Language field is required";
    }
    if ($language != '') {
        $sql = "UPDATE language set name='".$language."'  where id ='".$pkid."' ";
        if (mysqli_query($conn, $sql)) {
            header("location:languageRecord.php");
            $_SESSION['message']="Update successfully";
            $_SESSION['status']="warning";
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
                    <h3 class="text-center text-danger">Select Language</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Language</label>
                        <input type="text" name="language" value="<?=$row['name'];?>" class="form-control"/>
                       </br>
                        <span class=" text-danger"><?= $languageError; ?></span>
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