<?php
session_start();
require "../../classes/monhoc.class.php";
$connect=new monhoc();
require '../../includes/config.php';
$ten = $sotiet = $heso = "";
$ma=$_GET['cmamh'];

if(isset($_POST['ok'])){
    
    if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Tên Môn Học!!";
	}else{
		$ten=$_POST['txtten'];
	}

	if($_POST['txtsotiet'] == null){
		echo "Bạn Chưa Nhập Số Tiết!!";
	}else{
		$sotiet=$_POST['txtsotiet'];
	}

    if($_POST['txtheso'] == null){
        echo "Bạn Chưa Nhập Hệ Số!!";
    }else{
        $heso=$_POST['txtheso'];
    }

	if($ma && $ten && $sotiet && $heso){
	    
	    $con=$connect->edit($ma, $ten, $sotiet, $heso);
		header("location:../index.php?mod=mh");
		exit();
	}
}
$conn=$connect->selectquery($ma);
?>
<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">Trang Sửa Môn Học</h1>
<form action="sua_mon.php?cmamh=<?php echo $conn['MH_MA'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">

		<tr>
			<td>Tên Môn Học:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $conn['MH_TEN']; ?>"/></td>
		</tr>

        <tr>
			<td>Số Tiết:</td>
			<td><input type="text" name="txtsotiet" size="25" value="<?php echo $conn['MH_SOTIET']; ?>"/></td>
		</tr>
        
        <tr>
			<td>Hệ Số:</td>
			<td><input type="text" name="txtheso" size="25" value="<?php echo $conn['MH_HESO']; ?>"/></td>
		</tr>

        <tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa Môn Học" /><br/>
			</td>
		</tr>
</table>
</form>
</body>