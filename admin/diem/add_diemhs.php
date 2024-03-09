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
    if(isset($_POST['themdiem']))
    {
            $query = "select * from hocsinh";
            $results = mysqli_query($conn, $query);
            for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
           
                $ma = $_POST["ma$i"];
                $hk = $_POST["hk$i"];
                $nh = $_POST["nh$i"];
                $lop = $_POST["lop$i"];
                $mon = $_POST["mon$i"];
              
                $mieng = $_POST["diem$i"];
                $p1 = $_POST["diem1$i"];
                $p2 = $_POST["diem2$i"];
                $t1 = $_POST["diem3$i"];
                $t2 = $_POST["diem4$i"];
                $thi = $_POST["diem5$i"];
                $tb=$_POST["diem6$i"];
                $sql = "insert into diem(HS_MA,ID_HK,ID_NH,LH_MA,MH_MA,D_MIENG,D_15P1,D_15P2,D_1T1,D_1T2,D_THI, D_TB )
                    values('" . $ma . "','" . $hk . "','" . $nh . "','" . $lop . "','" . $mon . "', '".$mieng."','" . $p1 . "','" . $p2 . "','" . $t1 . "','" . $t2 . "','" . $thi . "','" . $tb . "')";
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
<br/>
    <center><h1>Trang Nhập Điểm</h1></center>
    <table border="1" cellspacing="0" cellpadding="1">
        <tr style="font-weight: bold">
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
    $query="select * from hocsinh";
    $results=mysqli_query($conn, $query);
?>
        <form action="add_diemhs.php " method="post">
            <hr>
            <div style="text-align:center;margin-left: 400px;border: 2px solid;width:500px;font-weight: bold" >
                <div>Danh Sách Lớp: <?php echo $_SESSION['malop'] ?></div>
                <div> Mã Môn Học: <?php echo $_SESSION['mamon'] ?></div>
                <div> Mã Học Kỳ: <?php echo $_SESSION['mahk'] ?></div>
                <div> Mã Giáo Viên Nhập Điểm: <?php echo $_SESSION['ses_Magv'] ?></div>
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
                if ($row['LH_MA'] == $_SESSION['malop']) {
                    echo "<tr>"; ?>
                    <td><input style="width:90px" type="text" name="ma<?php echo $i; ?>"
                               value="<?php echo "$row[HS_MA]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:200px" type="text" name="ten<?php echo $i; ?>"
                               value="<?php echo "$row[HS_TEN]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:70px" type="text" name="lop<?php echo $i; ?>"
                               value="<?php echo $_SESSION['malop'] ?>" readonly="readonly"/></td>
                    <td><input style="width:90px" type="text" name="mon<?php echo $i; ?>"
                               value="<?php echo $_SESSION['mamon'] ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="hk<?php echo $i; ?>"
                               value="<?php echo $_SESSION['mahk'] ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="nh<?php echo $i; ?>"
                               value="<?php echo $_SESSION['manh'] ?>" readonly="readonly"/></td>
                            <td><input style="width:100px" type="text" name="diem<?php echo $i; ?>"/></td>
                            <td><input style="width:100px" type="text" name="diem1<?php echo $i; ?>"/></td>
                            <td><input style="width:100px" type="text" name="diem2<?php echo $i; ?>"/></td>
                            <td><input style="width:100px" type="text" name="diem3<?php echo $i; ?>"/></td>
                            <td><input style="width:100px" type="text" name="diem4<?php echo $i; ?>"/></td>
                            <td><input style="width:100px" type="text" name="diem5<?php echo $i; ?>"/></td>
                            <td><input style="width:100px" type="text" name="diem6<?php echo $i; ?>"
                                       readonly="readonly"/></td>

                            </tr>
                            <?php
                        }
            }?>
        </form>
    </table>
<hr>
</body>