<div class="banner">
<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../../img/header.png" style="height: 250px; width: 1200px"></center>
</div>

<br/>
<div style="text-align:right; margin-right:186px; font-weight: bold">
<?php
session_start();
echo "Chào Bạn " .$_SESSION['ses_MaHS'];
?>
    </div>
<style type="text/css">
    #menu ul{
        margin-left:143px;
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
        line-height:27px;
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

        <li><a href="xemdiem_hs.php">Xem Điểm</a></li>
        <li><a href="hocsinh_xemthongtin.php">Thông Tin Học Sinh</a></li>
        <li><a href="../repass2.php">Thay Đổi Mật Khẩu</a></li>
        <li><a href="../logout.php">Đăng Xuất</a></li>

    </ul>
</div>
<?php
require "../../classes/hocsinh.class.php";
$connect=new hocsinh();
$students=$connect->allhs();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách học sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: rgb(204, 223, 239);">
<br/>
<h1 style="font-family:Tahoma;text-align: center;">Thông Tin Học Sinh</h1>
<table width="74%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
    <tr style="font-weight: bold;color: #0A246A">
        <td>Mã Học Sinh</td>
        <td>Mã Lớp</td>
        <td>Tên Học Sinh</td>
        <td>Giới Tính</td>
        <td>Ngày Sinh</td>
        <td>Nơi Sinh</td>
        <td>Dân Tộc</td>
        <td>Địa Chỉ</td>
        
    </tr>

    <?php
    foreach ($students as $item) {
        if ($_SESSION['ses_MaHS'] == $item['HS_MA'])
        {
        ?>
        <tr>
            <td><?php echo $item['HS_MA']; ?></td>
            <td><?php echo $item['HS_TEN']; ?></td>
            <td><?php echo $item['LH_MA']; ?></td>
            <td><?php echo $item['HS_GIOITINH']; ?></td>
            <td><?php echo $item['HS_NGAYSINH']; ?></td>
            <td><?php echo $item['HS_NOISINH']; ?></td>
            <td><?php echo $item['HS_DANTOC']; ?></td>
            <td><?php echo $item['HS_DIACHI']; ?></td>
          
            <?php }

                ?>
        </tr>
    <?php }
    ?>
</table>

<table border=0 cellpadding=4 cellspacing=0 align="center" width="1300">
            <tr>
                <td>
            <tr>
                <td colspan="2" bgcolor="#336699" align="center" style="color:white; height: 30px">
                    Copyright &copy; 2022 THPT Cầu Kè<br>
                </td>
            </tr>
            </td>
        </tr>
        </table>
</body>
</html>