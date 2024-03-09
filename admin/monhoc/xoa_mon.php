<?php
session_start();
$ma=$_GET['cmamh'];
require "../../classes/monhoc.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from monhoc where MH_MA='$ma'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=mh");
exit();
?>