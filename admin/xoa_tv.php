<?php
    $id = $_GET['id'];
    include '/NienLuanCS/connection/connection.php';
    $sql = "
            DELETE from hoadon 
            DELETE from thanhvien where id = '".$id."'
            ";
?>