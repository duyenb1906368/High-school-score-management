<?php
$ma=$_GET['cma'];
//require "../../includes/config.php";
require "../../classes/db.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from day where DAY_MA='$ma'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=day");
exit();
?>