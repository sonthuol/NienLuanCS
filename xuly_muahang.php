<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    session_start();
    $id = $_SESSION['id'];
    $ten_kh = test_input($_POST['name_cus']);
    $sdt = test_input($_POST['phone']);
    $diachi = test_input($_POST['diachi']);
    $ghichu = test_input($_POST['ghichu']);
    //them thong tin khach hang trong bang khachhang
    include '/NienLuanCS/connection/connection.php';
    $sql = "UPDATE thanhvien set hoten_tv = '".$ten_kh."', sdt = '".$sdt."', diachi = '".$diachi."' where id = '".$id."'";
    $con->query($sql);
    //insert vao hoa don
    $sql = "INSERT into hoadon(id_hd, id, ngay_dathang, noi_nhanhang, id_nv, ghichu) 
            value (null,'$id', null, '$diachi', null, '$ghichu')";
    $con->query($sql);
    $sql_hd = "SELECT * from hoadon where id = '".$id."'";
    $result_hd = $con->query($sql_hd);
    if($result_hd->num_rows > 0){
        while($row_hd = $result_hd->fetch_assoc()){
            $id_hd = $row_hd['id_hd'];
        }
    }
    //lay du lieu don gia
    $sql = "SELECT * FROM sanpham sp, giohang gh, thanhvien tv
    WHERE sp.id_sp = gh.id_sp and tv.id = gh.id and trangthai = 1 and gh.id = ".$_SESSION['id']."";
    $result_tt = $con->query($sql);
    $i = 0;
    $tt = 0;
    if($result_tt->num_rows > 0){
        while($row_tt = $result_tt->fetch_assoc()){
            $soluong_ban = $row_tt['soluong'];
            $soluong_goc = $row_tt['sl_sp'];
            $idsp = $row_tt['id_sp'];
            $tt = $row_tt['gia_ban']*$row_tt['soluong'];
            $sql_chitiet = "
                INSERT into chitiethoadon(id_cthd ,id_hd, id_sp, dongia, sl_sp, thanhtien)
                value (null, '".$id_hd."', '".$row_tt['id_sp']."', '".$row_tt['gia_ban']."',  '".$row_tt['soluong']."',  $tt)
                ";
            $con->query($sql_chitiet);
        }
    }
    //lay du trong gio hang them vao chi tiet hoa don

    //xoa du lieu trong gio hang neu co trang thai bang 1
    $sql = "DELETE from giohang where trangthai = 1 and id = ".$id."";
    $con->query($sql);
    
    //cap nhat lai so luong san pham
    $sl_capnhat = $soluong_goc - $soluong_ban;
    $sql = "UPDATE sanpham set sl_sp = '".$sl_capnhat."' where id_sp = '".$idsp."'";
    $con->query($sql);
    header("Location: thongtin_dathang.php");
?>