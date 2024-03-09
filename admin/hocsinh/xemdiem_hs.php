<div class="banner">
        <center><img src="../../img/header.png" style="height: 250px; width: 1200px"></center>
    </div>
<br/>

<div style="text-align:right;margin-right:186px;font-weight: bold ">
<?php
session_start();
echo "Chào Bạn  " .$_SESSION['ses_MaHS'];
?>
</div>

<style type="text/css">
    #menu ul{
        margin-left:145px;
    }
    #menu ul li{
        display:inline;

    }
    #menu ul a{
        text-decoration:none;
        width:245px;
        float:left;
        background:#336699;
        color:#FFFFFF;
        text-align:center;
        line-height: 27px;
        font-weight:bold;
        border-left:1px solid #FFFFFF;
    }

    #menu ul a:hover{
        background:#000000;
    }
</style>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="menu" >

    <ul>

        <li><a href="xemdiem_hs.php">Tra Cứu Điểm</a></li>
        <li><a href="hocsinh_xemthongtin.php">Thông Tin Học Sinh</a></li>
        <li><a href="../repass2.php">Thay Đổi Mật Khẩu</a></li>
        <li><a href="../logout.php">Đăng Xuất</a></li>

    </ul>
</div>

<?php
require "../../classes/diem.class.php";
$connect=new diem();
$students=$connect->alldiem();
// $dis=$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Học sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#CAFFFF">
<br/>
<h1 class="h1" style="font-family:Tahoma;text-align: center;" >Điểm Học Sinh</h1>
<center><form action="xemdiem_hs.php" method="post">
<select name="hk" style="width:100px;height: 25px ">
    <?php
    require '../../includes/config.php';
    $query="select * from hocky1";
    $results=mysqli_query($conn,$query);
    while($data=mysqli_fetch_assoc($results)){
        echo "<option value='$data[hocky]'>$data[hocky]</option>";
    }
    ?>

</select>

<select name="nh" style="width:100px;height: 25px ">
    <?php
    require '../../includes/config.php';
    $query="select * from namhoc";
    $results=mysqli_query($conn,$query);
    while($data=mysqli_fetch_assoc($results)){
        echo "<option value='$data[NAMHOC]'>$data[NAMHOC]</option>";
    }
    ?>

</select>

    <input type="submit" name="ok" value="XEM" />
    </form></center>
<?php
    if(isset($_POST['ok']))
{
?>
<table width="73%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
    <tr class="diem" style="font-weight: bold;color: #0A246A">
        <td>Học Kỳ</td>
        <td>Môn Học</td>
        <td>Điểm Miệng</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 1 tiết</td>
        <td>Điểm 1 tiết</td>
        <td>Điểm Thi</td>
        <td>Điểm TB môn</td>
    </tr>
    <?php
    foreach ($students as $item) {
        if ($_SESSION['ses_MaHS'] == $item['HS_MA']) {
            if ($_POST['hk'] == $item['hocky']) {
                ?>
                <tr>
                <td><?php echo $item['hocky']; ?></td>
                <td><?php echo $item['MH_TEN']; ?></td>
                <td><?php echo $item['D_MIENG']; ?></td>
                <td><?php echo $item['D_15P1']; ?></td>
                <td><?php echo $item['D_15P2']; ?></td>
                <td><?php echo $item['D_1T1']; ?></td>
                <td><?php echo $item['D_1T2']; ?></td>
                <td><?php echo $item['D_THI']; ?></td>
                <?php
                $tinh = 0;
                $tinh = ($item['D_MIENG'] + $item['D_15P1'] + $item['D_15P2'] + ($item['D_1T1'] + $item['D_1T2']) * 2 + $item['D_THI'] * 3) / 10;
                $item['D_TB'] = $tinh;
                ?>
                <?php if ($item['D_MIENG'] != null || $item['D_15P1'] != null || $item['D_15P2'] != null || $item['D_1T1'] != null ||
                    $item['D_1T2'] != null
                ) {
                    ?>
                    <td><?php echo round($item['D_TB'],1); ?></td>
                    </tr>
                    <?php
                }
            }
        }
    }
    }
    ?>
</table>


<table  border=0 cellpadding=5 cellspacing=0 align="center" width="983">
    <tr>
        <td>	<tr>
        <td  colspan="2" bgcolor="#336699" align="center" style="color:white" >
            Copyright &copy; 2022 Trường THPT Cầu Kè <br>
        </td>
    </tr>
    </td>
    </tr>
</table>
</body>
</html>