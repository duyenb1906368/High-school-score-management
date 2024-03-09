<?php
require 'db.class.php';
class day extends DB{
    function allday(){
        $con = $this->connect();
        $sql = "select * from day";
        $query = mysqli_query($con, $sql);
        $result = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        return $result;
    }

    function selectday($id){
        $con = $this->connect();
        $mysql = "select * from day where DAY_MA = {$id}";
        $query = mysqli_query($con, $mysql);
        $result = array();
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }

    function add($id, $mon, $gv, $lop, $hk, $nh, $mota){
        $con = $this->connect();
        $sql = "insert into day (DAY_MA, MH_MA, GV_MA, LH_MA, ID_HK, ID_NH, MOTAPHANCONG)
            values ('$id', '$mon', '$gv', '$lop', '$hk', '$nh', '$mota')";
        $query = mysqli_query($con, $sql);
        return $query;
    }

   

    function edit ($id, $mon, $gv, $lop, $hk, $nh, $mota){
        $con = $this->connect();
        $sql = "update day set MH_MA = '$mon',
            GV_MA = '$gv',
            LH_MA = '$lop',
            ID_HK = '$hk',
            ID_NH = '$nh',
            MOTAPHANCONG = '$mota' where DAY_MA = '$id'";

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