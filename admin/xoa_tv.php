<?php
    $id = $_GET['id'];
    include '/NienLuanCS/connection/connection.php';
    $sql = "DELETE from thanhvien where id = '".$id."'";
?>