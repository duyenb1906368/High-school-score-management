<?php
require "../../classes/db.class.php";
$connect=new db();
$conn=$connect->connect();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Trang Nhập Điểm</title>
    <div class="banner">
        <center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
    </div>
</head>
<body bgcolor="#f0ffff">
<?php

if (isset($_POST['themdiem'])) {
    $ma2 = $_POST['madiem'];
    $ma = $_POST['ma'];
    $lop = $_POST['lop'];
    $mon = $_POST['mon'];
    $hk = $_POST['hk'];
    $nh = $_POST['nh'];
    $mieng = $_POST['diem'];


    $p1 = $_POST['diem1'];
    $p2 = $_POST['diem2'];
    $t1 = $_POST['diem3'];
    $t2 = $_POST['diem4'];
    $d = $_POST['diem5'];
    $tb = $_POST['diem6'];
    $query = "select * from diem";
    $results = mysqli_query($conn, $query);
    for ($i = 0; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
        $sql = "update diem set 
                ID_HK='$hk[$i]',
                ID_NH='$nh[$i]',
                MH_MA='$mon[$i]',
                HS_MA='$ma[$i]',
                LH_MA='$lop[$i]',
                D_MIENG='$mieng[$i]',
                D_15P1='$p1[$i]',
                D_15P2='$p2[$i]',
                D_1T1='$t1[$i]',
                D_1T2='$t2[$i]',
                D_THI='$d[$i]',
                D_THI='$tb[$i]' 
                where D_MA=" .$ma2[$i] ;
        $results1 = mysqli_query($conn, $sql);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Cập Nhật Điểm Thành Công")
            window.location="../qlgv.php?mod=hs";
        </script>
<?php
      
    }
}
?>
<table border="1" cellspacing="0" cellpadding="1">
    <tr style="font-weight: bold">
        <td></td>
        <td>Mã Học Sinh</td>
        <td>Tên Học Sinh</td>
        <td>Lớp</td>
        <td>Môn Học</td>
        <td>Học Kỳ</td>
        <td>Năm Học</td>
        <td>Điểm Miệng</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 1 Tiết</td>
        <td>Điểm 1 Tiết</td>
        <td>Điểm Thi</td>
        <td>Điểm TB</td>
    </tr>
    <?php
    $query="select * from diem,hocsinh WHERE diem.HS_MA=hocsinh.HS_MA";
    $results=mysqli_query($conn, $query);
    ?>
    <form action="capnhatdiem2.php" method="post">
        <hr>
        <div style="text-align:center;margin-left: 400px;border: 2px solid;width:500px;font-weight: bold" >
            <div>Danh Sách Lớp: <?php echo $_POST['day'] ?></div>
            <div> Mã Môn Học: <?php echo $_POST['mon'] ?></div>
            <div> Mã Học Kỳ: <?php echo $_POST['hk'] ?></div>
            <div> Mã Năm Học: <?php echo $_POST['nh'] ?></div>
            <div> Mã Giáo Viên Nhập Điểm: <?php echo $_SESSION['ses_MaGV'] ?></div>
        </div>
        <hr>
        <div>
            <div style="text-align: right;float: left">
                <a href="../qlgv.php"><button type='button'>Trở Về</button></a>
            </div>
            <div style="text-align: right">
                <input type="submit" name="themdiem" value="Thêm Điểm"/>
            </div>
        </div>
        <hr>
        <?php
        for($i=1;$i<=($row=mysqli_fetch_assoc($results));$i++) {
            if ($row['LH_MA'] == $_POST['day'] && $row['MH_MA'] == $_POST['mon'] && $row['ID_HK'] == $_POST['hk'] && $row['ID_NH'] == $_POST['nh'])   {
                echo "<tr>"; ?>
                <td><input style="width:90px" type="hidden" name="madiem[] ?>"
                           value="<?php echo "$row[D_MA]"; ?>" readonly="readonly"/></td>
                <td><input style="width:90px" type="text" name="ma[] ?>"
                           value="<?php echo "$row[HS_MA]"; ?>" readonly="readonly"/></td>
                <td><input style="width:200px" type="text" name="ten[] ?>"
                           value="<?php echo "$row[HS_TEN]"; ?>" readonly="readonly"/></td>
                <td><input style="width:70px" type="text" name="lop[] ?>"
                           value="<?php echo $_POST['day'] ?>" readonly="readonly"/></td>
                <td><input style="width:90px" type="text" name="mon[] ?>"
                           value="<?php echo "$row[MH_MA]" ?>" readonly="readonly"/></td>
                <td><input style="width:100px" type="text" name="hk[]"
                           value="<?php echo "$row[ID_HK]" ?>" readonly="readonly"/></td>
                <td><input style="width:100px" type="text" name="nh[]"
                           value="<?php echo "$row[ID_NH]" ?>" readonly="readonly"/></td>         
                <td><input style="width:100px" type="text" name="diem[]" value="<?php echo "$row[D_MIENG]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem1[]" value="<?php echo "$row[D_15P1]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem2[] ?>" value="<?php echo "$row[D_15P2]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem3[]?>" value="<?php echo "$row[D_1T1]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem4[] ?>" value="<?php echo "$row[D_1T2]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem5[]?>" value="<?php echo "$row[D_THI]" ;?>"/></td>
                <td><input style="width:100px" type="text" name="diem6[] ?>"
                           readonly="readonly"/></td>

                </tr>
                <?php
            }
        }?>
    </form>
</table>
<hr>
</body>