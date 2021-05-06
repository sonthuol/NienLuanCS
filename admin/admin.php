<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <?php
        include '/NienLuanCS/connection/connection.php';
        session_start();
        if(isset($_SESSION['admin'])){
            unset($_SESSION['id_nv']);
        }
        if(isset($_SESSION['id_nv'])){
            unset($_SESSION['admin']);
        }
        if(isset($_SESSION['admin']) || isset($_SESSION['id_nv'])){
            session_start();
            include 'tieude.php';?>
            <div id="content">
                <?php
                    include 'menu_trai.php';
                ?>
            <div id="noidungchinh">
                <div id="noidung">
                    <div class="fa tongsp">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <?php
                                    //Tổng số sản phẩm
                                    //Viết câu truy vấn
                                    $sql_TongSoSanPham = "SELECT count(id_sp) as TongSoSanPham from sanpham";
                                    $result_TongSoSanPham = $con->query($sql_TongSoSanPham);
                                    $row_TongSoSanPham = $result_TongSoSanPham->fetch_assoc();
                                ?>
                                <p>Tổng số sản phẩm:</p>
                                <h2><?php echo $row_TongSoSanPham['TongSoSanPham']?></h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="danhsach_sp.php">Xem chi tiết</a>
                            <a href="danhsach_sp.php"> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa hethangsp">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <?php
                                    //Tổng số sản phẩm hết hàng
                                    //Viết câu truy vấn
                                    $sql_TongSoSanPhamHetHang = "SELECT count(id_sp) as TongSoSanPhamHetHang from sanpham where sl_sp < 3";
                                    $result_TongSoSanPhamHetHang = $con->query($sql_TongSoSanPhamHetHang);
                                    $row_TongSoSanPhamHetHang = $result_TongSoSanPhamHetHang->fetch_assoc();
                                ?>
                                <p>Sản phẩm sắp hết hàng:</p>
                                <h2><?php echo $row_TongSoSanPhamHetHang['TongSoSanPhamHetHang']?></h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="thongKeDonHangDaHet.php">Xem chi tiết</a>
                            <a href="thongKeDonHangDaHet.php"> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa giohang">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <?php
                                    //Tổng số sản phẩm
                                    //Viết câu truy vấn
                                    $sql_TongSoSanPham = "SELECT count(id_sp) as TongSoSanPham from sanpham";
                                    $result_TongSoSanPham = $con->query($sql_TongSoSanPham);
                                    $row_TongSoSanPhamm = $result_TongSoSanPham->fetch_assoc();
                                ?>
                                <p>Tổng số giỏ hàng</p>
                                <h2>10</h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="">Xem chi tiết</a>
                            <a href=""> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa tongdonhang">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <p>Tổng đơn hàng</p>
                                <h2>10</h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="">Xem chi tiết</a>
                            <a href=""> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa tongdt">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <p>Tổng doanh thu</p>
                                <h2>100.000.000 vnđ</h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="">Xem chi tiết</a>
                            <a href=""> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa dt_homnay">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <p>Tổng doanh thu hôm nay</p>
                                <h2>100.000.000 vnđ</h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="">Xem chi tiết</a>
                            <a href=""> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa dt_thang">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <p>Doanh thu tháng</p>
                                <h2>100.000.000 vnđ</h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="">Xem chi tiết</a>
                            <a href=""> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="fa dt_nam">
                        <div class="tren">
                            <a href=""><i class="fas fa-book"></i></a>
                            <div>
                                <p>Doanh thu năm</p>
                                <h2>100.000.000 vnđ</h2>
                            </div>
                        </div>
                        <div class="duoi">
                            <a href="">Xem chi tiết</a>
                            <a href=""> <i class="fas fa-angle-double-down"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
        }else{
            header("Location: ../../NienLuanCS/index.php");
        }
    ?>
</body>
</html>