<?php 
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$subtn =@$_POST['submit'];
$nameError = $roleError='';
if(isset($subtn) && !empty($subtn)){
  $name = trim($_POST['name']);
  if($name==''){
    $nameError ="Name field is required";
  }
  $userId =$_SESSION['id'];
  if($name!=''){
  $categorySql =" INSERT INTO categories (user_id,name) values('".$userId."','".$name."') ";
  $categoryMysqlSet =mysqli_query($conn,$categorySql);
  if($categoryMysqlSet){
   header("location:categorieRecord.php");
  }else{
    echo "Data not insert not successfully";
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
                    <h3 class="text-center text-danger">Categories</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"/> 
                        <span class="text-danger"><?=$nameError?></span>
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