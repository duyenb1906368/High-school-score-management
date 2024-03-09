<?php
require "../classes/day.class.php";
$con=new day();
$day=$con->allday();
?>
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn Có Chắc Muốn Xóa Lịch Dạy Của Giáo Viên Này Không!!!')){
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>
<head>
    <title>Lịch Dạy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1 align="center"style="font-family:Tahoma;font-weight: bold">Lịch Phân Công Dạy</h1>
<h3 align="center"><a href="day/themday.php"><button>Thêm Lịch Dạy</button></a></h3>
<table align="center" border="1" cellspacing="0" cellpadding="10">
    <tr style="font-weight: bold">
        <td>Mã Lịch Dạy</td>
        <td>Mã Môn Học</td>
        <td>Mã Giáo Viên</td>
        <td>Mã Lớp Học</td>
        <td>Học Kỳ</td>
        <td>Năm Học</td>
        <td>Mô tả</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php foreach ($day as $item){ ?>
        <tr>
            <td><?php echo $item['DAY_MA']; ?></td>
            <td><?php echo $item['MH_MA']; ?></td>
            <td><?php echo $item['GV_MA']; ?></td>
            <td><?php echo $item['LH_MA']; ?></td>
            <td><?php echo $item['ID_HK']; ?></td>
            <td><?php echo $item['ID_NH']; ?></td>
            <td><?php echo $item['MOTAPHANCONG']; ?></td>
            <td><?php echo "<a href='day/suaday.php?cma=$item[DAY_MA]'><button type='button'>Sửa</button></a>"; ?></td>
            <td> <?php echo "<a href='day/xoaday.php?cma=$item[DAY_MA]' onclick='return XacNhan();'><button type='button'>Xóa</button></a>"; ?>
            </td>
        </tr>
    <?php } ?>
    <br/>
</table>