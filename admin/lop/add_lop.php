<?php
session_start();
$ma=$ten=$khoi="";	
require  '../../classes/lop.class.php';
$con = new lop();
if(isset($_POST['ok'])){
	$ma=$_POST['txtma'];
	$ten=$_POST['txtten'];
    $khoi = $_POST['txtkhoi'];


	$lop = $con->add($ma, $ten, $khoi);
	header('location:../index.php?mod=lop');
}

?>

<style type="text/css">
	#menu table td
{
	font-weight: bold;
}
</style>
<body bgcolor="#CAFFFF">
<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
	<h1 align="center">Trang Thêm Lớp Học</h1>

<center>
	<a href="../index.php?mod=lop"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="add_lop.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Lớp Học:</td>
		<td>  <input required type="text" name="txtma" size="25" placeholder="VD: 10A1" /><br/>
		</td>
	</tr>
   
    <tr>
		<td>Tên Lớp Học:</td>
		<td>  <input required type="text" name="txtten" size="25" placeholder="VD: 10A1"  /><br/>
		</td>
	</tr>

    <tr>
		<td>Khối:</td>
		<td>  <input required type="text" name="txtkhoi" size="25" placeholder="VD: 10" /><br/>
		</td>
	</tr>

   

    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Lớp Học" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>