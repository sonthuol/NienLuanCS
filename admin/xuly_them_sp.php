<?php
    $maloaisp = $_POST['maloaisp'];
    $idth = $_POST['idth'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia_sp'];
    $gia_ban = $_POST['gia_ban'];
    $anhsp = './img_sp/'.$_FILES['logo']['name'];
    move_uploaded_file($_FILES['logo']['tmp_name'], "../img/".$anhsp);
    $mausac = $_POST['mausac'];
    $slsp = $_POST['sl'];
    $sosao = $_POST['sosao'];
    $danhgia = $_POST['danhgia'];
    $khuyenmai = $_POST['khuyenmai'];
    $giaitrikhuyenmai = $_POST['giatrikhuyenmai'];
    $ngaybatdauKM = date('Y-m-d', strtotime($_POST['ngaybatdaukhuyenmai']));
    $ngayketthucKM = date('Y-m-d', strtotime($_POST['ngayketthuckhuyenmai']));
    //ket noi database
    include '/NienLuanCS/connection/connection.php';
    $sql = "INSERT into sanpham value (null, 
        '".$maloaisp."', 
        '".$idth."',
        '".$tensp."', 
        '".$gia."', 
        '".$gia_ban."', 
        '".$anhsp."',
        '".$mausac."',
        '".$slsp."',
        '".$sosao."',
        '".$danhgia."',
        '".$khuyenmai."',
        '".$giaitrikhuyenmai."',
        '".$ngaybatdauKM."',
        '".$ngayketthucKM."',
         null, null, '1')";
    $con->query($sql);
    echo $sql;
    header("Location: them_sp.php");
    $con->close();
?>