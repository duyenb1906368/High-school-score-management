<?php
$mahs=$_GET['cmahs'];
//require "../../includes/config.php";
require "../../classes/db.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from hocsinh where HS_MA='$mahs'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=hs");
exit();
?>