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
    //them thong tin khach hang trong bang khachhang
    include '/NienLuanCS/connection/connection.php';
    // $sql_ktkh = "SELECT * from  khachhang where id = '".$id."'";
    // $result_ktkh = $con->query($sql_ktkh);
    // if($result_ktkh->num_rows > 0){
    //     $sql = "UPDATE khachhang set ten_kh = '".$ten_kh."', sdt = '".$sdt."', diachi = '".$diachi."' where id = '".$id."'";
    //     $con->query($sql);
    // }else{
    //     $sql = "INSERT into khachhang(id_kh, id, ten_kh, sdt, diachi) 
    //     value (null,'".$id."', '".$ten_kh."', '".$sdt."','".$diachi."')";
    //     $con->query($sql);
    // }
    $sql = "UPDATE thanhvien set hoten_tv = '".$ten_kh."', sdt = '".$sdt."', diachi = '".$diachi."' where id = '".$id."'";
    $con->query($sql);
    //insert vao hoa don
    $sql = "INSERT into hoadon(id_hd, id, ngaydat, ngaygiao) 
            value (null,'".$id."', null, null)";
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
            $tt = $row_tt['gia_sp']*$row_tt['soluong'];
            $sql_chitiet = "INSERT into chitiethoadon(id_cthd ,id_hd, id_sp, dongia, sl_sp, thanhtien)
            value (null, '".$id_hd."', '".$row_tt['id_sp']."', '".$row_tt['gia_sp']."',  '".$row_tt['soluong']."',  $tt)";
            $con->query($sql_chitiet);
        }
    }
            //lay du trong gio hang them vao chi tiet hoa don

    //xoa du lieu trong gio hang neu co trang thai bang 1
    $sql = "DELETE from giohang where trangthai = 1 and id = ".$id."";
    $con->query($sql);

    header("Location: thongtin_dathang.php");
    
?>