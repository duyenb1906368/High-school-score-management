<?php
if (!defined("ROOT"))
{
    echo "Bạn không có quyền truy cập trang này!!"; exit;
}
$mod = isset($_GET["mod"])?$_GET["mod"]:"";
if($mod=="hs")
{
    include ROOT . "/hocsinh/xemdiem_hs.php";
}
if($mod=="tt")
{
    include ROOT . "/hocsinh_xemthongtin.php";
}
?>