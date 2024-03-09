<?php
$conn = mysqli_connect('localhost', 'root', '', 'qld_thpt');
if(mysqli_connect_errno() !== 0){
    die("Không thể kết nối tới CSDL!!".mysqli_connect_errno());

}
mysqli_set_charset($conn, 'utf-8');
?>