<?php
require 'db.class.php';
class lop extends DB
{
 function alllop()
 {
     $con=$this->connect();
     $sql="select * from lophoc";
     $query=mysqli_query($con,$sql);
     $result=array();
     if($query)
     {
       while ($row=mysqli_fetch_assoc($query))
       {
           $result[]=$row;
       }
     }
     return $result;
 }
    function selectlop($id)
    {
        $con=$this->connect();
        $query="select * from lopHoc where LH_MA = '$id'";
        $results = mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($results);
        return $row;
    }
    function add($id,$ten,$khoi)
    {
        $con=$this->connect();
        $sql="insert into lophoc (LH_MA,LH_TEN,LH_KHOI) values('$id','$ten','$khoi')";
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
    function sualop($id,$ten,$khoi)
    {
        $con=$this->connect();
        $sql="update lophoc set
        LH_TEN='$ten',
        LH_KHOI='$khoi' 
        where LH_MA='$id'";
        $query=mysqli_query($con,$sql);
        return $query;
    }
}