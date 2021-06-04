<?php
session_start();
include 'db.php';

$sql = "UPDATE category SET status = 0 WHERE id=".$_GET['id'] ;

mysqli_query($conn,$sql);
header("location:viewcategory.php");
?>