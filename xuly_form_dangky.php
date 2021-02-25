<?php
    //lam viec voi form
    $hoten = $_POST['hoten'];
    $ten = $_POST['tentaikhoan'];
    $tmp_mk = $_POST['matkhau'];
    $matkhau = md5($tmp_mk);
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $path_avata_tv = './img_tv/' . $_FILES['anhdaidien']['name'];
    move_uploaded_file($_FILES['anhdaidien']['tmp_name'],  "./img/".$path_avata_tv);
    //lam viec voi co so du lieu
    include '/NienLuanCS/connection/connection.php';
    $sql = "INSERT INTO thanhvien (hoten_tv, tentaikhoan, matkhau, email, sdt, path_anh_tv) 
        values ('$hoten','$ten', '$matkhau','$email', '$sdt' ,'$path_avata_tv')";
    $result =   $con->query($sql);
    $con->close();
    header("Location: form_dangnhap.php"); 
?> 