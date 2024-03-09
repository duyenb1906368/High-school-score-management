<?php
session_start();
require '../../classes/giaovien.class.php';
$con = new giaovien();
require '../../includes/config.php';
$ma = $_GET['cmagv'];
$mon = $tdcm = $tcm = $ten = $cccd = $gtinh = $ngaysinh =  $dchi = $sdt = $pass = "";
if(isset($_POST['ok'])){
    if($_POST['txtmon'] == null){
        echo 'Bạn chưa nhập mã môn!!';
    }else{
        $mon = $_POST['txtmon'];
    }

    if($_POST['txttdcm'] == null){
        echo 'Bạn chưa nhập trình độ chuyên môn!!';
    }else{
        $tdcm = $_POST['txttdcm'];
    }

    if($_POST['txttcm'] == null){
        echo 'Bạn chưa nhập tổ chuyên môn!!';
    }else{
        $tcm = $_POST['txttcm'];
    }

    if($_POST['txtten'] == null){
        echo 'Bạn chưa nhập tên!!';
    }else{
        $ten = $_POST['txtten'];
    }

    if($_POST['txtcccd'] == null){
        echo 'Bạn chưa nhập CCCD!!';
    }else{
        $cccd = $_POST['txtcccd'];
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

    if($_POST['txtdc'] == null){
        echo 'Bạn chưa nhập địa chỉ!!';
    }else{
        $dc = $_POST['txtdc'];
    }

    if($_POST['txtsdt'] == null){
        echo 'Bạn chưa nhập số điện thoại!!';
    }else{
        $sdt = $_POST['txtsdt'];
    }
    

    if($_POST['txtpass'] == null){
        echo 'Bạn chưa nhập password!!';
    }else{
        $pass = $_POST['txtpass'];
    }

    if($ma && $mon && $tdcm && $tcm && $ten && $cccd && $gtinh && $ngaysinh && $dc &&  $sdt && $pass){
        

        $hs = $con->edit ($ma, $mon, $tdcm, $tcm, $ten, $cccd, $gtinh, $ngaysinh, $dc, $sdt, $pass);
        
       // $results = mysqli_query($conn, $query);
        header('location:../index.php?mod=gv');
        exit();
    }
}
$row=$con->selectgv($ma);
?>

<center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
<body bgcolor="#CAFFFF">
<h1 style="text-align: center">TRANG SỬA THÔNG TIN GIÁO VIÊN</h1>
<center>
	<a href="../index.php?mod=gv"><button >Trở về</button></a> <br/> <br/>
</center>
<table align="center" border="1" cellspacing="0" cellpadding="10">
<form action="sua_gv.php?cmagv=<?php echo $row['GV_MA']; ?>" method="post">
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
		<td><input required type="text" name="txtten" size="25" value="<?php echo $row['GV_TEN']; ?>" /></td>
	</tr>

    <tr>
		<td>CCCD:</td>
		<td><input required type="text" name="txtcccd" size="25" value="<?php echo $row['GV_CCCD']; ?>"/></td>
	</tr>

    <tr>
		<td>Giới Tính:</td>
		<td><input required type="radio" name="txtgtinh" value="Nam" value="<?php echo $row['GV_GIOITINH']; ?>">Nam
			<input required type="radio" name="txtgtinh" value="Nữ" value="<?php echo $row['GV_GIOITINH']; ?>">Nữ
		</td>
	</tr>

    <tr>
		<td>Ngày Sinh:</td>
		<td><input required type="date" name="txtngaysinh" size="25" value="<?php echo $row['GV_NGAYSINH']; ?>"/> </td>
	</tr>


	<tr>
		<td>Địa Chỉ:</td>
		<td><input required type="text" name="txtdc" size="25" value="<?php echo $row['GV_DIACHI']; ?>"/> </td>
	</tr>

    <tr>
		<td>SĐT:</td>
		<td><input required type="text" name="txtsdt" size="25" value="<?php echo $row['GV_SDT']; ?>"/> </td>
	</tr>

	
    <tr>
		<td>Password Giáo Viên:</td>
		<td><input required type="password" name="txtpass" size="25" value="<?php echo $row['GV_PASSWORD']; ?>"/></td>
	</tr>
	
	    </tr>

			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa" /><br/>
			</td>
		</tr>
</form>
</TABLE>
</body>