<?php
session_start();
require "../../classes/lop.class.php";
$connect=new lop();
require '../../includes/config.php';
$ten = $khoi = "";
$ma=$_GET['cmalop'];

if(isset($_POST['ok'])){
    
    if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Tên Lớp Học!!";
	}else{
		$ten=$_POST['txtten'];
	}

	if($_POST['txtkhoi'] == null){
		echo "Bạn Chưa Nhập Khối!!";
	}else{
		$khoi=$_POST['txtkhoi'];
	}

 

	if($ma && $ten && $khoi){
	    
	    $con=$connect->sualop($ma, $ten, $khoi);
		header("location:../index.php?mod=lop");
		exit();
	}
}
$conn=$connect->selectlop($ma);
?>
<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">Trang Sửa Lớp Học</h1>
<form action="sua_lop.php?cmalop=<?php echo $conn['LH_MA'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">

		<tr>
			<td>Tên Lớp Học:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $conn['LH_TEN']; ?>"/></td>
		</tr>

        <tr>
			<td>Khối:</td>
			<td><input type="text" name="txtkhoi" size="25" value="<?php echo $conn['LH_KHOI']; ?>"/></td>
		</tr>
        
       

        <tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa Lớp Học" /><br/>
			</td>
		</tr>
</table>
</form>
</body>