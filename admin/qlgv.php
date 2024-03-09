<div class="banner">
    <center><img src="../img/header.png"  style="height: 250px; width: 1200px" ></center>
    <body>
        <?php
            define('ROOT', dirname(__FILE__));
            include "../includes/function.php";
            session_start();
        ?>

        <body bgcolor="#caffff">
        <?php 
            echo '</br>';
        ?>

        <style type="text/css">
            #menu ul{
                margin-left:137px;
                text-align: center;
            }
        
            #menu ul li{
                display:inline;
            }
            #menu ul a{
                text-decoration:none;
                width: 195px;
                /* height: 40px; */
                /* margin-left: -35px; */
                float:left;
                background:#336699;
                color:#FFFFFF;
                text-align:center;
                line-height:27px;
                /* font-size: 28px; */
                font-weight:bold;
                border-left:1px solid #FFFFFF;
            }

            #menu ul a:hover{
                background:#000000;
            }
        </style>

        <!-- <link rel="styleshett" type="text/css" href="../assets//style.css"> -->

        <div id="menu">
            <ul>
                <li><a href="diem/add_chon2.php">Nhập Điểm Lần Đầu</a></li>
                <li><a href="diem/capnhatdiem.php">Cập Nhật Điểm</a></li>
                <li><a href="qlgv.php?mod=hs">Xem Điểm</a></li>
                <li><a href="repass1.php">Thay Đổi Mật Khẩu</a></li>
                <li><a href="logout.php">Đăng Xuất</a></li>

            </ul>
        </div>
        
        <br><br>

        <div>
		    <p style="font-family:Tahoma;font-weight: bold;text-align: center;font-size: large">CHÀO MỪNG BẠN ĐẾN TRANG QUẢN LÝ CỦA GIÁO VIÊN</p>
	    </div>

        <div style="border: 1px solid #CDCDCD;background-color:#FFFFFF;width: 500px;margin-left: 425px;font-family: Tahoma;font-size:19px;color:#761c19">
            <pre>HƯỚNG DẪN</pre>
            <li>Đối tượng sử dụng: Giáo viên Trường THPT Cầu Kè.</li>
            <li>Để nhập điểm cho học sinh, giáo viên bộ môn cần lưu ý:</li>
            <li>Nhập đúng theo mẫu của Nhà Trường</li>
            <li>Chọn đúng lớp dạy</li>
            <li>Chọn đúng môn học</li>
            <li>Chọn đúng học kỳ đang dạy</li>
            <li>Chọn đúng cột điểm muốn nhập</li>
            <li>Mọi thắc mắc xin liên hệ qua mail của Nhà Trường: thptck@gmail.com</li>

        </div>

        <div class="right">
            <?php
                include "mod_gv.php";
            ?>
        </div>

        <table  border=0 cellpadding=5 cellspacing=0 align="center" width="983">
            <TR>
                <TD>	<tr>
                <td  colspan="2" bgcolor="#336699" align="center" style="color:white" >
                    Copyright &copy; 2022 Trường THPT Cầu Kè <br>
                </td>
            </tr>
            </td>
            </TR>
        </table>
        

    </body>
</div>