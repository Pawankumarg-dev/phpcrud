<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$subtn = @$_POST['submit'];
$user_id=$_SESSION['id'];
$languageError = '';
if (isset($subtn) && !empty($subtn)) {
    $language = @$_POST['language'];
    if ($language == '') {
        $languageError = "Language field is required";
    }
    if ($language != '') {
        $sql = "INSERT into language (name,user_id) values('" . $language . "','".$user_id."') ";
        if (mysqli_query($conn, $sql)) {
            header("location:languageRecord.php");
            $_SESSION['message']="Add data successfully";
            $_SESSION['status']="success";
        } else {
            echo "Data is not insert";
        }
    }
}
?>

<?php include('../static/header.php') ?>

    <div class="container">
        <div class="row mt-3 ">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 p-4 card">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center text-danger">Language</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Language</label>
                        <input type="text" name="language" class="form-control"/>
                       </br>
                        <span class=" text-danger"><?= $languageError; ?></span>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    <?php include('../static/footer.php') ?>