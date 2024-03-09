<?php
session_start();
$mahs=$malop=$ten=$gtinh=$ngaysinh=$noisinh=$dtoc=$dchi=$pass="";	
require  '../../classes/hocsinh.class.php';
$con = new hocsinh();
if(isset($_POST['ok'])){
	$mahs=$_POST['txtmahs'];
	$malop=$_POST['txtmalop'];
	$ten=$_POST['txtten'];
	$gtinh=$_POST['txtgt'];
	$ngaysinh=$_POST['txtngaysinh'];
	$noisinh=$_POST['txtnoisinh'];
	$dtoc=$_POST['txtdantoc'];
	$dchi=$_POST['txtdiachi'];
	$pass=$_POST['txtpasshs'];

	$hs = $con->add($mahs, $malop, $ten, $gtinh, $ngaysinh, $noisinh, $dtoc, $dchi, $pass);
	header('location:../index.php?mod=hs');
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
	<h1 align="center">Trang Thêm Học Sinh</h1>

<center>
	<a href="../index.php?mod=hs"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="add_hs.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Học Sinh:</td>
		<td>  <input required type="text" name="txtmahs" size="25" placeholder="Số nguyên từ 0-9" /><br/>
		</td>
	</tr>
	
    <tr>
		<td>Mã Lớp Học</td>
		<td><select required name="txtmalop">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from lophoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[LH_MA]'>$data[LH_MA]</option>";
		    }
			?>

			</select></td>
	</tr>

    <tr>
		<td>Tên Học Sinh:</td>
		<td><input required type="text" name="txtten" size="25" /></td>
	</tr>

    <tr>
		<td>Giới Tính:</td>
		<td><input required type="radio" name="txtgt" value="1">Nam
			<input required type="radio" name="txtgt" value="2">Nữ
		</td>
	</tr>

    <tr>
		<td>Ngày Sinh:</td>
		<td><input required type="date" name="txtngaysinh" size="25" /> </td>
	</tr>

	<tr>
		<td>Nơi Sinh:</td>
		<td><input required type="text" name="txtnoisinh" size="25" /> </td>
	</tr>

	<tr>
		<td>Dân Tộc:</td>
		<td><input required type="text" name="txtdantoc" size="25" /> </td>
	</tr>

	<tr>
		<td>Địa Chỉ:</td>
		<td><input required type="text" name="txtdiachi" size="25" /> </td>
	</tr>

	
    <tr>
		<td>Password Học Sinh:</td>
		<td><input required type="password" name="txtpasshs" size="25" placeholder="Trên 6 kí tự"/></td>
	</tr>

    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Học Sinh" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>
