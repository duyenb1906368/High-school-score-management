<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn có chắc muốn xóa môn học này?')){
            return false;
        }
    }
</script>
<h1 align="center" style="font-family: Tahoma; font-weight: bold" >QUẢN LÝ MÔN HỌC</h1>
<h2 align="center"><a href='monhoc/add_mon.php' ><button type="button" >Thêm Môn Học</button></a></h2>
<table align="center" width="1000" border="1px" cellspacing="0" cellpadding="10" >
    <tr style="font-weight: bold; color: #0000bf;">
        <td>STT</td>
        <td>Mã Môn Học</td>
        <td>Tên Môn Học</td>
        <td>Số Tiết</td>
        <td>Hệ Số</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php
    require "../classes/monhoc.class.php";
    $connection = new monhoc();
    $con = $connection->allquery();
    $stt=0;
    foreach($con as $row){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[MH_MA]</td>";
        echo "<td>$row[MH_TEN]</td>";
        echo "<td>$row[MH_SOTIET]</td>";
        echo "<td>$row[MH_HESO]</td>";
        
        echo "<td><a href='monhoc/sua_mon.php?cmamh=$row[MH_MA]'><button type='button'>Sửa</button></a></td>";
        echo "<td><a href='monhoc/xoa_mon.php?cmamh=$row[MH_MA]' onclick='return XacNhan();' ><button type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>
</table>