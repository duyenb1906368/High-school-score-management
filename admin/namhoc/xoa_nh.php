<?php
session_start();
$manh=$_GET['cmanh'];
require "../../classes/namhoc.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from namhoc where ID_NH='$manh'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=namhoc");
exit();
?>