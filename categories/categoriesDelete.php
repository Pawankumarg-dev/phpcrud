<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkid = isset($_GET['id'])?$_GET['id']:'';
$sql = "Update categories set del_action='Y' where id ='".$pkid."'";
if(mysqli_query($conn,$sql)){
    header("location:categorieRecord.php");
    $_SESSION['message']="Data is delete successfully";
    $_SESSION['status']="danger";
}else{
    echo "Data is not delete";
}

?>