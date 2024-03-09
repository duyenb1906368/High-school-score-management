<?php
session_start();
$ma=$_GET['cmalop'];
require "../../classes/lop.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from lophoc where LH_MA='$ma'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=lop");
exit();
?>