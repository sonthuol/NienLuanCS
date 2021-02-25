<?php
    session_start();
    $ten = $_POST['tentaikhoan'];
    $temp = $_POST['matkhau'];
    $matkhau = md5($temp);
    include '/NienLuanCS/connection/connection.php';
    //dang nhap doi voi khach hang
    $sql = "SELECT * FROM thanhvien WHERE tentaikhoan='".$ten."'AND matkhau='".$matkhau."'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
        $_SESSION['id'] = $row['id'];
        $_SESSION['user'] = $row['tentaikhoan'];
        $_SESSION['path_anh_tv'] = $row['path_anh_tv'];
        header("Location: index.php");
    }else{
        $sql_ad = "SELECT * FROM `admin` WHERE username='".$ten."'AND pass='".$temp."'";
        $result_ad = $con->query($sql_ad);
        if($result_ad->num_rows > 0){
            header("Location: admin/admin.php");
        }else{
            header("Location: index.php");
        }
    }


?>