<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkid = isset($_GET['id'])?$_GET['id']:'';
// $sql ="DELETE FROM language where id='".$pkid."'";
$sql ="UPDATE language set del_action='Y' where id='".$pkid."'";

if(mysqli_query($conn,$sql)){
    header("location:languageRecord.php");
    $_SESSION['message']="Delete data successfully";
    $_SESSION['status']="danger";
}else{
    echo "Data is not delete";
}
?>