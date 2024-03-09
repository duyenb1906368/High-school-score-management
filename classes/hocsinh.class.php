<?php
require 'db.class.php';
class hocsinh extends DB{
    function allhs(){
        $con = $this->connect();
        $sql = "select * from hocsinh";
        $query = mysqli_query($con, $sql);
        $result = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        return $result;
    }

    function selecths($id){
        $con = $this->connect();
        $mysql = "select * from hocsinh where HS_MA = {$id}";
        $query = mysqli_query($con, $mysql);
        $result = array();
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }

    function add($id, $lop, $ten, $gtinh, $ngaysinh, $noisinh, $dt, $dc, $pass){
        $con = $this->connect();
        $sql = "insert into hocsinh (HS_MA, LH_MA, HS_TEN, HS_GIOITINH, HS_NGAYSINH, HS_NOISINH, HS_DANTOC, HS_DIACHI, HS_PASSWORD)
            values ('$id', '$lop', '$ten', '$gtinh', '$ngaysinh', '$noisinh', '$dt', '$dc', '$pass')";
        $query = mysqli_query($con, $sql);
        return $query;
    }

   

    function edit ($id, $lop, $ten, $gtinh, $ngaysinh, $noisinh, $dt, $dc, $pass){
        $con = $this->connect();
        $sql = "update hocsinh set LH_MA = '$lop',
            HS_TEN = '$ten',
            HS_GIOITINH = '$gtinh',
            HS_NGAYSINH = '$ngaysinh',
            HS_NOISINH = '$noisinh',
            HS_DANTOC = '$dt',
            HS_DIACHI = '$dc',
            HS_PASSWORD = '$pass' where HS_MA = '$id'";

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