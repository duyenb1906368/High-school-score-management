<?php
include 'db.class.php';

class diem extends DB{
    function alldiem(){
        $con=$this->connect();
        $sql = "select * from diem, hocsinh, monhoc, hocky1, namhoc where diem.HS_MA=hocsinh.HS_MA
            && diem.MH_MA=monhoc.MH_MA && diem.ID_HK = hocky1.id_hk && diem.ID_NH = namhoc.ID_NH";
        $query=mysqli_query($con, $sql);
        $result=array();
        if($query){
            while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        return $result;
    }

    function selectdiem($id){
        $con = $this->connect();
        $sql="select distinct * from diem where D_MA={$id} ";
        $query=mysqli_query($con, $sql);
        $result=array();
        if(mysqli_num_rows($query) > 0){
            $row=mysqli_fetch_assoc($query);
            $result[]=$row;
        }
        return $result;
    }


    function close(){
        mysqli_close($this->myconn);
    }
}
?>