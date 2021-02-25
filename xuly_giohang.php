<?php
    session_start();
    $id = $_SESSION['id'];
    $idsp = $_SESSION['idsp'];
    include '/NienLuanCS/connection/connection.php';
    $check = "SELECT * from giohang where id = '".$id."' and  id_sp = '".$idsp."'";
    $result = $con->query($check);
    if($result->num_rows == 0){
        $sql = "INSERT INTO `giohang`(`id_gh`, `id`, `id_sp`, `soluong`, `trangthai`) VALUES (null,'$id','$idsp',1, 0)";
        $con->query($sql);
        $con->close();  
        $message = "Sản phẩm đã thêm vào giỏ hàng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
        $message = "Sản phẩm đã có trong giỏ hàng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    header("Location: chitietsanpham.php?idsp=".$idsp."")
?>