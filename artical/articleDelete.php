<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkId=isset($_GET['id'])?$_GET['id']:'';
$sql="UPDATE articles set del_action='Y' where id='".$pkId."'";
if(mysqli_query($conn,$sql)){
    header("location:articalRecord.php");
    $_SESSION['message']="Data delete successfully";
    $_SESSION['status']="danger";
}else{
    echo "Data is not deleted";
}

?>