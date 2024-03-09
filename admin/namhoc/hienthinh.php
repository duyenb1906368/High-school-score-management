<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn có chắc muốn xóa năm học này?')){
            return false;
        }
    }
</script>
<h1 align="center" style="font-family: Tahoma; font-weight: bold" >QUẢN LÝ NĂM HỌC</h1>
<h2 align="center"><a href='namhoc/add_nh.php' ><button type="button" >Thêm Năm Học</button></a></h2>
<table align="center" width="1000" border="1px" cellspacing="0" cellpadding="10" >
    <tr style="font-weight: bold; color: #0000bf;">
        <td>STT</td>
        <td>ID Năm Học</td>
        <td>Năm học</td>
   
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php
    require "../classes/namhoc.class.php";
    $connection = new namhoc();
    $con = $connection->allquery();
    $stt=0;
    foreach($con as $row){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[ID_NH]</td>";
        echo "<td>$row[NAMHOC]</td>";
    
        echo "<td><a href='namhoc/sua_nh.php?cmanh=$row[ID_NH]'><button type='button'>Sửa</button></a></td>";
        echo "<td><a href='namhoc/xoa_nh.php?cmanh=$row[ID_NH]' onclick='return XacNhan();' ><button type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>
</table>