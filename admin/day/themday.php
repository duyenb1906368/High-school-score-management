<?php
session_start();
$ma=$mon=$gv=$lop=$hk=$nh=$mt="";	
require  '../../classes/day.class.php';
$con = new day();
if(isset($_POST['ok'])){
	$ma=$_POST['txtma'];
	$mon=$_POST['txtmon'];
	$gv=$_POST['txtgv'];
	$lop=$_POST['txtlop'];
	$hk=$_POST['txthk'];
	$nh=$_POST['txtnh'];
    $mt=$_POST['txtmt'];


	$day = $con->add($ma, $mon, $gv, $lop, $hk, $nh, $mt);
	header('location:../index.php?mod=day');
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
	<h1 align="center">Trang Phân Công Lịch Dạy</h1>

<center>
	<a href="../index.php?mod=day"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="themday.php" method="post" >
	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Dạy:</td>
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
            <td>Mã Giáo Viên:</td>
            <td><select name="txtgv">
                    <?php
                    $db=new DB();
                    $conn=$db->connect();
                    $query="select * from giaovien";
                    $results = mysqli_query($conn,$query);
                    while ($data = mysqli_fetch_assoc($results)) {
                        echo "<option value='$data[GV_MA]'>$data[GV_MA]</option>";
                    }
                    ?>
                </select></td>
    </tr>

    <tr>
		<td>Lớp:</td>
		<td><select required name="txtlop">

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
		<td>Học Kỳ</td>
		<td><select required name="txthk">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from hocky1";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[id_hk]'>$data[id_hk]</option>";
		    }
			?>

			</select></td>
	</tr>

    <tr>
		<td>Năm Học:</td>
		<td><select required name="txtnh">

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
            <td>Mô Tả:</td>
            <td><input type="text" name="txtmt" size="25" /></td>
    </tr>

    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Lịch Dạy" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>