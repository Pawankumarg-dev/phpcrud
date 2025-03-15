<?php require_once __DIR__ . '/connect.php';
session_destroy();
header("location:".base_url());
header("index:login.php");
?>