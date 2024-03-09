<?php
$ma=$_GET['cmagv'];
//require "../../includes/config.php";
require "../../classes/db.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from giaovien where GV_MA='$ma'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=gv");
exit();
?>