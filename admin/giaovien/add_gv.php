<?php
session_start();
$ma=$mon=$tdcm=$tcm=$ten=$cccd=$gt=$ngaysinh=$dc=$sdt=$pass="";	
require  '../../classes/giaovien.class.php';
$con = new giaovien();
if(isset($_POST['ok'])){
	$ma=$_POST['txtma'];
	$mon=$_POST['txtmon'];
	$tdcm=$_POST['txttdcm'];
	$tcm=$_POST['txttcm'];
	$ten=$_POST['txtten'];
	$cccd=$_POST['txtcccd'];
	$gt=$_POST['txtgt'];
	$ngaysinh=$_POST['txtngaysinh'];
	$dc=$_POST['txtdc'];
	$sdt=$_POST['txtsdt'];
	$pass=$_POST['txtpass'];

	$hs = $con->add($ma, $mon, $tdcm, $tcm, $ten, $cccd, $gt, $ngaysinh, $dc, $sdt, $pass);
	header('location:../index.php?mod=gv');
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
	<h1 align="center">Trang Thêm Giáo Viên</h1>

<center>
	<a href="../index.php?mod=gv"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="add_gv.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Giáo Viên:</td>
		<td>  <input required type="text" name="txtma" size="25" placeholder="Số nguyên từ 0-9" /><br/>
		</td>
	</tr>
	
    <tr>
		<td>Môn Học</td>
		<td><select required name="txtmon">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from monhoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[MH_MA]'>$data[MH_MA]</option>";
		    }
			?>

			</select></td>
	</tr>

    <tr>
		<td>Trình Độ Chuyên Môn</td>
		<td><select required name="txttdcm">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from trinhdochuyenmon";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[TDCM_MA]'>$data[TDCM_MA]</option>";
		    }
			?>

			</select></td>
	</tr>

    
    <tr>
		<td>Tổ Chuyên Môn</td>
		<td><select required name="txttcm">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from tochuyenmon";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[TCM_MA]'>$data[TCM_MA]</option>";
		    }
			?>

			</select></td>
	</tr>

    <tr>
		<td>Tên Giáo Viên:</td>
		<td><input required type="text" name="txtten" size="25" /></td>
	</tr>

    <tr>
		<td>CCCD:</td>
		<td><input required type="text" name="txtcccd" size="25" /></td>
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
		<td>Địa Chỉ:</td>
		<td><input required type="text" name="txtdc" size="25" /> </td>
	</tr>

    <tr>
		<td>SĐT:</td>
		<td><input required type="text" name="txtsdt" size="25" /> </td>
	</tr>

	
    <tr>
		<td>Password Giáo Viên:</td>
		<td><input required type="password" name="txtpass" size="25" placeholder="Trên 6 kí tự"/></td>
	</tr>

    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Giáo Viên" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>