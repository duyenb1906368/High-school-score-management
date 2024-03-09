
<?php
require '../includes/config.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">

<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Điểm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body bgcolor="#CAFFFF">
<br/>
<h1 class="h1" style="font-family:Tahoma;text-align: center;" >Điểm Học Sinh</h1>
<h2 align="center">
    <form action="qlgv.php?mod=hs" method="post">
        <div style="text-align:center">
            <?php
            ?>
            <select name="hk" style="width:100px;height: 25px ">
                <?php
                $query="select distinct id_hk from hocky1";
                $results=mysqli_query($conn,$query);
                while($data=mysqli_fetch_assoc($results)){
                    echo "<option value='$data[id_hk]'>$data[id_hk]</option>";
                }
                ?>
            </select>

            <select name="nh" style="width:100px;height: 25px ">
                <?php
                $query1="select distinct ID_NH from namhoc";
                $results1=mysqli_query($conn,$query1);
                while($data1=mysqli_fetch_assoc($results1)){
                    echo "<option value='$data1[ID_NH]'>$data1[ID_NH]</option>";
                }
                ?>
            </select>

            <select name="lop" style="width:100px;height: 25px" >
                <?php
                $query2="select * from lophoc";
                $results2=mysqli_query($conn,$query2);
                while($data2=mysqli_fetch_assoc($results2)){
                    echo "<option value='$data2[LH_MA]'>$data2[LH_MA]</option>";
                }
                ?>

            </select>
            <select name="mon" style="width:100px;height: 25px">
                <?php
                $query3="select * from monhoc";
                $results3=mysqli_query($conn,$query3);
                while($data3=mysqli_fetch_assoc($results3)){
                    echo "<option value='$data3[MH_MA]'>$data3[MH_MA]</option>";
                }
                ?>

            </select>
            <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px"/ ></p>

        </div>
    </form>
    <form action="xemdiem_gv.php" method="post">
        </form>
</h2>
<table width="75%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
    <tr class="diem" style="font-weight: bold;color: #0A246A">
        <td>Mã Học Sinh</td>
        <td style="width:200px">Tên Học Sinh</td>
        <td>Mã Lớp</td>
        <td>Học Kỳ</td>
        <td>Năm Học</td>
        <td>Mã Môn Học</td>
        <td>Điểm Miệng</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 15 phút</td>
        <td>Điểm 1 tiết</td>
        <td>Điểm 1 tiết</td>
        <td>Điểm Thi</td>
        <td>Điểm TB môn</td>
        
    </tr>
    <?php
    ?>
    <?php
    require "../classes/diem.class.php";
    $connect=new diem();
    $students=$connect->alldiem();
    if(isset($_POST['add'])) {
        foreach ($students as $item) {
            if($_POST['hk']==$item['id_hk'] && $_POST['nh']==$item['ID_NH'] && $_POST['lop']==$item['LH_MA'] && $_POST['mon']==$item['MH_MA']) {
                ?>
                <tr>
                    <td><?php echo $item['HS_MA']; ?></td>
                    <td><?php echo $item['HS_TEN']; ?></td>
                    <td><?php echo $item['LH_MA']; ?></td>
                    <td><?php echo $item['id_hk']; ?></td>
                    <td><?php echo $item['ID_NH']; ?></td>
                    <td><?php echo $item['MH_MA']; ?></td>
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
                    <td><?php echo round($item['D_TB'], 1); ?></td>

                </tr>
                <?php
            }
        }
    }
    //disconnect_db();
     ?>
</table>

</body>
</html>