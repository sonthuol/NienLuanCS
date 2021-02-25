<?php
    $maloaisp = $_POST['maloaisp'];
    $idth = $_POST['idth'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia_sp'];
    $anhsp = './img_sp/'.$_FILES['logo']['name'];
    move_uploaded_file($_FILES['logo']['tmp_name'], "../img/".$anhsp);
    $slsp = $_POST['sl'];
    session_start();
    if($anhsp == './img_sp/'){
        $anhsp = $_SESSION['img_sp'];
    }
    //ket noi database
    $idsp = $_SESSION['idsp'];
    include '/NienLuanCS/connection/connection.php';
    $sql= "UPDATE sanpham set ma_loaisp = '".$maloaisp."', id_th = '".$idth."', 
            ten_sp = '".$tensp."', gia_sp = '".$gia."', img_sp = '".$anhsp."',
            sl_sp = '".$slsp."', ngay_tao = '".$_SESSION['ngay_tao']."',ngay_update = null
            where id_sp = '".$idsp."'
            ";
    $con->query($sql);
    header("Location: sua_sp.php?id=".$idsp."");
    $con->close();
?>