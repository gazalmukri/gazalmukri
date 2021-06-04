<?php
session_start();
include 'db.php';

$sql = "UPDATE products SET status = 0 WHERE id=".$_GET['id'] ;

mysqli_query($conn,$sql);
header("location:viewcm.php");
?>