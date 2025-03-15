<?php session_start();

define('DB_HOST','127.0.0.1:3306');
define('DB_USER','root');
define('PASSWORD','');
define('DB_NAME','user_management');

mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$conn = mysqli_connect(DB_HOST,DB_USER,PASSWORD,DB_NAME);

try {
    if($conn){
        // echo 'database connection successfully';
    }else{
        throw new mysqli_sql_exception();
    }

}
catch(mysqli_sql_exception $e){
    echo 'database not connection ';
    echo $e->getMessage();
    echo mysqli_connect_errno();
    exit();
}

function base_url(){

    $url='http://localhost/office/datamanagement';
    return $url;

}

?>