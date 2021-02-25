<?php
    $idgh = $_GET['id'];
    include '/NienLuanCS/connection/connection.php';
    $sql = "DELETE from giohang where id_gh = ".$idgh."";
    $con->query($sql);
    header("Location: giohang.php");
?>