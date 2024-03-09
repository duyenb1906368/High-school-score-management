<?php 
if (!defined("ROOT")){
    echo "Bạn không có quyền truy cập trang này!"; exit;
}

$mod = isset ($_GET["mod"]) ?$_GET["mod"]:"";

if($mod=="hs"){
    include ROOT . "/hocsinh/xem_hs.php";
}

if($mod=="gv"){
    include ROOT . "/giaovien/xem_gv.php";
}

if($mod=="mh"){
    include ROOT . "/monhoc/hienthimon.php";
}

if($mod=="diem"){
    include ROOT . "/diem/ad_xemdiem.php";
}

if($mod=="thongke"){
    include ROOT . "/diem/ad_thongke.php";
}

if($mod=="hk"){
    include ROOT . "/hocky/hienthihk.php";
}

if($mod=="namhoc"){
    include ROOT . "/namhoc/hienthinh.php";
}

if($mod=="capnhat")
{
    include ROOT . "/user/trangcapnhat.php";
}

if($mod=="day")
{
    include ROOT. "/day/hienthi.php";
}

if($mod=="lop"){
    include ROOT . "/lop/hienthilop.php";
}

if($mod=="dangxuat"){
    include ROOT . "/logout.php";
}

?>