<?php
session_start();
$a=$_SESSION['ses_MaGV'];
require "../../classes/db.class.php";
$connect=new db();
$conn=$connect->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <div class="banner">
        <center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
    </div>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TRANG CẬP NHẬT ĐIỂM</title>

</head>
<body bgcolor="#CAFFFF">
<?php

?>
<center><h1>TRANG CẬP NHẬT ĐIỂM</h1></center>
<form action="capnhatdiem.php" method="post">
    <div style="text-align:center">
        <select name="day" style="width:100px;height: 25px ">
            <?php
            $query="select * from day";
            $results=mysqli_query($conn,$query);
            while($data=mysqli_fetch_assoc($results)){
                echo "<option value='$data[LH_MA]'>$data[LH_MA]</option>";
                $_SESSION['malop']=$data['LH_MA'];
            }
            ?>
        </select>
        <select name="mon" style="width:100px;height: 25px" >
            <?php
            $query2="select * from giaovien,monhoc where GV_MA=$a";
            $results2=mysqli_query($conn,$query2);
            while($data2=mysqli_fetch_assoc($results2)){
                echo "<option value='$data2[MH_MA]'>$data2[MH_MA]</option>";
                $_SESSION['mamon']=$data2['MH_MA'];
            }
            ?>

        </select>
        <select name="hk" style="width:100px;height: 25px">
            <?php
            $query3="select * from hocky1";
            $results3=mysqli_query($conn,$query3);
            while($data3=mysqli_fetch_assoc($results3)){
                echo "<option value='$data3[id_hk]'>$data3[id_hk]</option>";
                $_SESSION['mahk']=$data3['id_hk'];
            }
            ?>

        </select>

        <select name="nh" style="width:100px;height: 25px">
            <?php
            $query4="select * from namhoc";
            $results4=mysqli_query($conn,$query4);
            while($data4=mysqli_fetch_assoc($results4)){
                echo "<option value='$data4[ID_NH]'>$data4[ID_NH]</option>";
                $_SESSION['manh']=$data4['ID_NH'];
            }
            ?>

        </select>

        <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px"/ ></p>

    </div>
</form>
<?php
$dayhoc=$monhoc=$hk=$nh="";
if(isset($_POST['add'])) {
    $dayhoc = $_POST['day'];
    $monhoc = $_POST['mon'];
    $hk = $_POST['hk'];
    $nh = $_POST['nh'];

    if ($dayhoc && $monhoc && $hk && $nh) {
      
        if (isset($_POST['themdiem'])) {
            
                $ma2 = $_POST['madiem'];
                $ma = $_POST['ma'];
                $lop = $_POST['lop'];
                $mon = $_POST['mon'];
                $hk = $_POST['hk'];
                $nh = $_POST['nh'];
 
         $diem="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
            if(preg_match($diem,$_POST["diem"])) {
         $mieng = $_POST["diem"];
            }else{
          ?>
        <script type="text/javascript">
        alert("Ban Nhap Diem mieng Khong Hop Le!");
        window.location="capnhatdiem.php";
        </script>
        <?php
        exit();
    }
               
        $diem1="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
        if(preg_match($diem1,$_POST["diem1"])) {
            $p1 = $_POST["diem1"];
        }
        else{
        ?>
    <script type="text/javascript">
        alert("Ban Nhap Diem 15 phut lan 1 Khong Hop Le!");
        window.location="capnhatdiem.php";
    </script>
        <?php
        exit();
        }
            
        $p22="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
        if(preg_match($p22,$_POST["diem2"])) {
        $p2 = $_POST["diem2"];
        }
        else{
        ?>
    <script type="text/javascript">
        alert("Ban Nhap Diem 15 phut lan 2 Khong Hop Le!");
        window.location="capnhatdiem.php";
    </script>
        <?php
        exit();
        }
            
        $t11="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
        if(preg_match($t11,$_POST["diem3"])) {
            $t11 = $_POST["diem3$i"];
        }
        else{
        ?>
    <script type="text/javascript">
        alert("Ban Nhap Diem 1 tiet lan 1 Khong Hop Le!");
        window.location="capnhatdiem.php";
     </script>
      <?php
        exit();
        }
              
      $t22="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
      if(preg_match($t22,$_POST["diem4"])) {
          $t2 = $_POST["diem4"];
      }
      else{
      ?>
    <script type="text/javascript">
        alert("Ban Nhap Diem 1 tiet lan 2 Hop Le!");
        window.location="capnhatdiem.php";
    </script>
        <?php
        exit();
        }
             
        $dt="/^[0-1-2-3-4-5-6-7-8-9-10]$/";
        if(preg_match($dt,$_POST["diem5"])) {
            $d = $_POST["diem5"];
        }
        else{

        ?>
    <script type="text/javascript">
        alert("Ban Nhap Diem Thi Khong Hop Le!");
        window.location="capnhatdiem.php";
    </script>

        <?php
        exit();
        }
            $tb = $_POST['diem6'];
            $query = "select * from diem";
            $results = mysqli_query($conn, $query);
            for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
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
                D_TB='$tb[$i]' 
                where D_MA=" .$ma2[$i] ;
                $results1 = mysqli_query($conn, $sql);
                ?>
                <script type="text/javascript">
                    alert("Bạn Đã Cập Nhật Điểm Thành Công")
        </script>
                <?php
                header('location:capnhatdiem2.php');

                
            }
        }
    }
    ?>
    <br/>
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
        $query="select * from diem,hocsinh,monhoc WHERE diem.HS_MA=hocsinh.HS_MA && diem.MH_MA=monhoc.MH_MA";
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
                    <input type="submit" name="themdiem" value="Cập Nhật Điểm"/>
                </div>
            </div>
            <hr>
            <?php
            for($i=1;$i<=($row=mysqli_fetch_assoc($results));$i++) {
                if ($row['LH_MA'] == $_POST['day'] && $row['MH_MA'] == $_POST['mon'] && $row['ID_HK'] == $_POST['hk'] && $row['ID_NH'] == $_POST['nh'])   {
                    echo "<tr>"; ?>
                    <td><input style="width:90px" type="hidden" name="madiem[]"
                               value="<?php echo "$row[D_MA]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:90px" type="text" name="ma[]"
                               value="<?php echo "$row[HS_MA]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:200px" type="text" name="ten[]"
                               value="<?php echo "$row[HS_TEN]"; ?>" readonly="readonly"/></td>
                    <td><input style="width:70px" type="text" name="lop[]"
                               value="<?php echo $_POST['day'] ?>" readonly="readonly"/></td>
                    <td><input style="width:90px" type="text" name="mon[]"
                               value="<?php echo "$row[MH_MA]" ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="hk[]"
                               value="<?php echo "$row[ID_HK]" ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="nh[]"
                               value="<?php echo "$row[ID_NH]" ?>" readonly="readonly"/></td>
                    <td><input style="width:100px" type="text" name="diem[]" value="<?php echo "$row[D_MIENG]" ;?>"/></td>
                    <td><input style="width:100px" type="text" name="diem1[]" value="<?php echo "$row[D_15P1]" ;?>"/></td>
                    <td><input style="width:100px" type="text" name="diem2[]" value="<?php echo "$row[D_15P2]" ;?>"/></td>
                    <td><input style="width:100px" type="text" name="diem3[]" value="<?php echo "$row[D_1T1]" ;?>"/></td>
                    <td><input style="width:100px" type="text" name="diem4[]" value="<?php echo "$row[D_1T2]" ;?>"/></td>
                    <td><input style="width:100px" type="text" name="diem5[]" value="<?php echo "$row[D_THI]" ;?>"/></td>
                    <td><input style="width:100px" type="text" name="diem6[]"
                               readonly="readonly"/></td>

                    </tr>
                    <?php
                }
            }?>
        </form>
    </table>
    <hr>
    <?php
}

?>
</body>