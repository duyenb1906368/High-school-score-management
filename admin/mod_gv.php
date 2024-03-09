<?php
    if(!defined("ROOT")){
        echo "Bạn không có quyền truy cập trang này!!"; exit();
    }

    $mod = isset($_GET["mod"]) ?$_GET["mod"]:"";

    if($mod=="hs"){
        include ROOT ."/diem/xemdiem_gv.php";
    }

    if($mod=="gv"){
        include ROOT . "/giaovien/xem_gv.php";
    }
?>
