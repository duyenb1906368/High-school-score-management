<?php
require 'db.class.php';
class hocki extends DB
{
    function allquery()
    {
        $con=$this->connect();
        $sql='select * from hocky1';
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectquery($id)
    {
        $con=$this->connect();
        $sql="select * from hocky1 where id_hk = $id";
        $query=mysqli_query($con,$sql);
        $result=array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    // function add($nh, $hk, $id)
    // {
    //     $con=$this->connect();
    //     $mysql=" insert into hocky(NAMHOC, HOCKY, ID_HK) values('$nh', '$hk', '$id')";
    //     $query=mysqli_query($con,$mysql);
    //     return $query;

    // }

    function add($idnh, $idhk, $hk){
        $con = $this->connect();
        $sql = "insert into hocky1(id_nh, id_hk, hocky)
            values ('$idnh', '$idhk', '$hk')";
        $query = mysqli_query($con, $sql);
        return $query;
    }




    
    function edit($idnh, $idhk, $hk)
    {
    $con=$this->connect();
    $mysql="UPDATE hocky1 SET id_nh = '$idnh', hocky = '$hk' WHERE id_hk = $idhk";
    
    $query=mysqli_query($con,$mysql) ;
    return $query;
    }
}