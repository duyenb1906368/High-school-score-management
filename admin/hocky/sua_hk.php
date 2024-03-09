<?php
session_start();
require "../../classes/hocki.class.php";
$connect=new hocki();
require '../../includes/config.php';
$hk=$idnh="";
$idhk=$_GET['cmahk'];

if(isset($_POST['ok'])){
    
    if($_POST['txthocky'] == null){
		echo "Bạn Chưa Nhập Học Kỳ!!";
	}else{
		$hk=$_POST['txthocky'];
	}
	if($_POST['txtnamhoc'] == null){
		echo "Bạn Chưa Nhập Năm Học!!";
	}else{
		$idnh=$_POST['txtnamhoc'];
	}
	if($idnh && $idhk && $hk){
	    
	    $con=$connect->edit($idnh, $idhk, $hk);
		header("location:../index.php?mod=hk");
		exit();
	}
}
$conn=$connect->selectquery($idhk);
?>
<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">Trang Sửa Học Kỳ</h1>
<form action="sua_hk.php?cmahk=<?php echo $conn['id_hk'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">

		<tr>
			<td>Năm Học:</td>
			<td><input type="text" name="txtnamhoc" size="25" value="<?php echo $conn['id_nh']; ?>"/></td>
		</tr>

        <tr>
			<td>Học Kỳ:</td>
			<td><input type="text" name="txthocky" size="25" value="<?php echo $conn['hocky']; ?>"/></td>

			
		</tr>

		


        <tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa Học Kỳ" /><br/>
			</td>
		</tr>
</table>
</form>
</body>