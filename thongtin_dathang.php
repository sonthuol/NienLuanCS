<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết hóa đơn</title> 
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tieude.css">
    <link rel="stylesheet" href="css/noidung.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/giohang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <?php
        session_start();
        include 'tieude.php';
    ?>
    <!-- Nội dung của trang web -->
    <div id="noidung">
        <div id="dienthoai">
            <h1>Thông tin hóa đơn</h1>
            <div id="thongtin">
                <table>
                    <tr>
                        <td>Tên khách hàng: </td>
                        <th>Sơn Thươl</th>
                    </tr>
                    <tr>
                        <td>Số điện thoại: </td>
                        <th>0377087266</th>
                    </tr>
                    <tr>
                        <td>Địa chỉ giao hàng: </td>
                        <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, blanditiis.</th>
                    </tr>
                </table>
            </div>
            <div id="banghoadon">
            <table border="1">
                <tr>
                    <th>STT</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                    include '/NienLuanCS/connection/connection.php';
                    $sql = "SELECT *, cthd.sl_sp as soluong FROM chitiethoadon cthd, sanpham sp,(
                            SELECT max(id_hd) as lonnhat FROM hoadon WHERE hoadon.id = '".$_SESSION['id']."' ) hd
                            WHERE cthd.id_hd = hd.lonnhat and cthd.id_sp = sp.id_sp
                        ";
                    $i = 0;
                    $tt = 0;
                    $result_hd = $con->query($sql);
                    if($result_hd->num_rows > 0){
                        while($row_hd = $result_hd->fetch_assoc()){
                            $tt = $tt + $row_hd['thanhtien'];
                            echo "
                            <tr>
                                <td>".++ $i."</td>
                                <td><img src='./img/".$row_hd['img_sp']."' alt='' width=100px height=100px></td>
                                <td>".$row_hd['ten_sp']."</td>
                                <td>".number_format($row_hd['dongia'], 0, '', ',')." Đ</td>
                                <td>".$row_hd['soluong']."</td>
                                <td>".number_format($row_hd['thanhtien'], 0, '', ',')." Đ</td>
                            </tr>
                            ";
                        }
                        echo "
                            <tr>
                                <th colspan='5' id='tt'>Tổng cộng</th>
                                <th>".number_format($tt, 0, '', ',')." Đ</th>
                            </tr>
                        ";
                    }
                ?>
            </table>
            </div>
       </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/timkiemsp.js"></script>
</body>
    
</html>