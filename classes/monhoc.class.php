<?php
require 'db.class.php';
class monhoc extends DB
{
    function allquery()
    {
        $con=$this->connect();
        $sql='select * from monhoc';
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
        $sql="select * from monhoc where MH_MA = '$id'";
        $query=mysqli_query($con,$sql);
        $result=array();
        $row = mysqli_fetch_assoc($query);
        $result = $row;
        return $result;
    }
    function add($ma, $ten, $sotiet, $heso)
    {
        $con=$this->connect();
        $mysql="
        insert into monhoc(MH_MA, MH_TEN, MH_SOTIET, MH_HESO) 
        values('$ma','$ten', '$sotiet', '$heso')";
        $query=mysqli_query($con,$mysql);
        return $query;

    }
    function edit($ma, $ten, $sotiet, $heso)
    {
    $con=$this->connect();
    $mysql="
    UPDATE monhoc SET MH_TEN = '$ten', MH_SOTIET = '$sotiet', MH_HESO = '$heso' WHERE MH_MA = '$ma' ";

    $query=mysqli_query($con,$mysql) ;
    return $query;
    }
}