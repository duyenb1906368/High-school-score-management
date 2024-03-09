<?php
session_start();
$ma=$ten=$sotiet=$heso="";	
require  '../../classes/monhoc.class.php';
$con = new monhoc();
if(isset($_POST['ok'])){
	$ma=$_POST['txtma'];
	$ten=$_POST['txtten'];
    $sotiet = $_POST['txtsotiet'];
    $heso = $_POST['txtheso'];

	$mh = $con->add($ma, $ten, $sotiet, $heso);
	header('location:../index.php?mod=mh');
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
	<h1 align="center">Trang Thêm Môn Học</h1>

<center>
	<a href="../index.php?mod=mh"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="add_mon.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Môn Học:</td>
		<td>  <input required type="text" name="txtma" size="25" placeholder="VD: Toán có mã là T" /><br/>
		</td>
	</tr>
   
    <tr>
		<td>Tên Môn Học:</td>
		<td>  <input required type="text" name="txtten" size="25"  /><br/>
		</td>
	</tr>

    <tr>
		<td>Số Tiết:</td>
		<td>  <input required type="text" name="txtsotiet" size="25" placeholder="Nhập số nguyên" /><br/>
		</td>
	</tr>

    <tr>
		<td>Hệ Số:</td>
		<td>  <input required type="text" name="txtheso" size="25" placeholder="Nhập số nguyên" /><br/>
		</td>
	</tr>

    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Môn Học" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>