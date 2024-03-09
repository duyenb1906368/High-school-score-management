<?php
require 'db.class.php';
class namhoc extends DB
{
    function allquery()
    {
        $con=$this->connect();
        $sql='select * from namhoc';
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
        $sql="select * from namhoc where ID_NH={$id}";
        $query=mysqli_query($con,$sql);
        $result=array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    function add($nh, $id)
    {
        $con=$this->connect();
        $mysql="
        insert into namhoc(NAMHOC,ID_NH) 
        values('$nh','$id')";
        $query=mysqli_query($con,$mysql);
        return $query;

    }
    function edit($nh,$id)
    {
    $con=$this->connect();
    $mysql="
    UPDATE namhoc SET NAMHOC = '$nh' WHERE ID_NH = '$id' ";

    $query=mysqli_query($con,$mysql) ;
    return $query;
    }
}