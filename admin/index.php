<?php
    define('ROOT', dirname(__FILE__) );
    include "../includes/function.php";
    session_start();
    // if($_SESSION['ses_level']!=1) {
    //     header("location:login_admin.php");
    // }
?>

<div class="banner">
    <center> <img src="../img/header.png"; style="height: 250px; width: 1200px" > </center>
    <body bgcolor="#caffff">
        <style type = "text/css">
            #menu ul{
                margin-left: -5px;
            }

            #menu ul li{
                color: #f1f1f1;
                display: inline-block;
                width: 144px;
                height: 40px;
                line-height: 40px;
                margin-left: -5px;
                text-align: center;
                font-weight: bold;
            }

            #menu ul a{
                text-decoration: none;
                width: 149px;
                float: left;
                background: #336699;
                color: #ffffff;
                text-align: center;
                line-height: 30px;
                font-weight: bold;
                border-left: 1px solid #ffffff;
            }

            #menu ul a:hover{
                background: #000000;
            }
        </style>
    </body>
</div>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="menu">
    <p style="font-family: Tahoma; font-weight: bold; text-align: center; font-size: large">
        CHÀO MỪNG BẠN ĐẾN TRANG QUẢN TRỊ 
    </p>

    <p style="font-family: Tahoma; font-weight: bold; text-align: center; font-size: large">
        TRƯỜNG THPT CẦU KÈ
    </p>

    <ul>
        <li><a href="index.php?mod=hs">Quản Lý Học Sinh</a></li>
        <li><a href="index.php?mod=gv">Quản Lý Giáo Viên</a></li>
        <li><a href="index.php?mod=mh">Quản Lý Môn Học</a></li>
        <li><a href="index.php?mod=diem">Quản Lý Điểm</a></li>
        <li><a href="index.php?mod=hk">Quản Lý Học Kỳ</a></li>
        <li><a href="index.php?mod=namhoc">Quản Lý Năm Học</a></li>
        <li><a href="index.php?mod=lop">Quản Lý Lớp</a></li>
        <li><a href="index.php?mod=day">Lịch Dạy</a></li>
        <li><a href="index.php?mod=thongke">Thống Kê</a></li>
        <li><a href="index.php?mod=dangxuat">Đăng Xuất</a></li>  
    </ul>
</div>

<div class="right">
    <?php include"mod.php"; ?>
</div>

<table border=0 cellpadding5 cellspacing=0 align="center" width="1300">
    <tr>
        <td>
            <tr>
                <td colspan="2" bgcolor="#336699" align="center" style="color:white; height: 30px;">
                    Copyright &copy; 2022 Trường THPT Cầu Kè <br>

                </td>
            </tr>
        </td>
    </tr>

</table>