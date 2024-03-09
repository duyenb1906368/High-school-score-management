<?php
require '../includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thống kê</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body bgcolor="#CAFFFF">
<br/>
<form>
    <h1 class="h1" style="font-family:Tahoma;text-align: center;" >Danh sách học sinh giỏi qua từng năm</h1>
    <table >
        <tr class= "title" >
            <td class="column1">Năm Học</td>
            <td class="column2">Mã Lớp</td>
            <td class="column3">Học Kỳ</td>
            <td class="column4">Mã HS</td>   
            <td class="column5">Tên HS</td>  
        </tr>
    </table>
    <?php
        require "../classes/diem.class.php";
        $connect=new diem();
        $students=$connect->alldiem();
        $query = "SELECT * FROM diem WHERE D_TB>=8";  
        $results=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($results)) {
            $ID_NH = $row['ID_NH'];
            $query1 = "SELECT NAMHOC FROM NAMHOC WHERE $ID_NH=ID_NH";
            $results1 = mysqli_query($conn, $query1);
        while ($row1 = mysqli_fetch_assoc($results1)) {
            $HS_MA = $row['HS_MA'];
            $query2 = "SELECT HS_TEN FROM hocsinh WHERE $HS_MA=HS_MA";
            $results2 = mysqli_query($conn, $query2);
            while ($row2 = mysqli_fetch_assoc($results2)) {
                $ID_NH = $row['ID_NH'];
                $D_TB = $row['D_TB'];
                $query3 = "select count(D_TB) as num from diem where D_TB >= 8.0 and  ID_NH=$ID_NH ; ";
                $results3 = mysqli_query($conn, $query3);
                while ($row3 = mysqli_fetch_assoc($results3)) {
                ?>          
                <table >
                        <tr class="content">
                                <td class="column1"><?php echo $row1['NAMHOC'] ?></td>
                                <td class="column2"><?php echo $row['LH_MA']; ?></td>
                                <td class="column3"><?php echo $row['ID_HK']; ?></td> 
                                <td class="column4"><?php echo $row['HS_MA']; ?></td>  
                                <td class="column5"><?php echo $row2['HS_TEN']; ?></td>   
                            
                        </tr>  
                </table>
                <?php }}
            }
        }
    ?>
</form>
<form>
    <h1 class="h1" style="font-family:Tahoma;text-align: center;" >Số lượng học sinh giỏi qua từng năm</h1>
    <table class="table" >
        <tr class= "title" >
            <td class="column6">Năm Học</td>
            <td class="column7">Số lượng HSG</td>  
        </tr>
    </table>
    
    <?php
        $connect=new diem();
        $students=$connect->alldiem();
        $query = "SELECT * FROM diem WHERE D_TB>=8";  
        $results=mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($results)) {
        $ID_NH = $row['ID_NH'];
        $query1 = "SELECT NAMHOC FROM NAMHOC WHERE $ID_NH=ID_NH";
        $results1 = mysqli_query($conn, $query1);
        while ($row1 = mysqli_fetch_assoc($results1)) {
            $HS_MA = $row['HS_MA'];
            $query2 = "SELECT HS_TEN FROM hocsinh WHERE $HS_MA=HS_MA";
            $results2 = mysqli_query($conn, $query2);
            while ($row2 = mysqli_fetch_assoc($results2)) {
                $ID_NH = $row['ID_NH'];
                $D_TB = $row['D_TB'];
                $query3 = "select count(D_TB) as num from diem where D_TB >= 8.0 and  ID_NH=$ID_NH ; ";
                $results3 = mysqli_query($conn, $query3);
                while ($row3 = mysqli_fetch_assoc($results3)) {
                 ?>          
                    <table class="table"  >
                            <tr class="content">
                                    <td class="column6"><?php echo $row1['NAMHOC']  ?></td> 
                                    <td class="column7"><?php echo $row3['num'] ?></td>   
                                
                            </tr>  
                    </table>
                <?php
                }
            }
        }
    }
    ?>
    </form>

</table>