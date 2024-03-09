<?php
session_start();
require '../../classes/hocsinh.class.php';
$con = new hocsinh();
require '../../includes/config.php';
$mahs = $_GET['cmahs'];
$malop = $ten = $gtinh = $ngaysinh = $noisinh = $dtoc = $dchi = $pass = "";
if(isset($_POST['ok'])){
    if($_POST['txtmalop'] == null){
        echo 'Bạn chưa nhập mã lớp!!';
    }else{
        $malop = $_POST['txtmalop'];
    }

    if($_POST['txtten'] == null){
        echo 'Bạn chưa nhập tên!!';
    }else{
        $ten = $_POST['txtten'];
    }

    if($_POST['txtgtinh'] == null){
        echo 'Bạn chưa nhập giới tính!!';
    }else{
        $gtinh = $_POST['txtgtinh'];
    }

    if($_POST['txtngaysinh'] == null){
        echo 'Bạn chưa nhập ngày sinh!!';
    }else{
        $ngaysinh = $_POST['txtngaysinh'];
    }

    if($_POST['txtnoisinh'] == null){
        echo 'Bạn chưa nhập nơi sinh!!';
    }else{
        $noisinh = $_POST['txtnoisinh'];
    }

    if($_POST['txtdt'] == null){
        echo 'Bạn chưa nhập dân tộc!!';
    }else{
        $dtoc = $_POST['txtdt'];
    }
    
    if($_POST['txtdc'] == null){
        echo 'Bạn chưa nhập địa chỉ!!';
    }else{
        $dchi = $_POST['txtdc'];
    }

    if($_POST['txtpass'] == null){
        echo 'Bạn chưa nhập password!!';
    }else{
        $pass = $_POST['txtpass'];
    }

    if($mahs && $malop && $ten && $gtinh && $ngaysinh && $noisinh && $dtoc && $dchi && $pass){
        // $query = "update hocsinh set LH_MA='$malop', HS_TEN='$ten', HS_GIOITINH='$gtinh',
        //     HS_NGAYSINH='$ngaysinh',  HS_NOISINH='$noisinh', HS_DANTOC='$dtoc', HS_DIACHI='$dchi',
        //     PASSWORD='$pass' where HS_MA='$mahs'";

        $hs = $con->edit($mahs, $malop, $ten, $gtinh, $ngaysinh, $noisinh, $dtoc, $dchi, $pass);
        
       // $results = mysqli_query($conn, $query);
        header('location:../index.php?mod=hs');
        exit();
    }
}
$row=$con->selecths($mahs);
?>

<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
<body bgcolor="#CAFFFF">
<h1 style="text-align: center">TRANG SỬA THÔNG TIN HỌC SINH</h1>
<center>
	<a href="../index.php?mod=hs"><button >Trở về</button></a> <br/> <br/>
</center>
<table align="center" border="1" cellspacing="0" cellpadding="10">
<form action="sua_hs.php?cmahs=<?php echo $row['HS_MA']; ?>" method="post">
	<tr>
		<td>Mã Lớp Học:</td>
			<td><input type="text" name="txtmalop" size="25" value="<?php echo $row['LH_MA']; ?>" /></td>
		</tr>

		<tr>
		<td>Tên Học Sinh:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $row['HS_TEN']; ?>" /></td>
		</tr>
		<tr>
			<td>Giới Tính:</td>
			<td><input type="radio" name="txtgtinh" value="Nam" value="<?php echo $row['HS_GIOITINH']; ?>">Nam
			    <input type="radio" name="txtgtinh" value="Nữ" value="<?php echo $row['HS_GIOITINH']; ?>">Nữ 
			</td>
		</tr>
		<tr>
			<td>Ngày Sinh:</td>
			<td><input type="date" name="txtngaysinh" size="25" value="<?php echo $row['HS_NGAYSINH']; ?>" /> </td>
		</tr>
		<tr>
			<td>Nơi Sinh:</td>
			<td><input type="text" name="txtnoisinh" size="25" value="<?php echo $row['HS_NOISINH']; ?>"/> </td>
		</tr>
		<tr>
			<td>Dân Tộc:</td>
			<td><input type="text" name="txtdt" size="25" value="<?php echo $row['HS_DANTOC']; ?>"/> </td>
		</tr>
		<tr>
			<td>Địa Chỉ:</td>
			<td><input type="text" name="txtdc" size="25" value="<?php echo $row['HS_DIACHI']; ?>"/> </td>
		</tr>
		
        <tr>
			<td>Password Học Sinh:</td>
			<td><input type="password" name="txtpass" size="25" value="<?php echo $row['HS_PASSWORD']; ?>" /></td>
		</tr>
	
	    </tr>

			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa" /><br/>
			</td>
		</tr>
</form>
</TABLE>
</body>
