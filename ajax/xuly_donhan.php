<?php
    session_start();
    include('/NienLuanCS/connection/connection.php');
    $id_hd = $_GET['id_hd'];
    if(isset($_SESSION['admin'])){
        $sql = "UPDATE hoadon set id_nv = '0', trangthai = '1'";
    }else{
        $sql = "UPDATE hoadon set id_nv = '".$_SESSION['id_nv']."', trangthai = '1'";
    }
    echo "Đã duyệt";
    $con->query($sql);

?>