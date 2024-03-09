<?php
session_start();
$manh=$nh="";	
require  '../../classes/namhoc.class.php';
$con = new namhoc();
if(isset($_POST['ok'])){
	$manh=$_POST['txtmanh'];
	$nh=$_POST['txtnh'];

	$namhoc = $con->add($nh, $manh);
	header('location:../index.php?mod=namhoc');
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
	<h1 align="center">Trang Thêm Năm Học</h1>

<center>
	<a href="../index.php?mod=namhoc"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="add_nh.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Năm Học:</td>
		<td>  <input required type="text" name="txtmanh" size="25" placeholder="Số nguyên từ 0-9" /><br/>
		</td>
	</tr>
   
    <tr>
		<td>Năm Học:</td>
		<td>  <input required type="text" name="txtnh" size="25" placeholder="Mẫu: 2021-2022" /><br/>
		</td>
	</tr>

    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Năm Học" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>