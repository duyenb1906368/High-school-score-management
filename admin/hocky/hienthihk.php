<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn có chắc muốn xóa học kỳ này?')){
            return false;
        }
    }
</script>
<h1 align="center" style="font-family: Tahoma; font-weight: bold" >QUẢN LÝ HỌC KỲ</h1>
<h2 align="center"><a href='hocky/add_hk.php' ><button type="button" >Thêm Học Kỳ</button></a></h2>
<table align="center" width="1000" border="1px" cellspacing="0" cellpadding="10" >
    <tr style="font-weight: bold; color: #0000bf;">
        <td>STT</td>
        <td>Năm học</td>
        <td>ID Học Kỳ</td>
        <td>Học Kỳ</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php
    require "../classes/hocki.class.php";
    $connection = new hocki();
    $con = $connection->allquery();
    $stt=0;
    foreach($con as $row){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[id_nh]</td>";
        echo "<td>$row[id_hk]</td>";
        echo "<td>$row[hocky]</td>";
        echo "<td><a href='hocky/sua_hk.php?cmahk=$row[id_hk]'><button type='button'>Sửa</button></a></td>";
        echo "<td><a href='hocky/xoa_hk.php?cmahk=$row[id_hk]' onclick='return XacNhan();' ><button type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>
</table>