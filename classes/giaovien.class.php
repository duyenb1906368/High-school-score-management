<?php
require 'db.class.php';
class giaovien extends DB{
    function allgv(){
        $con = $this->connect();
        $sql = "select * from giaovien";
        $query = mysqli_query($con, $sql);
        $result = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        return $result;
    }

    function selectgv($id){
        $con = $this->connect();
        $mysql = "select * from giaovien where GV_MA = {$id}";
        $query = mysqli_query($con, $mysql);
        $result = array();
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }

    function add($id, $mon, $tdcm, $tcm, $ten, $cccd, $gt, $ngaysinh, $dc, $sdt, $pass){
        $con = $this->connect();
        $sql = "insert into giaovien (GV_MA, MH_MA, TDCM_MA, TCM_MA, GV_TEN, GV_CCCD, GV_GIOITINH, GV_NGAYSINH, GV_DIACHI, GV_SDT, GV_PASSWORD)
            values ('$id', '$mon', '$tdcm', '$tcm', '$ten', '$cccd', '$gt', '$ngaysinh', '$dc', '$sdt', '$pass')";
        $query = mysqli_query($con, $sql);
        return $query;
    }

   

    function edit ($id, $mon, $tdcm, $tcm, $ten, $cccd, $gt, $ngaysinh, $dc, $sdt, $pass){
        $con = $this->connect();
        $sql = "update giaovien set MH_MA = '$mon',
            TDCM_MA = '$tdcm',
            TCM_MA = '$tcm',
            GV_TEN = '$ten',
            GV_CCCD = '$cccd',
            GV_GIOITINH = '$gt',
            GV_NGAYSINH = '$ngaysinh', 
            GV_DIACHI = '$dc',
            GV_SDT = '$sdt',
            GV_PASSWORD = '$pass' where GV_MA = '$id'";

        $query = mysqli_query($con, $sql);
        return $query;
    }

    function alllop(){
        $con = $this->connect();
        $sql = "select * from lophoc";
        $query=mysqli_query($con, $sql);
        $result = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }

        }
        return $result;
    }
}
?>