<?php
require_once __DIR__.'/connect.php';
$sql = "SELECT name , email , username , gender, language ,education ,age FROM users";
$query = mysqli_query($conn,$sql);
$csvHeaders = ['Name' , 'Email', 'Username', 'Gender','Language','Education','Age'];
$filename="users.csv";
// Open file pointer connected to output stream
 $output = fopen('php://output', 'w');
 fputcsv($output, $csvHeaders);
 while($row=mysqli_fetch_assoc($query)){
     fputcsv($output, $row);
 }
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=' . $filename);
 fclose($output);
 exit;
?>