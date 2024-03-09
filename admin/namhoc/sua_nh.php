<?php
session_start();
require "../../classes/namhoc.class.php";
$connect=new namhoc();
require '../../includes/config.php';
$nh="";
$manh=$_GET['cmanh'];
//$id = $_POST['id'];
if(isset($_POST['ok'])){

	if($_POST['txtnamhoc'] == null){
		echo "Bạn Chưa Nhập Năm Học!!";
	}else{
		$nh=$_POST['txtnamhoc'];
	}
	if($nh && $manh){
	    
	    $con=$connect->edit($nh, $manh);
		header("location:../index.php?mod=namhoc");
		exit();
	}
}
$conn=$connect->selectquery($manh);
?>
<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">Trang Sửa Năm Học</h1>
<form action="sua_nh.php?cmanh=<?php echo $conn['ID_NH'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">

		<tr>
			<td>Năm Học:</td>
			<td><input required type="text" name="txtnamhoc" size="25" value="<?php echo $conn['NAMHOC']; ?>"/></td>
		</tr>

        <tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa Năm Học" /><br/>
			</td>
		</tr>
</table>
</form>
</body>