<?php
session_start();
$mahk=$_GET['cmahk'];
require "../../classes/hocki.class.php";
$connect=new db();
$conn=$connect->connect();
$query="delete from hocky1 where id_hk='$mahk'";
$results = mysqli_query($conn,$query);
header("location:../index.php?mod=hk");
exit();
?>