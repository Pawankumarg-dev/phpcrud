<?php
require_once __DIR__.'/connect.php';
$pkid = isset($_GET['id'])?$_GET['id']:'';
// $sql = "DELETE FROM users where id = '".$pkid."'" ;
$sql = "Update users set del_action='Y' where id = '".$pkid."'" ;

try{
    if(mysqli_query($conn,$sql)){
        //echo "data delete successfully";
        header("location:record.php");
        $_SESSION['message']="Record is delete successfully";
        $_SESSION['status']="danger";
    }else{
        throw new mysqli_sql_exception();
    }
}
catch(mysqli_sql_exception $e){
        echo "data not delete";
        echo $e->getMessage();
}
?>