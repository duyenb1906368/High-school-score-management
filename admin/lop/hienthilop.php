<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn có chắc muốn xóa lớp học này?')){
            return false;
        }
    }
</script>
<h1 align="center" style="font-family: Tahoma; font-weight: bold" >QUẢN LÝ LỚP HỌC</h1>
<h2 align="center"><a href='lop/add_lop.php' ><button type="button" >Thêm Lớp Học</button></a></h2>
<table align="center" width="1000" border="1px" cellspacing="0" cellpadding="10" >
    <tr style="font-weight: bold; color: #0000bf;">
        <td>STT</td>
        <td>Mã Lớp Học</td>
        <td>Tên Lớp Học</td>
        <td>Khối</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php
    require "../classes/lop.class.php";
    $connection = new lop();
    $con = $connection->alllop();
    $stt=0;
    foreach($con as $row){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[LH_MA]</td>";
        echo "<td>$row[LH_TEN]</td>";
        echo "<td>$row[LH_KHOI]</td>";
     
        
        echo "<td><a href='lop/sua_lop.php?cmalop=$row[LH_MA]'><button type='button'>Sửa</button></a></td>";
        echo "<td><a href='lop/xoa_lop.php?cmalop=$row[LH_MA]' onclick='return XacNhan();' ><button type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>
</table>