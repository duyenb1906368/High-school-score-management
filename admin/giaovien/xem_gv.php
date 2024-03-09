
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn có chắc muốn xóa giáo viên này không ??')){
            return false;
        }
    }
</script>
<h1 align="center" style="font-family: Tahoma">Quản Lý Giáo Viên</h1>
<h2 align="center"><a href="giaovien/add_gv.php"><button type='button'>Thêm Giáo Viên</button> </a></h2>


<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10">
    <tr style="font-family: Tahoma;color: #0000bf;font-weight: bold">
        <td>STT</td>
        <td>Mã Giáo Viên</td>
        <td>Môn Học</td>
        <td>Trình Độ Chuyên Môn</td>
        <td>Tổ Chuyên Môn</td>
        <td>Tên Giáo Viên</td>
        <td>CCCD</td>
        <td>Giới Tính</td>
        <td>Ngày Sinh</td>
        <td>Địa Chỉ</td>
        <td>SDT</td>
        <td>Password</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>

    <?php
    require '../classes/giaovien.class.php';
    $con = new giaovien();
    $hocsinh = $con->allgv();
    $stt = 0;
    foreach($hocsinh as $row){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[GV_MA]</td>";
        echo "<td>$row[MH_MA]</td>";
        echo "<td>$row[TDCM_MA]</td>";
        echo "<td>$row[TCM_MA]</td>";
        echo "<td>$row[GV_TEN]</td>";
        echo "<td>$row[GV_CCCD]</td>";
        echo "<td>$row[GV_GIOITINH]</td>";
        echo "<td>$row[GV_NGAYSINH]</td>";
        echo "<td>$row[GV_DIACHI]</td>";
        echo "<td>$row[GV_SDT]</td>";
        echo "<td>$row[GV_PASSWORD]</td>";

        echo "<td><a href='giaovien/sua_gv.php?cmagv=$row[GV_MA]'><button type='button'>Sửa</button></a></td>";
        echo "<td><a href='giaovien/xoa_gv.php?cmagv=$row[GV_MA]' onclick='return XacNhan();'><button type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>
</table>