<?php
    session_start();
    $str =  explode('/',$_GET['tk']);
    $sl = $str[0];
    $idsp = $str[1];
    include '/NienLuanCS/connection/connection.php';
    // cap nhat so luong trong gio hang
        $sql = "UPDATE giohang set soluong = '".$sl."' where id_sp = '".$idsp."'";
        $con->query($sql);
    //show gio hang sau khi cap nhat
    if(isset($_SESSION['id'])){
        $sql = "SELECT * FROM sanpham sp, giohang gh, thanhvien tv
        WHERE sp.id_sp = gh.id_sp and tv.id = gh.id and gh.id = ".$_SESSION['id']."";
        $result_gh = $con->query($sql);
        $i = 0;
        if($result_gh->num_rows > 0 && $_SESSION['id']){
            echo "<form action='../php/xuly_muahang.php' method='POST' enctype='multipart/form-data' onsubmit='return thanhtoan()'>
            <div id='bang_sp'>
                <h1>Wellcome to carts</h1>";
            echo "<table border='1'>";
            while($row_gh = $result_gh->fetch_assoc()){
                    echo "
                    <tr>
                        <td rowspan='2'>".++ $i."</td>
                        <td rowspan='2'><img src='img/".$row_gh['img_sp']."' alt='' width='120px' height='90px'></td>
                        <td colspan='5' class='tensp'>".$row_gh['ten_sp']."</td>
                    </tr>
                    <tr>
                        <td class='giasp'>ĐG: ".number_format($row_gh['gia_sp'], 0, '', ',')." Đ</td>
                        <td>
                            <div class='buttons_added'>
                                <input class='minus is-form' type='button' value='-' onclick='congtru(-1, ".$row_gh['id_sp']."); soluonggiohang(".$row_gh['id_sp'].")'>
                                <input aria-label='quantity' id='".$row_gh['id_sp']."' class='input-qty' max='20' min='1' name='' type='number'  value='".$row_gh['soluong']."'>
                                <input class='plus is-form' type='button' value='+' onclick='congtru(1, ".$row_gh['id_sp']."); soluonggiohang(".$row_gh['id_sp'].")'>
                            </div>
                        </td>
                        <td class='giasp'>".number_format($row_gh['gia_sp']*$row_gh['soluong'], 0, '', ',')." Đ</td>";
                        if($row_gh['trangthai'] == 1){
                            echo "<td><input id='".$row_gh['id_sp']."_mua' type='checkbox' value='1' onclick='checkmua(".$row_gh['id_sp'].")' checked></td>";
                        }else{
                            echo "<td><input id='".$row_gh['id_sp']."_mua' type='checkbox' value='0' onclick='checkmua(".$row_gh['id_sp'].")'></td>";
                        }
                        echo "
                        <td><a href='../php/xoa_sp_giohang.php?id=".$row_gh['id_gh']."'><img src='img/delete.png' alt='' width='20px' height='20px'></a></td>
                    </tr>
                    ";
            }
            $sql = "SELECT SUM(sp.gia_sp*gh.soluong) as TT FROM sanpham sp, giohang gh, thanhvien tv
                WHERE sp.id_sp = gh.id_sp and tv.id = gh.id and gh.id = ".$_SESSION['id']."";
            $result_tt = $con->query($sql);
            if($result_tt->num_rows > 0){
                while($rowtt = $result_tt->fetch_assoc()){
                    echo "
                        <tr id='tongtien'>
                            <td colspan='3'></td>
                            <td>Tổng tiền:</td>
                            <td>".number_format($rowtt['TT'], 0, '', ',').' Đ'."</td>
                        </tr>
                    ";
                }
            }

            $sql = "SELECT * FROM sanpham sp, giohang gh, thanhvien tv
            WHERE sp.id_sp = gh.id_sp and tv.id = gh.id and trangthai = 1 and gh.id = ".$_SESSION['id']."";
            $result_tt = $con->query($sql);
            $i = 0;
            $tt = 0;
            if($result_tt->num_rows > 0 && $_SESSION['id']){
                while($row_tt = $result_tt->fetch_assoc()){
                    $tt = $tt + $row_tt['gia_sp']*$row_tt['soluong'];
                }
            }
            $_SESSION['tongtien'] = $tt;
            echo " </table>";
            echo "</div>";
            $sql_kh ="SELECT * from thanhvien where id = ".$_SESSION['id']."";
            $result_kh = $con->query($sql_kh);
            if($result_kh->num_rows > 0){
                while($row_kh = $result_kh->fetch_assoc()){
                    echo "<div id='ttkh'>
                            <h3>Thông tin khách hàng</h3>
                            <span>Họ Tên:</span><br>
                            <input type='text' name='name_cus' value='".$row_kh['hoten_tv']."'><br>
                            <span>Số ĐT:</span><br>
                            <input type='text' name='phone' value='".$row_kh['sdt']."'><br>
                            <span>Địa chỉ giao:</span><br>
                            <textarea name='diachi' id='' cols='25' rows='10'>".$row_kh['diachi']."</textarea>
                            <span>Ghi chú:</span><br>
                            <textarea name='ghichu' id='' cols='25' rows='10'></textarea>
                            <p id='tamtinh'>Tạm tính: ".number_format($tt, 0, '', ',')." Đ</p>
                            <input type='submit' value='Thanh Toán'>
                        </div>";   
                }

            }else{
                echo "<div id='ttkh'>
                    <h3>Thông tin khách hàng</h3>
                    <span>Họ Tên:</span><br>
                    <input type='text' name='name_cus'><br>
                    <span>Số ĐT:</span><br>
                    <input type='text' name='phone'><br>
                    <span>Địa chỉ giao:</span><br>
                    <textarea name='diachi' id='' cols='25' rows='10'></textarea>
                    <span>Ghi chú:</span><br>
                    <textarea name='ghichu' id='' cols='25' rows='10'></textarea>
                    <p id='tamtinh'>Tạm tính: ".number_format($tt, 0, '', ',')." Đ</p>
                    <input type='submit' value='Thanh Toán'>
                </div>";
            }
    echo "</form>";
        }else{
            echo "Bạn chưa có sản phẩm nào trong giỏ Tiếp tục mua sắm!";
        }
    }else{
        echo "Bạn chưa có sản phẩm nào trong giỏ Tiếp tục mua sắm!";
    }
?>