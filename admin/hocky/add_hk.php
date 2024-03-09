<?php
session_start();
$idnh=$idhk=$hk="";	
require  '../../classes/hocki.class.php';
$con = new hocki();

if(isset($_POST['ok'])){
	$idnh=$_POST['txtidnh'];
	$idhk=$_POST['txtidhk'];
	$hk=$_POST['txthk'];
// echo $idnh;
// echo $idhk;
// echo $hk;


	$hs = $con->add($idnh, $idhk, $hk);
	header('location:../index.php?mod=hk');
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
	<h1 align="center">Trang Thêm Học Kỳ</h1>

<center>
	<a href="../index.php?mod=hk"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="add_hk.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">

	
    <tr>
		<td>Mã Năm Học</td>
		<td><select required name="txtidnh">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from namhoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[ID_NH]'>$data[ID_NH]</option>";
		    }
			?>

			</select></td>
	</tr>

  

    <tr>
		<td>Mã Học Kỳ:</td>
		<td><input required type="text" name="txtidhk" size="25" placeholder="Nhập số nguyên từ 0-9"/></td>
	</tr>

    <tr>
		<td>Học Kỳ:</td>
		<td><input required type="text" name="txthk" size="25" placeholder="Nhập 1 hoặc 2"/></td>
	</tr>


    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Học Kỳ" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>



