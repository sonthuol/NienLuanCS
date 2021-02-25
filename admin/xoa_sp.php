<?php
    session_start();
    include '/NienLuanCS/connection/connection.php';
    $id_sp = $_GET['id'];
    $sql = "DELETE FROM sanpham where id_sp = '".$id_sp."'";
    $result = $con->query($sql);
    header("Location: danhsach_sp.php");
    $con->close();
?>