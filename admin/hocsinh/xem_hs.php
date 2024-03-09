
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn có chắc muốn xóa học sinh này không ??')){
            return false;
        }
    }
</script>
<h1 align="center" style="font-family: Tahoma">Quản Lý Học Sinh</h1>
<h2 align="center"><a href="hocsinh/add_hs.php"><button type='button'>Thêm Học Sinh</button> </a></h2>


<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10">
    <tr style="font-family: Tahoma;color: #0000bf;font-weight: bold">
        <td>STT</td>
        <td>Mã Học Sinh</td>
        <td>Mã Lớp Học</td>
        <td>Tên Học Sinh</td>
        <td width="50px">Giới tính</td>
        <td>Ngày Sinh</td>
        <td>Nơi Sinh</td>
        <td>Dân Tộc</td>
        <td>Địa Chỉ</td>
        <td>Password</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>

    <?php
    require '../classes/hocsinh.class.php';
    $con = new hocsinh();
    $hocsinh = $con->allhs();
    $stt = 0;
    foreach($hocsinh as $row){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[HS_MA]</td>";
        echo "<td>$row[LH_MA]</td>";
        echo "<td>$row[HS_TEN]</td>";
        echo "<td>$row[HS_GIOITINH]</td>";
        echo "<td>$row[HS_NGAYSINH]</td>";
        echo "<td>$row[HS_NOISINH]</td>";
        echo "<td>$row[HS_DANTOC]</td>";
        echo "<td>$row[HS_DIACHI]</td>";
        echo "<td>$row[HS_PASSWORD]</td>";

        echo "<td><a href='hocsinh/sua_hs.php?cmahs=$row[HS_MA]'><button type='button'>Sửa</button></a></td>";
        echo "<td><a href='hocsinh/xoa_hs.php?cmahs=$row[HS_MA]' onclick='return XacNhan();'><button type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>
</table>
